<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class createNewsRequest extends FormRequest
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
            'title'=>'required|string|between:20,200',
            'abstract'=>'required|string|between:100,500',
            'description'=>'required|string|between:100,1000',
            'image'=>'required|file|mimes:jpg,png,jpeg|min:200|max:1500',
        ];
    }

    public function messages()
    {
        return[
            'title.required'=>'لطفا عنوان خبر را وارد نمایید.',
            'title.between'=>'عنوان باید بین 20 تا 200 کلمه داشته باشد. ',
            'abstract.required'=>'لطفا چکیده خبر را وارد نمایید.',
            'abstract.between'=>' لطفا چکیده خبر 100 تا 500 کلمه باشد.',
            'description.required'=>'لطفا شرح خبر را وارد نمایید.',
            'description.between'=>'شرح خبر باید 100 تا 1000 کلمه باشد.',
            'image.required'=>'وارد کردن تصویر الزامی می باشد.',
            'image.mimes'=>'فایل باید از نوع jpg,jpeg,png باشد. ',
            'image.min'=>'حجم تصویر نباید کمتر از 200 کیلوبایت باشد.',
            'image.max'=>'حجم تصویر نباید بیشتر  از 1500 کیلوبایت باشد.' ,
        ];
    }
}
