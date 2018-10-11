<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use App\Captha;
use GuzzleHttp\Client;
use Session;

class CapthaController extends Controller
{
    public function index(){
        return view('captha.index');
    }
    public function store(Request $request){
        $token = $request->input('g-recaptcha-response');

        if(empty($token)){
                Session::flash('error','Somthing Going Wrong...');
            return back();
        }else{
            $client = new Client();
            $response = $client->post('https://www.google.com/recaptcha/api/siteverify',[
                'form_params'=> [
                    'secret' => '6Lcp33MUAAAAAB7ZUuFahJ0mZeUUxxvUDIyv03Yc',
                    'response' => $token,
                ]
            ]);

        // return $response->getBody()->getContents();
            // dd($response->getBody()->getContents());
            $result = json_decode($response->getBody()->getContents());

            // dd($result);
            // dd(json_encode($result));
            if($result->success){
                $capthe = new Captha();
                $capthe->name = $request->name;
                $capthe->save();
                Session::flash('success','Informaion Saved Successfully...');
                return back();
            }else{
                Session::flash('error','Somthing Going Wrong...');
                return back();
            }        

        }

        

    }
}
