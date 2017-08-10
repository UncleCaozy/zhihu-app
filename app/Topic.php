<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
        'name', 'questions_count','bio',
    ];



    /**一个话题可以有多个问题*/
    public function questions()
    {
        return $this->belongsToMany(Question::class)->withTimestamps();
    }
}
