<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnswerRequest;
use Illuminate\Http\Request;
use App\Repositories\AnswerRepository;
use Illuminate\Support\Facades\Auth;

class AnswersController extends Controller
{
    protected $answer;

    public function __construct(AnswerRepository $answer)
    {
        $this->answer = $answer;
    }

    public function store(StoreAnswerRequest $request,$question)
    {
        $answer = $this->answer->create([
            'question_id'=>$question,
            'user_id'=>Auth::id(),
            'body'=>$request->get('body')
            ]);
        $answer->question()->increment('answers_count');
        return back();
    }
    public function edit($id)
    {
        $answer = $this->answer->byId($id);
        if (Auth::user()->owns($answer)){
            return view('answers.edit',compact('answer'));
        }
        return back();
    }

    public function update(StoreAnswerRequest $request, $id)
    {
        $answer = $this->answer->byId($id);
        $answer->update([
            'body'=>$request->get('body'),
        ]);
        return redirect()->route('questions.show',[$answer->question_id]);
    }

    public function hidden($id)
    {
        $answers = $this->answer->byId($id);
        if (Auth::user()->owns($answers)){
            $answers->is_hidden = 'T';
            $answers->save();
            return back();
        }
        abort(403,'Forbidden');
    }
    public function close_comment($id)
    {
        $answers = $this->answer->byId($id);
        if (Auth::user()->owns($answers)){
            $answers->close_comment = 'T';
            $answers->save();
            return back();
        }
        abort(403,'Forbidden');
    }

    public function open_comment($id)
    {
        $answers = $this->answer->byId($id);
        if (Auth::user()->owns($answers)){
            $answers->close_comment = 'F';
            $answers->save();
            return back();
        }
        abort(403,'Forbidden');
    }
}
