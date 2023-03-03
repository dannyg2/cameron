<?php

namespace App\Http\Controllers\Api;

use App\Models\Hotel;
use App\Models\Habitacion;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\NuevaHabitacionRequest;

class HabitacionController extends Controller
{
    /**
     * @param NuevaHabitacionRequest $nuevaHabitacionRequest
     * @return response
     */
    public function create(NuevaHabitacionRequest $nuevaHabitacionRequest){
        $hotel = Habitacion::create($nuevaHabitacionRequest->all());
        return response()->json([
            'status' => 'success',
            'message' => 'Habitacion creada',
            'hotel' => $hotel
        ],Response::HTTP_OK);
    }


    /**
     * @param Request $request
     */
    public function list($id,Request $request){
        $hotel = Hotel::find($id);
        
        return response()->json([
            'status' => 'success',
            'message' => 'Hotel creado',
            'data' => $hotel->habitaciones
        ],Response::HTTP_OK);
    }
}
