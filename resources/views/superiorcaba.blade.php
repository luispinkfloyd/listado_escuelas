@extends('layouts.app')
@section('content')
<div class="container jumbotron" style="background-color:#1B3146">
  <div class="row">
      <div class="col">
          <div class="container" style="color:#FFFFFF;">
          	<h1 class="display-4">Escuelas Superiores CABA</h1>
            <p class="lead" style="padding-top:10px"><b>Jurisdicción:</b> <small>Ciudad de Buenos Aires</small></p>
            <p class="lead"><b>Ámbito:</b> <small>Urbano</small></p>
            <p class="lead"><b>Localidad:</b> <small>Ciudad de Buenos Aires</small></p>
          </div>
      </div>
      <div class="col">
      	  <div class="container" style="padding-top:15px">
              <form action="{{ route('busqueda_superiores_caba') }}" method="get">
              	<div class="input-group" style="padding-top:15px;max-width:450px">	 
                	<input class="form-control" type="search" placeholder="Buscar" aria-label="Buscar" name="busqueda" <?php if(isset($busqueda)){ echo 'value="'.$busqueda.'"';}?>>
                </div>
                <div class="input-group" style="padding-top:30px;max-width:450px">
                	 <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Sector</label>
                     </div>
                    <select class="custom-select" id="inputGroupSelect01" name="sector">
                        <option disabled selected value>--Seleccione--</option>
                        <option <?php if(isset($sector_selected)){if($sector_selected === 'Privado'){ echo 'selected';}} ?>>Privado</option>
                        <option <?php if(isset($sector_selected)){if($sector_selected === 'Estatal'){ echo 'selected';}} ?>>Estatal</option>
                    </select>
                </div>
                <div class="input-group" style="padding-top:30px;max-width:450px">
                	 <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Comuna</label>
                     </div>
                    <select class="custom-select" id="inputGroupSelect01" name="comuna">
                        <option disabled selected value>--Seleccione--</option>
                        @foreach($comunas as $comuna)
                        	<option <?php if(isset($comuna_selected)){if($comuna_selected === $comuna->comuna){ echo 'selected';}} ?>>{{$comuna->comuna}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="container" style="padding-top:20px">
                    <div class="row">
                        <div class="col text-left">
                            <input class="btn btn-outline-success" type="submit" value="Buscar">
                            </form>
                        </div>
                        <div class="col text-center">
                            <a href="{{ route('superior_caba.index') }}" class="btn btn-outline-danger">Limpiar Búsqueda</a>
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
        <div>
        	{{$superiores_caba->appends(Illuminate\Support\Facades\Input::except('page'))->links()}}
        </div>
</div>
@endsection
