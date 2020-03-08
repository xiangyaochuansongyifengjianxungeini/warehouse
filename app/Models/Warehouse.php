<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{

    public $comment = '仓库';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','status'];

    protected $hidden = ['pivot','status','updated_at'];

    /**
     * 获取用户
     *
     * @return void
     */
    public function users()

    {
        return $this->belongsToMany(User::class,'warehouse_user','warehouse_id','user_id');
    }

    /**
     * 获取产品sku
     *
     * @return void
     */
    public function productSku()
    {
        return $this->hasManyThrough(ProductSku::class,Product::class);
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

}
