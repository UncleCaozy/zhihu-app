<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/7
 * Time: 13:11
 */

namespace App\Repositories;
use App\Question;
use App\Topic;

class QuestionRepository
{
    public function byIdWithTopicsAndAnswers($id)
    {
        return Question::where('id',$id)->with('topics','answers')->first();
    }

    public function create(array $attributes)
    {
       return  Question::create($attributes);
    }

    public function normalizeTopic(array $topics)
    {
        return collect($topics)->map(function ($topic){
            if(is_numeric($topic)){
                Topic::find($topic)->increment('questions_count');
                return (int)$topic;
            }
            $newTopic = Topic::create(['name'=>$topic,'questions_count'=>1]);
            return $newTopic->id;
        })->toArray();
    }
    public function byId($id)
    {
        return Question::find($id);
    }
    public function getQuestionsFeed()
    {
        return Question::published()->latest('updated_at')->with('user')->paginate(3);
    }

    public function GetQuestionCommnetById($id)
    {
        return Question::with('comments','comments.user')->where('id',$id)->first();
    }
}