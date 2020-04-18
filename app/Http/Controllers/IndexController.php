<?php

namespace App\Http\Controllers;

use App\Setting;
use App\Slider;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $setting=Setting::orderby('id','desc')->take(1)->skip(0)->get();
        $slider=Slider::all();
        return view('website.index',['setting'=>$setting,'slider'=>$slider]);
    }
}
