<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //

    public function users()
    {
        $this->belongsTo('users');
    }

    public function getUsers()
    {
        $sql = 'Select * from user';
    }
}
