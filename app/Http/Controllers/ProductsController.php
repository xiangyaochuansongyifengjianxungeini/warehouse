<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductRequest;
use App\Models\ItemValue;
use App\Models\ProductSku;
use App\Models\System;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use php_user_filter;


class ProductsController extends php_user_filter
{
    /**
     * 获取产品列表
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $products = auth('api')->user()->storeProducts()->with('warehouse:id,name')->filter($request->all())->paginateFilter(request('pageSize',10));

        return respond(1,'成功',$products);
    }


    /**
     * 库存警示
     *
     * @return void
     */
    public function stockWarning()
    {
        $system = System::first();
        $products = auth('api')->user()->sku()->aviable()->with('productSku.itemValue')->wherehas('productSku',function($query)use($system){
            $query->where('stock','<',$system->stock_warning);
        })->get()->makeHidden(['status']);

        return respond(1,'成功',$products);
    }


    /**
     * 获取产品详情
     *
     * @param Product $product
     * @return void
     */
    public function show(Product $product)
    {
        $product = $product->with(['productSku.itemValue'])->where('id',$product->id)->first();  

        return respond(1,'成功',$product);
    }


    /**
     * 录入产品
     *
     * @param ProductRequest $request
     * @param Product $product
     * @return void
     */
    public function store(ProductRequest $request,Product $product)
    {
        return DB::transaction(function() use($request,$product){
            $product = auth('api')->user()->product()->create($request->all());

            collect($request->sku)->map(function($sku) use($product){
                $productSku = $product->productSku()->create($sku);
                $productSku->itemValue()->attach(explode(',',$sku['item_value']));
            });

            return $product?respond(1,'成功',$product):respond(0,'失败',$product);
        });

    }

    /**
     * 上架/下架/删除产品
     *
     * @param ProductRequest $request
     * @param Product $product
     * @return void
     */
    public function statusUpdate(ProductRequest $request,Product $product)
    {
        $product = $product->update(['status'=>$request->status]);

        return $product?respond(1,'成功',$product):respond(0,'失败',$product);
    }

    /**
     * 代理产品出库
     */
    public function output(Request $request)
    {
        $products = Product::aviable()->with(['warehouse:id,name'])->whereHas('warehouse')->filter($request->all())->paginateFilter(request('pageSize',10));   
        
        return response()->json(['code'=>1,'msg'=>'成功','data'=>$products]);
    }

    /**
     * 入库导出
     */
    public function inputExport(Request $request,Product $product)
    {
        $products = auth('api')->user()->storeProducts()->filter($request->all())->get();
        $cellData = $product->inputExport($products);

        $product->export('入库列表',$cellData);
    }


    /**
     * 添加产品sku
     *
     * @param ProductRequest $request
     * @return void
     */
    public function skuStore(ProductRequest $request)
    {
        return DB::transaction(function() use($request){

            $product = Product::find($request->product_id);

            collect($request->sku)->map(function($sku) use($product){
                $productSku = $product->productSku()->create($sku);
                $productSku->itemValue()->attach(explode(',',$sku['item_value']));
            });
            $result = $product->update($request->only('name','model','warehouse_id'));

            return $result?respond(1,'成功',$result):respond(0,'失败',$result);
        });
    }

      /**
     * 产品sku修改
     */
    public function skuUpdate(ProductRequest $request,ProductSku $productSku)
    {
        return DB::transaction(function() use($request,$productSku){
            $productSku->update($request->only('cost_price','sale_price','stock','item_value','warehouse_id'));
            $productSku->itemValue()->sync(explode(',',$request->item_value));

             $result = $productSku->product->update($request->only('name','model','warehouse_id'));

             return $result?respond(1,'成功',$result):respond(0,'失败',$result);
        });
    
    }

    /**
     * 删除产品sku
     *
     * @param ProductSku $productSku
     * @return void
     */
    public function skuDelete(ProductSku $productSku)
    {
        $productSku->itemValue()->detach();
        $result = $productSku->delete();

        return $result?respond(1,'成功',$result):respond(0,'失败',$result);
    }

    /**
     * 增加产品sku库存
     *
     * @param ProductRequest $request
     * @param [type] $productSkuId
     * @return void
     */
    public function skuStockUpdate(ProductRequest $request,$productSkuId)
    {
        $result = ProductSku::where('id',$productSkuId)->increment('stock',$request->incrStock);

        return $result?respond(1,'成功',$result):respond(0,'失败',$result);
    }
}
