@extends('catalog.html.page')
@section('title')
  แก้ไขข้อมูล
@endsection
@section('content')

  <div class="container">

    <div class="row">
      <div class="col l12">
          <h2> แก้ไขข้อมูลส่วนตัว </h2>
        <form class="" action="{{ url('/profile/'.$user->id)}}" method="post">
            {!! csrf_field() !!}
            <div class="row">
              <div class="input-field col l12">
                <input id="first_name" type="text" name="first_name" value="{{ $user->first_name }}">
                <label for="first_name">ชื่อ</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col l12">
                <input id="last_name" type="text" name="last_name" value="{{ $user->last_name }}">
                <label for="last_name">นามสกุล</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col l12">
                <textarea id="address" type="text"class="materialize-textarea" name="address">{{ $user->address }} </textarea>
                <label for="address">ที่อยู่</label>
              </div>

            </div>

            <div class="row">
              <div class="input-field col l12">
                <input id="sub-district " type="text" name="sub_district" value="{{ $user->sub_district }}">
                <label for="sub-district ">แขวง/ตำบล</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col l12">
                <input id="district" type="text" name="district"  value="{{ $user->district }}">
                <label for="district">เขต/อำเภอ</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col l12">
                <input id="province" type="text" name="province" value="{{ $user->province }}">
                <label for="province">จังหวัด</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col l12">
                <input id="country" type="text" name="country" value="{{ $user->country }}">
                <label for="country">ประเทศ</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col l12">
                <input id="post_number" type="text" name="post_number" value="{{ $user->post_number }}">
                <label for="post_number">รหัสไปรษณีย์</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col l12">
                <input id="email" type="text" name="email" value="{{ $user->email }}">
                <label for="email">อีเมล</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col l12">
                <input id="password" type="password" name="password" >
                <label for="password">เปลี่ยนรหัสผ่าน</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col l12">
                <input id="password_confirmation" type="password" name="password_confirmation" >
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

@endsection
