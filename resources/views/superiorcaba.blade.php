@extends('layouts.app')
@section('content')


<?php
$collapse = 'collapse';
if(isset($comuna_selected) || isset($ambito_selected) || isset($sector_selected) || isset($localidad_selected)) $collapse = '';
?>
<form action="{{ route('busqueda_superiores_caba') }}" method="get">
<div class="container jumbotron" style="background-color:#1B3146;padding:10px 0px 0px 0px">
	<div class="row">
		<div class="col-md">
			<div class="container" style="color:#FFFFFF;">
          		<h1 class="display-5">Escuelas Superiores <small>CABA</small></h1>
            	<p class="lead font-weight-bold" style="padding-top:5px">Jurisdicción: <small class="font-weight-normal">Ciudad de Buenos Aires</small></p>
                <p class="lead font-weight-bold" style="padding-top:5px">Ámbito: <small class="font-weight-normal">Urbano</small></p>
                <p class="lead font-weight-bold" style="padding-top:5px">Localidad: <small class="font-weight-normal">Ciudad de Buenos Aires</small></p>
        	</div>
    	</div>
		<div class="col-md">
      		<div class="container">
          		<div class="input-group" style="padding-top:20px">
                  <input class="form-control" type="search" placeholder="Buscar" aria-label="Buscar" name="busqueda" <?php if(isset($busqueda)){ echo 'value="'.$busqueda.'"';}?>>
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
            <a href="{{ route('superior_caba.index') }}" class="btn btn-outline-danger" style="margin-right:10px">Limpiar Búsqueda</a>
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



<div class="container" style="overflow:auto">
        <table class="table table-sm table-hover table-bordered" style="white-space:nowrap">
          <thead class="thead-dark">
            <tr>	
                <th scope="col">cue</th>	
                <th scope="col">nombre</th>	
                <th scope="col">sector</th>
                <th scope="col">domicilio</th>
                <th scope="col">cp</th>
                <th scope="col">telefono</th>
                <th scope="col">codigo_localidad</th>
                <th scope="col">localidad</th>
                <th scope="col">comuna</th>
                <th scope="col">mail</th>
            </tr>
          </thead>
          <tbody>
            @foreach($superiores_caba as $superior_caba)
            <tr>
              <td>{{$superior_caba->cue}}</td>
              <td>{{$superior_caba->nombre}}</td>
              <td>{{$superior_caba->sector}}</td>
              <td>{{$superior_caba->domicilio}}</td>
              <td>{{$superior_caba->cp}}</td>
              <td>{{$superior_caba->telefono}}</td>
              <td>{{$superior_caba->codigo_localidad}}</td>
              <td>{{$superior_caba->localidad}}</td>
              <td>{{$superior_caba->comuna}}</td>
              <td>{{$superior_caba->mail}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
</div>
<div class="container">
    {{$superiores_caba->appends(Illuminate\Support\Facades\Input::except('page'))->links()}}
</div>
@endsection
