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
     * @OA\Post(
     *     path="/api/indicadores",
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
     *                 ),
     *                  @OA\Property(
     *                     property="valorIndicador",
     *                     description="valor del indicador",
     *                     type="integer"
     *                 ),
     *                  @OA\Property(
     *                     property="fechaIndicador",
     *                     description=" fecha del indicador",
     *                     type="string"
     *                 ),
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
        $indicador->valorIndicador = $request->valorIndicador;
        $indicador->fechaIndicador = $request->fechaIndicador;
        $indicador->save();
        $response = [
            'data'=>$indicador,
            'status'=>'success'
        ];
        return response()->json($response);
    }
}













