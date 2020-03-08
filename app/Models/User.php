<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use EloquentFilter\Filterable;
use App\ModelFilters\UserFilter;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use HasRoles;
    use Filterable;

    public $comment = '用户';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password','tel','status','credit_amount','agent_rank_id','sex',];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token','pivot','updated_at',];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

     /**
     * 入库-产品列表
     */
    public function storeProducts()
    {
        return $this->hasManyThrough(Product::class, WarehouseUser::class,'user_id','warehouse_id','id','warehouse_id')->where('status','<>',0);
    }


    /**
     * 获取代理订单
     *
     * @return void
     */
    public function agentOrder()
    {
        return $this->hasMany(Order::class,'users_id')->with(['warehouse:id,name','product:id,model','code','color'])->orderBy('id','desc');
    }


    /**
     * 获取管理员订单
     *
     * @return void
     */
    public function adminOrder()
    {
        return $this->hasManyThrough(Order::class, WarehouseUser::class,'user_id','warehouse_id','id','warehouse_id')
        ->with(['user:id,name','product:id,model','code','color'])->orderBy('id','desc');
    }

    /**
     * 代理-代理等级
     */
    public function agentRank()
    {
        return $this->belongsTo('App\Models\AgentRank');
    }

    /**
     * 用户订单列表
     */
    public function orders()
    {  
        return $this->hasMany(Order::class,'users_id');
    }

    /**
     * 可以显示的用户
     */
    public function scopeAviable($query)
    {
        return $query->wherein('status',['1,2']);
    }

    /**
     * 仓库
     */
    public function warehouse()
    {
        return $this->belongsToMany('App\Models\Warehouse','warehouse_user','user_id','warehouse_id');
    }

    /**
     * 产品
     */
    public function product()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * 属性值
     */
    public function itemValue()
    {
        return $this->hasMany('App\Models\ItemValue');
    }

     /**
     * 产品sku
     */
    public function sku()
    {
        return $this->hasManyThrough('App\Models\Product', 'App\Models\WarehouseUser','user_id','warehouse_id','id','warehouse_id')->where('status','<>',0)->has('warningSku');
    }

    
    public function modelFilter()
    {
        return $this->provideFilter(userFilter::class);
    }

}
