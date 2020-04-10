<?php

namespace App\Http\Controllers;

use App\Http\Requests\createRequestSlider;
use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider=Slider::all();
        return view('slider.index',['slider'=>$slider]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slider.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createRequestSlider $request)
    {
        $slider=new Slider();
        $slider->caption=$request->caption;
        $file=$request->file('image');
        if(!empty($file)){
            $image=time().$file->getClientOriginalName();
            $file->move('images/slider/',$image);
            $slider->image=$image;
        }
        $slider->save();
        $comment=' اطلاعات ، بدرستی ذخیره شد. ';
        session()->flash('slider',$comment);
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
        $slider=Slider::findorfail($id);
        return view('slider.update',compact('slider'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(createRequestSlider $request, $id)
    {
        $slider=Slider::where('id',$id)->first();
        $slider->caption=$request->caption;
        $file=$request->file('image');
        if (!empty($file)){
            $deleteImage=$slider->image;
            unlink('images/slider/'.$deleteImage);
            $image=time().$file->getClientOriginalName();
            $file->move('images/slider/',$image);
            $slider->image=$image;
        }
        $slider->save();
        $comment='ویرایش اطلاعات ، بدرستی ذخیره شد. ';
        session()->flash('slider',$comment);
        return redirect()->route('Slider.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider=Slider::where('id',$id)->first();
        $deleteImage=$slider->image;
        unlink('images/slider/'.$deleteImage);
        $slider->delete();
        $comment='عملیات حذف بدرستی انجام شد.';
        session()->flash('slider',$comment);
        return back();
    }
}
