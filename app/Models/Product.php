<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;
use App\ModelFilters\ProductFilter;

class Product extends Model
{
    use Traits\ProductHelper;
    use Traits\ExcelHelper;
    use Filterable;

    public $comment = '产品';

    protected $fillable = ['name','model','status','warehouse_id','user_id'];

    protected $hidden = ['updated_at','user_id','warehouse_id'];
    /**
     * 产品sku
     */
    public function productSku()
    {
        return $this->hasMany('App\Models\ProductSku');
    }

    /**
     * 可以显示的产品
     */
    public function scopeAviable($query)
    {
        return $query->where('status',1);
    }

    /**
     * 产品仓库
     */
    public function warehouse()
    {
        $warehouseName = request('warehouseName');
        return $this->belongsTo('App\Models\Warehouse')->where('name','LIKE',"%$warehouseName%");
    }

    /**
     * 产品图片
     */
    public function images()
    {
        return $this->hasMany('App\Models\ProductImage');
    }

    /**
     * 库存预警sku
     */
    public function warningSku()
    {
        $system = System::first();
        return $this->hasMany('App\Models\ProductSku')->where('stock','<',$system->stock_warning);
    }

    public function modelFilter()
    {
        return $this->provideFilter(ProductFilter::class);
    }

    
}
