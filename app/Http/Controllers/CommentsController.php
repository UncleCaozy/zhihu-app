<?php

namespace App\Http\Controllers;

use App\Repositories\AnswerRepository;
use App\Repositories\QuestionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\CommentRepository;

class CommentsController extends Controller
{

    protected $answer;
    protected $question;
    protected $comment;

    public function __construct(AnswerRepository $answer,QuestionRepository $question,CommentRepository $comment)
    {
        $this->answer = $answer;
        $this->question = $question;
        $this->comment = $comment;
    }

    public function answer($id)
    {
        $answer = $this->answer->GetAnswerCommentById($id);
        return $answer->comments;
    }

    public function question($id)
    {
        $question = $this->question->GetQuestionCommnetById($id);
        return $question->comments;
    }

    public function store()
    {
        $model = $this->getModelNameFromType(request('type'));

        $comment = $this->comment->create([
           'commentable_id'=>request('model'),
           'commentable_type'=>$model,
            'user_id'=>Auth::guard('api')->user()->id,
            'body'=>request('body')
        ]);
        return $comment;
    }

    public function getModelNameFromType($type)
    {
        return $type === 'question'? 'App\Question' : 'App\Answer';
    }
}
