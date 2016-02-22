@extends('admin.html.page')

@section('title')
  ดูใบสั่งซื้อ
@endsection
@section('content')
  <div class="row">
    <h1> ดูใบสั่งซื้อทั้งหมด</h1>
  </div>
  <div class="row">
    <table width="100%">
      <thead>
        <th>ID  </th>
        <th>ตะกร้าสินค้า </th>
        <th>ผู้สั่งซื้อ </th>
        <th> ยอดชำระ </th>
        <th> สถานะ </th>
      </thead>
      <tbody>
        @foreach(App\Invoice::all() as $invoice)
          <tr>
            <td>{{ $invoice->id }}</td>
            <td> <a href="{{url('cart/'.$invoice->id)}}">{{ $invoice->cart_id }}</a> </td>
            <td>{{ $invoice->user_id }}</td>
            <td>{{ $invoice->status }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection
