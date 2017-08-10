<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatar','confirmation_token','settings','api_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**申明一个用户可以有多个回答*/
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }


     public function owns(Model $model)
     {
         return $this->id == $model->user_id;
     }


    /**申明一个用户可以关注多个问题*/
     public function follows()
     {
         return $this->belongsToMany(Question::class,'user_question')->withTimestamps();
     }


    /**一个用户对问题进行toggle（）处理*/
     public function followThis($question)
     {
         return $this->follows()->toggle($question);
     }


    /**通过问题id查询该用户是否关注该问题返回true、false*/
     public function followed($question)
     {
         return !! $this->follows()->where('question_id',$question)->count();
     }


    /**申明一个用户可以有多个粉丝关注*/
    public function followers()
    {
        return $this->belongsToMany(self::class,'followers','follower_id','followed_id')->withTimestamps();
    }

    /**申明一个用户可以关注多个用户*/
    public function followersUser()
    {
        return $this->belongsToMany(self::class,'followers','followed_id','follower_id')->withTimestamps();
    }


    /**用户对用户的关注toggle（）处理*/
    public function followThisUser($user)
    {
        return $this->followers()->toggle($user);
    }
}
