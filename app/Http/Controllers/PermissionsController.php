<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    /**
     * 权限列表
     */
    public function index()
    {
        $permissions = Permission::get();

        return response()->json(['code'=>1,'msg'=>'成功','data'=>$permissions]);
    }

    /**
     * 权限修改
     */
    public function update(PermissionRequest $request,Permission $permission)
    {
        $data = $request->all();
        $permission = $permission->update($data);

        if($permission){
            return response()->json(['code'=>1,'msg'=>'成功','data'=>$permission]);
        }
        return response()->json(['code'=>0,'msg'=>'失败','data'=>$permission]);
    }

    /**
     * 权限冻结
     */
    public function freeze(Permission $permission)
    {
        $data['status'] = 2;
        $permission = $permission->update($data);

        if($permission){
            return response()->json(['code'=>1,'msg'=>'成功','data'=>$permission]);
        }
        return response()->json(['code'=>0,'msg'=>'失败','data'=>$permission]);
    }

     /**
     * 权限解冻
     */
    public function unfreeze(Permission $permission)
    {
        $data['status'] = 1;
        $permission = $permission->update($data);

        if($permission){
            return response()->json(['code'=>1,'msg'=>'成功','data'=>$permission]);
        }
        return response()->json(['code'=>0,'msg'=>'失败','data'=>$permission]);
    }
}
