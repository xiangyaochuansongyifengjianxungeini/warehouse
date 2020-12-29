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
      * 获取入库产品列表
      *
      * @return void
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
        return $this->hasMany(Order::class,'users_id')->with(['warehouse:id,name','product:id,model','code','color'])->has('code')->has('color');
    }


    /**
     * 获取管理员订单
     *
     * @return void
     */
    public function adminOrder()
    {
        return $this->hasManyThrough(Order::class, WarehouseUser::class,'user_id','warehouse_id','id','warehouse_id')
        ->with(['user:id,name','product:id,model','code','color'])->wherehas('user',function($query){
            $query->where('name','like','%'.request('user_name').'%');
        })->has('code')->has('color');
    }

    /**
     * 获取代理等级
     *
     * @return void
     */
    public function agentRank()
    {
        return $this->belongsTo(AgentRank::class);
    }

   /**
    * 获取用户订单列表
    *
    * @return void
    */
    public function orders()
    {  
        return $this->hasMany(Order::class,'users_id');
    }

    /**
     * 获取可以显示的用户
     *
     * @param [type] $query
     * @return void
     */
    public function scopeAviable($query)
    {
        return $query->wherein('status',['1,2']);
    }

    /**
     * 获取仓库
     *
     * @return void
     */
    public function warehouse()
    {
        return $this->belongsToMany(Warehouse::class,'warehouse_user','user_id','warehouse_id');
    }

    /**
     * 获取产品
     *
     * @return void
     */
    public function product()
    {
        return $this->hasMany(Product::class);
    }

   /**
    * 获取属性值
    *
    * @return void
    */
    public function itemValue()
    {
        return $this->hasMany(ItemValue::class);
    }

    /**
     * 获取产品sku
     *
     * @return void
     */
    public function sku()
    {
        return $this->hasManyThrough(Product::class, WarehouseUser::class,'user_id','warehouse_id','id','warehouse_id');
    }

    /**
     * 模糊查询
     *
     * @return void
     */
    public function modelFilter()
    {
        return $this->provideFilter(userFilter::class);
    }

    /**
     * 获取下单库
     *
     * @return void
     */
    public function placingLibrary()
    {
        return $this->hasMany(PlacingLibrary::class);
    }

}
