@extends('admin.html.page')
@section('title')
  เพิ่มสินค้า
@endsection
@section('content')

<div class="row">
  <h1>เพิ่มหมวดหมู่สินค้า</h1>
</div>
<div class="row">
  <form class="" action="{{ action('Admin\CategoryController@store')}}" method="POST" enctype="multipart/form-data" file="true">
    <input type="hidden" name="_method" value="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">


    <div class="row">
      <div class="small-3 columns">
        <label for="middle-label" class="text-right middle">ชื่อหมวดหมู่ : </label>
      </div>
      <div class="small-9 columns">
        <input type="text" id="middle-label" name="name" placeholder="" value="">
      </div>
    </div>
    <div class="row">
      <div class="small-3 columns">
        <label for="middle-label" class="text-right middle">เปิดใช้งาน : </label>
      </div>
      <div class="small-9 columns">

        <select name="is_active">
          <option value="0">ปิด</option>
          <option value="1">เปิด</option>
        </select>

      </div>
    </div>

    <div class="row">
      <div class="small-3 columns">
        <label for="middle-label" class="text-right middle">รูปภาพ: </label>
      </div>
      <div class="small-9 columns">
        <input type="file" accept="image/*" name="image" value="">

      </div>

    </div>

    <div class="row">
      <fieldset class="large-6 large-offset-6 columns" style="text-align:right;">
        <button class="button" type="submit" value="Submit">Submit</button>
        <button class="button" type="reset" value="Reset">Reset</button>
      </fieldset>
    </div>

  </form>
</div>
@endsection
