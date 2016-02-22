@extends('admin.html.page')
@section('title')
  {{ $category->name }}
@endsection
@section('content')

<div class="row">
  <h1 class="edit"> แก้ไข : {{ $category->name}}</h1>  <a href="{{ action('Admin\CategoryController@destroy',$category->id) }}" class="alert button">ลบ</a>
</div>
<div class="row">
  <form class="" action="{{ url('admin/category/'.$category->id)}}" method="POST" enctype="multipart/form-data" file="true">
    <input type="hidden" name="_method" value="PATCH">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">


    <div class="row">
      <div class="small-3 columns">
        <label for="middle-label" class="text-right middle">ชื่อแบรน : </label>
      </div>
      <div class="small-9 columns">
        <input type="text" id="middle-label" name="name" placeholder="" value=" {{ $category->name }}">
      </div>
    </div>
    <div class="row">
      <div class="small-3 columns">
        <label for="middle-label" class="text-right middle">เปิดใช้งาน : </label>
      </div>
      <div class="small-9 columns">

        <select name="is_active">
          <option value="0" >ปิด</option>
          <option value="1" @if($category->is_active == 1) {{"selected"}} @endif>เปิด</option>
        </select>

      </div>
    </div>

    <div class="row">
      <div class="small-3 columns">
        <label for="middle-label" class="text-right middle">รูปภาพ: </label>
      </div>
      <div class="small-9 columns">
        <input type="file" accept="image/*" name="image" value="">
        <img class="preview" src="{{ $category->path}}" alt="" />
      </div>
    </div>
    <div class="row">
      <div class="small-3 columns">
        <label for="middle-label" class="text-right middle">รายชื่อสินค้า</label>
      </div>
      <div class="small-9 columns">
        <table class="hover product-list">
          <thead>
            <tr>
              <th width="50"><input id="checkbox"  class="checkAll" type="checkbox"></th>
              <th width="80">ID</th>
              <th width="250">ชื่อ</th>
              <th width="80">SKU</th>
              <th width="150">ราคา</th>
              <th width="150">ราคาพิเศษ</th>
              <th width="150">เปิดใช้งาน</th>
              <th width="150">ปริมาณคงเหลือ</th>

              <script type="text/javascript">
                $('.checkAll').click(function () {
                    $('input:checkbox').prop('checked', this.checked);
                });
              </script>

            </tr>
          </thead>
          <tbody>
            @foreach(App\Product::all() as  $product)
                  <tr>
                    <td><input id="checkbox" @if($product->category == $category->id) checked @endif name="products[]" value="{{$product->id}}" type="checkbox"></td>
                    <td>{{$product->id}}</a></td>
                    <td><a href="{{ action('Admin\ProductController@show',$product->id)}}">{{$product->name}}</a></td>
                    <td>{{$product->sku}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->special_price}}</td>
                    <td>{{$product->is_active}}</td>
                    <td>{{$product->quanlity}}</td>

                  </tr>
            @endforeach

          </tbody>
          </table>

      </div>

    </div>

    <div class="row">
      <fieldset class="large-6 large-offset-6 columns" style="text-align:right;">
        <button class="button" type="submit" value="Submit">Submit</button>
      </fieldset>
    </div>

  </form>
</div>
@endsection
