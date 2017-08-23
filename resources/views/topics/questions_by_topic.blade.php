@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="media">
                        <strong>相关问题：</strong><hr>
                            @foreach($questions as $question)
                                @foreach($que_tops as $que_top)
                                    @if($que_top->question_id==$question->id)
                                        @foreach($question->topics as $topics)
                                            <a class="topic">{{$topics->name}}</a>
                                        @endforeach
                                            <div class="media-body">
                                                <h4 class="media-heading">
                                                    <a style="text-decoration:none" href="/questions/{{$question->id}}">
                                                        <strong>{{$question->title}}</strong>
                                                    </a>
                                                    @if($question->is_hidden=='T')
                                                        <button class="btn btn-danger"><i class="fa fa-times"></i>已关闭</button>
                                                    @endif
                                                </h4>
                                            </div>
                                            <hr>
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/app.js"></script>
@endsection
