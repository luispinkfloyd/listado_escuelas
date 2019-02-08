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
                <p><h1 align="center">Escuelas Superiores de CABA</h1></p>
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
            
            @foreach($superiores_caba as $superior_caba)
            	<tr>
                    <td width="5">{{$superior_caba->id}}</td>
                    <td width="28">{{$superior_caba->jurisdiccion}}</td>
                    <td width="40">{{$superior_caba->nombre}}</td>
                    <td width="13">{{$superior_caba->cue}}</td>
                    <td width="12">{{$superior_caba->sector}}</td>
                    <td width="12">{{$superior_caba->ambito}}</td>
                    <td width="40">{{$superior_caba->domicilio}}</td>
                    <td width="8">{{$superior_caba->cp}}</td>
                    <td width="15">{{$superior_caba->codigo_localidad}}</td>
                    <td width="30">{{$superior_caba->localidad}}</td>
                    <td width="15">{{$superior_caba->comuna}}</td>
                    <td width="20">{{$superior_caba->telefono}}</td>
                    <td width="40">{{$superior_caba->mail}}</td>
                </tr>
        @endforeach
    </tbody>
</table>