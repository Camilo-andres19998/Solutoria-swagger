<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Indicadores;
use Illuminate\Http\Request;

class ReportesController extends Controller
{
    public function index()
    {
        return view('reportes');
    }



    public function records(Request $request)
    {
        if ($request->ajax()) {

            if ($request->input('start_date') && $request->input('end_date')) {

                $start_date = Carbon::parse($request->input('start_date'));
                $end_date = Carbon::parse($request->input('end_date'));

                if ($end_date->greaterThan($start_date)) {
                    $indicadores = Indicadores::whereBetween('created_at', [$start_date, $end_date])->get();
                } else {
                    $indicadores = Indicadores::latest()->get();
                }
            } else {
                $indicadores = Indicadores::latest()->get();
            }

            return response()->json([
                'reportes' => $indicadores
            ]);
        } else {
            abort(403);
        }


    }


}
