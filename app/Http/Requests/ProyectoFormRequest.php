<?php

namespace siscontable\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProyectoFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
      public function authorize()
    {
        return true; //el usuario esta autorizado para hacer un request
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        return [
            
            'nombre' =>'required|max:100',
            'presupuesto' =>'numeric',
            'fecha_ini' =>'date',
            'fecha_fin' =>'date'
            
        ];
    }
}