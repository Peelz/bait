@extends('catalog.html.page')


@section('content')
<div class="container">
  <div class="card   product-view">
    <div class="row">

    <div class="col l6 m12">
      <div class="image">
        <img src=" @if( isset($product->ImageAvatar->path)) {{ $product->ImageAvatar->path }} @endif" alt="{{ $product->name }}" />
      </div>
      <div class="more-view">
        <?php $i=1 ?>
        @foreach($product->Image as $img)
          <img src="{{ $img->path }}" alt="" data-img="{{$i++}}"/>

        @endforeach
      </div>
    </div>
    <div class="col l6 m12">
      <div class="row name">
        <div class="text">
          <h4>{{ $product->name }}</h4>
        </div>
      </div>
      <div class="row description">
          {{ $product->description }}
      </div>
      <div class="row">
        <div class="col l5">
          <div class="price-box">
              @if($product->special_price != 0 )

              <div class="old-price">
                <div class="label">  ราคาปกติ  </div>
                <div class="price">  {{ $product->price }}</div>
              </div>
              <div class="new-price">
                <div class="label">  ราคาพิเศษ  </div>
                <div class="price">{{ $product->special_price }}</div>
              </div>
              @else
              <div class="regular-price">
                <div class="label">  ราคา </div>
                <div class="price">  {{ $product->price }}</div>
              </div>
              @endif
          </div>
        </div>

        <div class="col l6 ">
          <div class="stock">
            <div class="label"> สินค้าในคลัง </div>
            <div class="in-stock"> {{ $product->quanlity}}</div>
          </div>
        </div>

    </div>
    <div class="row">
      <form class="" action="{{ action('Catalog\ProductController@addToCart')}}" method="post">
        {{ csrf_field()}}
        <div class="order-action">
            <input type="hidden" name="product" value="{{ $product->id }}">
            <input type="hidden" name="user" value="{{ Auth::user()->id }}">
            <div class="label">ปริมาณ</div>
            <div class="qty"><input type="text" name="qty" ></div>
            <button class="btn waves-effect waves-light submit left" type="submit" name="action">หยิบใส่ตะกร้า
              <i class="material-icons right">send</i>
            </button>
        </div>
      </form>

    </div>
    </div>
    </div>
  </div>

</div>
<script type="text/javascript">
$('.more-view img').bind('mouseover', function() {
  $('.image img').attr("src",$(this).attr('src'));
});
</script>
@endsection
