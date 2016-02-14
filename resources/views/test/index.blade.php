@extends('admin.html.page')

@section('content')
  <form class="" action="" method="POST" enctype="multipart/form-data" file="true">
    <input type="hidden" name="_method" value="PATCH">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <input type="file" accept="image/*" name="name" value="" onchange="Upload()">

    <button type="button" class="success button" onclick="Upload()">Save</button>
  </form>

@endsection
