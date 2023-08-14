<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialFormRequest extends FormRequest
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
            'name'=>['required', 'min:3'],
            "second_name"=>['required', 'min:3'],
            "description"=>['required', 'min:8'],
            "image" => ['required', 'mimes :jpg,bmp,png,svg'],
            "type"=>['required', 'min:3']
        ];
    }
}
