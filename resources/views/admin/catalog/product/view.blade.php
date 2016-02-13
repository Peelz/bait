@extends('admin.html.page')
@section('title')
  {{ $product->name }}
@endsection
@section('content')
<div class="row">
  <h1>{{ $product->name }}</h1>

</div>

<form class="" action="{{ action('Admin\ProductController@update',$product->id)}}" method="POST" enctype="multipart/form-data" file="true">
  <input type="hidden" name="_method" value="PATCH">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">


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
      <input type="text" id="middle-label"  name="sku" placeholder="Name. . ." value="{{$product->sku}}">
    </div>
  </div>

  <div class="row">
    <div class="small-3 columns">
      <label for="middle-label" class="text-right middle">ราคา : </label>
    </div>
    <div class="small-9 columns">
      <input type="text" id="middle-label" name="price" placeholder="Name. . ." value="{{$product->price}}">
    </div>
  </div>

  <div class="row">
    <div class="small-3 columns">
      <label for="middle-label" class="text-right middle">ราคาพิเศษ : </label>
    </div>
    <div class="small-9 columns">
      <input type="text" id="middle-label" name="special_price" placeholder="Name. . ." value="{{$product->special_price}}">
    </div>
  </div>

  <div class="row">
    <div class="small-3 columns">
      <label for="middle-label" class="text-right middle">ปริมาณ : </label>
    </div>
    <div class="small-9 columns">
      <input type="text" id="middle-label" name="quanlity" placeholder="Name. . ." value="{{$product->quanlity}}">
    </div>
  </div>

  <div class="row">
    <div class="small-3 columns">
      <label for="middle-label" class="text-right middle">เปิดใช้งาน : </label>
    </div>
    <div class="small-9 columns">
      <select class="" name="is_active" >
          <option value="1">เปิด</option>
          <option value="0">ปิด</option>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="small-3 columns">
      <label for="middle-label" class="text-right middle">รูปภาพ : </label>
    </div>
    <div class="small-9 columns">
      <div id="image-upload">
        @foreach($productImages as $image)
          <div class="image">
            <input type="file" name="images[]" accept="image/*" onchange="ImageUpload(this)">
            <img id="{{ $image->id }}" class="preview" src="{{$image->path}}" alt="" />
          </div>
        @endforeach

      </div>
      <span class="icon add_img" onclick="Add()"><i class="material-icons">add</i> </span>
    </div>

  </div>


  <div class="row">
    <div class="small-3 columns">
      <label for="middle-label" class="text-right middle">หมวดหมู่</label>
    </div>
    <div class="small-9 columns">
      <select class="" name="category">
        <option value="">เลือกหมวดหมู่สินค้า</option>
        @foreach($categories as $category)
          <option value="{{ $category->id }}" @if($category->id==$product->category){{ "selected"}} @endif>{{ $category->name }}</option>
        @endforeach
      </select>
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