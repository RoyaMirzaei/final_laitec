<?php

namespace App\Http\Controllers;

use App\About;
use App\Gallery;
use App\Setting;
use App\Slider;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $setting=Setting::orderby('id','desc')->take(1)->skip(0)->get();
        $slider=Slider::all();
        $about=About::orderby('id','desc')->take(1)->skip(0)->get();
        $gallery=Gallery::all();
        return view('website.index',['setting'=>$setting,'slider'=>$slider,'about'=>$about,'gallery'=>$gallery]);
    }
}
