<?php

namespace App\Http\Requests\Customer\Advert;

use Illuminate\Foundation\Http\FormRequest;

class AdvertRequest extends FormRequest
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
        if($this->isMethod('post')){

            return [
                'title'         => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'content'       => 'required|max:700|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\n\r& ]+$/u',
                'sex'           => 'required|numeric|in:0,1',
                'contact_type'  => 'required|numeric|in:0,1',
                'work_houres'   => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.:, ]+$/u',
                'benefites'     => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'contract_type' => 'required|numeric|in:0,1,2,3,4',
                'salary_range'  => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'category_id'   => 'required|min:1|max:100000000|regex:/^[0-9]+$/u|exists:taxonomies,id',
                'image'         => 'required|image|mimes:jpg,jpeg,png,gif',
                'province_id'   => 'required|exists:provinces,id',
                'city_id'       => 'required|exists:cities,id',
            ];
        }
        else
        {
            return [
                'title'         => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'content'       => 'required|max:700|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\n\r& ]+$/u',
                'sex'           => 'required|numeric|in:0,1',
                'work_houres'   => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹:ء-ي., ]+$/u',
                'benefites'     => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'contract_type' => 'required|numeric|in:0,1,2,3,4',
                'contact_type'  => 'required|numeric|in:0,1',
                'salary_range'  => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'category_id'   => 'required|min:1|max:100000000|regex:/^[0-9]+$/u|exists:taxonomies,id',
                'image'         => 'image|mimes:jpg,jpeg,png,gif',
                'province_id'   => 'required|exists:provinces,id',
                'city_id'       => 'required|exists:cities,id',
            ];
        }

    }
}
