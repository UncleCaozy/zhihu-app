@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                @foreach($questions as $question)
                    @if($question->is_hidden=='F')
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
                    @endif
                @endforeach
                {{$questions->links()}}
            </div>
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body text-center">
                        <div class="col-md-4">
                            <i class="fa fa-paper-plane"></i>
                            <div>Lives</div>
                        </div>
                        <div class="col-md-4">
                            <i class="fa fa-leanpub"></i>
                            <div>书店</div>
                        </div>
                        <div class="col-md-4">
                            <i class="fa fa-address-book"></i>
                            <div>圆桌</div>
                        </div>
                        <div class="col-md-4">
                            <i class="fa fa-pencil"></i>
                            <div>专栏</div>
                        </div>
                        <div class="col-md-4">
                            <i class="fa fa-keyboard-o"></i>
                            <div>讨论</div>
                        </div>
                        <div class="col-md-4">
                            <i class="fa fa-jpy"></i>
                            <div>咨询</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <img width="265px;" src="{{$ad->ad_pic}}">
            </div>
            <div class="col-md-3">
                <div class="panel-heading pull-left">
                    <h5><a href="/page"> <i class="fa fa-user"></i> 我的收藏</a></h5><hr>
                    <h5><a href="/page"> <i class="fa fa-telegram"></i> 我关注的问题</a></h5><hr>
                    <h5><a href="/page"> <i class="fa fa-address-book"></i> 我的邀请</a></h5><hr>
                    <h5><a href="/page"> <i class="fa fa-bell-o"></i> 社区个人中心</a></h5><hr>
                    <h5><a href="/page"> <i class="fa fa-commenting-o"></i> 版权服务中心</a></h5><hr>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/app.js"></script>
@endsection
