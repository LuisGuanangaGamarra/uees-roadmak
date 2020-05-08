<!--<div class="form-group">
{{Form::label('Consultoria', 'consultoria')}}
{{Form::text('id_consultoria', null, ['class'=>'form-control'])}}
</div>-->

<div class="form-group">
{{Form::label('Consultoria', 'Consultoria')}}
<!--{{Form::text('id_consultoria', null, ['class'=>'form-control'])}}
-->
<br>
{{Form::select('id_consultoria',array('' => 'Elegir una consultoria') + $elegirconsultoria , null, array('required'=>'required','class' => 'foo'))

    }}

</div>

<style>
.foo {
   width:70%;
   
   /* height: 100px;*/
}
</style>
<div class="form-group">
{{Form::label('Plantilla', 'Plantilla')}}
<!--{{Form::text('id_plantilla', null, ['class'=>'form-control'])}}-->
<br>
{{Form::select('id_plantilla',array('' => 'Elegir un plantilla') + $elegirplantilla , null, array('required'=>'required','class' => 'foo'))

}}
</div>

<!-- 
<div class="form-group">
{{Form::label('periodo', 'Años de la consultoría')}}
{{Form::number('periodo', null, array('required'=>'required','class' => 'form-control','min'=>1,'max'=>30))}}
</div>
 -->

<!--<div class="form-group">
{{Form::label('plantilla', 'Consultoria&Plantilla')}}
{{Form::text('ConsultoriaPlantilla', null, ['class'=>'form-control'])}}
</div>
<div class="form-group">
{{Form::label('default', 'default')}}
{{Form::number('default', null, ['class'=>'form-control'])}}
</ div>-->





<div class="form-group">
{{Form::submit('Siguiente', ['class'=>'btn btn-sm btn-primary'])}}
</div>