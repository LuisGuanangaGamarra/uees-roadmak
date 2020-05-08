<div class="form-group" style="text-align:center">
<h1>FORMULARIO</h1>
</div>
<hr>
<div class="form-group">
<h3>¿A qué sector pertenece su empresa?</h3>
</div>

<div class="form-group">



  <div class="radio">

  {!! Form::hidden('idconsultoria', $consultoria) !!}
  
  {{ Form::radio('respuesta1', 'Servicios' , false) }}
  {!! Form::label('label', 'Servicios') !!}
  <br/>
  {{ Form::radio('respuesta1', 'Comercial' , false) }}
  {!! Form::label('label', 'Comercial') !!}
  <br/>
  {{ Form::radio('respuesta1', 'Industrial' , false) }}
  {!! Form::label('label', 'Industrial') !!}
  <br/>
<!--  {{ Form::radio('respuesta1', 'No estoy seguro => nola' , false) }}
  {!! Form::label('label', 'No estoy seguro') !!}-->
 </div>
</div>
<hr>
<div class="form-group">
<h3>¿La empresa realiza operaciones de Comercio exterior?</h3>
</div>
<div class="form-group">

{{ Form::radio('respuesta2', 'si' , false) }}
{!! Form::label('label', 'si') !!} <br/>
{{ Form::radio('respuesta2', 'no' , false) }}
{!! Form::label('label', 'no') !!}<br/>
<!--{{ Form::radio('respuesta2', 'No estoy seguro' , false) }}
{!! Form::label('label', 'No estoy seguro') !!} -->
</div>

<hr>
<div class="form-group">
<h3>¿La empresa mantiene operaciones con partes relacionadas?</h3>
</div>
<div class="form-group">

{{ Form::radio('respuesta3', 'si' , false) }}
{!! Form::label('label', 'si') !!} <br/>
{{ Form::radio('respuesta3', 'no' , false) }}
{!! Form::label('label', 'no') !!}<br/>
<!--{{ Form::radio('respuesta3', 'No estoy seguro' , false) }}
{!! Form::label('label', 'No estoy seguro') !!} -->
</div>

<hr>
<div class="form-group">
<h3>Indique la actividad económica de su empresa</h3>
</div>

<div class="form-group" >
{{Form::select('respuesta4',array('' => 'Elegir una actividad') + $actividad_economica , null, array('required'=>'required','class' => 'foo'))}}
</div>


<div class="form-group">

{{ Form::hidden('respuesta5', null ) }}


</div>
<div class="form-group">

{{ Form::hidden('respuesta6', null) }}

</div>



{{ Form::hidden('formulariopdf', null) }}













<div class="form-group">
<!--<input type=button onclick="pregunta()" value="Enviar">  -->


{{Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary','disabled' => 'disabled','id'=>'Guardar'])}}

<hr>
{{Form::checkbox('checkbox1', 'value', false, ['onClick' => 'saluda()','id' => 'checkbox1'])}}
{{Form::label('name','Confirmó que los datos ingresados son correctos')}}

<div class="form-group"><a class="btn btn-sm btn-warning" href="{{route('bandeja.index')}}">Cancelar</a></div>

<script>
function saluda(){
  var submi = document.getElementById('Guardar');
  if (document.getElementById('checkbox1').checked)
  {
    submi.disabled=false;
  }else{
    submi.disabled=true;
  }
  
}

var submi = document.getElementById('Guardar');
  if (document.getElementById('checkbox1').checked)
  {
    submi.disabled=false;
  }else{
    submi.disabled=true;
  }

</script>

</div>

