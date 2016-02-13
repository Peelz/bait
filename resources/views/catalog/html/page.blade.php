<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    @yield('meta')
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
      {{ Html::style('materialize/css/materialize.css')}}
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      {{ Html::style('owl/owl.carousel.css')}}
      {{ Html::style('owl/owl.theme.css')}}
      {{ Html::style('css/app.css')}}

    @yield('style')
      {{ Html::script('js/lib/jquery.min.js')}}
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>

      {{ Html::script('owl/owl.carousel.min.js') }}
      {{ Html::script('js/app.js') }}



  </head>
  <body>
    @include('catalog.html.head')
    @yield('content')

    @yield('script')
    @include('catalog.html.footer')
  </body>
</html>
