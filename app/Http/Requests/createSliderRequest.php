<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createSliderRequest extends FormRequest
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
            'caption'=>'required|string|between:3,100',
            'image'=>'required|file|mimes:jpg,png,jpeg|min:200',
        ];
    }

    public function messages()
    {
        return [
            'caption.required'=>'لطفا عنوان تصویر را وارد نمایید.',
            'caption.between'=>'عنوان باید بین 3 تا 100 داشته باشد. ',
            'image.required'=>'وارد کردن تصویر الزامی می باشد.',
            'image.mimes'=>'فایل باید از نوع jpg,jpeg,png باشد. ',
            'image.min'=>'حجم تصویر نباید کمتر از 200 کیلوبایت باشد.'
        ];
    }
}
