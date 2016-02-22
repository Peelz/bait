<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;
use App\Category ;
use App\CategoryImage ;


use File ;


class CategoryController extends Controller
{
    public function getProduct()
    {
      return Product::all();
    }
    public function getCategory()
    {
      return Category::all();
    }

    public function index(Request $request)
    {
      return view('admin.catalog.category.index')->with('categories',$this->getCategory())->with('products',$this->getProduct());
    }

    public function create(){
        return view('admin.catalog.category.create');
    }
    public function store(Request $request){
      $category = new Category ;
      $category->name =  $request->name;
      $category->is_active =  $request->is_active;
      $category->save();

      if( !is_null($request->products)){
        foreach ($request->products as $id) {
          $obj = Product::find($id);
          $obj->category = $category->id;
          $obj->save();
        }

      }
      if(!is_null($request->image)){
        $img = $request->image;
        $imgName = $img->getClientOriginalName();
        $path = "/catalog/img/brand/".$category->id."/";
        $category->path = $path.$imgName;
        $img->move(public_path($path),$imgName);
        $category->save();
      }


      return redirect('admin/category');



    }

    public function show($id)
    {
        return view('admin.catalog.category.view')
        ->with('category',Category::find($id));
    }

    public function update(Request $request, $id)
    {
      $category = Category::find($id);
      $category->name = $request->name;
      $category->is_active = $request->is_active ;


      if( !is_null($request->products) ){
        if( !is_null($category->Product)){
          foreach ($category->Product as $product)
          {
            $product->category = NULL ;
            $product->save();
          }
        }

        foreach ($request->products as $id) {
          $obj = Product::find($id);
          $obj->category = $category->id;
          $obj->save();
        }
      }

      if( !empty($request->image)){
        File::delete(public_path($category->path));
        $img = $request->image;
        $imgName = $img->getClientOriginalName();
        $path = "/catalog/img/brand/".$category->id."/";
        $category->path = $path.$imgName;
        $img->move(public_path($path),$imgName);
        $category->save();
      }
      $category->save();
      return redirect('admin/category');
    }

    public function destroy($id)
    {

      $cate = Category::find($id);
      foreach ($cate->getProduct as $product) {
        $product->category = NULL ;
      }

      File::deleteDirectory(public_path('/catalog/img/brand/'.$cate->id));
      $cate->delete();
      return redirect('admin/category');

    }

}
