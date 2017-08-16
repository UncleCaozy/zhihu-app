<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/8
 * Time: 13:59
 */

namespace App\Repositories;


use App\Answer;

class AnswerRepository
{
    public function create(array $attributes)
    {
        return  Answer::create($attributes);
    }

    public function byId($id)
    {
        return Answer::find($id);
    }

    public function GetAnswerCommentById($id)
    {
        return Answer::with('comments','comments.user')->where('id',$id)->first();
    }
}