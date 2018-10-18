<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use Illuminate\Support\Facades\Crypt;

class WelcomeController extends Controller
{
    public function index(){
        //  $id = Crypt::decrypt('eyJpdiI6ImxlUmw1QlFiczNDd1FCbEZrNFFTN2c9PSIsInZhbHVlIjoidDNCaUduQWtmT1FwSDUrR29FUzVsZz09IiwibWFjIjoiYTUxMWY3OTI3Yzc4ZTlkMWI5MjlkYWMyZmU5NjRhMmY3YjA3NDJlMWQ4NWRhMDQ3N2EyNzc5YTQxOGJmZGRkZCJ9');    
        // dd($id);
        return view('home',[
            'contents'=> Content::all(),
        ]);
    }
    public function googleMap(){
        return view('map.index');
    }
}
