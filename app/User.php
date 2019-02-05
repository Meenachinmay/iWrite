<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // creating relationship between user table and comment table
    public function comments(){
        return $this->hasMany('App\Comment');
    }

    // to return all the post from post table cteated by user
    public function posts(){
        return $this->hasMany('App\Post');
    }

    // to return all the posts from posts table which were created today
    public function postsToday(){

        return $this->hasMany('App\Post')->where('created_at', '>=', Carbon::today());

    }
}
