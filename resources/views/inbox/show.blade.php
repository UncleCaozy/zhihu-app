@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><h2>对话框</h2></div>
                    <div class="panel-body">
                        @foreach($messages as $message)
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img width="42px" src="{{$message->fromUser->avatar}}" alt="">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <a href="#">
                                            {{$message->fromUser->name}}
                                        </a>
                                    </h4>
                                    <p>
                                        {{$message->body}}<span class="pull-right">{{$message->created_at->format('Y-m-d')}}</span>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                        {{$messages->links()}}
                            <form action="/inbox/{{$dialogId}}/store" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <textarea name="body" class="form-control"></textarea>
                                </div>
                                <div class="form-group pull-right">
                                    <button class="btn btn-success">发送</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/app.js"></script>
@endsection
