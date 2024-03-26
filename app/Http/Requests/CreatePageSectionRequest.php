<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePageSectionRequest extends FormRequest
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
            'page_id' => 'nullable',
            'content_templates_id' => 'nullable',
            'section_title' => 'nullable',
            'sub_title' => 'nullable',
            'section_slug' => 'nullable',
            'section_description' => 'nullable',
            'image' => 'nullable',
            'user_id' => 'nullable',
            'sort' => 'nullable',
            'icon' => 'nullable',
        ];
    }
}
