<?php

namespace Stark\Domain\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Shift extends Eloquent
{
    protected $dates = ['start_time', 'end_time'];

    public function manager()
    {
        return $this->hasOne(User::class, null, 'manager_id');
    }

    public function employee()
    {
        return $this->hasOne(User::class, null, 'employee_id');
    }
}