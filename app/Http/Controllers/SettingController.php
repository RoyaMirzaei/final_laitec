<?php

namespace App\Http\Controllers;

use App\Http\Requests\createRequestSetting;
use App\Setting;
use App\Slider;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function index()
    {
        $setting=Setting::all();
        return view('admin.setting.index',['setting'=>$setting]);
    }


    public function create()
    {
        return view('admin.setting.create');
    }


    public function store(createRequestSetting $request)
    {
       $setting=new Setting();
       $setting->title=$request->title;
       $setting->author=$request->author;
       $setting->keywords=$request->keywords;
       $setting->description=$request->description;
       $setting->save();
        $comment="عملیات بارگذاری اطلاعات بدرستی انجام شد";
        session()->flash('setting',$comment);
       return redirect()->route('setting.create');
    }


    public function show($setting)
    {
       $setting=Setting::findOrFail($setting);
       return $setting;
    }



    public function destroy($id)
    {
        $setting=Setting::where('id',$id)->first();
        $setting->delete();
        $comment="عملیات حذف بدرستی انجام شد";
        session()->flash('setting',$comment);
        return back();
    }
}
