@extends('catalog.html.page')

@section('content')
<div class="container">
  <div class="row">
    <h3>ยืนยันการชำระเงิน</h3>
  </div>
    @if( is_null($invoices->first()) )

      <p>ยังไม่ได้สั่งซื้อสินค้า</p>

      <p><a href="{{ url('/')}}">กลับไปหน้าแรก</a></p>
    @else


    <div class="row">
      <form action="{{url('confirm-payment')}}" class="col offset-l2 l6" method="POST" enctype="multipart/form-data" file="true">
        {{ csrf_field() }}
        <div class="input-field">
          <select id="invoice" name="invoice">
            @foreach($invoices as $invoice)
              <option value="{{ $invoice->id }}"> #{{ $invoice->id }}, {{$invoice->total }} บาท</option>
            @endforeach
          </select>
          <label>เลขที่ใบสั่งซื้อ</label>
        </div>


        <div class="input-field">
          <i class="material-icons prefix">account_circle</i>
          <input id="name" type="text" class="validate" name="name" value="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}">
          <label for="name"> </label>
        </div>

        <div class="input-field">
          <i class="material-icons prefix">phone</i>
          <input id="tel" type="tel" class="validate" name="tel">
          <label for="tel">เบอร์โทรศัพท์</label>
        </div>
        <div class="input-field">
          <i class="material-icons prefix">email</i>
          <input id="email" type="tel" class="validate" name="email" value="{{ Auth::user()->email }}">
          <label for="email">อิเมล</label>
        </div>
        <div class="input-field section scrollspy">
          <i class="material-icons prefix">schedule</i>
          <input type="date" class="datepicker" name="date">
          <label for="date">  </label>
        </div>

        <div class="file-field input-field">
          <div class="btn">
            <span>ไฟล์แนบ</span>
            <input type="file" accept="image/*" name="image">
          </div>
          <div class="file-path-wrapper">
            <input name="image_name" class="file-path validate" type="text" placeholder="Upload one or more files">
          </div>
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

  <script type="text/javascript">
  $('.datepicker').pickadate({
  selectMonths: true, // Creates a dropdown to control month
  selectYears: 15 // Creates a dropdown of 15 years to control year
  });

    $(document).ready(function() {
      $('select').material_select();
    });

  </script>
    @endif
      </div>

@endsection
