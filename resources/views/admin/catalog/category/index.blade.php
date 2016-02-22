@extends('admin.html.page')
@section('title')
  จัดการแบรนสินค้า
@endsection
@section('content')
<div class="row">
  <h1> จัดการแบรนสินค้า </h1>
</div>
<div class="row">
  <a href="{{ action('Admin\CategoryController@create')}}" class="button">เพิ่มแบรนสินค้า</a>
</div>
 <div class="row">
   <div class="large-12 columns">
     <table class="hover" width="100%" >
       <thead>
         <th> ID </th>
         <th> ชื่อแบรน </th>
         <th> สถานะ </th>
         <th> สินค้าในแบรน </th>
       </thead>
       <tbody>
         @foreach($categories as $category)
           <tr>
             <td> {{ $category->id }} </td>
             <td><a href="{{ url('admin/category/'.$category->id) }}"> {{ $category->name }} </a></td>
             <td> {{ $category->is_active }} </td>
             <td> {{ $category->getProduct->count() }} </td>
           </tr>
         @endforeach
       </tbody>
     </table>
   </div>
 </div>

@endsection
