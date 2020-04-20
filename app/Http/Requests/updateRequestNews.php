<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateRequestNews extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'header' => 'string|between:5,50',
            'alt' => 'string|between:5,50',
            'image' => 'max:5000|mimes:jpg,jpeg,png',
            'abstract' => 'max:2000',
            'details' => 'max:5000',
            'date' =>  "string|size:10|before_or_equal:today",
        ];
    }

    public function messages()
    {
        return [
            'header.between' => 'عنوان باید بین 5 تا 50 کاراکتر باشد. ',
            'alt.between' => 'عنوان باید بین 5 تا 50 کاراکتر باشد. ',
            'image.mimes' => 'فایل باید از نوع jpg,jpeg,png باشد. ',
            'image.max' => 'حجم تصویر نباید بیشتر از 5 مگابایت باشد.',
            'abstract.max' => 'چکیده خبر باید حدکثر 2000 کاراکتر باشد. ',
            'details.max' => 'شرح خبر باید حدکثر 5000 کاراکتر باشد. ',
            'date.size' => 'فرمت تاریخ را درست وارد نمایید باشد. ',
            'date.before_or_equal'=> 'تاریخ مربوط به آینده می باشد. ',
        ];
    }
}
