<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicadores extends Model
{
    use HasFactory;

   // protected $indicador;
    protected $table = "indicadores";

    protected $fillable = [
        'nombreIndicador',
        'codigoIndicador',
        'unidadMedidaIndicador',
       
        //'fechaIndicador'
    ];





    }



