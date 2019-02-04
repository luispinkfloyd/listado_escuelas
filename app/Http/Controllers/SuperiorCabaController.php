<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\superiores_caba;
use DB;

class SuperiorCabaController extends Controller
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
        $superiores_caba = superiores_caba::orderBy('nombre')->paginate(8);
		
		$comunas = DB::table('superiores_cabas')
					->select('comuna')
					->groupBy('comuna')
					->orderBy('comuna')
					->get();
		
		return view('superiorcaba',['superiores_caba' => $superiores_caba, 'comunas' => $comunas]);
    }

    
	
	public function search(Request $request)
	{
		
		
		$superiores_caba = superiores_caba::orderBy('nombre');
		
		$comuna_selected = NULL;
		
		$sector_selected = NULL;
		
		$busqueda = NULL;
		
		$comunas = DB::table('superiores_cabas')
					->select('comuna')
					->groupBy('comuna')
					->orderBy('comuna')
					->get();
		
			
		if(isset($request->comuna) && $request->comuna != 'Todas') {
			
			$comuna_selected = $request->comuna;
			
			$superiores_caba = $superiores_caba->where('comuna',$request->comuna);
			
		}
		
		if(isset($request->sector) && $request->sector != 'Todos'){ 
			
			$sector_selected = $request->sector;
			
			$superiores_caba = $superiores_caba->where('sector',$request->sector);
			
		}
		
		/*
		$superiores_caba = $superiores_caba->paginate(8);
		
		print_r($superiores_caba);
		exit;
		*/
	
		
		if(isset($request->busqueda)){
			
			$busqueda = $request->busqueda;
			
			$superiores_caba = $superiores_caba->whereRaw("(f_limpiar_acentos(nombre)::text ilike f_limpiar_acentos('%".$request->busqueda."%') or f_limpiar_acentos(domicilio)::text ilike f_limpiar_acentos('%".$request->busqueda."%') or mail::text ilike '%".$request->busqueda."%' or telefono::text ilike '%".$request->busqueda."%' or cue::text ilike '%".$request->busqueda."%' or cp::text ilike '%".$request->busqueda."%' or codigo_localidad::text ilike '%".$request->busqueda."%')");
															
		}
		
		$superiores_caba = $superiores_caba->paginate(8);
		
		return view('superiorcaba',['superiores_caba' => $superiores_caba, 'comunas' => $comunas, 'comuna_selected' => $comuna_selected, 'sector_selected' => $sector_selected, 'busqueda' => $busqueda]);
		
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
