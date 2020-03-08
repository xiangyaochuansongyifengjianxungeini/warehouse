<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WarehouseUser extends Model
{
    protected $table = 'warehouse_user';


    protected $hidden = ['pivot',];

    protected $fillable = ['warehouse_id','user_id'];
}
