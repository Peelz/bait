@extends('catalog.html.page')

@section('title')
  เข้าสู่ระบบ
@endsection
@section('content')


<div class="container">

  <div class="row">
    <div class="col l12">

      <div class="card-panel">
        <h2> เข้าสู่ระบบ </h2>
        <form class="" action="{{ url('/login')}}" method="post">
          {!! csrf_field() !!}

          <div class="row">
            <div class="input-field col l12">
              <input id="email" type="text" name="email">
              <label for="user_id">อีเมล</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col l12">
              <input id="password" type="password" name="password">
              <label for="password">รหัสผ่าน</label>
            </div>
          </div>


          <button class="btn waves-effect waves-light" type="submit" name="action">ยืนยัน
            <i class="material-icons right"></i>
          </button>
      </form>
      </div>

  </div>
  </div>
</div>

@endsection
