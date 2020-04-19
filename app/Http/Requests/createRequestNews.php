<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createRequestNews extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'header' => 'required|string|between:5,50',
            'alt' => 'required|string|between:5,50',
            'image' => 'required|max:5000|mimes:jpg,jpeg,png',
            'abstract' => 'required|string|max:2000',
            'details' => 'required|string|max:5000',
            'date' =>  "required|string|size:8|date_format:d/m/y|after:today",
        ];
    }

    public function messages()
    {
        return [
            'header.required' => 'عنوان تصویر الزامی می باشد .',
            'header.between' => 'عنوان باید بین 5 تا 50 کاراکتر باشد. ',
            'alt.required' => 'اسم تصویر الزامی می باشد .',
            'alt.between' => 'عنوان باید بین 5 تا 50 کاراکتر باشد. ',
            'image.required' => 'وارد کردن تصویر الزامی می باشد.',
            'image.mimes' => 'فایل باید از نوع jpg,jpeg,png باشد. ',
            'image.max' => 'حجم تصویر نباید بیشتر از 5 مگابایت باشد.',
            'abstract.required' => 'چکیده خبر الزامی می باشد .',
            'abstract.max' => 'چکیده خبر باید حدکثر 2000 کاراکتر باشد. ',
            'details.required' => 'شرح خبر الزامی می باشد .',
            'details.max' => 'شرح خبر باید حدکثر 5000 کاراکتر باشد. ',
            'date.required' => 'تاریخ خبر الزامی می باشد .',
            'date.date_format'=>'فرمت تاریخ باید بصورت سال/ ماه / روز وارد شود'

        ];
    }
}
