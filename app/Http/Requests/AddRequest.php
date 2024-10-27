<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

        ];
    }
    public function messages()
    {
        return [
            'nom.required'=>'name is required',
            'nom.min'=>'too short enter more',
            'prix.required'=>'title is required',
            'categorie.min'=>'too short enter more',
            'categorie.required'=>'category is required'

        ];
    }
}
