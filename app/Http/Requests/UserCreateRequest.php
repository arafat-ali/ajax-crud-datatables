<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'              => 'required|min:2|max:64',
            'email'             => 'required|email|min:4|max:256|unique:users',
            'password'          => 'required|min:6|max:64',
            'confirmPassword'   => 'required|same:password|min:6|max:64',
            'address'           => 'required|min:2|max:64',
            'role_id'           => 'required'
        ];
    }


}
