<div class="form-group row">
{{Form::label('cedula_ruc', 'Cédula/RUC', ['class'=> 'col-sm-2 col-form-label'])}}
<div class="col-sm-10">
{{Form::text('cedula_ruc', null, ['class'=>'form-control'])}}
</div>
</div>
<div class="form-group row">
{{Form::label('nombre', 'Nombres' , ['class'=> 'col-sm-2 col-form-label'])}}
<div class="col-sm-10">
{{Form::text('nombre', null, ['class'=>'form-control'])}}
</div>
</div>
<div class="form-group row">
{{Form::label('apellidos', 'Apellidos', ['class'=> 'col-sm-2 col-form-label'])}}
<div class="col-sm-10">
{{Form::text('apellidos', null, ['class'=>'form-control'])}}
</div>
</div>
<div class="form-group row">
{{Form::label('empresa', 'Empresa', ['class'=> 'col-sm-2 col-form-label'])}}
<div class="col-sm-10">
{{Form::text('empresa', null, ['class'=>'form-control'])}}
</div>
</div>
<div class="form-group row">
{{Form::label('direccion', 'Dirección', ['class'=> 'col-sm-2 col-form-label'])}}
<div class="col-sm-10">
{{Form::text('direccion', null, ['class'=>'form-control'])}}
</div>
</div>
<div class="form-group row">
{{Form::label('ciudad', 'Ciudad', ['class'=> 'col-sm-2 col-form-label'])}}
<div class="col-sm-10">
{{Form::text('ciudad', null, ['class'=>'form-control'])}}
</div>
</div>
<div class="form-group row">
{{Form::label('telefono', 'Teléfono', ['class'=> 'col-sm-2 col-form-label'])}}
<div class="col-sm-10">
{{Form::text('telefono', null, ['class'=>'form-control'])}}
</div>
</div>
<div class="form-group row">
{{Form::label('pais', 'País', ['class'=> 'col-sm-2 col-form-label'])}}
<div class="col-sm-10">
{{Form::text('pais', null, ['class'=>'form-control'])}}
</div>
</div>
<div class="form-group">
{{Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary'])}}
</div>