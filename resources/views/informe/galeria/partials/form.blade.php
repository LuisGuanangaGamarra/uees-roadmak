<div class="form-group">
    <!--{{Form::label('idcliente', 'Cliente')}}-->
    {{Form::hidden('idcliente', $cliente, ['class'=>'form-control'])}}
</div>
<div class="form-group">
<!--    {{Form::label('idinforme', 'Consultoria')}}-->
    {{Form::hidden('idinforme', $consultoria, ['class'=>'form-control'])}}
</div>
<div class="form-group">
    {{Form::label('file', 'Imagen')}}
    {{Form::file('file', ['class'=>'d-block mx-auto'])}}
</div>
<div class="form-group">
    {{Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary'])}}
</div>

