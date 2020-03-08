<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name'];

    protected $hidden = ['created_at','updated_at','status'];


    /**
     * 获取属性值
     *
     * @return void
     */
    public function value()
    {
        return $this->hasMany(ItemValue::class)->where('user_id',auth('api')->user()->id);
    }
}
