<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSku extends Model
{
    public $comment = '产品';

    protected $fillable = ['product_id','cost_price','sale_price','item_value','stock','image'];

    protected $hidden = ['status','updated_at','created_at'];

    /**
     * 获取产品
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * 获取属性
     */
    public function itemValue()
    {
        return $this->belongsToMany(ItemValue::class,'product_sku_items');
    }

}

