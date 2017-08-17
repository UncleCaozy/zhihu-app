<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
    <script src="/js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="/css/font-awesome.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '知乎') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>;
        Laravel.apiToken = "{{Auth::check() ? 'Bearer '.Auth::user()->api_token :'Bearer '}}";
        @if(Auth::check())
            window.Zhihu = {
                name:"{{Auth::user()->name}}",
                avatar:"{{Auth::user()->avatar}}"
        }
        @endif
    </script>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">登 陆</a></li>
                        <li><a href="{{ url('/register') }}">注 册</a></li>
                    @else
                        <li><a id="dlable" type="button" data-toggle="dropdown">
                        <i class="fa fa-pencil"></i>{{Auth::user()->name}}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dLabel">
                                <li><a href="/page"> <i class="fa fa-user"></i> 个人信息</a></li>
                                <li><a href="/password"> <i class="fa fa-cog"></i> 更换密码</a></li>
                                <li><a href="#"> <i class="fa fa-pencil"></i> 我的帖子</a></li>
                                <li><a href="#"> <i class="fa fa-comment"></i> 我的评论</a></li>
                                <li><a href="#"> <i class="fa fa-heart"></i> 特别感谢</a></li>
                                <li role="separator" class="divider"></li>
                                <li> <a href="/logout">  <i class="fa fa-sign-out"></i> 退出登录</a></li>
                            </ul>
                        </li>
                        <li><img src="{{Auth::user()->avatar}}" class="img-circle" width="40" height="40"></li>

                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @include('flash::message')
    </div>
    @yield('content')
</div>

<!-- Scripts -->

<script type="text/javascript">
    var ue = UE.getEditor('container',{
        toolbars: [
            ['bold', 'italic', 'underline', 'strikethrough', 'blockquote', 'insertunorderedlist', 'insertorderedlist', 'justifyleft','justifycenter', 'justifyright',  'link', 'insertimage', 'fullscreen']
        ],
        elementPathEnabled: false,
        enableContextMenu: false,
        autoClearEmptyNode:true,
        wordCount:false,
        imagePopup:false,
        autotypeset:{ indent: true,imageBlockLine: 'center' }
    });
    ue.ready(function() {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
    });
</script>
<script>
    $('#flash-overlay-modal').modal();
</script>
</body>
</html>
