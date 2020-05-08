@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
    {{ Breadcrumbs::render('comprar.index') }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Consultorías compradas
    @can('comprar.create')
    <a href="{{route('cliente.create')}}"
    class="btn btn-primary pull-right">
        Crear
    </a>
    @endcan
  </div>
<div class="card-body">
<div class="container">
<div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th width="10px">ID</th>
                <th>CLIENTE</th>
                <th>CONSULTORÍA</th>
                <th>PERIODO</th>
                <th>CONSULTOR</th>
                <th>FECHA COMPRADA</th>
                <th>ARCHIVO</th>
                <th>ESTADO</th>
            </tr>
        </thead>
        <tbody>
           @foreach($consultoria_comprada as $consultoria)
            <tr>
                <td>{{$consultoria->id}}</td>

                <!-- DATOS DE CLIENTE-->
                @foreach($consultoria->usuario_ById($consultoria->cliente) as $result  )
                    <td style="text-align:center">{{$result->name}}</td>
                @endforeach

                <!-- DATOS DE CONSULTORIA-->
                <td style="text-align:center">{{$consultoria->subConsultoriaById($consultoria->consultorias)->name}}</td>
                  
            
                <td style="text-align:center">{{$consultoria->num_periodos}}</td>    

                
                <!-- DATOS DE CONSULTOR-->
                @foreach($consultoria->usuario_ById($consultoria->consultor) as $result  )
                    <td style="text-align:center">{{$result->name}}</td>
                @endforeach


                <td>{{$consultoria->created_at}}</td>

                <td>
                    @if ($consultoria->archivo)
                    {{$consultoria->archivo}}

                    @else 
                    Sin carga

                    @endif
                
               </td>

               <td>
                     @if ($consultoria->estado==NULL)
                            Sin Activar
                    @elseif( $consultoria->isInforme($consultoria->id))
                            Cerrado
                    @else
                            {{$consultoria->estado}}
                    @endif
                </td>
               
            </tr>
           @endforeach
        </tbody>

        </table>
    </div>
</div>
</div>
</div>
@endsection
    @section('scripts')
@endsection

