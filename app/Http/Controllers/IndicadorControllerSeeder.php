<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Indicadores;
use Illuminate\Http\Request;


class IndicadorControllerSeeder extends Controller
{
    public function index(){

        $indicadores = Indicadores::all();
        $todos = [];
        foreach($indicadores as $indicador){
            $todos[] = ['name' => $indicador['nombreIndicador'],'y' => floatval ($indicador['valorIndicador'])];

        }
        return view("graficos1", ["data" =>json_encode($todos)]);
    }




    public function records(Request $request)

    {
        if($request->ajax()){
            if ($request->input('start_date') && $request->input('end_date')) {

                $start_date = Carbon::parse($request->input('start_date'));
                $end_date = Carbon::parse($request->input('end_date'));

                if ($end_date->greaterThan($start_date)){
                    $indicadores = Indicadores::whereBetween('created_at', [$start_date, $end_date])->get();
                }else{
                    //$indicadores = Indicadores::lates
                }

            }
        }

    }


    }

