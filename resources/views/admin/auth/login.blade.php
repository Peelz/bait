<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
      {{ Html::style('materialize/css/materialize.css')}}
      {{ Html::style('css/app.css') }}
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      {{ Html::script('js/lib/jquery.min.js')}}
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>

  </head>
  <body class="login-page">
    <div class="container">
      <div class="row">

        <div class="card-panel">
          <form class=""  role="form" action="{{ url('admin/login') }}" method="POST">
            {!! csrf_field() !!}
            <div class="card-content">
                <div class="input-field ">
                  <input placeholder="E-mail" id="email" type="text" name="email" class="validate">
                  <label for="email">E-mail</label>
                </div>
                <div class="input-field ">
                  <input placeholder="Password" id="password" type="password" name="password" class="validate">
                  <label for="password">Password</label>
                </div>
            </div>
            <div class="card-content">
              <button class="btn waves-effect waves-light submit" type="submit" name="action" style="float:none;">Submit
                <i class="material-icons right">send</i>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
