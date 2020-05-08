@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Breadcrumbs::render('articulos') }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Artículos
  </div>
<div class="card-body">
    <div class="container">
        <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>NOMBRE</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                
                        @foreach($datos2 as $articulo)
                            <tr>
                                <td>{{$articulo->id_product}}</td>
                                <td>{{$articulo->name}}</td>
                                <td width="10px">
                                    @can('articulos.show')
                                        <a href="{{ route('articulos.show', $articulo->id_product)}}" 
                                            class="btn btn-sm btn-info">
                                            Ver
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

