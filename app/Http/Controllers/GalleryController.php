<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Http\Requests\createRequestGallery;
use App\Http\Requests\updateRequestGallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{

    public function index()
    {
        $gallery = Gallery::paginate(4);
        return view('admin.gallery.index', compact('gallery'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(createRequestGallery $request)
    {
        $gallery = new Gallery();
        $file = $request->file('image');
        if (!empty($file)) {
            $image = time() . $file->getClientOriginalName();
            $file->move('images/gallery/', $image);
            $gallery->image = $image;
        }
        $gallery->save();
        $comment = 'عملیات بارگذاری اطلاعات بدرستی انجام شد.';
        session()->flash('gallery', $comment);
        return back();
    }

    public function show($gallery)
    {
        $gallery = Gallery::findorfail($gallery);
        return $gallery;
    }


    public function edit($galleryid)
    {
        $gallery = Gallery::findorfail($galleryid);
        return view('admin.gallery.edit', compact('gallery'));
    }


    public function update(updateRequestGallery $request, $id)
    {
        $gallery = Gallery::findorfail($id);
        $file = $request->file('image');
        if (!empty($file)) {
            $deleteImage = $gallery->image;
            unlink('images/gallery/' . $deleteImage);
            $image = time() . $file->getClientOriginalName();
            $file->move('images/gallery/', $image);
            $gallery->image = $image;
        }
        $gallery->save();
        $comment = "اطلاعات ویرایش شده، بدرستی ذخیره شد.";
        session()->flash('gallery', $comment);
        return back();
    }

    public function destroy($gallery)
    {
        $gallery = Gallery::findorfail($gallery);
        $deletImage = $gallery->image;
        unlink('images/gallery/' . $deletImage);
        $gallery->delete();
        $comment = 'عملیات حذف بدرستی انجام شد.';
        session()->flash('gallery', $comment);
        return back();
    }
}
