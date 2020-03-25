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
        $isAgent && $orders = auth('api')->user()->agentOrder()->outbound()->createdAtOrder()->filter($request->all())->paginateFilter(request('pageSize',10));

        !$isAgent && ($request->type == 2) && $orders = $order->orderManage($request);
        !$isAgent && ($request->type !=2) && $orders = auth('api')->user()->adminOrder()->outbound()->createdAtOrder()
        ->betweenDate($request)->filter($request->except(['start_at','end_at']))->paginateFilter(request('pageSize',10));

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
        return DB::transaction(function() use($data,$order,$request){
            $data = $order->orderStore($data,$order,$request);
 
            $creditAmount = collect($data)->sum('sale_price');
            if($creditAmount > auth('api')->user()->credit_amount){
                throw new CheckException(0,'授信金额不足');
            }

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
                User::where('id',$order->users_id)->increment('credit_amount',$order->sale_price);
                ProductSku::where('id',$order->product_sku_id)->increment('stock',$order->num);
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
                User::where('id',$order->users_id)->increment('credit_amount',$order->sale_price);
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
                User::where('id',$order->users_id)->increment('credit_amount',$order->sale_price);
                ProductSku::where('id',$order->product_sku_id)->increment('stock',$order->num);
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

        $isAgent && $orders = auth('api')->user()->agentOrder()->return()->updatedAtOrder()->filter($request->all())->paginateFilter(request('pageSize',10));
        $isAgent && $category = 1;

        !$isAgent && $orders = auth('api')->user()->adminOrder()->return()->updatedAtOrder()->filter($request->all())->paginateFilter(request('pageSize',10));
        !$isAgent && $category = 2;
     
        return response()->json(['code'=>1,'msg'=>'成功','data'=>$orders,'category'=>$category]);
    }

   /**
    * 提交订单退货申请
    *
    * @param Order $order
    * @return void
    */
    public function apply(Order $order)
    {
        $order->update(['status'=>4]);

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
            User::where('id',$order->users_id)->increment('credit_amount',$order->sale_price);
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

        $isAgent && $orders = auth('api')->user()->agentOrder()->confirm()->createdAtOrder()->filter($request->all())->get()->toArray();
        $isAgent && $cellData =$order->orderAgentExport($orders,1);

        !$isAgent && ($request->type != 2) && $orders = auth('api')->user()->adminOrder()->confirm()->createdAtOrder()->filter($request->all())->get()->toArray();
        !$isAgent && ($request->type != 2) && $cellData = $order->orderAdminExport($orders);

        if(isset($cellData)) return $order->export('出库列表',$cellData);

        $data = $request->all();
        (!$request->start_at && !$request->end_at) && $data = todayDate($data);

        $user = User::find($request->user_id);
        $orders = Order::with('product','code','color')->where('users_id',$request['user_id'])->betweenDate($data)->confirm()->get()->toArray();
        $sorted = collect($orders)->sortBy('code.name');
        $orders = $sorted->values()->all();

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
        $data = $request->all();
        (!$request->start_at && !$request->end_at) && $data = todayDate($data);

        $user = User::find($request['user_id']);
        Order::where('users_id',$request['user_id'])->betweenDate($data)->confirm()->update(['is_print'=>1]);

        $orders = auth('api')->user()->adminOrder()->with('product','code','color')->where('users_id',$request['user_id'])->confirm()->betweenDate($data)
        ->filter($request->except(['start_at','end_at']))->get()->toArray();

        $sorted = collect($orders)->sortBy('code.name');
        $orders = $sorted->values()->all();

        $orders = $order->orderManagePrint($orders,$user);

        return respond(1,'成功',$orders);
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

        $isAgent && $orders = auth('api')->user()->agentOrder()->confirmReturn()->updatedAtOrder()->filter($request->all())->get()->toArray();
        $isAgent && $cellData = $order->orderAgentExport($orders,2);

        !$isAgent && $orders = auth('api')->user()->adminOrder()->confirmReturn()->updatedAtOrder()->filter($request->all())->get()->toArray();
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

    /**
     * 获取订单统计
     *
     * @param OrderRequest $request
     * @return void
     */
    public function statistics(OrderRequest $request)
    {
        $data = todayDate($request->all());

        $orders = Order::where('created_at','>',$data['start_at'])->where('created_at','<',$data['end_at']);

        $statistics = [
            'totalValue' => $orders->sum('sale_price'),
            'totalNum' => $orders->count(),
        ];

        return respond(1,'成功',$statistics);
    }

    /**
     * 获取用户订单统计
     *
     * @param OrderRequest $request
     * @return void
     */
    public function userStatistics(OrderRequest $request)
    {
        $data = todayDate($request->all());

        $orders = Order::where('created_at','>',$data['start_at'])->where('created_at','<',$data['end_at'])->where(['users_id'=>auth('api')->user()->id,'status'=>'3']);

        $statistics = [
            'totalValue' => $orders->sum('sale_price'),
            'totalNum' => $orders->count(),
        ];

        return respond(1,'成功',$statistics);
    }


}
