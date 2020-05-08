@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Breadcrumbs::render('flujos.show', $flujos) }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Flujo
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
                <th width="70px" scope="row">Nombre:</th>
                <td>{{$flujos->name}}</td>
                </tr>
               
               
            </tbody>
        </table>
    </div>
  </div>
</div>
@endsection