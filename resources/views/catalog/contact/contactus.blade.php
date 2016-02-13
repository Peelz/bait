@extends('catalog.html.page')

@section('content')
<div class="container">
  <div class="row">
    <h3>ติดต่อเรา</h3>
  </div>
  <div class="row">
    <form action="{{url('contact/contactus')}}" class="col offset-l2 l6" method="POST">
      <div class="input-field">
        <i class="material-icons prefix">chat_bubble</i>
        <input id="subject" type="text" class="validate" name="subject">
        <label for="subject">หัวข้อ</label>
      </div>

      <div class="input-field">
        <i class="material-icons prefix">account_circle</i>
        <input id="name" type="text" class="validate" name="name">
        <label for="name">ชื่อ</label>
      </div>

      <div class="input-field">
        <i class="material-icons prefix">phone</i>
        <input id="tel" type="tel" class="validate" name="tel">
        <label for="tel">เบอร์โทรศัพท์</label>
      </div>
      <div class="input-field">
        <i class="material-icons prefix">email</i>
        <input id="email" type="tel" class="validate" name="email">
        <label for="email">อิเมล</label>
      </div>

      <div class="input-field">
        <i class="material-icons prefix">mode_edit</i>
        <textarea id="icon_prefix2" row="10" class="materialize-textarea" name="comment"></textarea>
        <label for="icon_prefix2">ข้อความ</label>
      </div>
      <button class="btn waves-effect waves-light submit" type="submit" name="action" style="float:right">ส่ง
        <i class="material-icons right">send</i>
      </button>
    </form>

  </div>
</div>

@endsection
