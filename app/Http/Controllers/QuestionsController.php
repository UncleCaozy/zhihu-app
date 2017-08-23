<?php

namespace App\Http\Controllers;

use App\Qt;
use App\Ad;
use App\Question;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreQuestionRequest;
use App\Repositories\QuestionRepository;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $questionRepository;
    protected $adRepository;



    public function __construct(QuestionRepository $questionRepository)
    {
        $this->middleware('auth')->except(['index','show']);
        $this->questionRepository = $questionRepository;
    }
    public function index()
    {
        $ad = Ad::first();
        $questions = $this->questionRepository->getQuestionsFeed();
        return view('questions.index',compact('questions','ad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.make');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionRequest $request)
    {
        $topics = $this->questionRepository->normalizeTopic($request->get('topics'));
        $data = [
            'title'=>$request->get('title'),
            'body'=>$request->get('body'),
            'user_id'=>Auth::id(),
        ];
        $question = $this->questionRepository->create($data);
        $question->topics()->attach($topics);
        return redirect()->route('questions.show',[$question->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = $this->questionRepository->byIdWithTopicsAndAnswers($id);
        $ad = Ad::first();
        return view('questions.show',compact('question','ad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = $this->questionRepository->byId($id);
        if (Auth::user()->owns($question)){
            return view('questions.edit',compact('question'));
        }
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreQuestionRequest $request, $id)
    {
        $question = $this->questionRepository->byId($id);
        $topics = $this->questionRepository->normalizeTopic($request->get('topics'));
        $question->update([
            'title'=>$request->get('title'),
            'body'=>$request->get('body'),
            ]);
        $question->topics()->sync($topics);
        return redirect()->route('questions.show',[$question->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = $this->questionRepository->byId($id);
        if (Auth::user()->owns($question)){
            $question->delete();
            return redirect('/');
        }
        abort(403,'Forbidden');
    }

    public function close_comment($id)
    {
        $question = $this->questionRepository->byId($id);
        if (Auth::user()->owns($question)){
        $question->close_comment = 'T';
        $question->save();
            return back();
        }
        abort(403,'Forbidden');
    }

    public function open_comment($id)
    {
        $question = $this->questionRepository->byId($id);
        if (Auth::user()->owns($question)){
            $question->close_comment = 'F';
            $question->save();
            return back();
        }
        abort(403,'Forbidden');
    }

    public function question_hidden($id)
    {
        $question = $this->questionRepository->byId($id);
        if (Auth::user()->owns($question)){
            $question->is_hidden = 'T';
            $question->save();
            return back();
        }
        abort(403,'Forbidden');
    }

    public function question_open($id)
    {
        $question = $this->questionRepository->byId($id);
        if (Auth::user()->owns($question)){
            $question->is_hidden = 'F';
            $question->save();
            return back();
        }
        abort(403,'Forbidden');
    }

    public function get_q_by_t($topic)
    {
        $questions = Question::all();
        $que_tops = Qt::where('topic_id',$topic)->get();
        return view('topics.questions_by_topic',compact('que_tops','questions'));
    }

}
