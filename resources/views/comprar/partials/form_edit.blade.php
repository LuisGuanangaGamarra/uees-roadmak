<div class="form-group">
    <ul class="list-unstyled">
        @foreach($indices as $indice)
            <li>
                <label>
                    {{ Form::checkbox('indices[]', $indice->id,$indice->indice_ById($consultoria_comprada->id,$indice->id))}}
                    {{ $indice->name}}
                </label>
            </li>
        @endforeach
    </ul>
</div>


<div class="form-group">
{{Form::hidden('datos_compra', $cliente->id, ['class'=>'form-control'])}}
</div>

<div class="row">
        <div class="form-group col-md-6">
        {{Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary'])}}
        </div>

        <div class="form-group col-md-6"><a class="btn btn-sm btn-warning" href="{{route('consultoria_comprada.index')}}">Cancelar</a></div>
<div>
