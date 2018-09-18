<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;

class WelcomeController extends Controller
{
    public function index(){
        return view('home',[
            'contents'=> Content::all(),
        ]);
    }
}
