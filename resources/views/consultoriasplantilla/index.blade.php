@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Breadcrumbs::render('ci') }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Consultorias
    @can('c&i.create')
    <a href="{{route('consultoriasplantilla.create')}}"
    class="btn btn-primary pull-right">
        Crear
    </a>
    @endcan
  </div>
  <div class="card-body ">
    <div class="table-responsive">
    <table class="table table-strip table-hover">
        <thead>
            <tr>
               <!-- <th width="10px">ID</th>-->
               <th width="10px">Consultoria</th>
                <th width="10px">Plantilla</th>
                <th width="10px">Año de la consultoría</th>
       
                <th colspan="3">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
           @foreach($consultoriaPlantilla as $consultoriaplantilla)
            <tr>
              <!--  <td>{{$consultoriaplantilla->id}}</td>
-->
               
                <!-- DATOS DE CONSULTORIA-->
                <td> {{$consultoriaplantilla->consultoria( $consultoriaplantilla->id_consultoria )->name}}</td>

                 <!-- DATOS DE INDICE-->
                 @foreach($consultoriaplantilla->plantilla_ById($consultoriaplantilla->id_plantilla) as $result  )
                    <td>{{$result->name}}</td>
                    <td> {{$result->anios}} </td>
                @endforeach



<!--
                <td>
                @switch($consultoriaplantilla->default)
                    @case('True')
                        <a href="" class="btn btn-success active">{{$consultoriaplantilla->default}}</a>
                        @break
                    @case('False')
                        <a href="" class="btn btn-warning disabled">{{$consultoriaplantilla->default}}</a>
                    @break
                    @default
                        <a>no definido</a>
                @endswitch
                
                </td>
                 <td width="10px">
                    @can('c&i.show')
                        <a href="{{ route('consultoriasplantilla.CambiarEstado', $consultoriaplantilla->id)}}" 
                            class="btn btn-sm btn-info">
                            Seleccionar
                        </a>
                    @endcan
                </td> -->
                <td width="10px">
                    @can('c&i.show')
                        <a href="{{ route('consultoriasplantilla.show', $consultoriaplantilla->id)}}" 
                            class="btn btn-sm btn-info">
                            Ver
                        </a>
                    @endcan
                </td>
                <td width="10px">
                    @can('c&i.edit')
                        <a href="{{ route('consultoriasplantilla.edit', $consultoriaplantilla->id)}}" 
                            class="btn btn-sm btn-warning">
                            Editar
                        </a>
                    @endcan
                </td>
                <td width="10px">
                    @can('c&i.destroy')
                    {!! Form::open(['route'=>['consultoriasplantilla.destroy', $consultoriaplantilla->id], 
                        'method'=>'DELETE']) !!}
                        <button class="btn btn-sm btn-danger">
                            Eliminar
                        </button>
                    {!! Form::close() !!}
                    @endcan
                </td>
            </tr>
           @endforeach
        </tbody>

    </table>
    </div>
    {{$consultoriaPlantilla->links("pagination::bootstrap-4")}}
  </div>
</div>
@endsection