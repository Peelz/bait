@extends('catalog.html.page')

@section('title')
  ค้นหา
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <h3>ค้นหา </h3>
    </div>
    <div class="row">
      @foreach($products as $product )
        {{ $product->name }}
      @endforeach
    </div>
  </div>
@endsection
