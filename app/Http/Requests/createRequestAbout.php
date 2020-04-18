<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createRequestAbout extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'font'=>'required|max:200',
            'color'=>'required',
            'about'=>'required|between:10,1500',
        ];
    }

    public function messages()
    {
        return[
            'font.required'=>'مقدار اندازه فونت الزامی است.',
            'font.max'=>'اندازه نمی تواند مقدار بیشتر از 40 داشته باشد.',
            'color.required'=>'رنگ الزامی است. ',
            'about.required'=>'مقدار "در باره ما " الزامی است.',
            'about.between'=>'  مقدار "درباره ما"  باید بیین 10 تا 1500 کاراکتر باشد.',
        ];
    }
}
