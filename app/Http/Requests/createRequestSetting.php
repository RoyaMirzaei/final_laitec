<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createRequestSetting extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'title'=>'required|string|between:20,200',
            'author'=>'required|string|between:20,200',
            'keywords'=>'required|between:5,500',
            'description'=>'required|between:2,500',
        ];
    }

    public function messages()
    {
        return[
            'title.required'=>'مقدار عنوان شما الزامی است.',
            'title.between'=>'عنوان باید بین 20 تا 200 کاراکتر داشته باشد. ',
            'author.required'=>'مقدار نوینده شما الزامی است.',
            'author.between'=>'  مقدار نویسنده خبر باید بیین 20 تا 200 کاراکتر باشد.',
            'keywords.required'=>'مقدار کلمات کلیدی شما الزامی است.',
            'keywords.between'=>'کلمات کلیدی باید بین 5 تا 500 کاراکتر باشد. ',
            'description.required'=>'مقدار توضیحات الزامی است.',
            'description.between'=>'توضیحات باید بین 5 تا 500 کاراکتر باشد.',
        ];
    }
}
