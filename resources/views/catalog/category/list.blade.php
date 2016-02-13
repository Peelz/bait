@extends('catalog.html.page')

@section('content')
  <div class="container">
    <div class="row">

      @if(!empty($categories->first()))
        @foreach($categories  as $category)
        <div class="card col l3">
          <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="images/office.jpg">
          </div>
          <div class="card-content">
            <span class="card-title activator grey-text text-darken-4">{{ $category->name }}</span>
            <p><a href="{{ url('brand/'.$category->id) }}">ดูสินค้าในแบรน</a></p>
          </div>
        </div>
        @endforeach
        @else
          ไม่มีหมวดสินค้า
      @endif

  </div>
</div>


@endsection
