<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LanguageRequest extends FormRequest
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
            'title'=>'required|unique:languages|alpha',
            'slogan'=>'required',
            'image'=>[$routeName == 'languages.store' ? 'required' : 'nullable' , 'image'],
        ];
    }
}
