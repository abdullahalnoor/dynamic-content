<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Category;
use App\Tag;

class BlogController extends Controller
{
    public function index(){
        return view('blog.index',[
            'blogs' => Blog::all(),
        ]);
    }
     public function create(){
        $tags = Tag::all();

        return view('blog.create',compact('tags'));
    }
     public function store(Request $request){
        //  dd($request->all());
         $blog = new Blog();

         $blog->name = $request->name;   
         $blog->title = $request->title;  
         $blog->save();
         $blog->tags()->sync($request->tags,false);
         return back(); 
    } 


    public function edit($id){

        $blog = Blog::find($id);

        $tag = Tag::all();

        return view('blog.edit',compact('tag','blog'));
    }

    
     public function update(Request $request){
        //  dd($request->all());
         $blog =  Blog::find($request->id);

         $blog->name = $request->name;   
         $blog->title = $request->title;  
         $blog->save();
         $blog->tags()->sync($request->tags,true);
         return back(); 
    } 

    public function delete(Request $request,Blog $blog){
        // return $request->all();
         $blog =  Blog::find($request->id);
        // dd($blog);
         $blog->tags()->detach();
         $blog->delete();
         return back();
    }

}
