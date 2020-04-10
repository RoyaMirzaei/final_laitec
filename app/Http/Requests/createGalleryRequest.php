<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createGalleryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'subject'=>'required|string|between:3,30',
            'caption'=>'required|string|between:10,100',
            'image'=>'required|file|mimes:jpg,png,jpeg|min:200|max:1500',
        ];
    }

    public function messages()
    {
        return[
            'subject.required'=>'لطفا موضوع خبر را وارد نمایید.',
            'subject.between'=>'عنوان باید بین 3 تا 30 کلمه داشته باشد. ',
            'caption.required'=>'لطفا چکیده خبر را وارد نمایید.',
            'caption.between'=>' لطفا چکیده خبر 10 تا 100 کلمه باشد.',
            'image.required'=>'وارد کردن تصویر الزامی می باشد.',
            'image.mimes'=>'فایل باید از نوع jpg,jpeg,png باشد. ',
            'image.min'=>'حجم تصویر نباید کمتر از 200 کیلوبایت باشد.',
            'image.max'=>'حجم تصویر نباید بیشتر  از 1500 کیلوبایت باشد.' ,
        ];
    }
}

