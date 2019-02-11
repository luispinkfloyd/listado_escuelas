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
<table>
    <thead>
    	<tr>
            <td colspan="13" align="left">
                <img src="img/untref_logo.png"/>
                <p><h1 align="center">Escuelas Superiores de Conurbano</h1></p>
            </td>
        </tr>
        <tr>
            <th>ID</th>
            <th>Jurisdicción</th>
            <th>Nombre</th>
            <th>CUE</th>
            <th>Sector</th>
            <th>Ámbito</th>
            <th>Domicilio</th>
            <th>CP</th>
            <th>Código Localidad</th>
            <th>Localidad</th>
            <th>Partido</th>
            <th>Teléfono</th>
            <th>Mail</th>
        </tr>
    </thead>
    <tbody>
            
            @foreach($superiores_conurbano as $superior_conurbano)
            	<tr>
                    <td width="5">{{$superior_conurbano->id}}</td>
                    <td width="28">{{$superior_conurbano->jurisdiccion}}</td>
                    <td width="40">{{$superior_conurbano->nombre}}</td>
                    <td width="13">{{$superior_conurbano->cue}}</td>
                    <td width="12">{{$superior_conurbano->sector}}</td>
                    <td width="12">{{$superior_conurbano->ambito}}</td>
                    <td width="40">{{$superior_conurbano->domicilio}}</td>
                    <td width="8">{{$superior_conurbano->cp}}</td>
                    <td width="15">{{$superior_conurbano->codigo_localidad}}</td>
                    <td width="30">{{$superior_conurbano->localidad}}</td>
                    <td width="15">{{$superior_conurbano->partido}}</td>
                    <td width="20">{{$superior_conurbano->telefono}}</td>
                    <td width="40">{{$superior_conurbano->mail}}</td>
                </tr>
        @endforeach
    </tbody>
</table>