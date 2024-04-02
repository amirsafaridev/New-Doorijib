<?php

namespace App\Http\Requests\Customer\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
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
            'first_name'       => 'required|max:120|min:2|regex:/^[ا-یa-zA-Zء-ي ]+$/u',
            'last_name'        => 'required|max:120|min:2|regex:/^[ا-یa-zA-Zء-ي ]+$/u',
            'password'         => ['nullable',  Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised(), 'confirmed'],
        ];
    }
}
