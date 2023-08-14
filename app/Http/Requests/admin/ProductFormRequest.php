<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'title' =>['required', 'min:8'],
            'description' =>['required', 'min:8'],
            'price' =>['required','integer', 'min:0'],
            'stock' =>['required', 'boolean'],
            'image'=>[' required', 'mimes :jpg,bmp,png,svg'],
        ];
    }
}
