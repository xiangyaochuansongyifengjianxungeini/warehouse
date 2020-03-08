<?php namespace App\ModelFilters;

use EloquentFilter\ModelFilter;
use Carbon\Carbon;

class ProductFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function name($name)
    {
        return $this->where('name','LIKE',"%$name%");
    }


    public function startAt($start_at)
    {
        return $this->where('created_at','>',$start_at);
    }

    public function endAt($end_at)
    {
        return $this->where('created_at','<',Carbon::parse($end_at)->addDays(1));
    }


    public function status($status)
    {
        return $this->where('status',$status);
    }

    public function nameModel($nameModel)
    {
        return $this->where('name','LIKE',"%$nameModel%")->orwhere('model','LIKE',"%$nameModel%");
    }
}
