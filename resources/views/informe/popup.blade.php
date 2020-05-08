

<!-- MODALS -->
<!-- POPUP DESCARGO DE RESPONSABILIDAD -->

    <div class="modal fade bd-example-modal-lg" tabindex="-1"  aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalDescargoDeResponsabilidad" onclick="pausar()">
        <div class="modal-dialog modal-lg"  >
            <div class="modal-content"  >
            <!-- Modal Header 
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                </div>
                - Modal body -->
                <div class="modal-body" > 
                    <i class="fa fa-window-close" aria-hidden="true" data-dismiss="modal" onclick="pausar()"></i>
                    <!--<button type="button" class="close" data-dismiss="modal" onclick="pausar()" >&times;</button> -->
                    <div class="container my-3">
                        {!! Form::model($Informe, ['route' =>['informe.update', $Informe->id],
                        'method' => 'PUT']) !!}
                        <div class="row">
                            <h1>Document editor xD</h1>       
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
                                <div class="form-group">
                                {{Form::label('body', 'Modulo: Descargo De Responsabilidad')}}
                                {{Form::textarea('body', null, ['class'=>'form-control'])}}
                            </div>  

                           <script src="{{asset('../vendor/ckeditor/ckeditor.js')}}"></script>  
                           <script>
                           CKEDITOR.config.height = 400;
                           CKEDITOR.config.width = 400;
                           CKEDITOR.replace('body');
                           </script>

                        </div>
                        <div class="form-group">
                        {{Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary'])}}
                        </div>
                    </div>
                    {!! Form::close() !!}      
                      
                </div>   
                
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <!--<button type="button" class="btn btn-danger" data-dismiss="modal" onclick="pausar()">Close</button>-->       
            </div>
        </div>
    </div>

<!-- Fin del popup/MODAL DESCARGO DE RESPONSABILIDAD-->



<!-- POPUP DESCARGO DE INFORMACION GENERAL DE LA EMPRESA -->

    <div class="modal fade bd-example-modal-lg" tabindex="-1"  aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalDescargoDeResponsabilidad7" onclick="pausar()">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body"> 
                    <i class="fa fa-window-close" aria-hidden="true" data-dismiss="modal" onclick="pausar()"></i>
                        <div class="container my-3">            
                            {!! Form::model($Informe, ['route' =>['informe.updateinf', $Informe->id],
                            'method' => 'PUT']) !!}
                            <div class="row">
                                <h1>Document editor2</h1>   
                                <div class="form-group">
                                    {{Form::label('parrafo2', 'Modulo: Información General De La Empresa')}}
                                    {{Form::textarea('parrafo2', null, ['class'=>'form-control'])}}
                                </div>
                                <script>
                                    ClassicEditor
                                        .create( document.querySelector( '#parrafo2' ), 
                                        {
                                            language: 'es' ,
                                        }) 
                                        .then( editor2 => {
                                            console.log( editor2 );
                                        })
                                        .catch( error => {
                                            console.error( error );
                                        });
                                </script>
                            </div>
                        <div class="form-group">
                            {{Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary'])}}
                        </div> 
                    </div>
                    {!! Form::close() !!}    
                </div>   
            </div>
            <div class="modal-footer">  
            </div>
        </div>
    </div>

<!-- Fin del popup/MODAL INFORMACION GENERAL DE LA EMPRESA -->



