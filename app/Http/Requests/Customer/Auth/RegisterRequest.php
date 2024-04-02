<?php

namespace App\Http\Requests\Customer\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
            'user_name'        => 'required|max:120|min:2|regex:/^[ا-یa-zA-Zء-ي@#$%!^&*()-_{}:;.]+$/u',
            'first_name'       => 'required|max:120|min:2|regex:/^[ا-یa-zA-Zء-ي ]+$/u',
            'last_name'        => 'required|max:120|min:2|regex:/^[ا-یa-zA-Zء-ي ]+$/u',
            'mobile'           => ['required', 'min:10', 'max:13', 'unique:users'],
            'role'             => 'required',
            'rule'             => 'required',
            'password'         => ['required', 'unique:users', Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised(), 'confirmed'],
    ];
    }
}
