<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLikes extends Model
{
    //
    protected $table = 'user_likes';

    public function videos(){

        return $this->hasMany('App\Models\Videos','id','host_id');
    }

    public function posts(){

        return $this->hasMany('App\Models\Posts','id','host_id');
    }
}
