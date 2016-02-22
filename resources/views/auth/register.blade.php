@extends('catalog.html.page')

@section('title')
  สมัครสมาชิก
@endsection
@section('content')


<div class="container">

  <div class="row">
    <div class="col l12">

      <div class="card-panel">
        <h2> สมัครสมาชิก </h2>
        <form class="" action="{{ url('/register')}}" method="post">
          {!! csrf_field() !!}
          <div class="row">
            <div class="input-field col l12">
              <input id="first_name" type="text" name="first_name">
              <label for="first_name">ชื่อ</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col l12">
              <input id="last_name" type="text" name="last_name">
              <label for="last_name">นามสกุล</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col l12">
              <input id="user_id" type="text" name="user_id">
              <label for="user_id">ID</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col l12">
              <textarea id="addressd" class="materialize-textarea" type="text" name="address"></textarea>
              <label for="address">ที่อยู่</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col l12">
              <input id="sub_district" type="text" name="sub_district">
              <label for="sub_district">แขวง/ตำบล</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col l12">
              <input id="district" type="text" name="district">
              <label for="district">เขต/อำเภอ</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col l12">
              <input id="province" type="text" name="province">
              <label for="province">จังหวัด</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col l12">
              <input id="post_number" type="text" name="post_number">
              <label for="post_number">รหัสไปรษณีย์</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col l12">
              <input id="country" type="text" name="country">
              <label for="country">ประเทศ</label>
            </div>
          </div>


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

          <div class="row">
            <div class="input-field col l12">
              <input id="password_confirmation" type="password" name="password_confirmation">
              <label for="password_confirmation">ยืนยันรหัสผ่าน</label>
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
