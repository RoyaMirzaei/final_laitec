<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\createRequestContact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index()
    {
        $contact=Contact::paginate(4);
        return view('admin.contact.index',compact('contact'));
    }

    public function store(createRequestContact $request)
    {
        $contact=new Contact();
        $contact->fullname=$request->fullname;
        $contact->email=$request->email;
        $contact->comment=$request->comment;
        $contact->save();
        session()->flash('contact',"پیغام شما به درستی ارسال شد.");
        return back();

    }
    public function show($id)
    {
        $contact=Contact::findOrFail($id);
        return $contact;
    }


    public function destroy($contact)
    {
        Contact::destroy($contact);
        session()->flash('contact',"عملیات پاک کردن دیتا با موفقیت انجام شد.");
        return back();
    }
}
