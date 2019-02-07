<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\secundarios_caba;
use DB;

class SecundarioCabaController extends Controller
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
        //$secundarios_caba = secundarios_caba::orderBy('nombre')->paginate(8);
		
		$comunas = DB::table('secundarios_cabas')
					->select('comuna')
					->groupBy('comuna')
					->orderByRaw('substring(comuna,8,10)::int asc')
					->get();
					
		$nombres = DB::table('secundarios_cabas')
					->select('nombre')
					->groupBy('nombre')
					->orderBy('nombre')
					->get();
		
		$cps = DB::table('secundarios_cabas')
					->select('cp')
					->groupBy('cp')
					->orderBy('cp')
					->get();
		
		$domicilios = DB::table('secundarios_cabas')
					->select('domicilio')
					->groupBy('domicilio')
					->orderBy('domicilio')
					->get();
					
		$mails = DB::table('secundarios_cabas')
					->select('mail')
					->groupBy('mail')
					->orderBy('mail')
					->get();
		
		return view('secundariocaba',['comunas' => $comunas, 'domicilios' => $domicilios , 'nombres' => $nombres , 'cps' => $cps , 'mails' => $mails]);
    }

    
	public function search(Request $request)
	{
		
		$secundarios_caba = secundarios_caba::orderBy('nombre');
		
		
		$comuna_selected = NULL;
		
		$sector_selected = NULL;
		
		$busqueda = NULL;
		
		$comunas = DB::table('secundarios_cabas')
					->select('comuna')
					->groupBy('comuna')
					->orderBy('comuna')
					->get();
					
		$nombres = DB::table('secundarios_cabas')
					->select('nombre')
					->groupBy('nombre')
					->orderBy('nombre')
					->get();
		
		$cps = DB::table('secundarios_cabas')
					->select('cp')
					->groupBy('cp')
					->orderBy('cp')
					->get();
		
		$domicilios = DB::table('secundarios_cabas')
					->select('domicilio')
					->groupBy('domicilio')
					->orderBy('domicilio')
					->get();
					
		$mails = DB::table('secundarios_cabas')
					->select('mail')
					->groupBy('mail')
					->orderBy('mail')
					->get();
		
			
		if(isset($request->comuna) && $request->comuna != 'Todas') {
			
			$comuna_selected = $request->comuna;
			
			$secundarios_caba = $secundarios_caba->where('comuna',$request->comuna);
			
		}elseif(isset($request->comuna) && $request->comuna === 'Todas'){
			
			$comuna_selected = 'Todas';
			
		}
		
		if(isset($request->sector) && $request->sector != 'Todos'){ 
			
			$sector_selected = $request->sector;
			
			$secundarios_caba = $secundarios_caba->where('sector',$request->sector);
			
		}elseif(isset($request->sector) && $request->sector === 'Todos'){
			
			$sector_selected = 'Todos';
			
		}
		
		
		
		/*
		$secundarios_caba = $secundarios_caba->paginate(8);
		
		print_r($secundarios_caba);
		exit;
		*/
	
		
		if(isset($request->busqueda) && $request->busqueda != ''){
			
			$busqueda = $request->busqueda;
			
			$secundarios_caba = $secundarios_caba->whereRaw("(f_limpiar_acentos(nombre)::text ilike f_limpiar_acentos('%".$request->busqueda."%') or f_limpiar_acentos(domicilio)::text ilike f_limpiar_acentos('%".$request->busqueda."%') or mail::text ilike '%".$request->busqueda."%' or telefono::text ilike '%".$request->busqueda."%' or cue::text ilike '%".$request->busqueda."%' or cp::text ilike '%".$request->busqueda."%' or codigo_localidad::text ilike '%".$request->busqueda."%')");
															
		}
		
		$secundarios_caba = $secundarios_caba->paginate(5);
		
		return view('secundariocaba',['secundarios_caba' => $secundarios_caba, 'comunas' => $comunas, 'comuna_selected' => $comuna_selected, 'sector_selected' => $sector_selected, 'busqueda' => $busqueda, 'domicilios' => $domicilios , 'nombres' => $nombres , 'cps' => $cps , 'mails' => $mails]);
		
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
