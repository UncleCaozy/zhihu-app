<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'title', 'body','user_id',
    ];


    /**是否关闭问题*/
    public function isHidden()
    {
        return $this->is_hidden == 'T';//$question->is_hidden();
    }

    /**一个问题可以有多个话题*/
    public function topics()
    {
        return $this->belongsToMany(Topic::class)->withTimestamps();
    }

    /**一个问题处于一个用户*/
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**关闭评论*/
    public function scopePublished($query)
    {
        return $query->where('is_hidden','F');
    }

    /**申明一个用户可以有多个回答*/
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }


    /**申明一个用户可以有多个粉丝*/
    public function followers()
    {
        return $this->belongsToMany(User::class,'user_question')->withTimestamps();
    }

    public function comments()
    {
        return $this->morphMany('App\Comment','commentable');
    }
}
