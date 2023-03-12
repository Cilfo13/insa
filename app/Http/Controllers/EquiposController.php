<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Equipo;
use Illuminate\Http\Request;

class EquiposController extends Controller
{
    public function showequipo($id){
        $equipo = Equipo::find($id);
        return view('ver_equipo')->with('equipo', $equipo);
    }
}
