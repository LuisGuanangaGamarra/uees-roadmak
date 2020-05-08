<style>
        .foo {
        width:70%;
        }
</style>


<div class="form-group row">
    {{Form::label('SubConsultoria', 'NOMBRE', ['class'=>'col-sm-3 col-form-label'] )}}
    <div class="col-sm-9">
        {{Form::text('name', null, ['class'=>'form-control'])}}
    </div>
</div> 
<br>


<div class="form-group row">
    {{Form::label('Consultoria', 'CONSULTORÍA', ['class'=>'col-sm-3 col-form-label'] )}}
    <div class="col-sm-9">
        {{Form::select('grupo',array($subconsultoria => $subConsultorias->consultoria($subconsultoria)->name) + $elegirconsultoria , null, array('required'=>'required','class' => 'foo'))}}
    </div>
</div>


<div class="form-group row">

    {{Form::label('req_indice', 'REQUIERE ÍNDICE', ['class'=>'col-sm-3 col-form-label'] )}}
        <div class="col-sm-9">    
            <div class="form-group">
            {{ Form::radio('req_indice', 1 , false) }}
            {!! Form::label('label', 'VERDADERO') !!} <br/>
            {{ Form::radio('req_indice', 0 , false) }}
            {!! Form::label('label', 'FALSO') !!}<br/>
            </div>
        </div>

</div>

<div class="form-group row">
    {{Form::label('precio', 'PRECIO', ['class'=>'col-sm-3 col-form-label'] )}}
    <div class="col-sm-9"> 
        {{Form::text('precio', null, ['class'=>'form-control'])}}
    </div>
</div>



<div class="form-group row">
    {{Form::label('Estado Sub-Consultoria', 'ESTADO SUB-CONSULTORÍA', ['class'=>'col-sm-3 col-form-label'] )}}
    <div class="col-sm-9"> 
        {{Form::select('estado', ['A' => 'Activo', 'I' => 'Inactivo'],null, ['placeholder' => 'Seleccione uno'])}}
    </div>
</div>





<div class="form-group row">
    <div class="col-sm-3 col-form-label"> 
        {{Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary'])}}
    </div>
</div>