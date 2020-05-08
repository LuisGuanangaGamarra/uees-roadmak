<div class="form-group">

</div>
<div class="form-group">
{{Form::label('name', 'NOMBRE')}}
{{Form::text('name', null, ['class'=>'form-control'])}}
</div>
<div class="form-group">
{{Form::label('posicion_cuenta', 'POSICIÓN CUENTA')}}
{{Form::text('posicion_cuenta', null, ['class'=>'form-control'])}}
</div>


<div class="form-group">
{{Form::label('formula', 'FORMULA')}}
{{Form::text('formula', null, ['class'=>'form-control'])}}
</div>
<div class="form-group">
{{Form::label('posicion_formula', 'POSICIÓN FORMULA')}}
{{Form::text('posicion_formula', null, ['class'=>'form-control'])}}
</div>

<div class="form-group">
{{Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary'])}}
</div>





