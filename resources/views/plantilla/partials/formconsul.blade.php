
<div class="form-group">
{{Form::label('Consultoria', 'Consultoria')}}
<!--{{Form::text('id_consultoria', null, ['class'=>'form-control'])}}
-->

{{Form::select('id_consultoria',array('' => 'Elegir una consultoria') + $elegirconsultoria)

    }}

</div>
<div class="form-group">
{{Form::label('Plantilla', 'Plantilla')}}
{{Form::text('id_plantilla', $plantilla->id, ['class'=>'form-control','readonly'])}}
</div>


<!-- <div class="form-group">
{{Form::label('periodo', 'Años de la consultoría')}}
{{Form::number('periodo', null, array('required'=>'required','class' => 'form-control','min'=>1,'max'=>30))}}
</div> -->


<!--<div class="form-group">
{{Form::label('plantilla', 'Consultoria&Plantilla')}}
{{Form::text('ConsultoriaPlantilla', null, ['class'=>'form-control'])}}
</div>
<div class="form-group">
{{Form::label('default', 'default')}}
{{Form::number('default', null, ['class'=>'form-control'])}}
</ div>-->
<div class="form-group">
{{Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary'])}}
</div>