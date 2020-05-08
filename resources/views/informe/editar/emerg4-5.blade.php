<link href="{{ asset('vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">
<div class="container my-3"> 
{!! Form::model($Informe, ['route' =>['informe.updateestados_financieros', $Informe->id, $consultoria],
'method' => 'PUT']) !!}
    <center>  
        <div class="row">
            <h1 class="col-12">Modulo: {{$Informe->titulo18}}</h1>       
            <div class="form-group col-12">
                {{Form::label('titulo13', 'Título: Menu')}}
                {{Form::text('titulo13', null, ['class'=>'form-control'])}}
            </div>  
            <div class="form-group col-12">
                {{Form::label('titulo18', 'Título: Submenu')}}
                {{Form::text('titulo18', null, ['class'=>'form-control'])}}
            </div>  
            <div class="form-group col-12">
                {{Form::label('body', 'Texto')}}
                {{Form::textarea('parrafo14', null, ['class'=>'form-control'])}}
            </div>  
            <script src="{{asset('../vendor/ckeditor/ckeditor.js')}}"></script>  
            <script>
                CKEDITOR.config.height = 477;
                CKEDITOR.replace('parrafo14');
            </script>
        </div>
    </center>
    <div class="form-group">
        {{Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary'])}}
    </div>
</div>
{!! Form::close() !!}    