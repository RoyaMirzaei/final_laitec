<?php

namespace App\Http\Controllers;

use App\Http\Requests\createRequestNews;
use App\Http\Requests\updateRequestNews;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index()
    {
        $news=News::paginate(4);
        return view('admin.news.index',compact('news'));
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


    public function show($id)
    {
        $news = News::findorfail($id);
        return $news;
    }


    public function edit($news)
    {
        $news = News::findorfail($news);
        return view('admin.news.edit',compact('news'));
    }

    public function update(updateRequestNews $request, $id)
    {
        $news = News::findorfail($id);
        $news->header=$request->header;
        $news->alt=$request->alt;
        $news->abstract=$request->abstract;
        $news->details=$request->details;
        $news->date=$request->date;
        $file = $request->file('image');
        if (!empty($file)) {
            $deleteImage = $news->image;
            unlink('images/news/' . $deleteImage);
            $image = time() . $file->getClientOriginalName();
            $file->move('images/news/', $image);
            $news->image = $image;
        }
        $news->save();
        $comment = "اطلاعات ویرایش شده، بدرستی ذخیره شد.";
        session()->flash('news', $comment);
        return back();
    }

    public function destroy( $news)
    {
        $news = News::findorfail($news);
        $deletImage = $news->image;
        unlink('images/news/'.$deletImage);
        $news->delete();
        $comment = 'عملیات حذف بدرستی انجام شد.';
        session()->flash('news', $comment);
        return back();
    }
}
