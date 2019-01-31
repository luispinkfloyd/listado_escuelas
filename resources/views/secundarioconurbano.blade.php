@extends('layouts.app')
@section('content')
<form action="{{ route('busqueda_secundario_conurbano') }}" method="get">
<div class="container jumbotron" style="background-color:#1B3146">
  <div class="row">
      <div class="col">
          <div class="container" style="color:#FFFFFF;">
          	<h1 class="display-4">Escuelas Secundarias Conurbano</h1>
            <p class="lead" style="padding-top:10px"><b>Jurisdicción:</b> <small>Buenos Aires</small></p>
          </div>
      </div>
      <div class="col">
      	  <div class="container" style="padding-top:15px">
              	<div class="input-group" style="padding-top:15px;max-width:450px">	 
                	<input class="form-control" type="search" placeholder="Buscar" aria-label="Buscar" name="busqueda" <?php if(isset($busqueda)){ echo 'value="'.$busqueda.'"';}?>>
                </div>
                <div class="input-group" style="padding-top:30px;max-width:450px">
                	 <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Partido</label>
                     </div>
                    <select class="custom-select" id="inputGroupSelect01" name="partido">
                        <option disabled selected value>--Seleccione--</option>
                        @foreach($partidos as $partido)
                        	<option <?php if(isset($partido_selected)){if($partido_selected === $partido->partido){ echo 'selected';}} ?>>{{$partido->partido}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="container" style="padding-top:20px">
                    <div class="row">
                        <div class="col text-left">
                            <input class="btn btn-outline-success" type="submit" value="Buscar">
                            
                        </div>
                        <div class="col text-center">
                            <a href="{{ route('secundario_conurbano.index') }}" class="btn btn-outline-danger">Limpiar Búsqueda</a>
                        </div>
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
                <th scope="col" style="min-width:110px">
                    <select class="custom-select" id="inputGroupSelect01" name="sector" onChange="this.form.submit()">
                        <option disabled selected value>Sector</option>
                        <option <?php if(isset($sector_selected)){if($sector_selected === 'Todos'){ echo 'selected';}} ?>>Todos</option>
                        <option <?php if(isset($sector_selected)){if($sector_selected === 'Privado'){ echo 'selected';}} ?>>Privado</option>
                        <option <?php if(isset($sector_selected)){if($sector_selected === 'Estatal'){ echo 'selected';}} ?>>Estatal</option>
                    </select></th>
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
            @foreach($secundarios_conurbano as $secundario_conurbano)
            <tr>
              <td>{{$secundario_conurbano->cue}}</td>
              <td>{{$secundario_conurbano->nombre}}</td>
              <td>{{$secundario_conurbano->sector}}</td>
              <td>{{$secundario_conurbano->ambito}}</td>
              <td>{{$secundario_conurbano->domicilio}}</td>
              <td>{{$secundario_conurbano->cp}}</td>
              <td>{{$secundario_conurbano->telefono}}</td>
              <td>{{$secundario_conurbano->codigo_localidad}}</td>
              <td>{{$secundario_conurbano->localidad}}</td>
              <td>{{$secundario_conurbano->partido}}</td>
              <td>{{$secundario_conurbano->mail}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div>
            {{$secundarios_conurbano->appends(Illuminate\Support\Facades\Input::except('page'))->links()}}
        </div>
</div>
</form>
@endsection
