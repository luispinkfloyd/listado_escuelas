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
                <p><h1 align="center">Escuelas Secundarias de Conurbano</h1></p>
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
            
            @foreach($secundarios_conurbano as $secundario_conurbano)
            	<tr>
                    <td width="5">{{$secundario_conurbano->id}}</td>
                    <td width="28">{{$secundario_conurbano->jurisdiccion}}</td>
                    <td width="40">{{$secundario_conurbano->nombre}}</td>
                    <td width="13">{{$secundario_conurbano->cue}}</td>
                    <td width="12">{{$secundario_conurbano->sector}}</td>
                    <td width="12">{{$secundario_conurbano->ambito}}</td>
                    <td width="40">{{$secundario_conurbano->domicilio}}</td>
                    <td width="8">{{$secundario_conurbano->cp}}</td>
                    <td width="15">{{$secundario_conurbano->codigo_localidad}}</td>
                    <td width="30">{{$secundario_conurbano->localidad}}</td>
                    <td width="15">{{$secundario_conurbano->partido}}</td>
                    <td width="20">{{$secundario_conurbano->telefono}}</td>
                    <td width="40">{{$secundario_conurbano->mail}}</td>
                </tr>
        @endforeach
    </tbody>
</table>