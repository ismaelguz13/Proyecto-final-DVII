<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnviarEncuestaRequest extends FormRequest
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
            /*'rb-campus' => 'required',
            'id_carrera' => 'required',
            'id_encuesta' => 'required',
            'id_seccion' => 'required',
            'id_pregunta' => 'required',
            'id_opcion' => 'required',
            'id_asignatura' => 'required',
            'id_grupo' => 'required',
            'rb-semana' => 'required',
            'rb-año' => 'required',
            'tx-profesor' => 'required',
            'cb-entrega' => 'required',
            'tx-tema' => 'required',
            'cb-actividades' => 'required',
            'cb-actividadesextra' => 'required',
            'cb-actividadesef' => 'required',
            'cant-parciales' => 'required',
            'cant-labs' => 'required',
            'cant-proyectos' => 'required',
            'cant-tareas' => 'required',
            'cant-quices' => 'required',
            'cant-tallprac' => 'required',
            'cant-invest' => 'required',
            'cant-otros' => 'required',
            'rb-mat' => 'required',
            'rb-ri' => 'required',
            'rb-expest' => 'required',
            'rb-carta' => 'required',
            'rb-examenes' => 'required',
            'rb-cambio' => 'required',
            'rb-conval' => 'required',
            'rb-trabajograd' => 'required',
            'rb-otros' => 'required',
            'tramiteapoyo' => 'required',
            'rb-tmat' => 'required',
            'rb-tri' => 'required',
            'rb-texpest' => 'required',
            'rb-tcarta' => 'required',
            'rb-texamenes' => 'required',
            'rb-tcambio' => 'required',
            'rb-tconval' => 'required',
            'rb-ttrabajograd' => 'required',
            'rb-totros' => 'required',
            'tramitetiempo' => 'required',
            'semestre' => 'required'*/
        ];
    }
}
