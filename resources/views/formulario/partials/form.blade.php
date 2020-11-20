<div class="row no-gutters">
    <div class="col-6 col-lg-6 offset-3 text-center ">
      <h1 class="label-principal">FORMULARIO</h1>
    </div>
</div>
<hr>

<div class="row no-gutters">
  <div class="col-12 col-sm-5 offset-sm-1">
      <div class="row no-gutters">
        <h3 class="label-secciones-formulario">¿A qué sector pertenece su empresa?</h3>
      </div>
      
      <div class="row pl-3 flex-column">
          {!! Form::hidden('idconsultoria', $consultoria) !!}
          <div class="custom-control custom-radio">
            {{ Form::radio('respuesta1', 'Servicios' , false,['class'=>"custom-control-input",'id'=>'respuestaServicios']) }}
            {!! Form::label('respuestaServicios', 'Servicios',['class'=>"custom-control-label"]) !!}
          </div>
          
          <div class="custom-control custom-radio">
            {{ Form::radio('respuesta1', 'Comercial' , false,['class'=>"custom-control-input",'id'=>'respuestaComercial']) }}
            {!! Form::label('respuestaComercial', 'Comercial',['class'=>"custom-control-label"]) !!}

          </div>
          <div class="custom-control custom-radio">
            {{ Form::radio('respuesta1', 'Industrial' , false,['class'=>"custom-control-input",'id'=>'respuestaIndustrial']) }}
            {!! Form::label('respuestaIndustrial', 'Industrial',['class'=>"custom-control-label"]) !!}
          </div>

      </div>
  </div>
  <div class="col-12 col-sm-5">
    <div class="row no-gutters">
      <h3 class="label-secciones-formulario">¿La empresa realiza operaciones de Comercio exterior?</h3>
    </div>
    <div class="row pl-3 flex-column">
      <div class="custom-control custom-radio">
        {{ Form::radio('respuesta2', 'si' , false,['class'=>"custom-control-input",'id'=>'respuesta2SiComercio']) }}
        {!! Form::label('respuesta2SiComercio', 'si',['class'=>"custom-control-label"]) !!}
      </div>
      <div class="custom-control custom-radio">
        {{ Form::radio('respuesta2', 'no' , false,['class'=>"custom-control-input",'id'=>'respuesta2NOComercio']) }}
        {!! Form::label('respuesta2NOComercio', 'no' ,['class'=>"custom-control-label"]) !!}
      </div>
    </div>
  </div>
</div>



<div class="row no-gutters mt-2">
  <div class="col-12 col-sm-5 offset-sm-1">
      <div class="row no-gutters">
        <h3 class="label-secciones-formulario">¿La empresa mantiene operaciones con partes relacionadas?</h3>
      </div>
      
      <div class="row pl-3 flex-column">
        <div class="custom-control custom-radio">
          {{ Form::radio('respuesta3', 'si' , false,['class'=>"custom-control-input",'id'=>'respuesta3SiOperaciones']) }}
          {!! Form::label('respuesta3SiOperaciones', 'si',['class'=>"custom-control-label"]) !!}
        </div>
        <div class="custom-control custom-radio">
          {{ Form::radio('respuesta3', 'no' , false,['class'=>"custom-control-input",'id'=>'respuesta3NoOperaciones']) }}
          {!! Form::label('respuesta3NoOperaciones', 'no',['class'=>"custom-control-label"]) !!}
        </div>
        
      </div>
  </div>
  <div class="col-12 col-sm-5">
    <div class="row no-gutters">
      <h3 class="label-secciones-formulario">Indique la actividad económica de su empresa</h3>
    </div>
    <div class="row pl-3 flex-column">
      {{Form::select('respuesta4',array('' => 'Elegir una actividad') + $actividad_economica , null, array('required'=>'required','class' => 'foo custom-select custom-select-sm',"data-size"=>"10"))}}
    </div>
  </div>
</div>






<div class="form-group">

{{ Form::hidden('respuesta5', null ) }}


</div>
<div class="form-group">

{{ Form::hidden('respuesta6', null) }}

</div>



{{ Form::hidden('formulariopdf', null) }}









<hr>
<div class="row no-gutters mt-4">
  <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 text-center">
    {{Form::checkbox('checkbox1', 'value', false, ['onClick' => 'saluda()','id' => 'checkbox1'])}}
    {{Form::label('name','Confirmó que los datos ingresados son correctos',array('class'=>'bolder label-confirmacion'))}}
  </div>
   
</div>


<div class="row no-gutters mt-4">

<div class="col-10 offset-1 col-sm-8 offset-sm-2 col-md-4 px-3 offset-md-2">
  {{Form::submit('Guardar', ['class'=>'btn btn-block btn-primary ','disabled' => 'disabled','id'=>'Guardar'])}}
</div>
<div class="col-10 offset-1 col-sm-8 offset-sm-2 col-md-4 px-3 offset-md-0">
  <a class="btn btn-block btn-warning" href="{{route('bandeja.index')}}">Cancelar</a>
</div>


</div>





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



