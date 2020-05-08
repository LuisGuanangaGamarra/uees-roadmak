<div class="form-group">
{{Form::label('cliente', 'Usuario')}}
{{Form::select('cliente',array('' => 'Elegir un usuario') + $clientes , null, array('required'=>'required','class' => 'foo'))}}
</div>
<div class="form-group">
{{Form::label('consultorias', 'Consultoria')}}
{{Form::select('consultorias',array('' => 'Elegir una consultoria') + $consultoriasArray , null, array('required'=>'required','class' => 'foo'))}}
</div>


<div class="form-group">
{{Form::label('Número de Años', 'Número de años')}}
    
    {{Form::select('num_periodos', array('' => 'Elegir número de años')+ ['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10'],null, array('required'=>'required','class' => 'foo'), ['placeholder' => 'Seleccione uno'])}}
    
</div>


<div class="form-group">
{{Form::label('consultor', 'Consultor')}}
{{Form::select('consultor',array('' => 'Elegir una consultor') + $consultores , null, array('required'=>'required','class' => 'foo'))}}
</div>

<div class="form-group">
{{Form::hidden('estado', 'consulta', ['class'=>'form-control'])}}
</div>

<table class="table table-strip table-hover">
        <thead>
            <tr>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>EMPRESA</th>
                <th>DIRECCIÓN</th>
                <th>CIUDAD</th>
                <th>TELÉFONO</th>
                <th>PAÍS</th>
            </tr>
        </thead>
        <tbody>
           
            <tr>
                <td>{{$cliente->nombre}}</td>
                <td>{{$cliente->apellidos}}</td>
                <td>{{$cliente->empresa}}</td>
                <td>{{$cliente->direccion}}</td>
                <td>{{$cliente->ciudad}}</td>
                <td>{{$cliente->telefono}}</td>
                <td>{{$cliente->pais}}</td>
               
            </tr>
           
        </tbody>

    </table>
<!-- <div class="form-group">
{{Form::label('datos', 'Datos de Compra')}}
{{Form::textarea('datos', $cliente->toJson(JSON_PRETTY_PRINT), ['class'=>'form-control'])}}
</div> -->


<div class="form-group">
{{Form::hidden('datos_compra', $cliente->id, ['class'=>'form-control'])}}
</div>

<div class="form-group" data-toggle="modal" 
data-target="#compra_Modal"  data-keyboard="false" data-backdrop="static">
{{Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary'])}}
</div>

<div class="form-group"><a class="btn btn-sm btn-warning" href="{{route('comprar.index')}}">Cancelar</a></div>
