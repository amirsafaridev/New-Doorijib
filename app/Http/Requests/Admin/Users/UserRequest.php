<?php

namespace App\Http\Requests\Admin\Users;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

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
        if ($this->isMethod('post')) {
            return [
                'user_name'        => 'required|max:120|min:2|regex:/^[ا-یa-zA-Zء-ي@#$%!^&*()-_{}:;.]+$/u',
                'first_name'       => 'required|max:120|min:2|regex:/^[ا-یa-zA-Zء-ي ]+$/u',
                'last_name'        => 'required|max:120|min:2|regex:/^[ا-یa-zA-Zء-ي ]+$/u',
                'mobile'           => ['required', 'min:10', 'max:13', 'unique:users'],
                'password'         => ['required', 'unique:users', Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised(), 'confirmed'],
        ];
        }
        else
        {
            return [
                'user_name'        => 'required|max:120|min:2|regex:/^[ا-یa-zA-Zء-ي@#$%!^&*()-_{}:;.]+$/u',
                'first_name'       => 'required|max:120|min:2|regex:/^[ا-یa-zA-Zء-ي ]+$/u',
                'last_name'        => 'required|max:120|min:2|regex:/^[ا-یa-zA-Zء-ي ]+$/u',
                'mobile'           => ['sometimes', 'required', Rule::unique('users')->ignore($this->user()->mobile, 'mobile')],
            ];
        }
    }
}
