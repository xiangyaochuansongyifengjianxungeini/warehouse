<?php
namespace App\ModelFilters;

use EloquentFilter\ModelFilter;
use Carbon\Carbon;

class UserFilter extends ModelFilter
{

    public function agentRank($agent_rank_id)
    {
        return $this->where('agent_rank_id',$agent_rank_id);
    }

    public function name($name)
    {
        return $this->where('name','like','%'.$name.'%');
    }

    public function startAt($start_at)
    {
        return $this->where('created_at','>',$start_at);
    }

    public function endAt($end_at)
    {
        return $this->where('created_at','<',Carbon::parse($end_at)->addDays(1));
    }
}