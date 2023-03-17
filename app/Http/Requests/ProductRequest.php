<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $routeName = $this->route()->getName();

        return [
            'name'=>'required|unique:products|alpha',
            'description'=>'nullable',
            'price'=>'required|integer',
            'language_id'=>'required',
            'image'=>[$routeName == 'products.store' ? 'required' : 'nullable' , 'image'],
        ];
    }
}
