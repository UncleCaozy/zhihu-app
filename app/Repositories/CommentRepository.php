<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/15
 * Time: 10:09
 */

namespace App\Repositories;


use App\Comment;

class CommentRepository
{
    public function create(array $attributes)
    {
        return  Comment::create($attributes);
    }
}