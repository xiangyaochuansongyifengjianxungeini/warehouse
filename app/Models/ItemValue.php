<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemValue extends Model
{
    protected $fillable = ['item_id','name','status','user_id'];

    protected $hidden = ['status','created_at','updated_at','user_id','pivot'];


    /**
     * 获取未删除属性值
     *
     * @param [type] $query
     * @return void
     */
    public function scopeAvailable($query)
    {
        return $query->where('status',1);
    }
}
