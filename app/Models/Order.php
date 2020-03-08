<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;
use App\ModelFilters\OrderFilter;
use App\Models\Traits\ExcelHelper;
use App\Models\Traits\OrderHelper;

class Order extends Model
{

    use Filterable;
    use ExcelHelper;
    use OrderHelper;

    public $comment = '订单';

    protected $fillable = ['product_id','product_name','category','address','num','cost_price','sale_price','status','remark','user_id','return_reason','warehouse_id',
        'code','color','sno','product_sku_id','freight','track_number'];

    protected $hidden = ['cost_price','updated_at','product_sku_id','warehouse_id','product_id'];

   /**
    * 获取用户
    *
    * @return void
    */
    public function user()
    {
        $data = request();
     
        return $this->belongsTo(User::class,'users_id')->where(function($query) use($data){
            isset($data['user_name']) && $query->where('name','like','%'.$data['user_name'].'%');
        });
    }

    
    /**
     * 获取仓库
     *
     * @return void
     */
    public function warehouse()
    {
        return $this->belongsTo('App\Models\Warehouse');
    }

    /**
     * 获取产品
     *
     * @return void
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    /**
     * 订单筛选
     *
     * @return void
     */
    public function modelFilter()
    {
        return $this->provideFilter(OrderFilter::class);
    }


    /**
     * 生成一个新的订单号
     * 时间日期 + 3随机数 + 当前订单主键最大值（由于订单编号中有总订单的个数，所以一般不会有重复的）
     * @return [type] [description]
     */
    public function build_order_sn(){
        $maxId = $this->max('id');
        return date('Ymd') . str_pad(mt_rand(1,9999),3, '0', STR_PAD_LEFT) . intval($maxId);
    }


    /**
     * 获取订单号
     *
     * @return void
     */
    public function orderSno()
    {
        return $this->hasMany(Order::class,'sno','sno');
    }

    /**
     * 获取订单产品颜色
     *
     * @return void
     */
    public function color()
    {
        return $this->hasOne(ItemValue::class,'id','color');
    }

    /**
     * 获取订单产品码数
     *
     * @return void
     */
    public function code()
    {
        return $this->hasOne(ItemValue::class,'id','code');
    }


    /**
     * 获取出库状态订单
     *
     * @param [type] $query
     * @return void
     */
    public function scopeOutbound($query)
    {
        $query->wherein('status',[1,2,3,6]);
    }

    /**
     * 获取退货状态订单
     *
     * @param [type] $query
     * @return void
     */
    public function scopeReturn($query)
    {
        $query->wherein('status',[4,5]);
    }


}
