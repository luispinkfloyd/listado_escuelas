<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\secundarios_conurbano;
use DB;
use Maatwebsite\Excel\Facades\Excel;

class SecundarioConurbanoController extends Controller
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
        //$secundarios_conurbano = secundarios_conurbano::orderBy('nombre')->paginate(8);
		
		$partidos = DB::table('secundarios_conurbanos')
					->select('partido')
					->groupBy('partido')
					->orderBy('partido')
					->get();
					
		$localidades = DB::table('secundarios_conurbanos')
					->select('localidad')
					->groupBy('localidad')
					->orderBy('localidad')
					->get();
					
		$nombres = DB::table('secundarios_conurbanos')
					->select('nombre')
					->groupBy('nombre')
					->orderBy('nombre')
					->get();		
					
		
		return view('secundarioconurbano',['partidos' => $partidos, 'localidades' => $localidades , 'nombres' => $nombres]);
    }

    
	public function search(Request $request)
	{
		
		
		$secundarios_conurbano = secundarios_conurbano::orderBy('nombre');
		
		$partido_selected = NULL;
		
		$sector_selected = NULL;
		
		$localidad_selected = NULL;
		
		$ambito_selected = NULL;
		
		$busqueda = NULL;
		
		$partidos = DB::table('secundarios_conurbanos')
					->select('partido')
					->groupBy('partido')
					->orderBy('partido')
					->get();
					
		$nombres = DB::table('secundarios_conurbanos')
					->select('nombre');	
					
		$localidades = DB::table('secundarios_conurbanos')->select('localidad');
					
		
			
		if(isset($request->partido) && $request->partido != 'Todos') {
			
			$partido_selected = $request->partido;
			
			$secundarios_conurbano = $secundarios_conurbano->where('partido',$request->partido);
			
			$localidades = $localidades->where('partido',$request->partido);
			
			$nombres = $nombres->where('partido',$request->partido);
			
		}elseif(isset($request->partido) && $request->partido === 'Todos'){
			$partido_selected = 'Todos';
		}
		
		
		$localidades = $localidades->groupBy('localidad')->orderBy('localidad')->get();
		
		
		if(isset($request->sector) && $request->sector != 'Todos'){ 
			
			$sector_selected = $request->sector;
			
			$secundarios_conurbano = $secundarios_conurbano->where('sector',$request->sector);
			
			$nombres = $nombres->where('sector',$request->sector);
			
		}elseif(isset($request->sector) && $request->sector === 'Todos'){
			$sector_selected = 'Todos';
		}
		
		if(isset($request->localidad) && $request->localidad != 'Todas') {
			
			$localidad_selected = $request->localidad;
			
			$secundarios_conurbano = $secundarios_conurbano->where('localidad',$request->localidad);
			
			$nombres = $nombres->where('localidad',$request->localidad);
			
		}elseif(isset($request->localidad) && $request->localidad === 'Todas') {
			$localidad_selected = 'Todas';
		}
		
		if(isset($request->ambito) && $request->ambito != 'Todos'){ 
			
			$ambito_selected = $request->ambito;
			
			$secundarios_conurbano = $secundarios_conurbano->where('ambito',$request->ambito);
			
			$nombres = $nombres->where('ambito',$request->ambito);
			
		}elseif(isset($request->ambito) && $request->ambito === 'Todos'){ 
			
			$ambito_selected = 'Todos';
			
		}
	
		$nombres = $nombres->groupBy('nombre')->orderBy('nombre')->get();
		
		if(isset($request->busqueda) && $request->busqueda != ''){
			
			$busqueda = $request->busqueda;
			
			$secundarios_conurbano = $secundarios_conurbano->whereRaw("(f_limpiar_acentos(nombre)::text ilike f_limpiar_acentos('%".$request->busqueda."%'))");
															
		}
		
		$secundarios_conurbano = $secundarios_conurbano->paginate(5);
		
		return view('secundarioconurbano',['secundarios_conurbano' => $secundarios_conurbano, 'partidos' => $partidos, 'localidades' => $localidades, 'partido_selected' => $partido_selected, 'sector_selected' => $sector_selected, 'localidad_selected' => $localidad_selected, 'ambito_selected' => $ambito_selected,'busqueda' => $busqueda, 'nombres' => $nombres ]);
		
	}
	
	
	public function export_excel(Request $request){
		
		$secundarios_conurbano = secundarios_conurbano::orderBy('nombre');
		
			
		if(isset($request->partido_excel) && $request->partido_excel != 'Todos') {
			
			$secundarios_conurbano = $secundarios_conurbano->where('partido',$request->partido_excel);
			
		}
		
		if(isset($request->localidad_excel) && $request->localidad_excel != 'Todas') {
			
			$secundarios_conurbano = $secundarios_conurbano->where('localidad',$request->localidad_excel);
			
		}
		
		if(isset($request->sector_excel) && $request->sector_excel != 'Todos'){
			
			$secundarios_conurbano = $secundarios_conurbano->where('sector',$request->sector_excel);
			
		}
	
		
		if(isset($request->busqueda_excel) && $request->busqueda_excel != ''){
			
			$secundarios_conurbano = $secundarios_conurbano->whereRaw("(f_limpiar_acentos(nombre)::text ilike f_limpiar_acentos('%".$request->busqueda_excel."%'))");
															
		}
		
		$secundarios_conurbano = $secundarios_conurbano->get();
		
		$date = date('dmYGis');
		Excel::create("reporte_conurbano_secundarios_".$date, function ($excel) use ($secundarios_conurbano) {
			$excel->setTitle("Reporte Escuelas Secundarios Conurbano");
			$excel->sheet("Escuelas Secundarios Conurbano", function ($sheet) use ($secundarios_conurbano) {
				$sheet->loadView('exports.conurbano.secundario.reporte_excel_conurbano_secundario')->with('secundarios_conurbano', $secundarios_conurbano);
			})->download('xls');
			return back();
		});
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
