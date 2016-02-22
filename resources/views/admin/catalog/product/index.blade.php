@extends('admin.html.page')
@section('title')
  {{ "จัดการสินค้า" }}
@endsection
@section('content')

  <div class="row">
    <h1>รายชื่อสินค้า <a href="{{action('Admin\ProductController@create')}}" class="button small">เพิ่มสินค้า</a></h1>


  <form class="admin-product-form" action="{{action('Admin\ProductController@destroy')}}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_method" value="POST">
    <fieldset >
      <button class="button" type="submit" value="Submit">ลบ</button>
      <button class="button" type="reset" value="Reset">ยกเลิก</button>
    </fieldset>
    <table class="hover product-list">
      <thead>
        <tr>
          <th width="80">ID</th>
          <th width="200">ชื่อ</th>
          <th width="80">SKU</th>
          <th width="150">ราคา</th>
          <th width="150">ราคาพิเศษ</th>
          <th width="150">เปิดใช้งาน</th>
          <th width="150">ปริมาณคงเหลือ</th>
          <th width="100"><input id="checkbox"  class="checkAll" type="checkbox"></th>
          <script type="text/javascript">
            $('.checkAll').click(function () {
                $('input:checkbox').prop('checked', this.checked);
            });
          </script>

        </tr>
      </thead>
      <tbody>
        @foreach($products as $product)
              <tr>
                <td>{{$product->id}}</a></td>
                <td><a href="{{ action('Admin\ProductController@show',$product->id)}}">{{$product->name}}</a></td>
                <td>{{$product->sku}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->special_price}}</td>
                <td>{{$product->is_active}}</td>
                <td>{{$product->quanlity}}</td>
                <td><input id="checkbox" name="product[]" value="{{$product->id}}" type="checkbox"></td>
              </tr>
        @endforeach


      </tbody>
      </table>
  </form>
  </div>
@endsection
