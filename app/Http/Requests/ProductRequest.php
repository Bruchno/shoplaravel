<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class ProductRequest extends FormRequest
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
            'image' => 'mimes:jpeg,png,jpg,gif,bmp',
            'name' => 'required|string',
            'sort' => 'required|string',
            'price' => 'required',
            'curency' => 'required|string',
            'description' => 'required|string',
            'manufacturer' => 'required|string',
            'category' => 'required|string',
        ];
    }
}
