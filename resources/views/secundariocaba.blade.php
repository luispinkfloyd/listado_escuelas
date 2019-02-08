@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="css/awesomplete.css" />
<style>
.awesomplete{
	min-width:450px;
	max-width:450px;
}
@media screen and (max-width: 768px){
	.awesomplete{
		min-width:250px;
		max-width:250px;
	}
}
</style>
@endsection

@section('content')

<?php
$collapse = 'collapse';
if(isset($comuna_selected) || isset($ambito_selected) || isset($sector_selected) || isset($localidad_selected)) $collapse = '';
?>
<form action="{{ route('busqueda_secundarios_caba') }}" method="get" autocomplete="off">
<div class="container jumbotron" style="background-color:#283148;padding:10px 0px 0px 0px">
	<div class="row">
		<div class="col-sm-auto">
			<div class="container" style="color:#FFFFFF;">
          		<h1 class="display-5">Escuelas Secundarias <small>CABA</small></h1>
            	<p class="lead font-weight-bold" style="padding-top:5px">Jurisdicción: <small class="font-weight-normal">Ciudad de Buenos Aires</small></p>
                <div class="row">
                	<div class="col-sm-auto">
                		<p class="lead font-weight-bold" style="padding-top:5px">Ámbito: <small class="font-weight-normal">Urbano</small></p>
                    </div>
                    <div class="col-sm-auto">
                		<p class="lead font-weight-bold" style="padding-top:5px">Localidad: <small class="font-weight-normal">Ciudad de Buenos Aires</small></p>
                    </div>
                </div>
        	</div>
    	</div>
		<div class="col-sm">
      		<div class="container">
          		<div class="input-group" style="padding-top:20px">
                  <input class="awesomplete form-control" type="search" id="busqueda" placeholder="Buscar por nombre, domicilio, CP o mail" name="busqueda" <?php if(isset($busqueda)){ echo 'value="'.$busqueda.'"';}?> list="busqueda_list"/>
                  		<datalist id="busqueda_list">
                        	@foreach($nombres as $nombre)
                            	<option>{{$nombre->nombre}}</option>
                            @endforeach
                        </datalist>
                  <div class="input-group-append">
                    <input class="btn btn-outline-success" type="submit" value="Buscar">
                  </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
      <div class="form-row" style="height:70px">
        <div class="form-group div-boton-filtros">
            <button class="btn btn-outline-primary" type="button" data-toggle="collapse" data-target="#collapsefiltros" aria-expanded="false" aria-controls="collapsefiltros" style="margin-left:10px">Filtros</button>
            <div class="col">
            </div>
            @if(isset($busqueda) || isset($comuna_selected) || isset($sector_selected))
            <a href="{{ route('secundario_caba.index') }}" class="btn btn-outline-danger" style="margin-right:10px">Limpiar Búsqueda</a>
            @endif
        </div>
      </div>
    </div>
    <div class="{{$collapse}}" id="collapsefiltros">
    	<div class="form-row">
            <div class="form-group col-md">
                <div class="container">
                    <div class="input-group">
                         <div class="input-group-prepend">
                            <label class="input-group-text" for="sector"><b>Sector</b></label>
                         </div>
                        <select class="custom-select" id="sector" name="sector" onChange="this.form.submit()">
                            <option disabled selected value>--Seleccione--</option>
                            <option <?php if(isset($sector_selected)){if($sector_selected === 'Todos'){ echo 'selected';}} ?>>Todos</option>
                            <option <?php if(isset($sector_selected)){if($sector_selected === 'Privado'){ echo 'selected';}} ?>>Privado</option>
                            <option <?php if(isset($sector_selected)){if($sector_selected === 'Estatal'){ echo 'selected';}} ?>>Estatal</option>
                        </select>
                    </div>
                 </div>
             </div>
             <div class="form-group col-md">
                 <div class="container">
                    <div class="input-group">
                         <div class="input-group-prepend">
                            <label class="input-group-text" for="comuna"><b>Comuna</b></label>
                         </div>
                        <select class="custom-select" id="comuna" name="comuna" onChange="this.form.submit()">
                            <option disabled selected value>--Seleccione--</option>
                            <option <?php if(isset($comuna_selected)){if($comuna_selected === 'Todas'){ echo 'selected';}} ?>>Todas</option>
                            @foreach($comunas as $comuna)
                                <option <?php if(isset($comuna_selected)){if($comuna_selected === $comuna->comuna){ echo 'selected';}} ?>>{{$comuna->comuna}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>
</form>
@if(isset($secundarios_caba))
    @if(!empty($secundarios_caba[0]))
    <div class="container" style="margin:auto">
    <form action="{{ route('secundarios_caba_excel') }}" method="get">
        @if(isset($busqueda))
        	<input type="hidden" value="{{$busqueda}}" name="busqueda_excel">
        @endif
        @if(isset($sector_selected))
        	<input type="hidden" value="{{$sector_selected}}" name="sector_excel">
        @endif
        @if(isset($comuna_selected))
        	<input type="hidden" value="{{$comuna_selected}}" name="comuna_excel">
        @endif
        <button class="btn btn-success" style="display:inline-block" type="submit">
            <img src="{{asset('img/excel.png')}}" height="20" style="float:left;padding-right:10px" /><span>Exportar a  Excel</span>
        </button>
	</form>
    </div>
    <div class="container" style="margin:auto;width:95%;background-color:rgba(255,255,255,1.00);">
        <hr style="border:#3c415e solid 1px">
        @foreach($secundarios_caba as $secundario_caba)
                <div class="row form-group" style="padding-left:10px;padding-top:10px">
                    <div class="col-sm-auto form-group">
                        <label class="font-italic" style="color:#738598">Nombre:&nbsp;&nbsp;</label><b style="color:#364e68">{{$secundario_caba->nombre}}</b>
                    </div>
                    <div class="col-sm-auto form-group">
                        <label class="font-italic" style="color:#738598">CUE:&nbsp;&nbsp;</label><b style="color:#364e68">{{$secundario_caba->cue}}</b>
                    </div>
                    <div class="col-sm-auto">
                        <label class="font-italic" style="color:#738598">Sector:&nbsp;&nbsp;</label><b style="color:#364e68">{{$secundario_caba->sector}}</b>
                    </div>
                </div>
                <div class="row form-group" style="padding-left:10px">
                    <div class="col-sm-auto form-group">
                        <label class="font-italic" style="color:#738598">Domicilio:&nbsp;&nbsp;</label><b style="color:#364e68">{{$secundario_caba->domicilio}}</b>
                    </div>
                    <div class="col-sm-auto form-group">
                        <label class="font-italic" style="color:#738598">CP:&nbsp;&nbsp;</label><b style="color:#364e68">{{$secundario_caba->cp}}</b>
                    </div>
                    <div class="col-auto form-group">
                        <label class="font-italic" style="color:#738598">Cód. Localidad:&nbsp;&nbsp;</label><b style="color:#364e68">{{$secundario_caba->codigo_localidad}}</b>
                    </div>
                    <div class="col-sm-auto">
                        <label class="font-italic" style="color:#738598">Comuna:&nbsp;&nbsp;</label><b style="color:#364e68">{{$secundario_caba->comuna}}</b>
                    </div>
                </div>
                 <div class="row" style="padding-left:10px">  
                    <div class="col-sm-auto form-group">
                        <label class="font-italic" style="color:#738598">Teléfono:&nbsp;&nbsp;</label><b style="color:#364e68">{{$secundario_caba->telefono}}</b>
                    </div>
                    <div class="col-sm-auto form-group">
                        <label class="font-italic" style="color:#738598">Mail:&nbsp;&nbsp;</label><b style="color:#364e68">{{$secundario_caba->mail}}</b>
                    </div>
                    
                </div>
            <hr style="border:#3c415e solid 1px">
        @endforeach
        <div class="container" style="padding-top:20px;margin:auto">
            {{$secundarios_caba->appends(Illuminate\Support\Facades\Input::except('page'))->links()}}
        </div>
    </div>
    @else    
       <div class="container" style="width:95%;background-color:rgba(255,255,255,1.00)">    
            <hr style="border:#3c415e solid 1px">
            <p><h4 class="text-center font-weight-bold">No se encontraron resultados con el parámetro "{{$busqueda}}" <?php if(isset($sector_selected) && $sector_selected != 'Todos'){ echo ' en el sector '.$sector_selected;} if(isset($comuna_selected) && $comuna_selected != 'Todas'){ echo ' en la '.$comuna_selected; } ?>.</h4></p>
            <hr style="border:#3c415e solid 1px">
        </div> 
    @endif
@else
	<div class="container" style="width:95%;background-color:rgba(255,255,255,1.00)">    
    	<hr style="border:#3c415e solid 1px">
        <p><h4 class="text-center font-weight-bold">Por favor, ingrese un parámetro de busqueda para mostrar resultados.</h4></p>
        <hr style="border:#3c415e solid 1px">
    </div> 
@endif

<div class="container" style="padding-top:50px">
    <div class="row justify-content-center">
    	<a href="{{ url('/caba') }}" type="button" class="btn btn-link">Atrás</a>
    </div>
</div>

@endsection

@section('script')
<script src="js/awesomplete.js" async></script>
@endsection