<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>@yield('title')</title>
  <meta name="description" content="@yield('meta')">
  <meta name="author" content="Jie Q.">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  {{ Html::style('css/normalize.css') }}
  {{ Html::style('css/style.css?v=1.0') }}
  <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <style type="text/css">
    @yield('css')
  </style>
</head>

<body>
  <div class="widget">
    <div class="container">
      <div class="widget-head">
        @yield('head')
      </div>
      <div class="widget-body">
        @yield('content')
      </div>
    </div>
  </div>
  {{ Html::script('https://code.jquery.com/jquery-1.12.1.min.js', ['integrity' => 'sha256-I1nTg78tSrZev3kjvfdM5A5Ak/blglGzlaZANLPDl3I=', 'crossorigin' => 'anonymous' ]) }} 
  {{ Html::script(asset('library/underscore.min.js')) }} 
  @yield('js')
  <script type='text/javascript'>
    @yield('script')
  </script>
</body>
</html>