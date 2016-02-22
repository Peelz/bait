@extends('admin.html.page')

@section('title')
  ตะกร้าสินค้า
@endsection

@section('content')
  <div class="row">
    <h1> ตะกร้าสินค้าทั้งหมด </h1>
  </div>
  <div class="row">
    <table width="100%">
      <thead>
        <th> ID </th>
        <th> ผู้สั่งซื้อ </th>
        <th> สถานะ </th>
      </thead>
      <tbody>
        @foreach(App\Cart::all()  as $cart)
          <tr>
            <td> {{ $cart->id }} </td>
            <td> {{ App\User::find($cart->id)->user_id }} </td>
            <td> {{ $cart->status }} </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
