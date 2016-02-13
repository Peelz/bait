@extends('catalog.html.page')

@section('title')
  Checkout
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <h3>สินค้าในตะกร้า</h3>
    </div>
    <div class="row">

      <div class="col l12">

        @if(Auth::user()->Cart->first())
        <table class="cart">
          <?php
          $user = Auth::user() ;
          $cart = App\Cart::where('user_id','=',$user->id)->where('status','=', 'pending')->first();
          ?>
          <thead>
            <th> รูปสินค้า   </th>
            <th> ชื่อสินค้า  </th>
            <th> จำนวนที่สั่งซื้อ </th>
            <th>  ราคา </th>
            <th>  รวม </th>
          </thead>
          <tbody>
          <?php $totalPrice  ?>
          @foreach($cart->Product as $product)

          <tr class="list" >
            <td class="img">
              <img src="{{ App\Product::find($product->pro_id)->ImageAvatar->path }}" alt="{{ App\Product::find($product->pro_id)->name }}" />
            </td>
            <td class="name">
              {{ App\Product::find($product->pro_id)->name }}
            </td>
            <td class="qty">
              {{ $product->quanlity }}
            </td>
            <td class="price">

              @if(App\Product::find($product->pro_id)->special_price != 0)
                  {{ App\Product::find($product->pro_id)->special_price }}
                @else
                  {{ App\Product::find($product->pro_id)->price }}
              @endif
            </td>
            <td class="total-price">
              @if(App\Product::find($product->pro_id)->special_price != 0)
                  {{ App\Product::find($product->pro_id)->special_price*$product->quanlity }}
                @else
                  {{ $totalPrice =+ App\Product::find($product->pro_id)->price*$product->quanlity }}
              @endif
            </td>

          </tr>

          @endforeach
          <tr>
            <td>  </td>
            <td>  </td>
            <td>  </td>
            <td> ยอดสุทธิ </td>
            <td><span class="flow-text">{{ $totalPrice}} </span> </td>
          </tr>
        </tbody>
        </table>

        @else
          ไม่มีสินค้าในตะกร้า

        @endif
      </div>
    </div>
    <div class="row">

      <a href="{{url('checkout/calculate')}}" class="waves-effect waves-light btn right">ยืนยันการสั่งซื้อ</a>
    </div>
  </div>
@endsection
