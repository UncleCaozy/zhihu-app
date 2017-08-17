@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">头像</div>
                    <div class="panel-body">
                        <img width="150px;" src="{{Auth::user()->avatar}}">
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">个人资料</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/setting') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <div class="col-md-6">
                                    <strong>居住地: </strong><span>{{Auth::user()->city}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <strong>TEL: </strong><span>{{Auth::user()->tel}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <strong>爱好: </strong><span>{{Auth::user()->love}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <strong>主页: </strong><span>{{Auth::user()->page}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <strong >职业: </strong><span>{{Auth::user()->job}}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <strong>个人简介: </strong><span>{{Auth::user()->introduce}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <a href="/setting"><button type="button" class="btn btn-primary">修改个人信息
                                    </button>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
