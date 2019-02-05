<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\superiores_conurbano;
use DB;

class SuperiorConurbanoController extends Controller
{
    
	public function __construct()
    {
        $this->middleware('auth');
    }
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		//$superiores_conurbano = superiores_conurbano::orderBy('nombre')->paginate(8);
		
		$partidos = DB::table('superiores_conurbanos')
					->select('partido')
					->groupBy('partido')
					->orderBy('partido')
					->get();
					
		$localidades = DB::table('superiores_conurbanos')
					->select('localidad')
					->groupBy('localidad')
					->orderBy('localidad')
					->get();
		
		return view('superiorconurbano',['partidos' => $partidos, 'localidades' => $localidades]);
    }
	
	public function search(Request $request)
	{
		
		
		$superiores_conurbano = superiores_conurbano::orderBy('nombre');
		
		$partido_selected = NULL;
		
		$sector_selected = NULL;
		
		$localidad_selected = NULL;
		
		$ambito_selected = NULL;
		
		$busqueda = NULL;
		
		$partidos = DB::table('superiores_conurbanos')
					->select('partido')
					->groupBy('partido')
					->orderBy('partido')
					->get();
					
		$localidades = DB::table('superiores_conurbanos')
					->select('localidad');
					
		
			
		  if(isset($request->partido) && $request->partido != 'Todos') {
			  
			  $partido_selected = $request->partido;
			  
			  $superiores_conurbano = $superiores_conurbano->where('partido',$request->partido);
			  
			  $localidades = $localidades->where('partido',$request->partido);
			  
		  }elseif(isset($request->partido) && $request->partido === 'Todos'){
			  $partido_selected = 'Todos';
		  }
		  
		  
		  $localidades = $localidades->groupBy('localidad')->orderBy('localidad')->get();
		  
		  if(isset($request->sector) && $request->sector != 'Todos'){ 
			  
			  $sector_selected = $request->sector;
			  
			  $superiores_conurbano = $superiores_conurbano->where('sector',$request->sector);
			  
		  }elseif(isset($request->sector) && $request->sector === 'Todos'){
			  $sector_selected = 'Todos';
		  }
		  
		  if(isset($request->localidad) && $request->localidad != 'Todas') {
			  
			  $localidad_selected = $request->localidad;
			  
			  $superiores_conurbano = $superiores_conurbano->where('localidad',$request->localidad);
			  
		  }elseif(isset($request->localidad) && $request->localidad === 'Todas') {
			  $localidad_selected = 'Todas';
		  }
		  
		  if(isset($request->ambito) && $request->ambito != 'Todos'){ 
			  
			  $ambito_selected = $request->ambito;
			  
			  $superiores_conurbano = $superiores_conurbano->where('ambito',$request->ambito);
			  
		  }elseif(isset($request->ambito) && $request->ambito === 'Todos'){ 
			
			  $ambito_selected = 'Todos';
			  
		  }
	  
		  if(isset($request->busqueda)){
			  
			  $busqueda = $request->busqueda;
			  
			  $superiores_conurbano = $superiores_conurbano->whereRaw("(f_limpiar_acentos(nombre)::text ilike f_limpiar_acentos('%".$request->busqueda."%') or f_limpiar_acentos(domicilio)::text ilike f_limpiar_acentos('%".$request->busqueda."%') or mail::text ilike '%".$request->busqueda."%' or telefono::text ilike '%".$request->busqueda."%' or cue::text ilike '%".$request->busqueda."%' or cp::text ilike '%".$request->busqueda."%' or codigo_localidad::text ilike '%".$request->busqueda."%')");
															  
		  }
		
		$superiores_conurbano = $superiores_conurbano->paginate(8);
		
		return view('superiorconurbano',['superiores_conurbano' => $superiores_conurbano, 'partidos' => $partidos, 'localidades' => $localidades, 'partido_selected' => $partido_selected, 'sector_selected' => $sector_selected, 'localidad_selected' => $localidad_selected, 'ambito_selected' => $ambito_selected,'busqueda' => $busqueda]);
		
		
	}
	

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
