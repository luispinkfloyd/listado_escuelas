<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\superiores_caba;
use DB;

class SuperiorCabaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $superiores_caba = superiores_caba::orderBy('nombre')->paginate(8);
		
		$comunas = DB::table('secundarios_cabas')
					->select('comuna')
					->groupBy('comuna')
					->orderByRaw('substring(comuna,8,10)::int asc')
					->get();
		
		return view('superiorcaba', ['superiores_caba' => $superiores_caba, 'comunas' => $comunas]);
    }

    
	
	public function search(Request $request)
	{
		
		
		$comuna_selected = NULL;
		
		$sector_selected = NULL;
		
		$busqueda = NULL;
		
		
		if(isset($request->busqueda)){
			
			$busqueda = $request->busqueda;
			
			$superiores_caba = DB::table('superiores_cabas')->whereRaw("nombre::text ilike '%".$request->busqueda."%' or domicilio::text ilike '%".$request->busqueda."%' or mail::text ilike '%".$request->busqueda."%' or telefono::text ilike '%".$request->busqueda."%' or cue::text ilike '%".$request->busqueda."%' or cp::text ilike '%".$request->busqueda."%' or codigo_localidad::text ilike '%".$request->busqueda."%'")->paginate(8);
															
			if(isset($request->comuna) && !isset($request->sector)) {
			
				$comuna_selected = $request->comuna;
				
				$superiores_caba = DB::table('superiores_cabas')->whereRaw("comuna = '".$request->comuna."' and (nombre::text ilike '%".$request->busqueda."%' or domicilio::text ilike '%".$request->busqueda."%' or mail::text ilike '%".$request->busqueda."%' or telefono::text ilike '%".$request->busqueda."%' or cue::text ilike '%".$request->busqueda."%' or cp::text ilike '%".$request->busqueda."%' or codigo_localidad::text ilike '%".$request->busqueda."%')")->paginate(8);
				
			}
			
			if(isset($request->sector)){ 
				
				$sector_selected = $request->sector;
				
				$superiores_caba = DB::table('superiores_cabas')->whereRaw("sector = '".$request->sector."' and (nombre::text ilike '%".$request->busqueda."%' or domicilio::text ilike '%".$request->busqueda."%' or mail::text ilike '%".$request->busqueda."%' or telefono::text ilike '%".$request->busqueda."%' or cue::text ilike '%".$request->busqueda."%' or cp::text ilike '%".$request->busqueda."%' or codigo_localidad::text ilike '%".$request->busqueda."%')")->paginate(8);
			
				if(isset($request->comuna)){
					
					$comuna_selected = $request->comuna;
					
					$superiores_caba = DB::table('superiores_cabas')->whereRaw("sector = '".$request->sector."' and comuna = '".$request->comuna."' and (nombre::text ilike '%".$request->busqueda."%' or domicilio::text ilike '%".$request->busqueda."%' or mail::text ilike '%".$request->busqueda."%' or telefono::text ilike '%".$request->busqueda."%' or cue::text ilike '%".$request->busqueda."%' or cp::text ilike '%".$request->busqueda."%' or codigo_localidad::text ilike '%".$request->busqueda."%')")->paginate(8);
				
				}
				
			}
			
		}else{
			
			if(isset($request->comuna) && !isset($request->sector)) {
				
				$comuna_selected = $request->comuna;
				
				$superiores_caba = superiores_caba::Where('comuna',$request->comuna)->paginate(8);
				
			}
			
			if(isset($request->sector)){ 
				
				$sector_selected = $request->sector;
				
				$superiores_caba = superiores_caba::Where('sector',$request->sector)->paginate(8);
			
				if(isset($request->comuna)){
					
					$comuna_selected = $request->comuna;
					
					$superiores_caba = superiores_caba::Where('sector',$request->sector)->where('comuna',$request->comuna)->paginate(8);
				}
				
			}
		}
		
		$comunas = DB::table('superiores_cabas')
					->select('comuna')
					->groupBy('comuna')
					->orderByRaw('substring(comuna,8,10)::int asc')
					->get();
		
		
		return view('superiorcaba',['superiores_caba' => $superiores_caba, 'comunas' => $comunas, 'comuna_selected' => $comuna_selected, 'sector_selected' => $sector_selected,'busqueda' => $busqueda]);
		
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
