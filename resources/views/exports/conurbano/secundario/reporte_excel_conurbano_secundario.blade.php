<style>
	th{
		background-color: #1F2C56;
		color: #FFFFFF;
		border: 1px solid #000000;	
	}
	tr > td {
    	border: 1px solid #000000;
	}
</style>
<table class="table table-striped table-hover table-size" id="promedio_historico">
    <thead>
    	<tr>
            <td colspan="19" align="left">
                <img src="untref_logo.png"/>
                <p><h1 align="center">Reporte Curso de Ingreso {{$datos[0]->periodo}}</h1></p>
            </td>
        </tr>
        <tr>
            <th>Ranking</th>
            <th>Legajo</th>
            <th>Apellido Nombres</th>
            <th>Documento</th>
            <th>Carrera</th>
            <th>Comisión</th>
            <th>Situación</th>
            <th>Promedio General</th>
            <th>Primera Materia</th>
            <th>Parcial 1</th>
            <th>Parcial 2</th>
            <th>Final 1</th>
            <th>Primer Promedio</th>
            <th>Segunda Materia</th>
            <th>Parcial 1</th>
            <th>Parcial 2</th>
            <th>Final 2</th>
            <th>Segundo Promedio</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        @foreach($superiores_caba as $superior_caba)
                {{$superior_caba->nombre}}</b>
                {{$superior_caba->cue}}</b>
                {{$superior_caba->sector}}</b>
                {{$superior_caba->domicilio}}</b>
                {{$superior_caba->cp}}</b>
                {{$superior_caba->codigo_localidad}}</b>
                {{$superior_caba->comuna}}</b>
                {{$superior_caba->telefono}}</b>
                {{$superior_caba->mail}}
        @endforeach
            
            
            
            
            <tr>
                <td width="8">{{$dato->posicion_ranking}}</td>
                <td width="8">{{$superior_caba->nombre}}</td>
                <td width="35">{{$dato->apellido_nombres}}</td>
                <td width="13">{{$dato->documento}}</td>
                <td width="40">{{$dato->carrera}}</td>
                <td width="13">{{$dato->comision}}</td>
                <td width="12">{{$dato->situacion}}</td>
                <td width="15">{{$dato->promedio_general}}</td>
                <td width="35">{{$dato->materia_1}}</td>
                <td width="8">{{$dato->primer_parcial_nota_1}}</td>
                <td width="8">{{$dato->segundo_parcial_nota_1}}</td>
                <td width="8">{{$dato->final_nota_1}}</td>
                <td width="15">{{$dato->primer_promedio}}</td>
                <td width="35">{{$dato->materia_2}}</td>
                <td width="8">{{$dato->primer_parcial_nota_2}}</td>
                <td width="8">{{$dato->segundo_parcial_nota_2}}</td>
                <td width="8">{{$dato->final_nota_2}}</td>
                <td width="15">{{$dato->segundo_promedio}}</td>
                <td width="15">{{$dato->estado}}</td>
            </tr>
        @endforeach
    </tbody>
</table>