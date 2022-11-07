<?php

namespace App\Http\Controllers;

use App\Models\Indicadores;
use Illuminate\Http\Request;

class IndicadorsController extends Controller
{
    protected $indicador;

    public function __construct(Indicadores $indicador){
        $this->indicador = $indicador;



    }


      /**
     * @OA\Get(
     *    path="/api/gets",
     *     tags={"Indicadores"},
     *     summary="All indicadores",
     *     description="Multiple status values can be provided with comma separated string",
     *     operationId="findPetsByStatus",
     *     @OA\Parameter(
     *         name="indicadores",
     *         in="query",
     *         description="All indicadores",
     *         required=true,
     *         explode=true,
     *         @OA\Schema(
     *             default="available",
     *             type="string",
     *             enum={"available", "pending", "sold"},
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid status value"
     *     ),
     *      security={
     *         {"bearer_token": {}}
     *     },
     * )
     */

    public function gets(){
        $indicador = Indicadores::all();
        return response()->json($indicador);
    }






/**
     * @OA\Post(
     *     path="/api/store",
     *     tags={"Indicadores"},
     *     summary="Updates or create Indicadores",
     *     operationId="store",
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input"
     *     ),
     *     security={
     *         {"bearer_token": {}}
     *     },
     *     @OA\RequestBody(
     *         description="Input data format",
     *         @OA\MediaType(
     *             mediaType="application/x-www-form-urlencoded",
     *             @OA\Schema(
     *                 type="object",
     *                 @OA\Property(
     *                     property="nombreIndicador",
     *                     description="Updated name of the pet",
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     property="codigoIndicador",
     *                     description="Enter product price",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="unidadMedidaIndicador",
     *                     description="Enter product quantity",
     *                     type="string"
     *                 )
     *             )
     *         )
     *     )
     * )
     */
    public function store(Request $request){
        $indicador = new Indicadores();
        $indicador->nombreIndicador = $request->nombreIndicador;
        $indicador->codigoIndicador = $request->codigoIndicador;
        $indicador->unidadMedidaIndicador = $request->unidadMedidaIndicador;
        $indicador->save();
        $response = [
            'data'=>$indicador,
            'status'=>'success'
        ];
        return response()->json($response);
    }
}











