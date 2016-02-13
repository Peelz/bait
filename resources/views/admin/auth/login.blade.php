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
          <div class="card-content">
            <form class="" action="index.html" method="post">
              <div class="input-field ">
                <input placeholder="Username" id="first_name" type="text" class="validate">
                <label for="first_name">Username</label>
              </div>
              <div class="input-field ">
                <input placeholder="Password" id="first_name" type="password" class="validate">
                <label for="first_name">Password</label>
              </div>
              <button class="btn waves-effect waves-light submit" type="submit" name="action">Submit
                <i class="material-icons right">send</i>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
