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
                <p><h1 align="center">Escuelas Secundarias de CABA</h1></p>
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
            <th>Comuna</th>
            <th>Teléfono</th>
            <th>Mail</th>
        </tr>
    </thead>
    <tbody>
            
            @foreach($secundarios_caba as $secundario_caba)
            	<tr>
                    <td width="5">{{$secundario_caba->id}}</td>
                    <td width="28">{{$secundario_caba->jurisdiccion}}</td>
                    <td width="40">{{$secundario_caba->nombre}}</td>
                    <td width="13">{{$secundario_caba->cue}}</td>
                    <td width="12">{{$secundario_caba->sector}}</td>
                    <td width="12">{{$secundario_caba->ambito}}</td>
                    <td width="40">{{$secundario_caba->domicilio}}</td>
                    <td width="8">{{$secundario_caba->cp}}</td>
                    <td width="15">{{$secundario_caba->codigo_localidad}}</td>
                    <td width="30">{{$secundario_caba->localidad}}</td>
                    <td width="15">{{$secundario_caba->comuna}}</td>
                    <td width="20">{{$secundario_caba->telefono}}</td>
                    <td width="40">{{$secundario_caba->mail}}</td>
                </tr>
        @endforeach
    </tbody>
</table>