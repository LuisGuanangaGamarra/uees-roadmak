@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
    {{ Breadcrumbs::render('comprar.edit', $consultoria_comprada) }}
    </div>
</div>

<div class="card" > 
    <div class="card-header" >
      EDITAR CONSULTORÍA COMPRADA
    </div>


    <div class="card-body " style="margin-top: 30px;"> 
        <section class="table-responsive">
                <p>Resumen de la consultoría comprada</p>
                <div style="  border-style: solid;border-color: gainsboro;">
                    <section class="row" style="margin-top: 30px;margin-left: 30px;margin-right: 30px;">
                        
                        <div class="col-md-12">
                            <!--<b style="color:#4272d7;">DETALLE DE LA COMPRA</b>
                            --><table class="table table-strip table-hover" style="margin-bottom: 50px;">
                                <thead>
                                <tr>
                                <th colspan="3"> <b style="color:#4272d7;">DETALLE DE LA COMPRA</b></th>
                                <th colspan="3"> <b style="color:#4272d7;">DETALLE DE LA CONSULTORÍA</b></th>
                                </tr>
                                    <tr>
                                        <th>USUARIO CLIENTE</th>
                                        <th>CLIENTE</th>
                                        <th>CONSULTOR</th>
                                        <th>CONSULTORÍA</th>
                                        <th>PERIODO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$usuario_cliente->name}}</td>
                                        <td>{{$cliente->nombre}} {{$cliente->apellidos}}</td>
                                        <td>{{$consultor->name}}</td>
                                        <td>{{$info_consultoria->name}}</td>
                                        <td>{{$consultoria_comprada->num_periodos}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </section>

                    <section class="row" style="margin-left: 30px;margin-right: 30px;margin-bottom: 50px;">
                        <div class="col-md-6">
                            <b style="color:#4272d7;">FORMULARIO</b>
                            <div class="form-group">
                                <p style="font-size:15px"><b>¿A qué sector pertenece su empresa?</b></p>
                                <p>{{$formulario_cliente->respuesta1}}</p>
                            </div>
                            <div class="form-group">
                                <p style="font-size_15px"><b>¿La empresa realiza operaciones de Comercio exterior?</b></p>
                                <p>{{$formulario_cliente->respuesta2}}</p>
                            </div>

                            <div class="form-group">
                                <p style="font-size_15px"><b>¿La empresa mantiene operaciones con partes relacionadas?</b></p>
                                <p>{{$formulario_cliente->respuesta3}}</p>
                            </div>
                            <div class="form-group">
                                <p style="font-size_15px"><b>Indique la actividad económica de su empresa</b></p>
                                <p>{{$formulario_cliente->sectorEconomicoById($formulario_cliente->respuesta4)->name}}</p>
                            </div>
<!--                             <div class="form-group">
                                <p style="font-size_15px"><b>¿Está su empresa inscrita en el mercado de valores?</b></p>
                                <p>{{$formulario_cliente->respuesta5}}</p>
                            </div>

                            <div class="form-group">
                                <p style="font-size_15px"><b>Está su empresa obligada a contratar auditoría externa?</b></p>
                                <p>{{$formulario_cliente->respuesta6}}</p>
                            </div> -->


                            
                        </div>
                        <div class="col-md-6">
                            <b style="color:#4272d7;">ÍNDICES</b>
                            <div class="form-group">
                               <ul class="list-unstyled">
                                    @foreach($CompraIndices as $indice)
                                        <li>
                                            <label>                                       
                                                {{ $indice->getName($indice->id_indice)}}
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        

                        @if ($formulario_cliente->formulariopdf != NULL)
                        <div class="col-md-12">
                            <b style="color:#4272d7;">PDF</b>
                            <div class="form-group">
                                <hr/>
                               <!-- <img src="{{ asset('/images/users/miavatar.png')}}" class="mx-auto rounded-circle" width="256" height="256"/> 
           

           
                                <img src="http://localhost:8001/images/users/miavatar.png" alt="Avatar Pierre"/>
                               
                                <iframe width="400" height="400" src="{{asset('images/bg-title-01.jpg')}}" frameborder="0"></iframe>
                               
                                <iframe src="http://www.onlineicttutor.com/wp-content/uploads/2016/04/pdf-at-iframe.pdf" width="100%" height="300"></iframe>
      


                               <iframe width="400" height="400" src="{{asset('images/bg-title-01.jpg')}}" frameborder="0"></iframe>-->
                             
                               <div class="modal-content col-12">
                               {{$formulario_cliente->formulariopdf}}
                               <embed  width="100%" height="700"  src="{{asset($formulario_cliente->formulariopdf)}}">
                    
                             <!--  <embed  width="100%" height="700"  src="{{asset('PDF/C_Comprada1/fwMNBCstrENTMTZvhYEmZ2PwWp1rlovFGd55H6TJ.pdf')}}">
                    
                        <embed  width="100%" height="700"  src="{{asset('images/fwMNBCstrENTMTZvhYEmZ2PwWp1rlovFGd55H6TJ.pdf')}}">
                   --> </div>
                                 <!--<ul class="list-unstyled">
                                    @foreach($subplantilla as $subplantilla)
                                        <li>
                                            <label>                                       
                                                {{ $subplantilla->getName($subplantilla->subplantilla_id)}}
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>-->
                            </div>
                        </div>
@endif


                    </section>

                    
                </div>
     
            
                <p style="margin-top: 50px;"">Cambios a realizar</p>
                <div style="  border-style: solid;border-color: gainsboro;">
                    <section class="row" style="margin-left: 30px;margin-right: 30px;margin-bottom: 50px;margin-top: 50px;">
                    <b style="color:#4272d7;">ÍNDICES</b>
                        <div class=" col-md-6">
                           
                            {!! Form::model($consultoria_comprada, ['route' =>['comprar.update', $consultoria_comprada->id],
                            'method' => 'PUT']) !!}

                             @include('comprar.partials.form_edit') 

                             {!! Form::close() !!}
                        </div>
                    </section>
                </div>





        </section>

    </div>
</div>
@endsection