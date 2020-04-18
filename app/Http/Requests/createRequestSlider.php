<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createRequestSlider extends FormRequest
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
            'caption'=>'required|string|between:5,50',
            'alt'=>'required|string|between:5,50',
            'image'=>'required|max:5000|mimes:jpg,jpeg,png'
        ];
    }

    public function messages()
    {
        return [
            'caption.required'=>'عنوان تصویر الزامی می باشد .',
            'caption.between'=>'عنوان باید بین 5 تا 50 کاراکتر باشد. ',
            'alt.required'=>'اسم تصویر الزامی می باشد .',
            'alt.between'=>'عنوان باید بین 5 تا 50 کاراکتر باشد. ',
            'image.required'=>'وارد کردن تصویر الزامی می باشد.',
            'image.mimes'=>'فایل باید از نوع jpg,jpeg,png باشد. ',
            'image.max'=>'حجم تصویر نباید بیشتر از 5 مگابایت باشد.'

        ];
    }
}
