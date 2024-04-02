<?php

namespace App\Http\Requests\Admin\Adverties;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
                'name'        => 'required|min:2',
                'content'     => 'required|max:1000|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\n\r& ]+$/u',
                'parent_id'   => 'nullable|min:1|max:100000000|regex:/^[0-9]+$/u|exists:taxonomies,id'
            ];

    }
}
