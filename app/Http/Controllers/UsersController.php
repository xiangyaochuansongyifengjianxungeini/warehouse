<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
    public $loginAfterSignUp = true;


    /**
     * 用户登录
     *
     * @param UserRequest $request
     * @return void
     */
    public function login(UserRequest $request)
    {
        $credentials = request(['tel', 'password']);

        if (! $token = auth('api')->attempt($credentials)) {
            return respond('0','认证失败');
        }

        return $this->respondWithToken($token);
    }

   /**
    * 获取用户数据
    */
    public function me()
    {   
        auth('api')->user()->getAllPermissions();
        auth('api')->user()->agentRank;

        return respond(1,'成功',auth('api')->user());
    }


    /**
     * 用户退出
     */
    public function logout()
    {
        auth('api')->logout();

        return response()->json(['code'=>1,'msg' => '成功']);
    }

    /**
     * 刷新token
     */
    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    
    /**
     * 返回token
     *
     * @param [type] $token
     * @return void
     */
    protected function respondWithToken($token)
    {
        return respond(1,'成功',[
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }


    /**
     * 用户列表
     */
    public function index(Request $request)
    {
        $data = $request->all();

        $users = User::where('status','<>',0)->with(['roles'])->where(function($query) use ($data){
            isset($data['role']) && $query->role($data['role']);
        })->paginate(request('pageSize',10));

        return response()->json(['code'=>1,'msg'=>'成功','data'=>$users]);
    }


    /**
     * 用户添加
     */
    public function store(UserRequest $request)
    {
        return DB::transaction(function() use ($request){
            $credentials = $request->all();
            $credentials['password'] = bcrypt('123456');
            $user = User::create($credentials);

            $roles = json_decode(request('roles'),true);
            $user = $user->syncRoles($roles);
            if($user){
                return response()->json(['code'=>1,'msg'=>'成功','data'=>$user]);
            }
            return response()->json(['code'=>2001,'msg'=>'失败','data'=>$user]);
        });
    }

    /**
     * 用户修改
     */
    public function update(UserRequest $request,User $user)
    {
        return DB::transaction(function() use ($request,$user){
            $data = $request->all();
            $user->update($data);

            $roles = json_decode(request('roles'),true);
            isset($data['roles']) && $user->syncRoles($roles);
            if($user){
                return response()->json(['code'=>1,'msg'=>'成功','data'=>$user]);
            }
            return response()->json(['code'=>2001,'msg'=>'失败','data'=>$user]);    

            
        });
    }

    /**
     * 用户修改状态
     * status 0删除 1正常 2冻结
     */
    public function updateStatus(UserRequest $request,User $user)
    {
        $data = $request->all();
        $user = $user->update($data);

        if($user){
            return response()->json(['code'=>1,'msg'=>'成功','data'=>[]]);
        }
        return response()->json(['code'=>0,'msg'=>'失败','data'=>[]]);
    }

    /**
     * 用户权限
     */
    public function permission(User $user)
    {
        $permissions = $user->getAllPermissions();

        return response()->json(['code'=>1,'msg'=>'成功','data'=>$permissions]);
    }

    /**
     * 用户仓库
     */
    public function warehouse()
    {
        $warehouses = auth('api')->user()->warehouse;

        return response()->json(['code'=>1,'msg'=>'成功','data'=>$warehouses]);
    }

    
    /**
     * 代理列表
     */
    public function agent(Request $request)
    {
        $agents = User::role('6')->wherein('status',[1,2])->with('agentRank:id,name,rate')->filter($request->all())->paginateFilter(request('pageSize',10));

        return response()->json(['code'=>1,'msg'=>'成功','data'=>$agents]);
    }

    /**
     * 获取代理分析
     *
     * @param Request $request
     * @return void
     */
    public function agentAnalysis(Request $request)
    {
        $data = todayDate($request->all());

        $request->type != 1 && $agents = User::role('6')->Aviable()->select('id','name','credit_amount','agent_rank_id')->with(['agentRank:id,name,rate','orders'=>function($query) use($data){
            $query->where('created_at','>',$data['start_at'])->where('created_at','<',$data['end_at'])->wherein('status',[3,5]);
        }])->paginate(request('pageSize',10));

        $request->type == 1 && $request->type != 1 && $agents = User::role('6')->Aviable()->select('id','name','credit_amount','agent_rank_id')->with(['agentRank:id,name,rate','orders'=>function($query) use($data){
            $query->where('created_at','>',$data['start_at'])->where('created_at','<',$data['end_at'])->wherein('status',[3,5]);
        }])->get();

        $agents->map(function($agent){
            $orders = collect($agent->orders)->groupBy('status');

            $agent->placeCount = isset($orders[3])?collect($orders[3])->sum('num'):0;
            $agent->placePrice = sprintf('%.2f',isset($orders[3])?collect($orders[3])->sum('sale_price'):0);  

            $agent->returnCount = isset($orders[5])?collect($orders[5])->sum('num'):0;
            $agent->returnPrice = sprintf('%.2f',isset($orders[5])?collect($orders[5])->sum('sale_price'):0);   

            $agent->percentage = sprintf('%.2f',$agent->placePrice*$agent->agentRank->rate);
            unset($agent->orders);
        });

        $agents->sortByDesc('percentage');

        return response()->json(['code'=>1,'msg'=>'成功','data'=>$agents]);
    }

    /**
     * 修改账号
     */
    public function resetPassword(UserRequest $request)
    {
        $data['password'] = bcrypt(request('new_password'));
        $user = auth('api')->user()->update($data);

        if($user){
            return response()->json(['code'=>1,'msg'=>'成功','data'=>$user]);
        }
        return response()->json(['code'=>1,'msg'=>'失败','data'=>$user]);
    }

    /**
     * 重置密码
     */
    public function recoverPassword(User $user)
    {
        $data['password'] = bcrypt('123456');
        $result = $user->update($data);

        if($result){
            return response()->json(['code'=>1,'msg'=>'成功','data'=>$user]);
        }
        return response()->json(['code'=>1,'msg'=>'失败','data'=>$user]);
    }


    

}
