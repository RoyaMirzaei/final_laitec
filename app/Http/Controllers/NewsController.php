<?php

namespace App\Http\Controllers;

use App\Http\Requests\createRequestNews;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index()
    {
        //
    }

    public function indexSite()
    {
        //
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(createRequestNews $request)
    {
        $news=new News();
        $news->header=$request->header;
        $news->alt=$request->alt;
        $news->abstract=$request->abstract;
        $news->details=$request->details;
        $news->date=$request->date;
        $file=$request->file('image');
        if(!empty($file)){
            $image=time().$file->getClientOriginalName();
            $file->move('images/news/',$image);
            $news->image=$image;
        }
        $news->save();
        $comment='عملیات بارگذاری اطلاعات بدرستی انجام شد.';
        session()->flash('news',$comment);
        return back();
    }


    public function show(News $news)
    {
        //
    }


    public function edit(News $news)
    {
        //
    }

    public function update(Request $request, News $news)
    {
        //
    }

    public function destroy(News $news)
    {
        //
    }
}
