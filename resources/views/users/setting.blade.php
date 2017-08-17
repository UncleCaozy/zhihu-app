@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">更换头像</div>
                    <div class="panel-body">
                        <user-avatar avatar="{{Auth::user()->avatar}}"></user-avatar>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">修改资料</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/setting') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                <label for="city" class="col-md-4 control-label">居住地</label>
                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control" name="city" required autofocus>
                                    @if ($errors->has('city'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}">
                                <label for="tel" class="col-md-4 control-label">TEL</label>
                                <div class="col-md-6">
                                    <input id="tel" type="text" class="form-control" name="tel" required autofocus>
                                    @if ($errors->has('tel'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('tel') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('love') ? ' has-error' : '' }}">
                                <label for="love" class="col-md-4 control-label">爱好</label>
                                <div class="col-md-6">
                                    <input id="love" type="text" class="form-control" name="love" required autofocus>
                                    @if ($errors->has('love'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('love') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('page') ? ' has-error' : '' }}">
                                <label for="page" class="col-md-4 control-label">主页</label>
                                <div class="col-md-6">
                                    <input id="page" type="text" class="form-control" name="page" required autofocus>
                                    @if ($errors->has('page'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('page') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('job') ? ' has-error' : '' }}">
                                <label for="job" class="col-md-4 control-label">职业</label>
                                <div class="col-md-6">
                                    <input id="job" type="text" class="form-control" name="job" required autofocus>
                                    @if ($errors->has('job'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('job') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('introduce') ? ' has-error' : '' }}">
                                <label for="introduce" class="col-md-4 control-label">个人简介</label>
                                <div class="col-md-6">
                                    <input id="introduce" type="text" class="form-control" name="introduce" required>
                                    @if ($errors->has('introduce'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('introduce') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        更新个人信息
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
