<div class="form-group">
{{Form::label('name', 'Nombre de la cuenta')}}
{{Form::text('name', null, ['class'=>'form-control'])}}
</div>

<div class="form-group">
{{Form::label('Grupo de cuenta n° 1', 'Grupo de cuenta n° 1')}}
    <div>
    {{Form::select('type_1', ['AT' => 'AT - Activo', 'PA' => 'PA - Pasivo', 'PT' => 'PT - Patrimonio'],null, ['placeholder' => 'Seleccione uno'])}}
    </div>
</div>


<div class="form-group">

{{Form::label('Grupo de cuenta n° 2', 'Grupo de cuenta n° 2')}}
    <div>
    {{Form::select('type_2', ['AC' => 'AC - Activo Corriente', 'ANC' => 'ANC - Activo No Corriente', 'PC' => 'PC - Pasivo Corriente', 'PNC' => 'PNC - Pasivo No Corriente', 'PT' => 'Ninguno'],null, ['placeholder' => 'Seleccione uno'])}}
    </div>

</div>


<div class="form-group">
{{Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary'])}}
</div> 