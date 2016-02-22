@extends('admin.html.page')

@section('title')
  ตรวจสอบคำสั่งซื้อ
@endsection

@section('content')
  <div class="row">
    <h1>ตรวจสอบคำสั่งซื้อ</h1>
  </div>
  <div class="row">
    <form class="" action="{{ url('admin/checkpayment') }}" method="post">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="_method" value="POST">
    <table width="100%">
      <thead>
        <th> ชื่อผู้ใช้ </th>
        <th> เลขที่ใบสั่งซื้อ </th>
        <th> รูปภาพ </th>
        <th> วันที่ </th>
        <th> เพิ่มเติม </th>
        <th> ยืนยันคำสั่งซื้อ </th>
      </thead>
      <tbody>
        <tr>
          @foreach($contacts as $contact)
            @if($contact->Invoice->status == 'pending')
              <td>{{ App\User::find($contact->user_id)->user_id }} </td>
              <td>{{ $contact->invoice_id}} </td>
              <td> <img class="img-payment" src="{{ $contact->path}}" alt="" />  </td>
              <td>{{ $contact->date}} </td>
              <td>{{ $contact->comment}} </td>
              <td ><input type="checkbox" name="invoice[]" value="{{$contact->Invoice->id}}"> </td>
            @endif
          @endforeach
        </tr>
      </tbody>
    </table>
    <fieldset style="text-align :right" >
      <button class="button" type="submit" value="Submit">ยืนยัน</button>
    </fieldset>
    </form>
  </div>
@endsection
