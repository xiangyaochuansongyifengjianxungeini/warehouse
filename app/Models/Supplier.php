<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{

    public $comment = '供应商';

    protected $fillable = [
        'name',
    ];
}
