<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PricingPlanController extends Controller
{
    public function index(){
        return view('price-plan.index');
    }
    public function create(){
        return view('price-plan.create');
    }
}
