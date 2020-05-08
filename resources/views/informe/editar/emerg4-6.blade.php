<link href="{{ asset('vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">
<div class="container my-3">  
{!! Form::model($Informe, ['route' =>['informe.updatecomentarios_flujo_endeudamiento', $Informe->id, $consultoria],
'method' => 'PUT']) !!}
    <center>  
        <div class="row">
            <h1 class="col-12">Modulo: {{$Informe->titulo19}}</h1>       
            <div class="form-group col-12">
                {{Form::label('titulo13', 'Título: Menu')}}
                {{Form::text('titulo13', null, ['class'=>'form-control'])}}
            </div>  
            <div class="form-group col-12">
                {{Form::label('titulo19','Titulo:Submenu')}}
                {{Form::text('titulo19',null,['class'=>'form-control'])}}
            </div>
            <div class="form-group col-12">
                {{Form::label('body', 'Texto')}}
                {{Form::textarea('parrafo15', null, ['class'=>'form-control'])}}
            </div>  
            <script src="{{asset('../vendor/ckeditor/ckeditor.js')}}"></script>  
            <script>
                CKEDITOR.config.height = 477;
                CKEDITOR.replace('parrafo15');
            </script>
        </div>
    </center>
    <div class="form-group">
        {{Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary'])}}
    </div>
</div>
{!! Form::close() !!}    