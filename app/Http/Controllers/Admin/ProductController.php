<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Product;
use App\Category ;
use App\ProductImage ;


use File ;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getProduct()
    {
      return Product::all();
    }
    public function getCategory()
    {
      return Category::all();
    }
    public function getProductImage($id)
    {
      $images = Product::find($id)->first()->Image;
      return $images ;
    }
    public function index(Request $request)
    {

        return view('admin.catalog.product.index')->with('products',$this->getProduct());


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

      if ($request->isMethod('post')) {

        return $request->all()['name'];
      }else{

        return view('admin.catalog.product.create')->with('categories',$this->getCategory());
      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $product = Product::find($id);

      return view('admin.catalog.product.view')
      ->with('product',$product)
      ->with('categories',$this->getCategory())
      ->with('productImages',$this->getProductImage($id)) ;
    }

    public function edit($id)
    {

      $product = Product::find($id);

      return view('admin.catalog.product.view')
      ->with('product',$product)
      ->with('categories',$this->getCategory())
      ->with('productImages',$this->getProductImage($id)) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all() ;
        $product = Product::findOrFail($id);

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

        return redirect('admin/product/'.$id.'/edit');
    }


    public function ajax()
    {
      if(Request::ajax()){
        return true ;
      }
      return true ;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      foreach ($request->product as $product) {
        $path = "/catalog/img/".$product;
        File::deleteDirectory(public_path($path));
      }

      Product::destroy($request->product);

      return redirect('admin/product');;

    }




}
