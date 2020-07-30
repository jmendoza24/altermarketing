<?php

namespace App\Http\Controllers;
use App\Moldels\Estados;
use App\Http\Requests\CreatecatalogosRequest;
use App\Http\Requests\UpdatecatalogosRequest;
use App\Repositories\catalogosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use View;
use DB;

class catalogosController extends AppBaseController
{
    /** @var  catalogosRepository */
    private $catalogosRepository;

    public function __construct(catalogosRepository $catalogosRepo)
    {
        $this->catalogosRepository = $catalogosRepo;
    }

    /**
     * Display a listing of the catalogos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request){
        
        
    }

    function get_municipios(Request $request){
        $catalogos = new Estados; 
        $catalogos->id_estado = $request->id_estado;

        $municipios = $catalogos->get_municipios($catalogos);
        return $municipios; 
    }
    /**
    function opciones_catalogo(Request $request){
        $fabricantes = Fabricantes::orderby('fabricante')->get();
        if($request->catalogo ==1){
            if($request->tipo==1){
                $catalogos = array('id'=>0,
                                   'fabricante'=>$request->fabricante,
                                   'catalogo'=>'');
                $catalogos = (object)$catalogos;
            }else if($request->tipo==2){
                $catalogos = catalogos::where('id',$request->id)->get();
                $catalogos = $catalogos[0];
            }
            $options =  view('catalogos.create',compact('fabricantes','catalogos'))->render();
        }


        return json_encode($options);
    }

    function guarda_catalogo(Request $request){
        if($request->id_catalogo==1){
            $existe = catalogos::where('id',$request->id)->count();
            if($existe>0){
                catalogos::where('id',$request->id)
                        ->update(['fabricante'=>$request->fabricante,
                                  'catalogo'=>$request->catalogo]);
            }else{
                catalogos::insert(['fabricante'=>$request->fabricante,
                                  'catalogo'=>$request->catalogo]);
            }
            
            $catalogos = new catalogos;
            $catalogos = $catalogos->lista_catalogo($request);
            $options = view('catalogos.table',compact('catalogos'))->render();

        }

        return $options;
    }

    function elimina_catalogo(Request $request){ 
        if($request->catalogo==1){
            catalogos::where('id',$request->id)->delete();
            $catalogos = new catalogos;
            $catalogos = $catalogos->lista_catalogo($request);
            $options = view('catalogos.table',compact('catalogos'))->render();
        }


        return json_encode($options);
    }
*/
   
}
