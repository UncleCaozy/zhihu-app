@extends('layouts.app')
@include('vendor.ueditor.assets')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">编辑答案</div>
                    <div class="panel-body">
                        <form action="/answers/{{$answer->id}}/answer/update" method="post">
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
                            <button class="btn btn-success pull-right" type="submit">更改答案</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    function formatTopic (topic) {
        return "<div class='select2-result-repository clearfix'>" +
        "<div class='select2-result-repository__meta'>" +
        "<div class='select2-result-repository__title'>" +
        topic.name ? topic.name : "Laravel"   +
            "</div></div></div>";
    }
    function formatTopicSelection (topic) {
    return topic.name || topic.text;
}
    $(".js-example-placeholder-multiple").select2({
    tags: true,
    placeholder: '选择相关话题',
    minimumInputLength: 2,
    ajax: {
        url: '/api/topics',
        dataType: 'json',
        delay: 250,
        data: function (params) {
            return {
                q: params.term
            };
        },
        processResults: function (data, params) {
            return {
                results: data
            };
        },
        cache: true
    },
    templateResult: formatTopic,
    templateSelection: formatTopicSelection,
    escapeMarkup: function (markup) { return markup; }
});
    </script>
@endsection