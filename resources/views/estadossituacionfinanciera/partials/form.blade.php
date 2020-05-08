<div class="form-group">
{{Form::label('idconsultoria', 'consultoria')}}
{{Form::text('idconsultoria', null, ['class'=>'form-control'])}}
</div>
<div class="form-group">
{{Form::label('name', 'Nombre')}}
{{Form::text('name', null, ['class'=>'form-control'])}}
</div>
<div class="form-group">
{{Form::label('periodo1', 'Periodo1')}}
{{Form::text('periodo1', null, ['class'=>'form-control'])}}
</div>
<div class="form-group">
{{Form::label('periodo2', 'Periodo2')}}
{{Form::text('periodo2', null, ['class'=>'form-control'])}}
</div>
<div class="form-group">
{{Form::label('periodo3', 'Periodo3')}}
{{Form::text('periodo3', null, ['class'=>'form-control'])}}
</div>

<div class="form-group">
{{Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary'])}}
</div>

