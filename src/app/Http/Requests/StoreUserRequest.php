<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'phone_no' => 'required',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'name' => 'required|unique:users,name',
            'password' => 'required|same:confirm-password',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
