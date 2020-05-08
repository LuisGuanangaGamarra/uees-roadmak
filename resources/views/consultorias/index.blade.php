@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Breadcrumbs::render('consultorias') }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Consultorías
    @can('consultorias.create')
    <a href="{{route('consultorias.create')}}"
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
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($datos2 as $consultoria)
                    <tr>
                        <td>{{$consultoria->id_product}}</td>
                        <td>{{$consultoria->name}}</td>
                        <td width="10px">

                            <a href="{{ route('subconsultorias.index', $consultoria->id_product)}}" 
                                    class="btn btn-sm btn-info">
                                    Ver
                                </a>
                        </td>
                        <td width="10px">
                            @can('consultorias.edit')
                                <a href="{{ route('consultorias.edit', $consultoria->id_product)}}" 
                                    class="btn btn-sm btn-warning">
                                    Editar
                                </a>
                            @endcan
                        </td>

                        <td width="10px">
                            @can('consultorias.destroy')
                                <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$consultoria->id_product}})" 
                                data-target="#aceptarInactivar" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>Eliminar</a>
                            @endcan
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

