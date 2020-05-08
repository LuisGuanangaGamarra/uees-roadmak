<div class="form-group">
{{Form::label('name', 'Nombre de la consultoría')}}
{{Form::text('name', null, ['class'=>'form-control'])}}
</div>
<div class="form-group">
{{Form::label('descripción', 'Descripción de la consultoría')}}
{{Form::text('description', null, ['class'=>'form-control'])}}
</div>
<!--<div class="form-group">
{{Form::label('plantilla', 'Consultoria&Plantilla')}}
{{Form::text('ConsultoriaPlantilla', null, ['class'=>'form-control'])}}
</div>-->
<div class="form-group">
{{Form::label('precio', 'Precio de la consultoría')}}
{{Form::number('price', null, ['class'=>'form-control'])}}
</ div>
<br>
<div class="form-group">
{{Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary'])}}
</div>
