<?php

namespace App\Http\Requests;

use App\Enums\EFormTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateEFormRequest extends FormRequest
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
            'request_manager_id' => ['required', 'integer', 'exists:request_managers,id'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable'],
            'type' => ['string', new Enum(EFormTypeEnum::class)],
            'sla' => ['required', 'numeric', 'decimal:2'],
        ];
    }
}
