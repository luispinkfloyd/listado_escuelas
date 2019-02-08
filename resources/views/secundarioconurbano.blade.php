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
if(isset($partido_selected) || isset($ambito_selected) || isset($sector_selected) || isset($localidad_selected)) $collapse = '';
?>
<form action="{{ route('busqueda_secundarios_conurbano') }}" method="get">
<div class="container jumbotron" style="background-color:#1B3146;padding:10px 0px 0px 0px">
	<div class="row">
		<div class="col-md">
			<div class="container" style="color:#FFFFFF;">
          		<h1 class="display-5">Escuelas Secundarias <small>Conurbano</small></h1>
            	<p class="lead font-weight-bold" style="padding-top:5px">Jurisdicción: <small class="font-weight-normal">Provincia de Buenos Aires</small></p>
        	</div>
    	</div>
		<div class="col-md">
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
            @if(isset($busqueda) || isset($comuna_selected) || isset($ambito_selected) || isset($sector_selected) || isset($localidad_selected))
            <a href="{{ route('secundario_conurbano.index') }}" class="btn btn-outline-danger" style="margin-right:10px">Limpiar Búsqueda</a>
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
                            <label class="input-group-text" for="ambito"><b>Ámbito</b></label>
                         </div>
                        <select class="custom-select" id="ambito" name="ambito" onChange="this.form.submit()">
                            <option disabled selected value>--Seleccione--</option>
                            <option <?php if(isset($ambito_selected)){if($ambito_selected === 'Todos'){ echo 'selected';}} ?>>Todos</option>
                            <option <?php if(isset($ambito_selected)){if($ambito_selected === 'Urbano'){ echo 'selected';}} ?>>Urbano</option>
                            <option <?php if(isset($ambito_selected)){if($ambito_selected === 'Rural'){ echo 'selected';}} ?>>Rural</option>
                        </select>
                    </div>
                 </div>
             </div>
        </div>
        <div class="form-row">
             <div class="form-group col-md">
                 <div class="container">
                    <div class="input-group">
                         <div class="input-group-prepend">
                            <label class="input-group-text" for="partido"><b>Partido</b></label>
                         </div>
                        <select class="custom-select" id="partido" name="partido" onChange="this.form.submit()">
                            <option disabled selected value>--Seleccione--</option>
                            <option <?php if(isset($partido_selected)){if($partido_selected === 'Todos'){ echo 'selected';}} ?>>Todos</option>
                            @foreach($partidos as $partido)
                                <option <?php if(isset($partido_selected)){if($partido_selected === $partido->partido){ echo 'selected';}} ?>>{{$partido->partido}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
             <div class="form-group col-md">
                 <div class="container">
                    <div class="input-group">
                         <div class="input-group-prepend">
                            <label class="input-group-text" for="localidad"><b>Localidad</b></label>
                         </div>
                        <select class="custom-select" id="localidad" name="localidad" onChange="this.form.submit()">
                            <option disabled selected value>--Seleccione--</option>
                            <option <?php if(isset($localidad_selected)){if($localidad_selected === 'Todas'){ echo 'selected';}} ?>>Todas</option>
                            @foreach($localidades as $localidad)
                                <option <?php if(isset($localidad_selected)){if($localidad_selected === $localidad->localidad){ echo 'selected';}} ?>>{{$localidad->localidad}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>
</form>



@if(isset($secundarios_conurbano))
    @if(!empty($secundarios_conurbano[0]))
    <div class="container" style="margin:auto;width:95%;background-color:rgba(255,255,255,1.00)">    
        <hr style="border:#3c415e solid 1px">
        @foreach($secundarios_conurbano as $secundario_conurbano)
                <div class="row form-group" style="padding-left:10px;padding-top:10px">
                    <div class="col-sm-auto form-group">
                        <label class="font-italic" style="color:#738598">Nombre:&nbsp;&nbsp;</label><b style="color:#364e68">{{$secundario_conurbano->nombre}}</b>
                    </div>
                    <div class="col-sm-auto">
                        <label class="font-italic" style="color:#738598">CUE:&nbsp;&nbsp;</label><b style="color:#364e68">{{$secundario_conurbano->cue}}</b>
                    </div>
                    <div class="col-sm-auto">
                        <label class="font-italic" style="color:#738598">Sector:&nbsp;&nbsp;</label><b style="color:#364e68">{{$secundario_conurbano->sector}}</b>
                    </div>
                </div>
                <div class="row" style="padding-left:10px">  
                    <div class="col-sm-auto form-group">
                        <label class="font-italic" style="color:#738598">Ámbito:&nbsp;&nbsp;</label><b style="color:#364e68">{{$secundario_conurbano->ambito}}</b>
                    </div>
                    <div class="col-sm-auto">
                        <label class="font-italic" style="color:#738598">Partido:&nbsp;&nbsp;</label><b style="color:#364e68">{{$secundario_conurbano->partido}}</b>
                    </div>
                    <div class="col-sm-auto form-group">
                        <label class="font-italic" style="color:#738598">Localidad:&nbsp;&nbsp;</label><b style="color:#364e68">{{$secundario_conurbano->localidad}}</b>
                    </div>
                </div>
                <div class="row form-group" style="padding-left:10px">
                    <div class="col-sm-auto form-group">
                        <label class="font-italic" style="color:#738598">Domicilio:&nbsp;&nbsp;</label><b style="color:#364e68">{{$secundario_conurbano->domicilio}}</b>
                    </div>
                    <div class="col-sm-auto form-group">
                        <label class="font-italic" style="color:#738598">CP:&nbsp;&nbsp;</label><b style="color:#364e68">{{$secundario_conurbano->cp}}</b>
                    </div>
                    <div class="col-auto form-group">
                        <label class="font-italic" style="color:#738598">Cód. Localidad:&nbsp;&nbsp;</label><b style="color:#364e68">{{$secundario_conurbano->codigo_localidad}}</b>
                    </div>
                 </div>
                 <div class="row" style="padding-left:10px">  
                    <div class="col-sm-auto form-group">
                        <label class="font-italic" style="color:#738598">Teléfono:&nbsp;&nbsp;</label><b style="color:#364e68">{{$secundario_conurbano->telefono}}</b>
                    </div>
                    <div class="col-sm-auto form-group">
                        <label class="font-italic" style="color:#738598">Mail:&nbsp;&nbsp;</label><b style="color:#364e68">{{$secundario_conurbano->mail}}</b>
                    </div>
                    
                </div>
            <hr style="border:#3c415e solid 1px">
        @endforeach
        <div class="container" style="padding-top:20px;margin:auto">
            {{$secundarios_conurbano->appends(Illuminate\Support\Facades\Input::except('page'))->links()}}
        </div>
    </div>
    @else    
       <div class="container" style="width:95%;background-color:rgba(255,255,255,1.00)">    
            <hr style="border:#3c415e solid 1px">
            <p><h4 class="text-center font-weight-bold">No se encontraron resultados con el parámetro "{{$busqueda}}" <?php //if(isset($sector_selected) && $sector_selected != 'Todos'){ echo ' en el sector '.$sector_selected;} if(isset($comuna_selected) && $comuna_selected != 'Todas'){ echo ' en la '.$comuna_selected; } ?>.</h4></p>
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

@endsection

@section('script')
<script src="js/awesomplete.js" async></script>
@endsection