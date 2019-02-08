@extends('layouts.app')

@section('style')



<style>


/*Color Botón CABA*/

.btn-conurbano { 
  color: #ffffff; 
  background-color: #5C84B0; 
  border-color: #001957; 
} 
 
.btn-conurbano:hover, 
.btn-conurbano:focus, 
.btn-conurbano:active, 
.btn-conurbano.active, 
.open .dropdown-toggle.btn-conurbano { 
  color: #ffffff; 
  background-color: #5A7399; 
  border-color: #001957; 
} 
 
.btn-conurbano:active, 
.btn-conurbano.active, 
.open .dropdown-toggle.btn-conurbano { 
  background-image: none; 
} 
 
.btn-conurbano.disabled, 
.btn-conurbano[disabled], 
fieldset[disabled] .btn-conurbano, 
.btn-conurbano.disabled:hover, 
.btn-conurbano[disabled]:hover, 
fieldset[disabled] .btn-conurbano:hover, 
.btn-conurbano.disabled:focus, 
.btn-conurbano[disabled]:focus, 
fieldset[disabled] .btn-conurbano:focus, 
.btn-conurbano.disabled:active, 
.btn-conurbano[disabled]:active, 
fieldset[disabled] .btn-conurbano:active, 
.btn-conurbano.disabled.active, 
.btn-conurbano[disabled].active, 
fieldset[disabled] .btn-conurbano.active { 
  background-color: #5C84B0; 
  border-color: #001957; 
} 
 
.btn-conurbano .badge { 
  color: #5C84B0; 
  background-color: #ffffff; 
}


/* Color Botón Caba*/

.btn-caba { 
  color: #ffffff; 
  background-color: #B0835C; 
  border-color: #573400; 
} 
 
.btn-caba:hover, 
.btn-caba:focus, 
.btn-caba:active, 
.btn-caba.active, 
.open .dropdown-toggle.btn-caba { 
  color: #ffffff; 
  background-color: #99755A; 
  border-color: #573400; 
} 
 
.btn-caba:active, 
.btn-caba.active, 
.open .dropdown-toggle.btn-caba { 
  background-image: none; 
} 
 
.btn-caba.disabled, 
.btn-caba[disabled], 
fieldset[disabled] .btn-caba, 
.btn-caba.disabled:hover, 
.btn-caba[disabled]:hover, 
fieldset[disabled] .btn-caba:hover, 
.btn-caba.disabled:focus, 
.btn-caba[disabled]:focus, 
fieldset[disabled] .btn-caba:focus, 
.btn-caba.disabled:active, 
.btn-caba[disabled]:active, 
fieldset[disabled] .btn-caba:active, 
.btn-caba.disabled.active, 
.btn-caba[disabled].active, 
fieldset[disabled] .btn-caba.active { 
  background-color: #B0835C; 
  border-color: #573400; 
} 
 
.btn-caba .badge { 
  color: #B0835C; 
  background-color: #ffffff; 
}



</style>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container" style="max-width:600px">
        	<a href="conurbano" type="button" class="btn btn-conurbano btn-lg btn-block">Conurbano</a>
        </div>
        <div class="container" style="max-width:600px;padding-top:50px;">
        	<a href="caba" type="button" class="btn btn-caba btn-lg btn-block">Caba</a>
        </div>
    </div>
</div>
@endsection