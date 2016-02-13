@extends('catalog.html.page')

@section('title')
  {{ $CateName}}
@endsection

@section('content')

<div class="container">
  <div class="row">
    @if(!empty($products->first()))
      @foreach($products as $product)

      <div class="card col l3">
        <div class="card-image">
          <img src="{{ '/'.$product->ImageAvatar->path }}">
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
    @else
      No Product
    @endif

  </div>
</div>
@endsection
