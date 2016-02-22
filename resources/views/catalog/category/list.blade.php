@extends('catalog.html.page')
@section('title')
  หมวดหมู่ทั้งหมด
@endsection
@section('content')
  <div class="container">
    <div class="row">

      @if(!empty($categories->first()))
        @foreach($categories->where('is_active',1)  as $category)
        <div class="card col l3">
          <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="{{ $category->path }}">
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
