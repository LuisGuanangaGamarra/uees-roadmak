@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
       
    </div>
</div>
<div class="card">
  <div class="card-header">
    Índices
    @can('indice.create')
    <!--<a href="{{route('indice.create')}}"
    class="btn btn-primary pull-right">
        Crear
    </a>-->
    @endcan
  </div>


<div class="card-body">
<div class="container">
<div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
           @foreach($indices as $indice)
            <tr>
                <td>{{$indice->id}}</td>
                <td>{{$indice->name}}</td>
                <td width="10px">
                    @can('indice.show')
                        <a href="{{ route('indice.show', $indice->id)}}" 
                            class="btn btn-sm btn-info">
                            Ver
                        </a>
                    @endcan
                </td>
                <td width="10px">
                    @can('indice.edit')
                        <a href="{{ route('indice.edit', $indice->id)}}" 
                            class="btn btn-sm btn-warning">
                            Editar
                        </a>
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
