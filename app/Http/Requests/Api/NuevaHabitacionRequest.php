<?php

namespace App\Http\Requests\Api;

use App\Models\Habitacion;
use App\Rules\Api\MaxCantidad;
use Illuminate\Validation\Rule;
use App\Rules\Api\ValidatTipoAcomodacion;
use Illuminate\Foundation\Http\FormRequest;

class NuevaHabitacionRequest extends FormRequest
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
            "cantidad"=>["required","integer",new MaxCantidad($this->all())],
            "tipo_habitacion"=>["required",Rule::in([Habitacion::TYPE_HABITACION_ESTANDAR,Habitacion::TYPE_HABITACION_JUNIOR,Habitacion::TYPE_HABITACION_SUIT])],
            "tipo_acomodacion"=>["required",new ValidatTipoAcomodacion($this->all())],
        ];
    }
}
