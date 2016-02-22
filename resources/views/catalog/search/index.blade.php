@extends('catalog.html.page')

@section('title')
  ค้นหา
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <h3>ค้นหา : {{ $search }} </h3>
    </div>
    <div class="row">
          @foreach($products as $product)

          <div class="card col l3">
            <div class="card-image">
              <img src="{{ $product->ImageAvatar->path }}">
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
@endsection
