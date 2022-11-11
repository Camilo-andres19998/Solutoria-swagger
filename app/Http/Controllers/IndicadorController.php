<?php

namespace App\Http\Controllers;

use App\Models\Indicadores;
use Illuminate\Http\Request;
use DataTables;

class IndicadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $indicadores = Indicadores::latest()->get();

        if ($request->ajax()) {
            $data = Indicadores::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Editar" class="edit btn btn-primary btn editIndicador">Editar</a>';

                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Eliminar" class="btn btn-danger btn deleteIndicador">Eliminar</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('indicador',compact('indicadores'));
    }

   /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Indicadores::updateOrCreate(['id' => $request->indicador_id],
                ['nombreIndicador' => $request->nombreIndicador, 'codigoIndicador' => $request->codigoIndicador, 'unidadMedidaIndicador' => $request->unidadMedidaIndicador, 'valorIndicador' => $request->valorIndicador, 'fechaIndicador' => $request->fechaIndicador]);

        return response()->json(['success'=>'Book saved successfully.']);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Indicadores  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $indicador = Indicadores::find($id);
        return response()->json($indicador);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Indicadores  $book
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        Indicadores::find($id)->delete();

        return response()->json(['success'=>'Eliminar indicador.']);
    }
}
