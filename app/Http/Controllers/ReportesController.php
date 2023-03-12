<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Equipo;
use Illuminate\Http\Request;

class ReportesController extends Controller
{
    public function showreportpresupuesto(){
        $equipos = Equipo::where('servicio_activo', true)->get();
        //dd($equipos);
        return view('reportes_presupuesto')->with('equipos', $equipos);
    }
    public function showreportaprobacion(){
        $equipos = Equipo::where('servicio_activo', true)->get();
        //dd($equipos);
        return view('reportes_aprobacion')->with('equipos', $equipos);
    }
}
