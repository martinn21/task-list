<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserGroups extends Model
{
    public $timestamps = false;
    
    public function users()
    {
        $this->belongsToMany('users');
    }

    public function groups()
    {
        $this->belongsTo('groups');
    }
}
