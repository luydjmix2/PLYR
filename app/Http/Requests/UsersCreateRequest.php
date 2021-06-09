<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersCreateRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'email' => 'required|string|email|max:255',
            'password' => 'string|min:8|confirmed',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'profile' => 'required',
            'company' => 'required|max:255',
        ];
    }

    public function messages() {
        return [
            'email.required' => 'The Email: attribute is required.',
            'email.email' => 'The Email: it is not an email.',
            'email.max' => "The Email: It's too long.",
            'password.required' => 'The Password: attribute is required.',
            'password.min' => 'The Password: must be at least 8 characters.',
            'first_name.required' => 'The First Name: attribute is required.',
            'last_name.required' => 'The Last Name: attribute is required.',
            'profile.required' => 'The Profile: attribute is required.',
            'company.required' => 'The Company: attribute is required.',
            'company.max' => "The Company: It's too long.",
        ];
    }

    public function attributes() {
        return [
                //
        ];
    }

}
