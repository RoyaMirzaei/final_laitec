<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateRequestGallery extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'image'=>'max:5000|mimes:jpg,jpeg,png'
        ];
    }
    public function messages()
    {
        return [
            'image.mimes'=>'فایل باید از نوع jpg,jpeg,png باشد. ',
            'image.max'=>'حجم تصویر نباید بیشتر از 5 مگابایت باشد.'
        ];
    }
}
