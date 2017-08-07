@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{$question->title}}
                        @foreach($question->topics as $topics)
                            <a class="topic" >{{$topics->name}}</a>
                        @endforeach
                    </div>
                    <div class="panel-body">
                        {!! $question->body !!}
                    </div>
                    <div class="actions">
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
        </div>
    </div>
    <style>
        .panel-body img{
            width:100%;
        }
        a.topic {
            background: #eff6fa;
            padding: 1px 10px 0;
            border-radius: 30px;
            text-decoration: none;
            margin: 0 5px 5px 0;
            display: inline-block;
            white-space: nowrap;
            cursor: pointer;
        }

        a.topic:hover {
            background: #259;
            color: #fff;
            text-decoration: none;
        }
    </style>
@endsection
