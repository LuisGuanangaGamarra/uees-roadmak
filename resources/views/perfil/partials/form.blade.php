<div class="form-group">
{{Form::label('file', 'Imagen')}}
{{Form::file('file', ['class'=>'d-block mx-auto'])}}
</div>
<div class="form-group">
{{Form::label('name', 'Nombres')}}
{{Form::text('name', null, ['class'=>'form-control'])}}
</div>
<div class="form-group">
{{Form::label('lastname', 'Apellidos')}}
{{Form::text('lastname', null, ['class'=>'form-control'])}}
</div>
<div class="form-group">
{{Form::label('email', 'Correo')}}
{{Form::text('email', null, ['class'=>'form-control'])}}
</div>
<div class="form-group">
{{Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary'])}}
</div>
