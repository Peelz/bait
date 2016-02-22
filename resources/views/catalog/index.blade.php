@extends('catalog.html.page')

@section('title')
  จำหน่ายเหยื่อตกปลา ขนาดเล็กขนาดใหญ่
@endsection
@section('style')

@endsection
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
    <div  id="product">

      @foreach($products as $product)
      <div class="card">
        <div class="card-image">
          <img src="@if( !empty($product->ImageAvatar->path)) $product->ImageAvatar->path @endif">
        </div>
        <div class="card-content">
          <span class="card-title activator grey-text text-darken-4">{{ $product->name }}</span>

          <p>{{$product->description}}</p>
        </div>
        <div class="card-action">
          <a  class="btn-buy" href=" {{ url('product',$product->id) }}">รายละเอียดสินค้า > > </a>
        </div>
      </div>
      @endforeach

    </div>
  </div>
</div>
<div class="row">
  <div class="container">
    <div class="l12 col">
      <div id="brand" class="owl-carousel owl-theme card-panel">
        @foreach(App\Category::all()->where('is_active',1) as $category)
          <div class="brand-logo">
            <a href="{{ url('brand/'.$category->id)}}"><img src="{{ $category->path }}" alt="{{ $category->name }}" /></a>

          </div>
        @endforeach
      </div>

    </div>
  </div>
</div>

<div class="row">
  <div class="container">
    <div class="l6 offset-l6 col">
      <div id="fb-root"></div>
      <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.5&appId=1501304153502788";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
      </script>
      <div class="fb-page" data-href="https://www.facebook.com/" data-tabs="timeline" data-width="540" data-height="480" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>

    </div>
    </div>


</div>

  @section('script')
  <script type="text/javascript">
    $(document).ready(function() {
      $("#product").owlCarousel({
          autoPlay: 3000, //Set AutoPlay to 3 seconds
          items : 4,
          itemsDesktop : [1199,3],
          itemsDesktopSmall : [979,3]
      });
      $("#banner").owlCarousel({
        navigation : true, // Show next and prev buttons
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem:true

      });
      $("#brand").owlCarousel({
          items : 5,
          itemsDesktop : [1199,3],
          itemsDesktopSmall : [979,3]
      });

    });

  </script>


  {{ Html::script('js/app.js') }}
  @endsection

@endsection
