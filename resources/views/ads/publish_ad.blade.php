@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">上传广告图</div>
                    <div class="panel-body">
                        <publish-ad ad_pic="{{$ad_pic->ad_pic}}"></publish-ad>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/app.js"></script>
@endsection
