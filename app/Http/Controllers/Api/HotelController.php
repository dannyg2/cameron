<?php

namespace App\Http\Controllers\Api;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\NuevoHotelRequest;


class HotelController extends Controller
{
    /**
     * @param NuevoHotelRequest $nuevoHotelRequest
     * @return Response
     */
    public function create(NuevoHotelRequest $nuevoHotelRequest){
        $hotel = Hotel::create($nuevoHotelRequest->all());
        return response()->json([
            'status' => 'success',
            'message' => 'Hotel creado',
            'hotel' => $hotel
        ],Response::HTTP_OK);
    }

    public function list(){
        return response()->json([
            'status' => 'success',
            'message' => 'Hotel creado',
            'data' => Hotel::get()
        ],Response::HTTP_OK);
    }
}
