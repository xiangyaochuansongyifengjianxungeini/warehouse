<?php

namespace App\Http\Controllers;

use App\Exceptions\CheckException;
use App\Http\Requests\PlacingLibraryRequest;
use App\Models\PlacingLibrary;
use App\Models\ProductSku;
use DB;
use Illuminate\Http\Request;

class PlacingLibrariesController extends Controller
{
    /**
     * 获取用户下单库
     *
     * @return void
     */
    public function index()
    {
        $placingLibraries = auth('api')->user()->placingLibrary()->with(['product:id,name,model','productSku'=>function($query){
            $query->select('id','stock','sale_price');
            $query->with('itemValue');
        }])->get();

        $allNum = $placingLibraries->sum('num');
        $allPrice = 0;
        foreach($placingLibraries as $placingLibrary){
            $allPrice += $placingLibrary->num*$placingLibrary->productSku->sale_price;
        }

        $result = [
            'placingLibrary' => $placingLibraries,
            'allNum' => $allNum,
            'allPrice' => sprintf('%.2f',$allPrice),
        ];

        return respond(1,'成功',$result);
    }

    /**
     * 新增下单库订单
     *
     * @param PlacingLibraryRequest $request
     * @return void
     */
    public function store(PlacingLibraryRequest $request)
    {
        return DB::transaction(function()use($request){

            $result = PlacingLibrary::insert($request->placingLibrary);
            foreach($request->placingLibrary as $placingLibrary){
                $productSku = ProductSku::find($placingLibrary['product_sku_id']);
                if($placingLibrary['num']>$productSku->stock){
                    throw new CheckException(0,'库存不足');
                }

                ProductSku::where('id',$placingLibrary['product_sku_id'])->decrement('stock',$placingLibrary['num']);
            }

            return $result?respond(1,'成功',$result):respond(0,'失败',$result);
        });
    }

    /**
     * 修改下单库订单
     *
     * @param PlacingLibraryRequest $request
     * @param PlacingLibrary $placingLibrary
     * @return void
     */
    public function update(PlacingLibraryRequest $request,PlacingLibrary $placingLibrary)
    {
        return DB::transaction(function()use($request,$placingLibrary){

            $changeNum = $placingLibrary->num-$request->num;
            $productSku = ProductSku::find($placingLibrary['product_sku_id']);
                if(-$changeNum>$productSku->stock){
                    throw new CheckException(0,'库存不足');
                }

            ProductSku::where('id',$placingLibrary->product_sku_id)->increment('stock',$changeNum);
            $result = $placingLibrary->update(['num'=>$request->num]);

            return $result?respond(1,'成功',$result):respond(0,'失败',$result);
        });
    }

    /**
     * 删除下单库订单
     *
     * @param PlacingLibrary $placingLibrary
     * @return void
     */
    public function destroy(PlacingLibrary $placingLibrary)
    {
        return DB::transaction(function()use($placingLibrary){

            ProductSku::where('id',$placingLibrary->product_sku_id)->increment('stock',$placingLibrary->num);
            $result = $placingLibrary->delete();

            return $result?respond(1,'成功',$result):respond(0,'失败',$result);
        });
    }
}
