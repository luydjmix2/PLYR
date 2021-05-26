<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyUpdateRequest extends FormRequest {

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
            'company_name' => 'required|max:255',
            'company_bio' => 'nullable|string|max:1200',
            'company_address' => 'required|max:255',
            'company_phone' => 'required|digits:10',
            'company_url_logo' => 'nullable|string|max:1200',
            'company_logo' => 'nullable|file|mimes:jpeg,png,jpg|max:20000|dimensions:ratio=1/1',
            'company_web' => 'nullable|string|max:600',
            'company_code' => 'required|numeric',
            'company_nid' => 'required|numeric',
            'company_politics' => 'required|in:yes',
        ];
    }

    public function messages() {
        return [
            'company_name.required' => 'The Company name: attribute is required.',
            'company_name.unique' => 'The Company name has already been taken.',
            'company_address.required' => 'The Company address: attribute is required.',
            'company_phone.required' => 'The Company phone: attribute is required.',
            'company_phone.digits' => 'The Company phone: the value is not a number and does not have 10 exact characters.',
            'company_logo.file' => 'The Company logo: attribute is not of type file.',
            'company_logo.mimes' => 'The Company logo: it is not in jpeg, jpg, png format.',
            'company_logo.max' => 'The Company logo: exceeds its maximum size of 20 mg.',
            'company_logo.dimensions' => 'The Company logo: must be square.',
            'company_code.required' => 'The Company code: attribute is required.',
            'company_nid.required' => 'The Company nid: attribute is required.',
            'company_politics.required' => 'The Company politics: attribute is required.',
            'company_politics.in' => 'The Company politics: must be selected in the yes option to continue.',
        ];
    }

}
