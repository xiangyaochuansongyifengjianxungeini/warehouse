<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActionLog extends Model
{
    //
    protected $fillable = [
        'user_id','title','content','model','model_id','uri','created_ip','created_at','updated_at','comment'
    ];

    /**
     * 用户
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
