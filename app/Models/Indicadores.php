<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicadores extends Model
{
    //use HasFactory;

   // protected $indicador;
    //protected $table = "indicadores";
    protected $fillable = [
          'nombreIndicador','codigoIndicador','unidadMedidaIndicador','valorIndicador','fechaIndicador'
    ];

    public $timestamps = false;
    /**
     * @param array $attributes
     * @return Indicadores
     */
    public function createTodo(array $attributes){
        $indicador = new self();
        $indicador->nombreIndicador = $attributes["nombreIndicador"];
        $indicador->codigoIndicador = $attributes["codigoIndicador"];
        $indicador->unidadMedidaIndicador = $attributes["unidadMedidaIndicador"];
        $indicador->valorIndicador = $attributes["valorIndicador"];
        $indicador->fechaIndicador = $attributes["fechaIndicador"];
        $indicador->save();
        return $indicador;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getTodo(int $id){
        $indicador = $this->where("id",$id)->first();
        return $indicador;
    }

    /**
     * @return Indicadores[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getsTodo(){
        $indicadores = $this::all();
        return $indicadores;
    }

    /**
     * @param int $id
     * @param array $attributes
     * @return mixed
     */





    }




