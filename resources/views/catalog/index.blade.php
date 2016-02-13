@extends('catalog.html.page')


@section('content')

<div class="row">
  <div class="container">
    <div id="banner" class="owl-carousel owl-theme">
      <div class="item"><img src="img/Rhhfj7c.jpg" alt="The Last of us"></div>
      <div class="item"><img src="img/Rhhfj7c.jpg" alt="The Last of us"></div>
      <div class="item"><img src="img/Rhhfj7c.jpg" alt="The Last of us"></div>
    </div>
  </div>
</div>
<div class="row">
  <div class="container">

  <div class="title"> <div class="text"> สินค้าแนะนำ </div> </div>
    <div  id="owl-demo">

      @foreach($products as $product)

      <div class="card">
        <div class="card-image">
          <img src="{{ $product->ImageAvatar->path }}">
        </div>
        <div class="card-content">
          <span class="card-title activator grey-text text-darken-4">{{ $product->name }}</span>

          <p>{{$product->description}}</p>
        </div>
        <div class="card-action">
          <a  class="btn-buy" href=" {{ url('product',$product->id) }}">This is a link</a>
        </div>
      </div>
      @endforeach

    </div>
  </div>
</div>

  @section('script')
  <script type="text/javascript">
    $(document).ready(function() {
      $("#owl-demo").owlCarousel({
          autoPlay: 3000, //Set AutoPlay to 3 seconds
          items : 4,
          itemsDesktop : [1199,3],
          itemsDesktopSmall : [979,3]
      });
    });
    $("#banner").owlCarousel({

      navigation : true, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem:true

      // "singleItem:true" is a shortcut for:
      // items : 1,
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false

  });
  </script>


  {{ Html::script('js/app.js') }}
  @endsection

@endsection
