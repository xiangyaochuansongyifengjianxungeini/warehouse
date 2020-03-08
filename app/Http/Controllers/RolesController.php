<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RoleRequest;

class RolesController extends Controller
{
    /**
     * 角色列表
     */
    public function index()
    {
        $roles = Role::with(['permissions'])->get();

        return response()->json(['code'=>1,'msg'=>'成功','data'=>$roles]);
    }

    /**
     * 角色添加
     */
    public function store(RoleRequest $request)
    {
        return DB::transaction(function(){
            $roleData['name'] = request('name');
            $role = Role::create($roleData);
    
            $permissions = explode(',',request('permissions'));
            $role->givePermissionTo($permissions);
            if($role){
                return response()->json(['code'=>1,'msg'=>'成功','data'=>$role]);
            }
            return response()->json(['code'=>0,'msg'=>'失败','data'=>$role]);
        });
    }

    /**
     * 角色删除
     */
    public function destroy(RoleRequest $request,Role $role)
    {
        return DB::transaction(function() use ($role){
            $role->permissions()->detach();
            $role = $role->delete();
            if($role){
                return response()->json(['code'=>1,'msg'=>'成功','data'=>$role]);
            }
            return response()->json(['code'=>0,'msg'=>'失败','data'=>$role]);
        });
       
    }

    /**
     * 角色权限分配
     */
    public function givePermission(Role $role)
    {
        return DB::transaction(function() use($role){
            $roleData['name'] = request('name');
            $roleData['name'] && $role->update($roleData);

            $permissions = explode(',',request('permissions'));
            $role = $role->syncPermissions($permissions);

            if($role){
                return response()->json(['code'=>1,'msg'=>'成功','data'=>$role]);
            }
            return response()->json(['code'=>0,'msg'=>'失败','data'=>$role]);
        });
        
    }

    /**
     * 角色冻结
     */
    public function freeze(Role $role)
    {
        return DB::transaction(function() use($role){
            $data['status'] = 2;
            $role->users()->update($data);
            $result = $role->update($data);

            if($result){
                return response()->json(['code'=>1,'msg'=>'成功','data'=>$role]);
            }
            return response()->json(['code'=>0,'msg'=>'失败','data'=>$role]);
        });
        
    }

    /**
     * 角色解冻
     */
    public function unfreeze(Role $role)
    {
        return DB::transaction(function() use($role){
            $data['status'] = 1;
            $role->users()->update($data);
            $role = $role->update($data);

            if($role){
                return response()->json(['code'=>1,'msg'=>'成功','data'=>$role]);
            }
            return response()->json(['code'=>0,'msg'=>'失败','data'=>$role]);
        });
    }
}
