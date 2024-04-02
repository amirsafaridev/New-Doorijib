<?php

namespace App\Http\Requests\Customer\Profile;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'first_name' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Zء-ي ]+$/u',
            'last_name'  => 'required|max:120|min:2|regex:/^[ا-یa-zA-Zء-ي ]+$/u',
            'email'      => 'required|email',
            'study'      => 'required|max:120|min:2|regex:/^[ا-یa-zA-Zء-ي ]+$/u',
            'skill'      => 'required|max:120|min:2|regex:/^[ا-یa-zA-Zء-ي ]+$/u',
            'experience' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Zء-ي ]+$/u',
            'image'      => 'image|mimes:jpg,jpeg,png,gif',
            'resume'     => 'file|mimes:jpg,jpeg,png,gif,zip,pdf,doc,docs,rar',
            'grade'      => 'required|numeric|in:0,1,2,3',
        ];
    }
}
