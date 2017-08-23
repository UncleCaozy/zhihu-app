<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/21
 * Time: 16:02
 */

namespace App\Repositories;


use App\Topic;

class TopicsRepository
{
    public function GetTopics()
    {
        return Topic::all();
    }
}