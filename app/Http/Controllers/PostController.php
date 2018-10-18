<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Post;

class PostController extends Controller
{
    public function index(){
        return view('post.index',[
            'posts'=> Post::orderBy('id','desc')->paginate(5),
        ]);
    }
    public function create(){
        return view('post.create');
    }
    public function store(Request $request){
        
           $messsages = array(
                'title.required'=>'Title Field is Required...',
                'title.min'=>'Title Field is Required Minumum 3 Character...',
            );

            $rules = array(
                'title'=>'required|min:3',
            );


        //  thre are two way to validate input

        // first easy  way 
        Validator::make($request->all(), $rules,$messsages)->validate();
        // return back();

        // second   way 
        // $validator = Validator::make($request->all(), $rules,$messsages);
       
        // if ($validator->fails()) {
        //         return back()
        //                 ->withErrors($validator)
        //                 ->withInput();
        //     }


             $this->validate($request,[
                    'description' => 'required',
                ]);

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->date = $request->date;
        $post->time = $request->time;
        $post->save();

        return back();


    }
}
