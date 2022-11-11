<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Indicadores;


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



    }

