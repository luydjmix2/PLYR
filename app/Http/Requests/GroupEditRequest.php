<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupEditRequest extends FormRequest {

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
            'proyect_name' => 'required|max:255',
            'proyect_description' => 'required',
            'proyect_start' => 'nullable',
            'proyect_end' => 'nullable',
        ];
    }

    public function messages() {
        return [
            'proyect_name.required' => 'The Group name: attribute is required.',
            'proyect_name.unique' => 'The Group name already exists.',
            'proyect_name.max' => 'The name of the Group is too long.',
            'proyect_description.required' => 'The Group description: attribute is required.',
            'proyect_start.required' => 'The Start date: attribute is required.',
            'proyect_end.required' => 'The End date: attribute is required.',
        ];
    }

    public function attributes() {
        return [
            'proyect_name' => 'Group name',
            'proyect_description' => 'Group description',
            'proyect_start' => 'Start date',
            'proyect_end' => 'End date',
        ];
    }

}
