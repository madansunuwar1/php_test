<?php

namespace App\Http\Requests;

use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;

class CreateProfileRequest extends FormRequest
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
        $currentUserRoleID = auth()->user()->role->value('id');
        return match ($currentUserRoleID) {
            Role::IS_BCIO => [
                'name' => 'required|string|max:255',
                'club_name' => 'required|string|max:255',
                'country' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'contact' => 'required|string|max:255',
                'position' => 'required|string|max:255',
                'date' => 'string|max:255|nullable',
                'personal_email' => 'string|email|max:255|nullable',
                'status' => 'string|max:255|nullable',
                'activities' => 'string|max:255|nullable',
                'telephone' => 'string|max:255|nullable',
                'fax' => 'string|max:255|nullable',
                'president' => 'string|max:255|nullable',
                'based_on' => 'string|max:255|nullable',
                'established_on' => 'string|max:255|nullable',
                'facebook' => 'string|max:255|nullable',
                'instagram' => 'string|max:255|nullable',
            ],
            Role::IS_BCPN => [
                'name' => 'required|string|max:255',
                'club_name' => 'required|string|max:255',
                'date' => 'string|max:255',
                'dob' => 'date|max:255',
                'country' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'contact' => 'required|string|max:255',
                'gender' => 'string|email|max:255|nullable',
                'current_country' => 'string|max:255|nullable',
                'university' => 'string|max:255|nullable',
                'faculty' => 'string|max:255|nullable',
                'current_job' => 'string|max:255|nullable',
                'other_job' => 'string|max:255|nullable',
                'field_of_expertise' => 'string|max:255|nullable',
                'area_of_interest' => 'string|max:255|nullable',
                'hobbies' => 'string|max:255|nullable',
                'intro' => 'string|max:255|nullable',
                'status' => 'string|max:255|nullable',
                'facebook' => 'string|max:255|nullable',
                'linkedin' => 'string|max:255|nullable',
            ],
            default => [
                'name' => 'required|string|max:255',
                'club_name' => 'required|string|max:255',
                'country' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'contact' => 'required|string|max:255',
            ],
        };
    }
}
