<?php

namespace App\Http\Controllers;

use App\Http\Requests\createRequestSlider;
use App\Http\Requests\updateRequestSlider;
use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    public function index()
    {
      $slider=Slider::paginate(4);
      return view('admin.slider.index',['slider'=>$slider]);
    }


    public function create()
    {
        return view('admin.slider.create');
    }


    public function store(createRequestSlider $request)
    {
        $slider=new Slider();
        $slider->caption=$request->caption;
        $slider->alt=$request->alt;
        $file=$request->file('image');
        if(!empty($file)){
            $image=time().$file->getClientOriginalName();
            $file->move('images/slider/',$image);
            $slider->image=$image;
        }
        $slider->save();
        $comment='عملیات بارگذاری اطلاعات بدرستی انجام شد.';
        session()->flash('slider',$comment);
        return back();
    }


    public function show($slider)
    {
        $slider=Slider::findorfail($slider);
        return $slider;
    }

    public function edit($id)
    {
        $slider=Slider::findorfail($id);
        return view('admin.slider.edit',compact('slider'));
    }

    public function update(updateRequestSlider $request,$id)
    {
       $slider=Slider::findorfail($id);
       $slider->caption=$request->caption;
       $slider->alt=$request->alt;
       $file=$request->file('image');
       if(!empty('$file')){
           $deleteImage=$slider->image;
           unlink('images/slider/'.$deleteImage);
           $newimage=time().$file->getClientOriginalName();
          $file->move('images/slider/',$newimage);
          $slider->image=$newimage;
       }
       $slider->save();
       $comment="عملیات ویرایش بدرستی انجام شد.";
       session()->flash('slider',$comment);
       return back();
    }

    public function destroy( $id)
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
