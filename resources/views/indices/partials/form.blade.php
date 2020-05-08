<div class="form-group">
{{Form::label('name', 'Nombre del índice')}}
{{Form::text('name', null, ['class'=>'form-control'])}}
</div>
<div class="form-group">
{{Form::label('posicion_cuenta', 'Posición de cuenta')}}
{{Form::text('posicion_cuenta', null, ['class'=>'form-control'])}}
</div>

<div class="form-group">
{{Form::label('formula', 'Fórmula de índice')}}
{{Form::text('formula', null, ['class'=>'form-control'])}}
</div>

<div class="form-group">
{{Form::label('posicion_formula', 'Posición de fórmula')}}
{{Form::text('posicion_formula', null, ['class'=>'form-control'])}}
</div>

<div class="form-group">
    {{Form::label('estadosfinancieros_id', 'Estados Financieros')}}
    {{Form::select('estadosfinancieros_id', $estados, ['class'=>'form-control'])}}
</div>

<div class="form-group">
{{Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary'])}}
</div>