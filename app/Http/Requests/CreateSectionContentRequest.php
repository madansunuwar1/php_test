<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSectionContentRequest extends FormRequest
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
        $rules = [
            'title' => 'nullable',
            'content' => 'nullable',
            'image' => 'nullable|mimes:jpg,jpeg,png|max:3048',
            'status' => 'nullable',
        ];
        return $rules;
    }

    /**
     * Get the validation Message that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function messages(): array
    {
        return [
            'required' => "The attribute: field is required.",
            'mimes' => "Only jpg and png files allowed.",
            'max' => 'The image size must not exceed 3048 KB.',
        ];
    }
}
