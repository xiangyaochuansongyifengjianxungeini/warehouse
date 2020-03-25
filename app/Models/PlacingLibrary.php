<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlacingLibrary extends Model
{
    protected $fillable = ['user_id','product_id','product_sku_id','num'];

    protected $hidden = ['product_id','product_sku_id','user_id'];

    public $timestamps = false;

    /**
     * 获取产品
     *
     * @return void
     */
    public function product()
    {
        return $this->hasOne(Product::class,'id','product_id');
    }

    /**
     * 获取产品sku
     *
     * @return void
     */
    public function productSku()
    {
        return $this->hasOne(ProductSku::class,'id','product_sku_id');
    }

}
