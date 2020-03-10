<?php

namespace App\Http\Controllers;

use App\Exceptions\CheckException;
use App\Http\Requests\OrderRequest;
use App\Models\ItemValue;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\ProductSku;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    /**
     * 获取出库列表
     *
     * @param Request $request
     * @param Order $order
     * @return void
     */
    public function index(Request $request,Order $order)
    {
        $isAgent = auth('api')->user()->hasRole(6);
        $isAgent && $orders = auth('api')->user()->agentOrder()->outbound()->filter($request->all())->paginateFilter(request('pageSize',10));

        !$isAgent && ($request->type == 2) && $orders = $order->orderManage($request);
        !$isAgent && ($request->type !=2) && $orders = auth('api')->user()->adminOrder()->outbound()->filter($request->all())->paginateFilter(request('pageSize',10));

        return respond(1,'成功',$orders);
    }

    /**
     * 新增出库订单
     *
     * @param OrderRequest $request
     * @param Order $order
     * @return void
     */
    public function store(OrderRequest $request,Order $order)
    {
        $data = request('list');
        $data = $order->orderStore($data,$order,$request);
 
        $creditAmount = collect($data)->sum('sale_price');
        if($creditAmount > auth('api')->user()->credit_amount){
            throw new CheckException(0,'授信金额不足');
        }
        return DB::transaction(function() use($data,$creditAmount){

            auth('api')->user()->orders()->createMany($data);
            auth('api')->user()->decrement('credit_amount',$creditAmount);
           
            return respond(1,'成功');
        });
       
    }

    
    /**
     * 修改出库订单
     *
     * @param OrderRequest $request
     * @param Order $order
     * @return void
     */
    public function update(OrderRequest $request,Order $order)
    {
        $orders = Order::where('sno',$order->sno)->get();
        $result = $orders->map(function ($order) use($request){
            return $order->update($request->all());
        });

        return $result?respond(1,'成功',$result):respond(0,'失败',$result);
    }

    /**
     * 申请删除出库订单
     *
     * @param Order $order
     * @return void
     */
    public function applyDelete(Order $order)
    {
        $orders = Order::where('sno',$order->sno)->get();
        $result = $orders->map(function ($order){
            return $order->update(['status'=>2]);
        });

        return $result?respond(1,'成功',$result):respond(0,'失败',$result);
    }

    /**
     * 同意删除出库订单
     *
     * @param Order $order
     * @return void
     */
    public function destroy(Order $order)
    {
        return DB::transaction(function() use($order){

            $orders = Order::where('sno',$order->sno)->get();
            $result = $orders->map(function ($order){
                User::where('id',$order->user_id)->increment('credit_amount',$order->sale_price);
                return $order->delete();
            });
           
            return $result?respond(1,'成功',$result):respond(0,'失败',$result);
        });
    }


    /**
     * 不同意删除出库订单
     *
     * @param Order $order
     * @return void
     */
    public function cancelDestroy(Order $order)
    {
        $orders = Order::where('sno',$order->sno)->get();
        $result = $orders->map(function ($order){
            return $order->update(['status'=>1]);
        });

        return $result?respond(1,'成功',$result):respond(0,'失败',$result);
    }


    /**
     * 确认出库订单
     *
     * @param OrderRequest $request
     * @param Order $order
     * @return void
     */
    public function submitConfirm(OrderRequest $request,Order $order)
    {
        $orders = Order::where('sno',$order->sno)->get();
        DB::transaction(function() use ($request,$orders){

            $orders->map(function ($order) use($request){
                $data = $request->all();
                $data['status'] = 3;
                $order->update($data);
                ProductSku::where('id',$order->product_sku_id)->decrement('stock',$order->num);
                User::where('id',$order->user_id)->increment('credit_amount',$order->sale_price);
            });

        });

        return respond(1,'成功');
    }

    /**
     * 取消出库提交订单
     */
    public function notSubmitConfirm(Order $order)
    {
        $orders = Order::where('sno',$order->sno)->get();
        DB::transaction(function() use($orders){

            $orders->map(function ($order){
                User::where('id',$order->user_id)->increment('credit_amount',$order->sale_price);
                $order->update(['status'=>6]);
            });

        });

        return respond(1,'成功');
    }

   /**
    * 获取退货列表
    *
    * @param Request $request
    * @return void
    */
    public function return(Request $request)
    {
        $isAgent = auth('api')->user()->hasRole(6);

        $isAgent && $orders = auth('api')->user()->agentOrder()->return()->filter($request->all())->paginateFilter(request('pageSize',10));
        $isAgent && $category = 1;

        !$isAgent && $orders = auth('api')->user()->adminOrder()->return()->filter($request->all())->paginateFilter(request('pageSize',10));
        !$isAgent && $category = 2;
       
        return response()->json(['code'=>1,'msg'=>'成功','data'=>$orders,'category'=>$category]);
    }

   /**
    * 提交订单退货申请
    *
    * @param OrderRequest $request
    * @param Order $order
    * @return void
    */
    public function apply(OrderRequest $request,Order $order)
    {
        $data = $request->all();
        $data['status'] = 4;

        $orders = Order::where('sno',$order->sno)->get();
        $orders->map(function ($order) use($data){
            $order->update($data);
        });

        return respond(1,'成功');
    }
    
    /**
     * 取消申请订单退货
     *
     * @param Order $order
     * @return void
     */
    public function cancel(Order $order)
    {
        $result = $order->update(['status'=>3]);

        return $result?respond(1,'成功',$result):respond(0,'失败',$result);
    }


    /**
     * 确认退货
     *
     * @param Order $order
     * @return void
     */
    public function applyConfirm(Order $order)
    {
        return DB::transaction(function() use ($order){

            $result = $order->update(['status'=>5]);
            ProductSku::where('id',$order->product_sku_id)->increment('stock',$order->num);

            return $result?respond(1,'成功',$result):respond(0,'失败',$result);
        });
        
    }

    /**
     * 获取销售分析
     *
     * @param Request $request
     * @return void
     */
    public function salesAnalysis(Request $request)
    {
        $data = todayDate($request->all());

        $orders = Order::with(['user','product'])->where(function($query) use ($data){
            $query->where('created_at','>',$data['start_at'])->where('created_at','<',$data['end_at']);
        })->paginate(request('pageSize',10));

        return respond(1,'成功',$orders);
    }

     /**
      * 导出出库列表
      *
      * @param Request $request
      * @param Order $order
      * @return void
      */
    public function outputExport(Request $request,Order $order)
    {
        $isAgent = auth('api')->user()->hasRole(6);

        $isAgent && $orders = auth('api')->user()->agentOrder()->outbound()->filter($request->all())->get()->toArray();
        $isAgent && $cellData =$order->orderAgentExport($orders,1);

        !$isAgent && ($request->type != 2) && $orders = auth('api')->user()->adminOrder()->outbound()->filter($request->all())->get()->toArray();
        !$isAgent && ($request->type != 2) && $cellData = $order->orderAdminExport($orders);

        if(isset($cellData)) return $order->export('出库列表',$cellData);

        $user = User::find($request->user_id);
        $orders = Order::with('product','code','color')->where('sno',$request->sno)->get()->toArray();

        return $order->orderManageExport($orders,$user);
    }

    /**
     * 打印出库管理
     *
     * @param Request $request
     * @param Order $order
     * @return void
     */
    public function managePrint(Request $request,Order $order)
    {
        $user = User::find($request->user_id);
        $orders = Order::with('product','code','color')->where('sno',$request->sno)->get()->toArray();
        $orders = collect($orders)->sortBy('code.name')->sortBy('color.name')->sortBy('product_name');
        $orders = $orders->values()->all();

        $result = $order->orderManagePrint($orders,$user);

        return respond(1,'成功',$result);
    }


    /**
     * 导出退货列表
     *
     * @param Request $request
     * @param Order $order
     * @return void
     */
    public function returnExport(Request $request,Order $order)
    {
        $isAgent = auth('api')->user()->hasRole(6);

        $isAgent && $orders = auth('api')->user()->agentOrder()->return()->filter($request->all())->get()->toArray();
        $isAgent && $cellData = $order->orderAgentExport($orders,2);

        !$isAgent && $orders = auth('api')->user()->adminOrder()->return()->filter($request->all())->get()->toArray();
        !$isAgent && $cellData = $order->orderAdminExport($orders);

        return $order->export('退货列表',$cellData);
    }

    /**
     * 修改出库订单
     *
     * @param OrderRequest $request
     * @param Order $order
     * @return void
     */
    public function outputUpdate(OrderRequest $request,Order $order)
    {
        $orders = Order::where('sno',$order->sno)->get();
        $result = DB::transaction(function() use($orders,$request){

            $orders->map(function ($order) use($request){
               $order->update($request->all());
            });

        });

        return respond(1,'成功',$result);
    }


}
