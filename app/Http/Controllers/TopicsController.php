<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TopicsRepository;

class TopicsController extends Controller
{
    protected $topics;

    public function __construct(TopicsRepository $topicsRepository)
    {
        $this->topics = $topicsRepository;
    }

    public function index()
    {
        $topics = $this->topics->GetTopics();
        return view('topics.topics',compact('topics'));
    }
}
