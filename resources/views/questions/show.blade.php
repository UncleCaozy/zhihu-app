@extends('layouts.app')
@include('vendor.ueditor.assets')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>来自话题：</strong>
                        @foreach($question->topics as $topics)
                            <a class="topic">{{$topics->name}}</a>
                        @endforeach
                            <br>
                        <h2><strong>{{$question->title}}</strong></h2>
                    </div>
                    <div class="panel-body content">
                        {!! $question->body !!}
                    </div>
                    <div class="actions">
                            <comments type="question"
                                          model="{{$question->id}}"
                                          count="{{$question->comments()->count()}}">
                            </comments>
                        <hr>
                        @if(Auth::check() && Auth::user()->owns($question))
                            <span class="edit">
                                <a href="/questions/{{$question->id}}/edit">
                                编辑
                                </a>
                            </span>
                            <form action="/questions/{{$question->id}}" method="POST" class="delete-form">
                                {{method_field('DELETE')}}
                                {{csrf_field()}}
                                <button class="button is-naked delete-button">删除</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h2>{{$question->followers_count}}</h2>
                        <span>人关注</span>
                    </div>
                        <div class="panel-body">
                            <question-follow-button question="{{$question->id}}"></question-follow-button>
                            <a href="#editor" class="btn btn-primary pull-right">撰写答案</a>
                        </div>
                </div>
            </div>
            <div class="col-md-3">
                <img width="265px;" src="{{$ad->ad_pic}}">
            </div>
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h5>关于作者</h5>
                    </div>
                    <div class="panel-body text-center">
                        <div class="media">
                            <div class="media-body">
                                <a href="">
                                    <img width="36" src="{{$question->user->avatar}}" alt="{{$question->user->name}}">
                                </a>
                                <h4 class="media-heading">
                                    <a href="">
                                        {{$question->user->name}}
                                    </a>
                                </h4>
                            </div>

                            <div class="user-statics">
                                <div class="statics-item text-center">
                                    <div class="statics-text">问题</div>
                                    <div class="statics-count">{{$question->user->questions_count}}</div>
                                </div>
                                <div class="statics-item text-center">
                                    <div class="statics-text">回答</div>
                                    <div class="statics-count">{{$question->user->answers_count}}</div>
                                </div>
                                <div class="statics-item text-center">
                                    <div class="statics-text">关注者</div>
                                    <div class="statics-count">{{$question->user->followers_count}}</div>
                                </div>
                            </div>
                        </div>
                        {{--<a href="/question/{{$question->id}}/follow" class="btn btn-success pull-left">--}}
                        {{--已关注--}}
                        {{--</a>--}}
                        <user-follow-button user="{{$question->user_id}}"></user-follow-button>
                        <send-message user="{{$question->user_id}}"></send-message>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{$question->answers_count}}个答案
                    </div>
                    <div class="panel-body">
                        @foreach($question->answers as $answer)
                            <div class="media">
                                <div class="media-left">
                                    <user-vote-button answer="{{$answer->id}}" count="{{$answer->votes_count}}"></user-vote-button>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <a href="/user/{{$answer->user->name}}">
                                            {{$answer->user->name}}
                                        </a>
                                    </h4>
                                    {!!$answer->body!!}
                                </div>
                                <comments type="answer"
                                          model="{{$answer->id}}"
                                          count="{{$answer->comments()->count()}}">
                                </comments>
                            </div>
                        @endforeach
                    </div>
                    @if(Auth::check())
                        <form action="/questions/{{$question->id}}/answer" method="post">
                            {!!csrf_field()!!}
                            <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                                <div id="container" name="body" style="height:120px;" type="text/plain">
                                    {!!old('body')!!}
                                </div>
                                @if($errors->has('body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button class="btn btn-success pull-right" type="submit">提交答案</button>
                        </form>
                        @else
                        <a href="/login" class="btn btn-success btn-block">登陆参与回复</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script src="/js/app.js"></script>
@endsection
