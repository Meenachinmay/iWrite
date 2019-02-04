<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user()
    {
        // This model belongs to Users table
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        // This model belongs to Users table
        return $this->hasMany('App\Comment');
    }

}
