<?php

namespace App\Http\Controllers;

use App\Models\AgentRank;
use App\Http\Requests\AgentRankRequest;

class AgentRanksController extends Controller
{
    /**
     * 代理等级列表
     */
    public function index()
    {
        $agentRank = AgentRank::all();

        return response()->json(['code'=>1,'msg'=>'成功','data'=>$agentRank]);
    }


    /**
     * 代理等级添加
    */
    public function store(AgentRankRequest $request)
    {
        $data = $request->all();
        $agentRank = AgentRank::create($data);

        if($agentRank){
            return response()->json(['code'=>1,'msg'=>'成功','data'=>$agentRank]);
        }
        return response()->json(['code'=>0,'msg'=>'失败','data'=>$agentRank]);
    }

    /**
     * 代理等级修改
     */
    public function update(AgentRankRequest $request,AgentRank $agentRank)
    {
        $data = $request->all();
        $agentRank = $agentRank->update($data);

        if($agentRank){
            return response()->json(['code'=>1,'msg'=>'成功','data'=>$agentRank]);
        }
        return response()->json(['code'=>0,'msg'=>'失败','data'=>$agentRank]);
    }

    /**
    * 代理等级删除
    */
    public function destroy(AgentRankRequest $request,AgentRank $agentRank)
    {
        $agentRank = $agentRank->delete();

        if($agentRank){
            return response()->json(['code'=>1,'msg'=>'成功','data'=>$agentRank]);
        }
        return response()->json(['code'=>0,'msg'=>'失败','data'=>$agentRank]);
    }

}
