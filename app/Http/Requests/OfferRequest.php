<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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

    /**  validation هنا يتم الاستغناء عن                     <<<<<<<<#
     * Get the validation rules that apply to the request.    <<<<<<<<#
     *
     * @return array
     */
    // laravel  اسماء اساسية من (rules,messages) الاسماء
    public function rules()
    {
        return [
            'name'=>'required|max:100|unique:offers,name',
            'price'=>'required|numeric',
            'details'=>'required',
        ];
    }
    public function messages()
    {
        return [
        'name.required'=>__('messages.name required'),
        'name.unique'=>__('messages.name unique'),
        'price.numeric'=>__('messages.price numeric'),
        'price.required'=>__('messages.price reqired'),
        'details.required'=>__('messages.details required'),
        ];
    }
}
