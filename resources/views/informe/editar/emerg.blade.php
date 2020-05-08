<link href="{{ asset('vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">
<div class="container my-3">
{!! Form::model($Informe, ['route' =>['informe.update', $Informe->id],
'method' => 'PUT']) !!}
    <center>  
        <div class="row">
            <h1 class="col-12">Editar</h1>       
           <!--  <div class="form-group col-12">
                {{Form::label('titulo1', 'Título:')}}
                {{Form::text('titulo1', null, ['class'=>'form-control'])}}
            </div> 
            <div class="form-group col-12">
                {{Form::label('titulo2', 'Título: Razon Social')}}
                {{Form::text('titulo2', null, ['class'=>'form-control'])}}
            </div>  -->
            <div class="form-group col-12">
              <!--   {{Form::label('body', 'Modulo: Descargo De Responsabilidad')}} -->
                {{Form::textarea('parrafo1', null, ['class'=>'form-control'])}}
            </div>  



            <script src="{{asset('../vendor/ckeditor/ckeditor.js')}}"></script>  
            <script>
                CKEDITOR.config.height = 1000;
                //CKEDITOR.config.max-height = 10000;
                CKEDITOR.replace('parrafo1', {
              
                    allowedContent: true
                } );

            </script>
        </div>
    </center>
    <div class="form-group">
        {{Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary'])}}
    </div>
</div>
{!! Form::close() !!}    
