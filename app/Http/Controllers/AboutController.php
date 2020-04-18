<?php

namespace App\Http\Controllers;

use App\About;
use App\Http\Requests\createRequestAbout;
use Illuminate\Http\Request;

class AboutController extends Controller
{

    public function index()
    {
        $about = About::all();
        return view('admin.about.index', compact('about'));
    }

    public function create()
    {
        return view('admin.about.create');

    }

    public function store(createRequestAbout $request)
    {
        $about = new About();
        $about->font = $request->font;
        $about->color = $request->color;
        $about->about = $request->about;
        $about->save();
        $comment = "عملیات بارگزاری اطلاعات بدرستی انجام گرفت";
        session()->flash('about', $comment);
        return redirect()->route('about.create');

    }


    public function show($id)
    {
        $about = About::findorfail($id);
        return $about;
    }


    public function destroy($id)
    {
        About::destroy($id);
        $comment = "عملیات حذف بدرستی انجام شد";
        session()->flash('about', $comment);
        return back();
    }
}
