@extends('admin.html.page')
@section('title')
  เพิ่มสินค้า
@endsection
@section('meta')
  <meta name="_token" content="{{ csrf_token() }}"/>
@endsection
@section('content')

<div class="row">
  <h1>เพิ่มสินค้า</h1>
</div>

<div class="row">
  <form class="" action="{{ action('Admin\ProductController@store')}}" method="POST" enctype="multipart/form-data" file="true">
    <input type="hidden" name="_method" value="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">


    <div class="row">
      <div class="small-3 columns">
        <label for="middle-label" class="text-right middle">ชื่อสินค้า : </label>
      </div>
      <div class="small-9 columns">
        <input type="text" id="middle-label" name="name" placeholder="" value="">
      </div>
    </div>

    <div class="row">
      <div class="small-3 columns">
        <label for="middle-label" class="text-right middle">รายละเอียด : </label>
      </div>
      <div class="small-9 columns">
        <textarea type="text" id="middle-label" rows="5" name="description" placeholder=""></textarea>
      </div>
    </div>
    <div class="row">
      <div class="small-3 columns">
        <label for="middle-label" class="text-right middle">SKU : </label>
      </div>
      <div class="small-9 columns">
        <input type="text" id="middle-label"  name="sku" placeholder="">
      </div>
    </div>

    <div class="row">
      <div class="small-3 columns">
        <label for="middle-label" class="text-right middle">ราคา: </label>
      </div>
      <div class="small-9 columns">
        <input type="text" id="middle-label" name="price" placeholder="" >
      </div>
    </div>

    <div class="row">
      <div class="small-3 columns">
        <label for="middle-label" class="text-right middle">ราคาพิเศษ : </label>
      </div>
      <div class="small-9 columns">
        <input type="text" id="middle-label" name="special_price" placeholder="">
      </div>
    </div>

    <div class="row">
      <div class="small-3 columns">
        <label for="middle-label" class="text-right middle">ปริมาณ : </label>
      </div>
      <div class="small-9 columns">
        <input type="text" id="middle-label" name="quanlity" placeholder="">
      </div>
    </div>

    <div class="row">
      <div class="small-3 columns">
        <label for="middle-label" class="text-right middle">เปิดใช้งาน : </label>
      </div>
      <div class="small-9 columns">

        <select name="is_active">
          <option value="0">ปิด</option>
          <option value="1" selected >เปิด</option>
        </select>


      </div>
    </div>

    <div class="row">
      <div class="small-3 columns">
        <label for="middle-label" class="text-right middle">รูปภาพ : </label>
      </div>
      <div class="small-9 columns">
        <div id="image-upload" class="">
          <div class="image">
            <input type="file" name="images[]" accept="image/*" onchange="ImgPreview(this)">
            <img class="preview" src="" alt="" />
          </div>
        </div>
        <span class="icon add_img" onclick="Add()"><i class="material-icons">add</i> </span>
      </div>
    </div>
    <div class="row">
      <div class="small-3 columns">
        <label for="middle-label" class="text-right middle">แบรน</label>
      </div>
      <div class="small-9 columns">
        <select class="" name="category">
          <option value="">เลือกแบรนสินค้า</option>
          @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>
      </div>
    </div>


    <div class="row">
      <fieldset class="large-6 large-offset-6 columns" style="text-align:right;">
        <button class="button" type="submit" value="Submit">บันทึก</button>
      </fieldset>
    </div>

  </form>
</div>

<script type="text/javascript">

</script>
@endsection
