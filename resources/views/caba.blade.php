@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container" style="max-width:600px">
        	<a href="superior_caba" type="button" class="btn btn-superior btn-lg btn-block">Superior <small>(Caba)</small></a>
        </div>
        <div class="container" style="padding-top:50px;max-width:600px">
        	<a href="secundario_caba" type="button" class="btn btn-primary btn-lg btn-block">Secundario <small>(Caba)</small></a>
        </div>
    </div>
</div>
<div class="container" style="padding-top:50px">
    <div class="row justify-content-center">
    	<a href="{{ url('/') }}" type="button" class="btn btn-link">Atrás</a>
    </div>
</div>
@endsection
