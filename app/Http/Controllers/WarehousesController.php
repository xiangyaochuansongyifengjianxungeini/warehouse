<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\WarehouseRequest;

class WarehousesController extends Controller
{
    /**
     * 获取仓库列表
     *
     * @return void
     */
    public function index()
    {
        $warehouses = Warehouse::where('status',1)->with(['users:users.id,users.name,users.tel','productSku'=>function($query){
            $query->where('product_skus.status',1);
            $query->where('products.status',1);
        }])->paginate(request('pageSize',10));

        $warehouses->map(function ($warehouse){
            // $warehouse->value = sprintf('%.2f',collect($warehouse->productSku)->sum('cost_price'));
            collect($warehouse->productSku)->map(function($sku)use($warehouse){
                $warehouse->value += $sku->cost_price*$sku->stock;
                $warehouse->saleValue += $sku->sale_price*$sku->stock;

            });
            $warehouse->value = sprintf('%.2f',$warehouse->value);
            $warehouse->saleValue = sprintf('%.2f',$warehouse->saleValue);
            unset($warehouse->productSku);
        });

        return response()->json(['code'=>1,'msg'=>'成功','data'=>$warehouses]);
    }


    /**
     * 添加仓库
     *
     * @param WarehouseRequest $request
     * @return void
     */
    public function store(WarehouseRequest $request)
    {
        return DB::transaction(function() use($request){

            $warehouse = Warehouse::create($request->all());
            $warehouse->users()->attach(explode(',',request('user_id')));
        
            return $warehouse?respond(1,'成功',$warehouse):respond(0,'失败',$warehouse);

        });
        
    }

    /**
     * 修改仓库
     *
     * @param WarehouseRequest $request
     * @param Warehouse $warehouse
     * @return void
     */
    public function update(WarehouseRequest $request,Warehouse $warehouse)
    {
        return DB::transaction(function() use ($request,$warehouse){

            $warehouse->users()->sync(explode(',',request('user_id')));
            $warehouse = $warehouse->update($request->all());

            return $warehouse?respond(1,'成功',$warehouse):respond(0,'失败',$warehouse);

        });
        
    }

    /**
     * 删除仓库
     *
     * @param WarehouseRequest $request
     * @param Warehouse $warehouse
     * @return void
     */
    public function destroy(WarehouseRequest $request,Warehouse $warehouse)
    {
        $warehouse->product()->update(['status'=>0]);
        $result = $warehouse->update(['status'=>0]);

        return $result?respond(1,'成功'):respond(0,'失败');
        
    }
}
