@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
    {{ Breadcrumbs::render('cliente.create')}}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Datos de cliente
  </div>
  <div class="card-body">
      {!! Form::model($cliente, ['route' => ['cliente.update', $cliente->id],'method' => 'PUT']) !!}

        @include('clientes.partials.form')

      {!! Form::close() !!}
  </div>
</div>
@endsection