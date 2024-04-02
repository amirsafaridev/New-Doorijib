<?php

namespace App\Http\Requests\Admin\Setting;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'telegram'       => 'required|max:1200',
            'instagram'    => 'required|max:1200',
            'linkedin'    => 'required|max:1200',
            'category_id_1'   => 'required|min:1|max:100000000|regex:/^[0-9]+$/u|exists:taxonomies,id',
            'category_id_2'   => 'required|min:1|max:100000000|regex:/^[0-9]+$/u|exists:taxonomies,id',
            'category_id_3'   => 'required|min:1|max:100000000|regex:/^[0-9]+$/u|exists:taxonomies,id',
            'description' => 'required|max:700|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,؟?><\/;\n\r& ]+$/u',
        ];
    }
}
