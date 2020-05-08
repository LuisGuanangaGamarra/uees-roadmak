@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Breadcrumbs::render('estadosflujosefectivos.create') }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Crear Estado de Flujo de Efectivo
  </div>
  <div class="card-body">
      {!! Form::open(['route' => 'estadosflujosefectivos.store']) !!}

        @include('estadosflujosefectivos.partials.form')

      {!! Form::close() !!}
  </div>
</div>
@endsection