<?php

namespace App\Http\Controllers;

use App\About;
use App\Gallery;
use App\News;
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
        $news=News::paginate(4);
        $newsImport=News::orderby('id','desc')->take(1)->skip(0)->get();
        return view('website.index',['setting'=>$setting,'slider'=>$slider,'about'=>$about,'gallery'=>$gallery,'news'=>$news,'newsImport'=>$newsImport]);
    }
    public function news($id){
        $setting=Setting::orderby('id','desc')->take(1)->skip(0)->get();
        $news = News::findorfail($id);
        return view('website.news',['setting'=>$setting,'news'=>$news]);
    }
}
