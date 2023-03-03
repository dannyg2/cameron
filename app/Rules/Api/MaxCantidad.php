<?php

namespace App\Rules\Api;

use App\Models\Hotel;
use Illuminate\Contracts\Validation\Rule;

class MaxCantidad implements Rule
{

    /**
     * @var $params
     */
    public $params;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($params)
    {
        $this->params = $params;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $hotel = Hotel::find($this->params['hotel_id']);
        $cantidadHabitaciones = $hotel->habitaciones->sum('cantidad');
        if($cantidadHabitaciones < ($cantidadHabitaciones + (int)$value)){
            return false;
        }
        return  true;
        
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Excede la cantidad permitida para el hotel.';
    }
}
