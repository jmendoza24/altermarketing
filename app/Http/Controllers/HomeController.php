<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estados;
use App\Models\Medios;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $estados = estados::orderby('estado')->get();
        $medios =  Medios::where('activo',1)->orderby('nombre_medio')->get();

        return view('home',compact('estados','medios'));
    }

     function municipios(Request $request){
        $catalogos = new Estados; 
        $catalogos->id_estado = $request->id_estado;

        $municipios = $catalogos->municipios($catalogos);
        return $municipios; 
    }
}
