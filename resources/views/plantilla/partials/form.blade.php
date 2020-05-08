<div class="form-group">
{{Form::label('name', 'Nombre de la plantilla')}}
{{Form::text('name', null, ['class'=>'form-control'])}}
</div>
<!-- <div class="form-group">
{{Form::label('descripción', 'Descripcion del plantilla')}}
{{Form::text('descripcion', null, ['class'=>'form-control'])}}
</div> -->

<div class="form-group">
    <div>
        {{Form::label('plantilla', 'Plantilla: ')}}
    <div>
    {{Form::file('plantilla')}}
</div>

<!-- <div class="form-group">
{{Form::label('anios', 'Años del Plantilla')}}
{{Form::text('anios', null, ['class'=>'form-control'])}}
</div> -->
<div class="form-group">
{{Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary'])}}
</div>