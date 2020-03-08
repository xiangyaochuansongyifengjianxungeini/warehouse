<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierRequest;
use App\Models\Supplier;

class SuppliersController extends Controller
{
    /**
     * 供应商列表
     */
    public function index()
    {
        $supplier = Supplier::paginate(request('pageSize',10));

        return response()->json(['code'=>1,'msg'=>'成功','data'=>$supplier]);
    }


    /**
     * 添加供应商
     */
    public function store(SupplierRequest $request)
    {
        $data = $request->all();
        $supplier = Supplier::create($data);
        if($supplier){
            return response()->json(['code'=>1,'msg'=>'成功','data'=>$supplier]);
        }
        return response()->json(['code'=>0,'msg'=>'失败','data'=>$supplier]);
    }


    /**
     * 修改供应商
     */
    public function update(SupplierRequest $request,Supplier $supplier)
    {
        $data = $request->all();
        $supplier = $supplier->update($data);
        if($supplier){
            return response()->json(['code'=>1,'msg'=>'成功','data'=>$supplier]);
        }
        return response()->json(['code'=>0,'msg'=>'失败','data'=>$supplier]);
    }

    /**
     * 删除供应商
     */
    public function destroy(Supplier $supplier)
    {
        $supplier = $supplier->delete();
        if($supplier){
            return response()->json(['code'=>1,'msg'=>'成功','data'=>$supplier]);
        }
        return response()->json(['code'=>0,'msg'=>'失败','data'=>$supplier]);
    }
}
