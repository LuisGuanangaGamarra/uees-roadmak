@if($consultoria->archivo==NULL)

    <div class="form-group">
    {{Form::file('image', array('required'=>'required','class' => 'form-control'))}}
    </div>      
      <div class="form-group">
    {{Form::submit('Cargue Aqui', ['class'=>'btn btn-primary'])}}
    </div> 

@else 
    <div class="form-group">
    {{Form::file('image', array('required'=>'required','class' => 'form-control'))}}
    </div>      
      <div class="form-group">
    {{Form::submit('Cargue Aqui', ['class'=>'btn btn-primary'])}}
    <!-- <a href="" data-toggle="modal" data-target="#aceptarModal"  data-backdrop="static" class="col-4 btn btn-sm btn-success my-3 mx-2" style="max-width: max-content;"><i class="fas fa-check"></i>
        Aceptar
    </a> -->
    </div> 

@endif