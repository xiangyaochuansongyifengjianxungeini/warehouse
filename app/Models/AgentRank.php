<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgentRank extends Model
{

    public $comment = '代理等级';

    protected $fillable = [
        'id','name','rate'
    ];
}
