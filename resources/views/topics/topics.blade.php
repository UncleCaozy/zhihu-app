@extends('layouts.app')
@include('vendor.ueditor.assets')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>话题列表：</strong>
                        @foreach($topics as $topic)
                            <a href="/{{$topic->id}}/questions/" class="topic">{{$topic->name}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/app.js"></script>
@endsection
