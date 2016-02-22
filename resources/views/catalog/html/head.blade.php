<nav>

  <div class="nav-wrapper">
    <div class="container">
      @if(Auth::guest())
        <a href="/" class="brand-logo">Logo</a>
      @else
        <a href="{{ url('/')}}" class="brand-logo"> {{ Auth::user()->user_id }}</a>
      @endif

      <form class="mini-search" action="{{ url('/search')}}"  method="get">
        <div class="input-field">
          <input id="search" type="search" name="search" required>
          <label for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
      <ul class="right hide-on-med-and-down">
        <li><a class="user-dropdown" href="{{ url('/login')}}" data-beloworigin="true"  data-activates='dropdown1'><i class="material-icons">perm_identity</i></a></li>
        @if(Auth::guest())
          <ul id='dropdown1' class='dropdown-content'>
            <li><a href="{{ url('/register') }}">สมัครสมาชิก</a></li>
            <li><a href="{{ url('/login') }}">ลงชื่อเข้าใช้</a></li>
          </ul>
        @else
          <ul id='dropdown1' class='dropdown-content'>
            <li><a href="{{ url('/profile/'.Auth::user()->id) }}">แก้ไขข้อมูลส่วนตัว</a></li>
            <li><a href="{{ url('/logout') }}">ออกจากระบบ</a></li>

          </ul>
        @endif

        <li><a class="minicart-dropdown" href="" data-beloworigin="true"  data-activates='dropdown2'><i class="material-icons" >shopping_basket</i></a></li>
        @if(Auth::guest())

          <div id="dropdown2" class="dropdown-content minicart">
            <li><a href="{{ url('/login')}}">เข้าสู่ระบบ</a></li>
          </div>
        @else


          <div id="dropdown2" class="dropdown-content minicart">

          @if( !empty(Auth::user()->Cart->where('status', 'pending')->first() ) )
          <table class="mini-cart">
            <?php
            $user = Auth::user() ;
            $cart = App\Cart::where('user_id','=',$user->id)->where('status','=', 'pending')->firstOrFail();
            ?>
            <span>สินค้าในตะกร้า</span>
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
                    {{ App\Product::find($product->pro_id)->price*$product->quanlity }}
                @endif
              </td>
            </tr>
            @endforeach
          </table>
          <a class="blue" href="{{url('/checkout')}}">CheckOut</a>
          @else
            ไม่มีสินค้าในตะกร้า

          @endif

          </div>

        @endif

      </ul>
    </div>

  </div>
</nav>
<div class="row">
  <div class="container">
    <ul class="menu">
      <li> <a href="{{ url('/') }}">หน้าแรก</a> </li>
      <li> <a href="{{ url('brand') }}">แบรนสินค้า</a> </li>
      <li> <a href="{{ url('confirm-payment')}}">แจ้งการโอนเงิน</a> </li>
      <li> <a href="#">เว็บบอร์ด</a> </li>
      <li> <a href="{{ url('contactus')}}">ติดต่อเรา</a> </li>
    </ul>
  </div>
</div>


<script type="text/javascript">
$('.user-dropdown').dropdown({
   inDuration: 300,
   outDuration: 225,
   constrain_width: false, // Does not change width of dropdown to that of the activator
   hover: true, // Activate on hover
   gutter: 0, // Spacing from edge
   belowOrigin: false, // Displays dropdown below the button
   alignment: 'left' // Displays dropdown with edge aligned to the left of button
 }
);

$('.minicart-dropdown').dropdown({
   inDuration: 300,
   outDuration: 225,
   constrain_width: false, // Does not change width of dropdown to that of the activator
   hover: true, // Activate on hover
   gutter: 0, // Spacing from edge
   belowOrigin: false, // Displays dropdown below the button
   alignment: 'left' // Displays dropdown with edge aligned to the left of button
 }
);
</script>
