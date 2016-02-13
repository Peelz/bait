@extends('admin.html.page')
@section('title')
  {{ $product->name }}
@endsection
@section('content')
<div class="row">
  <h1>{{ $product->name }}</h1>

</div>

<form class="" action="{{ action('AdminProductController@update',$product->id)}}" method="POST">
  <input type="hidden" name="_method" value="PATCH">

  <div class="row">
    <div class="small-3 columns">
      <label for="middle-label" class="text-right middle">ชื่อ : </label>
    </div>
    <div class="small-9 columns">
      <input type="text" id="middle-label" name="name" placeholder="" value="{{$product->name}}">
    </div>
  </div>

  <div class="row">
    <div class="small-3 columns">
      <label for="middle-label" class="text-right middle">รายละเอียด : </label>
    </div>
    <div class="small-9 columns">
      <textarea type="text" id="middle-label" rows="5" name="description" placeholder="Description">{{$product->description}}</textarea>
    </div>
  </div>
  <div class="row">
    <div class="small-3 columns">
      <label for="middle-label" class="text-right middle">SKU : </label>
    </div>
    <div class="small-9 columns">
      <input type="text" id="middle-label"  name="sku" placeholder="" value="{{$product->sku}}">
    </div>
  </div>

  <div class="row">
    <div class="small-3 columns">
      <label for="middle-label" class="text-right middle">ราคา : </label>
    </div>
    <div class="small-9 columns">
      <input type="text" id="middle-label" name="price" placeholder="" value="{{$product->price}}">
    </div>
  </div>

  <div class="row">
    <div class="small-3 columns">
      <label for="middle-label" class="text-right middle">ราคาพิเศษ : </label>
    </div>
    <div class="small-9 columns">
      <input type="text" id="middle-label" name="special_price" placeholder="" value="{{$product->special_price}}">
    </div>
  </div>

  <div class="row">
    <div class="small-3 columns">
      <label for="middle-label" class="text-right middle">ปริมาณ : </label>
    </div>
    <div class="small-9 columns">
      <input type="text" id="middle-label" name="quanlity" placeholder="" value="{{$product->quanlity}}">
    </div>
  </div>

  <div class="row">
    <div class="small-3 columns">
      <label for="middle-label" class="text-right middle">เปิดใช้งาน : </label>
    </div>
    <div class="small-9 columns">

      <select class="" name="is_active" value="">
          <option value="1">เปิด</option>
          <option value="0">ปิด</option>
      </select>

    </div>
  </div>

  <div class="row">
    <div class="small-3 columns">
      <label for="middle-label" class="text-right middle">Image : </label>
    </div>
    <div class="small-9 columns">
      <fieldset>
        <legend>Photos</legend>
  	       <input type="file" id="file" accept="image/*" name="file" multiple value="Add photos" onchange="showThumbnails()"/>
        </fieldset>
    </div>
  </div>
  <div class="row">
    <fieldset class="large-6 large-offset-6 columns" style="text-align:right;">
      <button class="button" type="submit" value="Submit">Submit</button>
      <button class="button" type="reset" value="Reset">Reset</button>
    </fieldset>

  </div>

</form>
@endsection
