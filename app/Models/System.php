<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{

    public $comment = '系统';

    protected $fillable = [
        'stock_warning', 
    ];
}
