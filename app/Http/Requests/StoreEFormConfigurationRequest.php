<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEFormConfigurationRequest extends FormRequest
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
            'eform_id' => ['required', 'exists:e_forms,id'],
            'primary_color' => ['nullable'],
            'private' => ['required_if:public,false', 'array'],
            'private.users' => ['required_if:public,false'],
            'is_public' => ['required', 'boolean']
        ];
    }
}
