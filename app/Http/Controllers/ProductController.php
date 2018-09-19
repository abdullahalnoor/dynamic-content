<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::orderBy('id','desc')->get();
        return view('product.index',[
            'products'=>$products,
        ]);
    }

    public function create(){
        return view('product.create');
    }

    public function store(Request $request){
        // return $request->all();

        $this->validate($request,[
            'name' => 'required',
            'status' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg'
        ]);

        $product = new Product();
        
        if($request->hasFile('image')){
            $productImage = $request->file('image');
            $imageName = time().'_'.$productImage->getClientOriginalName();
            $imageDrectory ='image/products/';
            $productImage->move($imageDrectory,$imageName);
            $imageUrl = $imageDrectory.$imageName;
        }

        $product->name = $request->name;
        $product->status = $request->status;
        $product->image = $imageUrl;
        $product->save();
        return $product;
    }


    public function edit($id){
        $product = Product::find($id);
        return view('product.edit',compact('product'));
    }

}
