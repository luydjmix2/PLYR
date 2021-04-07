<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
    public function rules() {
        return [
            'email' => 'required|string|email|max:255',
            'password' => 'string|min:8|confirmed',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'position' => 'required|max:255',
            'bloomberg_email' => 'string|email|max:255',
            'phone' => 'required|digits:10',
            'movil' => 'digits:10',
            'company' => 'required',
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
            'position.required' => 'The Position: attribute is required.',
            'bloomberg_email.email'=> 'The Bloomberg Email: it is not an email.',
            'bloomberg_email.max' => "The Bloomberg Email: It's too long.",
            'phone.required' => 'The Phone: attribute is required.',
            'phone.digits' => 'The Phone: the value is not a number and does not have 10 exact characters.',
            'movil.digits'=> "The Email: the value is not a number and does not have 10 exact characters.",
            'company.required' => 'The Company: attribute is required.',
        ];
    }

    public function attributes() {
        return [
            //
        ];
    }
}
