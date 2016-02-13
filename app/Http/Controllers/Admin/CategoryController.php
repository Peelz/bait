<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;
use App\Category ;
use App\CategoryImage ;

use Storage ;
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->isMethod("post")){

        }
        else{
          return view('admin.catalog.category.index')->with('categories',$this->getCategory())->with('products',$this->getProduct());

        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.catalog.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $cate = new Category ;
      $input = $request->all() ;


      $cate->name = $input['name'];
      $cate->is_active = $input['is_active'];
      $cate->save();

      $img = $input['image'];

      $imgName = $img->getClientOriginalName();
      $path = "/catalog/img/cate/".$cate->id."/";
      $cate_img = new CategoryImage;
      $img->move(public_path($path),$imgName);
      $cate_img->cate_id = $cate->id ;
      $cate_img->path = $path.$imgName ;
      $cate_img->save();


      Category::create($request->all());
      return redirect('admin/category');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
