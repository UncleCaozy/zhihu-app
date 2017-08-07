@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach($questions as $question)
                    <div class="media">
                        <div class="media-left">
                            <a href="">
                                <img width="48" src="{{$question->user->avatar}}"alt="{{$question->user->name}}">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">
                                <a href="/questions/{{$question->id}}">
                                    {{$question->title}}
                                </a>
                            </h4>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <style>
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
