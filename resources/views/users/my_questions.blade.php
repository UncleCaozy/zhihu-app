@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <h2 class="text-center">我的问题</h2>
                @foreach($questions as $question)
                        <div class="media">
                            <strong>来自话题：</strong>
                            @foreach($question->topics as $topics)
                                <a class="topic">{{$topics->name}}</a>
                            @endforeach
                            <div class="media-top">
                                <a href="">
                                    <img width="30" src="{{$question->user->avatar}}"alt="{{$question->user->name}}">
                                </a>
                                <span>{{$question->user->name}}</span>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">
                                    <a style="text-decoration:none" href="/questions/{{$question->id}}">
                                        <strong>{{$question->title}}</strong>
                                    </a>
                                    @if($question->is_hidden=='T')
                                        <button class="btn btn-danger"><i class="fa fa-times"></i>已关闭</button>
                                    @endif
                                </h4>
                                @foreach($question->answers as $answer)
                                    @if($answer->votes_count==1)
                                        <a style="color: #0f0f0f;text-decoration:none" href="/questions/{{$question->id}}">{!! $answer->body !!} <i class="fa fa-thumbs-up"></i> {{$answer->votes_count}}</a>
                                        &nbsp;&nbsp;&nbsp;
                                        <a style="color: #0f0f0f;text-decoration:none" href="/questions/{{$question->id}}"><i class="fa fa-comments"></i> {{$answer->comments_count}}条评论</a>
                                    @endif
                                @endforeach
                                <hr>
                            </div>
                        </div>
                @endforeach
                {{$questions->links()}}
            </div>
        </div>
    </div>
    <script src="/js/app.js"></script>
@endsection
