<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name'              => 'required|min:2|max:64',
            'password'          => 'nullable|min:6|max:64',
            'confirmPassword'   => 'nullable|required_unless:password,null|same:password|min:6|max:64',
            'address'           => 'required|min:2|max:64',
            'role_id'           => 'required'
        ];
    }
}
