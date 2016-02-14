<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    {!! Html::style('css/foundation.css') !!}
    {!! Html::style('backend/css/app.css') !!}
    @yield('style')
    {{ Html::script('js/vendor/jquery.min.js') }}
    {{ Html::script('js/foundation.js') }}
    {{ Html::script('backend/js/app.js') }}

    @yield('script')


  </head>
  <body>
    @include('admin.html.head')
    @yield('content')
  </body>
</html>
