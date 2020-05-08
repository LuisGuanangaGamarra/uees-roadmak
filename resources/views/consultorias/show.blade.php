@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Breadcrumbs::render('consultorias.show',$datos2id ) }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Consultoría
  </div>
  <div class="card-body">
  <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                <!-- <th scope="col">#</th>
                <th scope="col">First</th> -->
                </tr>
            </thead>
            <tbody>
           
                <tr>
                <th width="70px" scope="row">Nombre: </th>
                <td>{{$datos2id->name}}</td>
                </tr>
                <tr>
                <th width="70px" scope="row">Descripción: </th>
                <td>{{$datos2id->description}}</td>
                </tr>
               
                <tr>
                <th width="70px" scope="row">Precio: </th>
                <td>{{$datos2id->price}}</td>
                </tr>
            </tbody>
        </table>
    </div>
  </div>
</div>
@endsection