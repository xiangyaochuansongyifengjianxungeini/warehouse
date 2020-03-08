<?php

namespace App\Http\Controllers;

use App\Models\ActionLog;
use App\Http\Requests\SystemRequest;
use App\Models\System;

class SystemsController extends Controller
{

    /**
     * 系统配置
     */
    public function index()
    {
        $system = System::first();
        return response()->json(['code'=>1,'msg'=>'成功','data'=>$system]);
    }
    
    /**
     * 系统配置修改
     */
    public function update(SystemRequest $request,System $system)
    {
        $data = $request->all();
        $system = $system->update($data);
        if($system){
            return response()->json(['code'=>1,'msg'=>'成功','data'=>$system]);
        }
        return response()->json(['code'=>0,'msg'=>'失败','data'=>$system]);
    }

    /**
     * 操作日志
     */
    public function log()
    {
        $logs = ActionLog::with(['user'=>function($query){
            $query->select('id','name');
        }])->take('id')->orderBy('id','DESC')->paginate(request('pageSize',10));

        return response()->json(['code'=>1,'msg'=>'成功','data'=>$logs]);
    }

}
