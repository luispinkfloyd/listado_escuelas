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
        //$superiores_caba = superiores_caba::orderBy('nombre')->paginate(8);
		
		$comunas = DB::table('superiores_cabas')
					->select('comuna')
					->groupBy('comuna')
					->orderByRaw('substring(comuna,8,10)::int asc')
					->get();
					
		$nombres = DB::table('superiores_cabas')
					->select('nombre')
					->groupBy('nombre')
					->orderBy('nombre')
					->get();
		
		return view('superiorcaba',['comunas' => $comunas, 'nombres' => $nombres]);
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
					->orderByRaw('substring(comuna,8,10)::int asc')
					->get();
		
		$nombres = DB::table('superiores_cabas')
					->select('nombre');
		
			
		if(isset($request->comuna) && $request->comuna != 'Todas') {
			
			$comuna_selected = $request->comuna;
			
			$superiores_caba = $superiores_caba->where('comuna',$request->comuna);
			
			$nombres = $nombres->where('comuna',$request->comuna);
			
		}elseif(isset($request->comuna) && $request->comuna === 'Todas'){
			
			$comuna_selected = 'Todas';
			
		}
		
		if(isset($request->sector) && $request->sector != 'Todos'){ 
			
			$sector_selected = $request->sector;
			
			$superiores_caba = $superiores_caba->where('sector',$request->sector);
			
			$nombres = $nombres->where('sector',$request->sector);
			
		}elseif(isset($request->sector) && $request->sector === 'Todos'){
			
			$sector_selected = 'Todos';
			
		}
		
		
		$nombres = $nombres->groupBy('nombre')->orderBy('nombre')->get();
		
		/*
		$superiores_caba = $superiores_caba->paginate(8);
		
		print_r($superiores_caba);
		exit;
		*/
	
		
		if(isset($request->busqueda) && $request->busqueda != ''){
			
			$busqueda = $request->busqueda;
			
			$superiores_caba = $superiores_caba->whereRaw("(f_limpiar_acentos(nombre)::text ilike f_limpiar_acentos('%".$request->busqueda."%'))");
															
		}
		
		$superiores_caba = $superiores_caba->paginate(5);
		
		return view('superiorcaba',['superiores_caba' => $superiores_caba, 'comunas' => $comunas, 'comuna_selected' => $comuna_selected, 'sector_selected' => $sector_selected, 'busqueda' => $busqueda, 'nombres' => $nombres ]);
		
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
