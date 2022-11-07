<?php

namespace App\Http\Controllers;

use App\Models\Indicadores;
use Illuminate\Http\Request;

class IndicadorsController extends Controller
{







    /**
     * @OA\Get(
     *     path="/api/indicadores",
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
    public function Indicadors(){
        $model = Indicadores::all();
        return response()->json($model);
    }



     /**
     * @OA\Post(
     *     path="/api/storeindicadores",
     *     tags={"Indicadores"},
     *     summary="Updates or create Indicadores",
     *     operationId="storeIndicadores",
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
     *                     description="Updated name of the indicador",
     *                     type="string",
     *                 ),
     *                   @OA\Property(
     *                     property="codigoIndicador",
     *                     description="Updated name of the indicador",
     *                     type="string",
     *                 ),
     *                     @OA\Property(
     *                     property="unidadMedidaIndicador",
     *                     description="Updated name of the indicador",
     *                     type="string",
     *                 ),
     *
     *
     *                 @OA\Property(
     *                     property="valorIndicador",
     *                     description="Enter indicador value",
     *                     type="integer"
     *                 ),
     *                 @OA\Property(
     *                     property="fecha",
     *                     description="Enter indicador date",
     *                     type="string"
     *                 )
     *             )
     *         )
     *     )
     * )
     */



    public function storeIndicadores(Request $request){
        $model = new Indicadores();
        $model->nombreIndicador = $request->nombreIndicador;
        $model->codigoIndicador = $request->codigoIndicador;
        $model->unidadMedidaIndicador = $request->unidadMedidaIndicador;
        $model->valorIndicador = $request->valorIndicador;
        $model->fecha = $request->fecha;
        $model->save();
        $response = [
            'data'=>$model,
            'status'=>'success'
        ];
        return response()->json($response);
    }
}

