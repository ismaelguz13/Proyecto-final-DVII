<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsertarAsignaturaProfesores extends FormRequest
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
            'id_profesor'=>'' ,
            'id_grupo'=>'required',
            'id_asignatura'=>'required',
            'semestre'=>'required',
            'año'=>'required'
        ];
    }
}
