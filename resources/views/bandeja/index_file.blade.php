@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Breadcrumbs::render('bandeja_mis_consultorias.index_file', $consultoria) }}
    </div>
</div>


<div class="card">
  <div class="card-header" >
    Sección Carga de Archivos
    
  </div>

  <section class="card-body row" >
    <div class="col-md-6"style="text-align:center;">
      <p style="padding: .75rem;"><b>DESCARGAR PLANTILLA</b></p>

          @foreach($consultoria->Plantilla_byId($consultoria->consultorias) as $result  )
                @foreach($consultoria->plantilla_ById($result->id_plantilla) as $result2  )

                        @if($result2->plantilla)
                            <a href="{{ route('plantilla.download', $result2->plantilla)}}" 
                                class="btn btn-sm btn-success">
                                Descargue Gratis
                            </a>
                        @else 
                            <a href="{{ route('plantilla.download', $result2->plantilla)}}" 
                                class="btn btn-sm btn-success disabled">
                                Descargue Gratis
                            </a>
                        @endif
                    @endforeach
          @endforeach   
          
    </div>
    <div class="col-md-6"style="text-align:center ">
    <p style="padding: .75rem;"><b>CARGAR ARCHIVO</b></p>

    <div class="card-body">
    @if($consultoria->archivo==NULL )
          {!! Form::open(['route' =>['bandeja.show_file',$consultoria],'files' => true]) !!}
            @include('bandeja.partials.form')
          {!! Form::close() !!}
      @else 
          {!! Form::open(['route' =>['bandeja.show_file',$consultoria],'files' => true]) !!}
            @include('bandeja.partials.form')
          {!! Form::close() !!}
      
      @endif
      </div>
    </div>
    
  </section>
  <hr>
  <div class="card-body">
  <div class="container">
    <div class="table-responsive">
      <table id="example" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                      <tr>
                          <th>NOMBRE ARCHIVO</th>
                          <th>FECHA CARGADO</th>
                          <th>TAMAÑO ARCHIVO</th>
                          <th>ELIMINAR</th>
                      </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                       {{$nombre}}
                      </td>
                      <td>
                       {{$date}}
                      </td>
                      <td>
                       {{$size}}
                      </td>
                      <td>
                      @if($consultoria->archivo==NULL )
                      @else 
                      <a  href="{{ route('bandeja.delete_file', $consultoria->id)}}" 
                                       class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
                      @endif
                      </td>
                    </tr>
                  </tbody>
      </table>

    </div>






<br><br>

    <div class="row">
      <a href="{{route('bandeja.index')}}" class="col-2 btn btn-sm btn-warning my-3 ml-3 mr-1" style="max-width: max-content;" ><i class="fas fa-ban" ></i>
        Cancelar
      </a>

      @if($consultoria->archivo==NULL )
            <a href="javascript:;" data-toggle="modal" onclick="sendOnlyOffice({{$consultoria->id}})" 
                                    data-target="#aceptarModal" class="btn btn-sm btn-success  my-3 mx-2 disabled" data-backdrop="static" style="max-width: max-content;"><i class="fa fa-check"></i> 
            Aceptar</a>
      
      @else 
          <a href="javascript:;" data-toggle="modal" onclick="sendOnlyOffice({{$consultoria->id}})" 
                                    data-target="#aceptarModal" class="btn btn-sm btn-success  my-3 mx-2" data-backdrop="static" style="max-width: max-content;"><i class="fa fa-check"></i> 
            Aceptar</a>

      @endif
  </div>        

</div>
</div>





@endsection


@section('scripts')
@endsection