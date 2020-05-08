<div class="form-group">
{{Form::label('name', 'Nombre de la consultoria')}}
{{Form::text('name', null, ['class'=>'form-control'])}}
</div>
<div class="form-group">
{{Form::label('descripción', 'Descripcion de la consultoria')}}
{{Form::text('descripcion', null, ['class'=>'form-control'])}}
</div>
<div class="form-group">
{{Form::label('plantilla', 'Índice de la consultoria')}}
{{Form::text('plantilla', null, ['class'=>'form-control'])}}
</div>
<div class="form-group">
{{Form::label('precio', 'Precio de la consultoria')}}
{{Form::number('precio', null, ['min' => '1.99', 'max' => '1000000.00','class'=>'form-control'])}}
</div>
<div class="form-group">
{{Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary'])}}
</div>