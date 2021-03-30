<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProyectCreateRequest extends FormRequest {
//    protected $redirectRoute = 'proyects'

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
            'proyect_name' => 'required|unique:proyects|max:255',
            'proyect_description' => 'required',
            'proyect_start' => 'required',
            'proyect_end' => 'required',
        ];
    }

    public function messages() {
        return [
            'proyect_name.required' => 'The Project name: attribute is required.',
            'proyect_name.unique' => 'The Project name already exists.',
            'proyect_name.max' => 'The name of the Project is too long.',
            'proyect_description.required' => 'The Project description: attribute is required.',
            'proyect_start.required' => 'The Start date: attribute is required.',
            'proyect_end.required' => 'The End date: attribute is required.',
        ];
    }

    public function attributes() {
        return [
            'proyect_name' => 'Project name',
            'proyect_description' => 'Project description',
            'proyect_start' => 'Start date',
            'proyect_end' => 'End date',
        ];
    }

}
