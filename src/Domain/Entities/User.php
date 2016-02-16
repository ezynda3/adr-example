<?php

namespace Stark\Domain\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent
{
    public function shifts()
    {
        return $this->hasMany(Shift::class, 'employee_id');
    }
}