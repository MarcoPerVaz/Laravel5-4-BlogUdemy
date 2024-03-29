<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveRolesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Funciona pero se uso la policy en el controlador Admin/RolesController
            // return \Gate::authorize('update', $this->route('role'));
        // 
        
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // dd($this->method()); // Esta línea muestra en pantalla el método Http usado(post, get, delete...etc)

        $rules = [
            'display_name' => 'required'
        ];

        if ($this->method() !== 'PUT') //Si no es el método POST
        {
            $rules['name'] = 'required|unique:roles';
        }

        return $rules;
        
    }
    public function messages()
    {
        return  [
                    'name.required' => 'El identificador del role es obligatorio',
                    'name.unique' => 'Este identificador ya ha sido registrado',
                    'display_name.required' => 'El nombre del role es obligatorio',
                ];
    }
}
