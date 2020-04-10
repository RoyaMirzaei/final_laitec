<?php

namespace App\Http\Controllers;

use App\Http\Requests\creatNewsRequest;
use App\news;
use Illuminate\Http\Request;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $new=news::all();
        return view('news.index',['news'=>$new]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(creatNewsRequest $request)
    {

        $news=new news();
        $news->title=$request->title;
        $news->abstract=$request->abstract;
        $news->description=$request->description;
        $file=$request->file('image');
        if (!empty($file)){
            $image=time().$file->getClientOriginalName();
            $file->move('images/news/',$image);
            $news->image=$image;
        }
        $news->save();
        $comment="خبر درج شده بدرستی ذخیره شد.";
        session()->flash('news',$comment);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news=news::findorfail($id);
        return view('news.update',compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(creatNewsRequest $request, $id)
    {
        $news=news::where('id',$id)->first();
        $news->title=$request->title;
        $news->abstract=$request->abstract;
        $news->description=$request->description;
        $file=$request->file('image');
        if(!empty($file)){
            $deleteimage=$news->image;
            unlink('images/news/'.$deleteimage);
            $image=time().$file->getClientOriginalName();
            $file->move('images/news/',$image);
            $news->image=$image;
        }
        $news->save();
        $comment="تغییرات بدرستی اعمال شد.";
        session()->flash('news',$comment);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news=news::where('id',$id)->first();
        $deleteImage=$news->image;
        unlink('images/news/'.$deleteImage);
        $news->delete();
        $comment="عملیات حذف بدرستی انجام شد.";
        session()->flash('news',$comment);
        return back();
    }
}
