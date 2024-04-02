<?php

namespace App\Http\Requests\Customer\CompanyProfile;

use Illuminate\Foundation\Http\FormRequest;

class CompanyProfileRequest extends FormRequest
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
            'company_name' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Zء-ي ]+$/u',
            'postal_code'  => 'required|max:120|min:2',
            'email'      => 'required|email',
            'subject'      => 'required|max:120|min:2|regex:/^[ا-یa-zA-Zء-ي ]+$/u',
            'address'      => 'required|max:120|min:2|regex:/^[ا-یa-zA-Zء-ي ]+$/u',
            'site_name' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Zء-ي. ]+$/u',
            'image'      => 'image|mimes:jpg,jpeg,png,gif',
            'phone_number'      => 'required|numeric',
            'telephone_number'      => 'required|numeric',
        ];
    }
}
