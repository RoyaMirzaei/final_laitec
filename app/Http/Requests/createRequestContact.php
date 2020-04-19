<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createRequestContact extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'fullname'=>'required|string|max:50',
            'email'=>'required|email|max:100',
            'comment'=>'required|max:500',
        ];
    }

    public function messages()
    {
        return[
            'fullname.required'=>'نام و نام خانوادگی شما الزامی است.',
            'fullname.between'=>'عنوان باید  کمتر از 50 کاراکتر باشد. ',
            'email.required'=>'مقدار ایمیل شما الزامی است.',
            'email.email'=>'فرمت ایمیل را درست وارد نمایید.',
            'email.max'=>' مقدار ایمیل باید کمتر از 100 کاراکتر باشد.',
            'comment.required'=>'مقدار توضیحات الزامی است.',
            'comment.between'=>'توضیحات باید کمتر از 500 کاراکتر باشد.',
        ];
    }
}
