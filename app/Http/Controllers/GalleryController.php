<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Http\Requests\createGalleryRequest;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery=Gallery::all();
        return view('gallery.index',['gallery'=>$gallery]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gallery.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createGalleryRequest $request)
    {
        $gallery=new Gallery();
        $gallery->subject=$request->subject;
        $gallery->caption=$request->caption;
        $file=$request->file('image');
        if(!empty($file)){
            $image=time().$file->getClientOriginalName();
            $file->move('images/gallery/',$image);
            $gallery->image=$image;
        }
        $gallery->save();
        $comment="اطلاعات بدرستی ذخیره شد.";
        session()->flash('gallery',$comment);
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
        $gallery=Gallery::where('id',$id)->first();
        return view('gallery.update',compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(createGalleryRequest $request, $id)
    {
        $gallery=Gallery::findorfail($id);
        $gallery->subject=$request->subject;
        $gallery->caption=$request->caption;
        $file=$request->file('image');
        if (!empty($file)){
            $deleteImage=$gallery->image;
            unlink('images/gallery/'.$deleteImage);
            $image=time().$file->getClientOriginalName();
            $file->move('images/gallery/',$image);
            $gallery->image=$image;
        }
        $gallery->save();
        $comment="اطلاعات ویرایش شده، بدرستی ذخیره شد.";
        session()->flash('gallery',$comment);
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
        $gallery=Gallery::findorfail($id);
        unlink('images/gallery/'.$gallery->image);
        $gallery->delete();
        $comment="حذف اطلاعات بدرستی انجام شد.";
        session()->flash('gallery',$comment);
        return back();

    }
}
