@extends('catalog.html.page')
@section('title')
  {{ "ตะกร้าสินค้า" }}
@endsection
@section('content')


{{ Auth::user()->Cart }}
@endsection
