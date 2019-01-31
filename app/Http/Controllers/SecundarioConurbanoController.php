<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\secundarios_conurbano;
use DB;

class SecundarioConurbanoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $secundarios_conurbano = secundarios_conurbano::orderBy('nombre')->paginate(8);
		
		$partidos = DB::table('secundarios_conurbanos')
					->select('partido')
					->groupBy('partido')
					->orderBy('partido')
					->get();
		
		return view('secundarioconurbano',['secundarios_conurbano' => $secundarios_conurbano, 'partidos' => $partidos]);
    }

    
	public function search(Request $request)
	{
		
		
		$partido_selected = NULL;
		
		$sector_selected = NULL;
		
		$busqueda = NULL;
		
		
		if(isset($request->busqueda)){
			
			$busqueda = $request->busqueda;
			
			$secundarios_conurbano = DB::table('secundarios_conurbanos')->whereRaw("nombre::text ilike '%".$request->busqueda."%' or domicilio::text ilike '%".$request->busqueda."%' or mail::text ilike '%".$request->busqueda."%' or telefono::text ilike '%".$request->busqueda."%' or cue::text ilike '%".$request->busqueda."%' or cp::text ilike '%".$request->busqueda."%' or codigo_localidad::text ilike '%".$request->busqueda."%'")->paginate(8);
															
			if(isset($request->partido) && !isset($request->sector)) {
			
				$partido_selected = $request->partido;
				
				$secundarios_conurbano = DB::table('secundarios_conurbanos')->whereRaw("partido = '".$request->partido."' and (nombre::text ilike '%".$request->busqueda."%' or domicilio::text ilike '%".$request->busqueda."%' or mail::text ilike '%".$request->busqueda."%' or telefono::text ilike '%".$request->busqueda."%' or cue::text ilike '%".$request->busqueda."%' or cp::text ilike '%".$request->busqueda."%' or codigo_localidad::text ilike '%".$request->busqueda."%')")->paginate(8);
				
			}
			
			if(isset($request->sector) && $request->sector != 'Todos'){ 
				
				$sector_selected = $request->sector;
				
				$secundarios_conurbano = DB::table('secundarios_conurbanos')->whereRaw("sector = '".$request->sector."' and (nombre::text ilike '%".$request->busqueda."%' or domicilio::text ilike '%".$request->busqueda."%' or mail::text ilike '%".$request->busqueda."%' or telefono::text ilike '%".$request->busqueda."%' or cue::text ilike '%".$request->busqueda."%' or cp::text ilike '%".$request->busqueda."%' or codigo_localidad::text ilike '%".$request->busqueda."%')")->paginate(8);
			
				if(isset($request->partido)){
					
					$partido_selected = $request->partido;
					
					$secundarios_conurbano = DB::table('secundarios_conurbanos')->whereRaw("sector = '".$request->sector."' and partido = '".$request->partido."' and (nombre::text ilike '%".$request->busqueda."%' or domicilio::text ilike '%".$request->busqueda."%' or mail::text ilike '%".$request->busqueda."%' or telefono::text ilike '%".$request->busqueda."%' or cue::text ilike '%".$request->busqueda."%' or cp::text ilike '%".$request->busqueda."%' or codigo_localidad::text ilike '%".$request->busqueda."%')")->paginate(8);
				
				}
				
			}
			
		}else{
			
			if(isset($request->partido) && !isset($request->sector)) {
				
				$partido_selected = $request->partido;
				
				$secundarios_conurbano = secundarios_conurbano::Where('partido',$request->partido)->paginate(8);
				
			}
			
			if(isset($request->sector) && $request->sector != 'Todos'){ 
				
				$sector_selected = $request->sector;
				
				$secundarios_conurbano = secundarios_conurbano::Where('sector',$request->sector)->paginate(8);
			
				if(isset($request->partido)){
					
					$partido_selected = $request->partido;
					
					$secundarios_conurbano = secundarios_conurbano::Where('sector',$request->sector)->where('partido',$request->partido)->paginate(8);
				}
				
			}
		}
		
		$partidos = DB::table('secundarios_conurbanos')
					->select('partido')
					->groupBy('partido')
					->orderBy('partido')
					->get();
		
		
		return view('secundarioconurbano',['secundarios_conurbano' => $secundarios_conurbano, 'partidos' => $partidos, 'partido_selected' => $partido_selected, 'sector_selected' => $sector_selected,'busqueda' => $busqueda]);
		
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
