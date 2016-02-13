@extends('admin.html.page')
@section('title')
  จัดการหมวดหมู่สินค้า
@endsection
@section('content')
<div class="row">
  <h1> จัดการหมวดหมูสินค้า </h1>
</div>
<div class="row">
  <a href="{{ action('Admin\CategoryController@create')}}" class="button">เพิ่มหมวดหมู่</a>
  <button class="alert button" type="submit" value="Submit">ลบ</button>
</div>
 <div class="row">
 <form class="" action="index.html" method="post">

   <div class="large-4 columns">
     <fieldset>
     <ul class="menu vertical">
          <?php $i=1 ?>
         @foreach($categories as $category)
         <li>
           <input id="checkbox{{ $i}}" type="radio" name="category" value="{{ $category->id }}"><label for="checkbox{{ $i++}}">{{$category->name}}</label>
         </li>
         @endforeach
     </ul>
    </fieldset>
   </div>
  </form>

   <div class="large-8 columns">
     <table class="hover">
       <thead>
         <tr>
           <th width="200">ชื่อ</th>
           <th>SKU</th>
           <th width="150">ราคา</th>
           <th width="150">ราคา พิเศษ</th>
           <th width="150">เปิดใช้งาน</th>
           <th width="150">ปริมาณ</th>
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
                 <td><a href="{{ action('Admin\ProductController@edit',$product->id)}}">{{$product->name}}</a></td>
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
   </div>

 </div>

@endsection
