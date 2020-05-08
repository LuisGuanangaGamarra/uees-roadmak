@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
    {{ Breadcrumbs::render('subconsultorias',$consultoria->id_product) }}
    
    </div>
</div>
<div class="card">
  <div class="card-header">
   Sub-Consultorías
   
    <a href="{{route('subconsultorias.create',$consultoria->id_product)}}"
    class="btn btn-primary pull-right">
        Crear
    </a>
   
  </div>

<div class="card-body">
<div class="container">

<div class="form-group">
        <div style="text-align:center">DATOS CONSULTORÍA</div>
        <br>
        
        <div class="form-group row">
            <label class='col-sm-3 col-form-label'><b>Nombre:</b> </label> 
            <div class='col-sm-9'>{{$consultoria->name}}</div><br>
        </div>
        
        <div class="form-group row">
            <label class='col-sm-3 col-form-label'><b>Precio:</b> </label> 
            <div class='col-sm-9'>{{$consultoria->price}}</div><br>
        </div>

        <div class="form-group row">
            <label class='col-sm-3 col-form-label'><b>Descripción:</b> </label> 
            <div class='col-sm-9'>{{$consultoria->description}}</div><br>
        </div>
    
</div>

<div style="text-align:center">DATOS SUBCONSULTORÍA</div>

<div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
               <th>ID</th>
               <!-- <th width="10px">Consultoria</th> -->
                <th>Nombre</th>
                <th>Requiere Índice</th>
                <th>Precio</th>
                <th>Estado</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
           @foreach($subConsultorias as $subconsultorias)
            <tr>
                <td>{{$subconsultorias->id}}</td>
               
                <!-- DATOS DE CONSULTORIA-->
                <!-- <td> {{$subconsultorias->consultoria( $subconsultorias->grupo )->name}}</td> -->

                <td>{{$subconsultorias->name}}</td>

                <td>
                    @if($subconsultorias->req_indice==1)
                        VERDADERO
                    @else
                        FALSO
                    @endif
                </td>

                <td>{{$subconsultorias->precio}}</td>
                <td>{{$subconsultorias->estado}}</td>


                <td width="10px">
                    
                        <a href="{{ route('subconsultorias.show', $subconsultorias->id)}}" 
                            class="btn btn-sm btn-info">
                            Ver
                        </a>
                   
                </td>
                <td width="10px">
                  
                        <a href="{{ route('subconsultorias.edit', $subconsultorias->id)}}" 
                            class="btn btn-sm btn-warning">
                            Editar
                        </a>
                  
                </td>
                <td width="10px">
                   
                    {!! Form::open(['route'=>['subconsultorias.destroy', $subconsultorias->id], 
                        'method'=>'DELETE']) !!}
                        <button class="btn btn-sm btn-danger">
                            Deshabilitar
                        </button>
                    {!! Form::close() !!}
                  
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