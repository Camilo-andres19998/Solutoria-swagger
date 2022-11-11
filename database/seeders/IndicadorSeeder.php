<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Indicadores;

class IndicadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
                array('nombreIndicador' => 'indicador1','valorIndicador'=>100),
                array('nombreIndicador' => 'indicador2','valorIndicador'=>200),
                array('nombreIndicador' => 'indicador3','valorIndicador'=>300),
                array('nombreIndicador' => 'indicador4','valorIndicador'=>400),
                array('nombreIndicador' => 'indicador5','valorIndicador'=>500),
                array('nombreIndicador' => 'indicador6','valorIndicador'=>600),
        ];
        Indicadores::insert($data);
    }
}
