@extends('layouts.app')
@section('content')


<?php
$collapse = 'collapse';
if(isset($partido_selected) || isset($ambito_selected) || isset($sector_selected) || isset($localidad_selected)) $collapse = '';
?>
<form action="{{ route('busqueda_superiores_conurbano') }}" method="get">
<div class="container jumbotron" style="background-color:#1B3146;padding:10px 0px 0px 0px">
	<div class="row">
		<div class="col-md">
			<div class="container" style="color:#FFFFFF;">
          		<h1 class="display-5">Escuelas Superiores <small>Conurbano</small></h1>
            	<p class="lead font-weight-bold" style="padding-top:5px">Jurisdicción: <small class="font-weight-normal">Provincia de Buenos Aires</small></p>
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
            <a href="{{ route('superior_conurbano.index') }}" class="btn btn-outline-danger" style="margin-right:10px">Limpiar Búsqueda</a>
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


<div class="container" style="overflow:auto">
        <table class="table table-sm table-hover table-bordered"  style="white-space:nowrap">
          <thead class="thead-dark">
            <tr>	
                <th scope="col">cue</th>	
                <th scope="col">nombre</th>	
                <th scope="col">sector</th>
                <th scope="col">ambito</th>
                <th scope="col">domicilio</th>
                <th scope="col">cp</th>
                <th scope="col">telefono</th>
                <th scope="col">codigo_localidad</th>
                <th scope="col">localidad</th>
                <th scope="col">partido</th>
                <th scope="col">mail</th>
            </tr>
          </thead>
          <tbody>
            @foreach($superiores_conurbano as $superior_conurbano)
            <tr>
              <td>{{$superior_conurbano->cue}}</td>
              <td>{{$superior_conurbano->nombre}}</td>
              <td>{{$superior_conurbano->sector}}</td>
              <td>{{$superior_conurbano->ambito}}</td>
              <td>{{$superior_conurbano->domicilio}}</td>
              <td>{{$superior_conurbano->cp}}</td>
              <td>{{$superior_conurbano->telefono}}</td>
              <td>{{$superior_conurbano->codigo_localidad}}</td>
              <td>{{$superior_conurbano->localidad}}</td>
              <td>{{$superior_conurbano->comuna}}</td>
              <td>{{$superior_conurbano->mail}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div>
        	{{$superiores_conurbano->appends(Illuminate\Support\Facades\Input::except('page'))->links()}}
        </div>
</div>
@endsection
