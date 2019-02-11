<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\secundarios_caba;
use DB;
use Maatwebsite\Excel\Facades\Excel;

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
		
		return view('secundariocaba',['comunas' => $comunas, 'nombres' => $nombres ]);
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
					->orderByRaw('substring(comuna,8,10)::int asc')
					->get();
					
		$nombres = DB::table('secundarios_cabas')
					->select('nombre');
					
		
			
		if(isset($request->comuna) && $request->comuna != 'Todas') {
			
			$comuna_selected = $request->comuna;
			
			$secundarios_caba = $secundarios_caba->where('comuna',$request->comuna);
			
			$nombres = $nombres->where('comuna',$request->comuna);
			
		}elseif(isset($request->comuna) && $request->comuna === 'Todas'){
			
			$comuna_selected = 'Todas';
			
		}
		
		if(isset($request->sector) && $request->sector != 'Todos'){ 
			
			$sector_selected = $request->sector;
			
			$secundarios_caba = $secundarios_caba->where('sector',$request->sector);
			
			$nombres = $nombres->where('sector',$request->sector);
			
		}elseif(isset($request->sector) && $request->sector === 'Todos'){
			
			$sector_selected = 'Todos';
			
		}
		
		
		
		/*
		$secundarios_caba = $secundarios_caba->paginate(8);
		
		print_r($secundarios_caba);
		exit;
		*/
		
		$nombres = $nombres->groupBy('nombre')->orderBy('nombre')->get();
		
		
		
		if(isset($request->busqueda) && $request->busqueda != ''){
			
			$busqueda = $request->busqueda;
			
			$secundarios_caba = $secundarios_caba->whereRaw("(f_limpiar_acentos(nombre)::text ilike f_limpiar_acentos('%".$request->busqueda."%'))");
															
		}
		
		$secundarios_caba = $secundarios_caba->paginate(5);
		
		return view('secundariocaba',['secundarios_caba' => $secundarios_caba, 'comunas' => $comunas, 'comuna_selected' => $comuna_selected, 'sector_selected' => $sector_selected, 'busqueda' => $busqueda, 'nombres' => $nombres]);
		
	}
	
	
	
	public function export_excel(Request $request){
		
		$secundarios_caba = secundarios_caba::orderBy('nombre');
		
			
		if(isset($request->comuna_excel) && $request->comuna_excel != 'Todas') {
			
			$secundarios_caba = $secundarios_caba->where('comuna',$request->comuna_excel);
			
		}
		
		if(isset($request->sector_excel) && $request->sector != 'Todos'){
			
			$secundarios_caba = $secundarios_caba->where('sector',$request->sector_excel);
			
		}
	
		
		if(isset($request->busqueda_excel) && $request->busqueda_excel != ''){
			
			$secundarios_caba = $secundarios_caba->whereRaw("(f_limpiar_acentos(nombre)::text ilike f_limpiar_acentos('%".$request->busqueda_excel."%'))");
															
		}
		
		$secundarios_caba = $secundarios_caba->get();
		
		$date = date('dmYGis');
		Excel::create("reporte_caba_secundarios_".$date, function ($excel) use ($secundarios_caba) {
			$excel->setTitle("Reporte Escuelas Secundarios CABA");
			$excel->sheet("Escuelas Secundarios CABA", function ($sheet) use ($secundarios_caba) {
				$sheet->loadView('exports.caba.secundario.reporte_excel_caba_secundario')->with('secundarios_caba', $secundarios_caba);
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
