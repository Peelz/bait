@extends('admin.html.page')
@section('title')
  {{ "ระบบจัดการหลังร้าน" }}
@endsection
@section('content')
<div class="container dashboard">

    <div class="row">
      <div class="large-12 column">


        <h5>บอร์ดบริหาร</h5>
        <table width="100%">
          <tr>
            <td>  ยอดขาย </td>
            <td> {{ App\Invoice::getTotalSale()  }} บาท </td>
          </tr>
          <tr>
            <td> คำสั่งซื้อทั้งหมด </td>
            <td>   {{ App\Invoice::getCountInvoice()  }} ครั้ง </td>
          </tr>
          <tr>
            <td>  ใบสั่งซื้อทั้งหมด </td>
            <td> {{ App\CArtOrder::getTotalOrder() }} ใบ </td>
          </tr>
          <tr>
            <td>  สมาชิกทั้งหมด </td>
            <td> {{ App\User::getCountUser() }} คน </td>
          </tr>
        </table>

      </div>
    </div>
    <div class="row">
      <div class="large-6 column">
        <table width="100%">
          <thead>
              <th> ชื่อผู้ใช้ </th>
              <th> มูลค่า </th>
          </thead>
          <tbody>
            <tr>
            <h5>คำสั่งซื้อล่าสุด</h5>
            </tr>
            @foreach( App\CartOrder::getLast(5) as $order)
            <tr>
                <td>  {{ $order->Cart->User->user_id }}  </td>
                <td> {{ App\Product::getPrice($order->Product->id)*$order->quanlity }} </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="large-6 column">
        <table width="100%">
        <thead>
            <th> ชื่อผู้ใช้ </th>
            <th> เลขที่ใบสั่งซื้อ </th>
        </thead>
        <tbody>
          <tr>
          <h5>  ใบสั่งซื้อล่าสุด</h5>
          </tr>
          @foreach( App\Invoice::getLast(5) as $invoice)
          <tr>
              <td>  {{ $invoice->Cart->User->user_id }}  </td>
              <td> {{ $invoice->id}}</td>
          </tr>
          @endforeach
        </tbody>
        </table>

      </div>
    </div>
    <div class="row">
      <div class="large-6 column">
        <h5> สมาชิกล่าสุด</h5>
        <table width="100%">
          <thead>
            <th> ชื่อผู้ใช้ </th>
          </thead>
          <tbody>
            @foreach( App\User::getLast(5) as $user)
              <tr> <td>{{ $user->user_id }} </td> </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

  </div>
</div>

@endsection
