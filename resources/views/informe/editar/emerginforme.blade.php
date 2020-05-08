<link href="{{ asset('vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

<div class="container my-3">
                        {!! Form::model($Informe, ['route' =>['informe.updateinf', $Informe->id, $consultoria],
                        'method' => 'PUT']) !!}
                      <center>  <div class="row">
                            <h1 class="col-12">Modulo: Descargo De Responsabilidad</h1>       
                           <!-- <div class="form-group">
                                {{Form::label('parrafo1', 'Modulo: Descargo De Responsabilidad')}}
                                {{Form::textarea('parrafo1', null, ['class'=>'form-control'])}}
                            </div>  
                                <script>
                                    ClassicEditor
                                        .create( document.querySelector( '#parrafo1' ), 
                                        {
                                            language: 'es' ,
                                        }) 
                                        .then( editor => {
                                            console.log( editor );
                                        })
                                        .catch( error => {
                                            console.error( error );
                                        } );
                                </script>-->
                                <!-- <div class="form-group">
                               {{Form::label('titulo', 'Modulo: Descargo De Responsabilidad')}}
                                </div>-->
                                <div class="form-group col-12">
                                {{Form::label('titulo3', 'Título')}}
                                {{Form::text('titulo3', null, ['class'=>'form-control'])}}
                                </div>
                                <div class="form-group col-12">
                                {{Form::label('parrafo', 'Texto')}}
                                {{Form::textarea('parrafo2', null, ['class'=>'form-control'])}}
                                </div>  

                           <script src="{{asset('../vendor/ckeditor/ckeditor.js')}}"></script>  
                           <script>
                           CKEDITOR.config.height = 477;
                           //CKEDITOR.config.width = 700;
                           CKEDITOR.replace('parrafo2');
                           </script>

                        <div class="form-group">
                        {{Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary'])}}
                        </div>
                    </div>
                    {!! Form::close() !!}    
