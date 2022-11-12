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
        return view("graficos", ["data" =>json_encode($todos)]);
    }



    
}

