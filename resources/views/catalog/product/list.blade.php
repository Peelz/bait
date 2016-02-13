@extends('catalog.html.page')
@section('content')

<div class="container">
  <h1>สินค้าทั้งหมด</h1>
  <div class="row">
    @foreach($products as $product)

    <div class="card col l3 m4">
      <div class="card-image">
        <img src="{{ $product->ImageAvatar->path }}">
        <span class="card-title">{{ $product->name }}</span>
      </div>
      <div class="card-content">
        <p>{{$product->description}}</p>
      </div>
      <div class="card-action">
        <a  class="btn-buy" href=" {{ url('product',$product->id) }}">This is a link</a>
      </div>
    </div>
    @endforeach
  </div>

</div>
@endsection
