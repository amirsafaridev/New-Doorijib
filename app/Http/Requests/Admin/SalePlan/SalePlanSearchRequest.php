<?php

namespace App\Http\Requests\Admin\SalePlan;

use Illuminate\Foundation\Http\FormRequest;

class SalePlanSearchRequest extends FormRequest
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
            'search' => 'required|max:120|min:1|regex:/^[ا-یa-zA-Zء-ي ]+$/u',
        ];
    }
}
