<?php

namespace App\Http\Requests\Admin\SalePlan;

use Illuminate\Foundation\Http\FormRequest;

class SalePlanRequest extends FormRequest
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
            'title'       => 'required|max:120|min:2|regex:/^[ا-یa-zA-Zء-ي ]+$/u',
            'price'       => 'required|numeric',
            'description' => 'required|max:700|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\n\r& ]+$/u',
        ];
    }
}
