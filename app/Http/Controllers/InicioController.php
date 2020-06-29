<?php

namespace App\Http\Controllers;

use App\Vacante;
use App\Ubicacion;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {   
        $vacantes = Vacante::Latest()->where('activa',1)->limit(10)->get();
        $ubicaciones = Ubicacion::all();

        return view('inicio.index',compact('vacantes','ubicaciones'));
    }
}
