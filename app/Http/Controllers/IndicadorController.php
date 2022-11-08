<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use DataTables;


class IndicadorController extends Controller
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request){

        if($request->ajax()){
            $indicadores = DB::select('CALL spsel_indicador()');
            return DataTables::of($indicadores)
              ->addColumn('action', function($indicadores){
                  $acciones = '<a href="" class="btn btn-info btn-sm"> Editar </a>';
                  $acciones .= '&nbsp;<button type="button" name="delete" id="" class="btn btn-danger btn-sm"> Eliminar </button>';
                  return $acciones;
              })
              ->rawColumns(['action'])
              ->make(true);
        }


        return view('indicador.index');

    }


}


