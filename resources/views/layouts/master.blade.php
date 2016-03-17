<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>@yield('title')</title>
  <meta name="description" content="@yield('meta')">
  <meta name="author" content="Jie Q.">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  {{ Html::style('css/style.css?v=1.0') }}

  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <style type="text/css">
    @yield('css')
  </style>
</head>

<body>
  <div class="container">
    <div class="modal">
      @yield('content')
    </div>
  </div>
  {{ Html::script('https://code.jquery.com/jquery-2.2.1.min.js', ['integrity' => 'sha256-gvQgAFzTH6trSrAWoH1iPo9Xc96QxSZ3feW6kem+O00=', 'crossorigin' => 'anonymous' ]) }} 
  {{ Html::script(asset('library/underscore.min.js')) }} 
  @yield('js')
  <script type='text/javascript'>
    @yield('script')
  </script>
</body>
</html>