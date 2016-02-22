<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;
use App\Category ;
use App\ProductImage ;
use File ;


class ProductController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.catalog.product.index')->with('products',Product::all());
    }
    public function create(Request $request)
    {

      if ($request->isMethod('post')) {

        return $request->all()['name'];
      }else{

        return view('admin.catalog.product.create')->with('categories',Category::all());
      }
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $product = new Product ;
        $product->name = $input['name'] ;
        $product->description = $input['description'];
        $product->sku = $input['sku'];
        $product->price = $input['price'];
        $product->special_price  = $input['special_price'];
        if($input['category']!= null){
          $product->category = $input['category'];
        }
        $product->is_active  = $input['is_active'];
        $product->quanlity = $input['quanlity'];
        $product->save();
        if(!is_null($input['images'])){
          $path = "/catalog/img/product/".$product->id."/";
          foreach ($request->images as $img) {
            $img_product = new ProductImage ;
            $img_product->pro_id = $product->id ;
            $imgName = $img->getClientOriginalName();
            $img_product->pro_id = $product->id ;
            $img_product->path = $path.$imgName;
            $img->move(public_path($path),$imgName);
            $img_product->save();
          }
        }

        return redirect('admin/product');


    }
    public function show($id)
    {
      $product = Product::find($id);
      $productImages = $product->Image ;

      return view('admin.catalog.product.view')
      ->with('product',$product)
      ->with('categories',Category::all())
      ->with('productImages',$productImages) ;
    }

    public function edit($id)
    {
      $product = Product::find($id);
      $productImages = $product->Image ;

      return view('admin.catalog.product.view')
      ->with('product',$product)
      ->with('categories',Category::all())
      ->with('productImages',$productImages) ;
    }
    public function update(Request $request, $id)
    {

        $product = Product::findOrFail($id);

        $product->name = $request->name ;
        $product->description = $request->description;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->special_price  = $request->special_price;
        if($request->category!= null){
          $product->category = $request->category;
        }
        $product->is_active  = $request->is_active;
        $product->quanlity = $request->quanlity;
        if( $request->images != null ){
          $path = "/catalog/img/product/".$product->id."/";
          foreach ($request->images as $img) {
            $img_product = new ProductImage ;
            $img_product->pro_id = $product->id ;
            $imgName = $img->getClientOriginalName();
            $img_product->pro_id = $product->id ;
            $img_product->path = $path.$imgName ;
            $img->move(public_path($path),$imgName);
            $img_product->save();
          }
        }
        $product->save();
        return redirect('admin/product/'.$id);
    }

    public function ajaxDestroy(Request $req,$id)
    {
      $img = ProductImage::find($req->id);
      File::delete(public_path().$img->path);
      $img->delete();
      return 'done';
    }
    public function destroy(Request $request)
    {

      $path = "/catalog/img/".$request->product;
      File::deleteDirectory(public_path($path));
      Product::destroy($request->product);

      return redirect('admin/product');

    }




}
