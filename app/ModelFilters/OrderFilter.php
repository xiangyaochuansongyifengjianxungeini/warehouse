<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;
use Carbon\Carbon;

class OrderFilter extends ModelFilter
{
    public function productName($product_name)
    {
        return $this->where('product_name','like','%'.$product_name.'%');
    }

    public function category($category)
    {
        return $this->where('category',$category);
    }

    public function startAt($start_at)
    {
        return $this->where('created_at','>',$start_at);
    }

    public function endAt($end_at)
    {
        return $this->where('created_at','<',Carbon::parse($end_at)->addDay(1));
    }
}