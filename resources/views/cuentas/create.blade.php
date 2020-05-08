@extends('template.index')

@section('content')
<div class="row">
<!--     <div class="col-md-12">
        {{ Breadcrumbs::render('estadosflujosefectivos.create') }}
    </div> -->
</div>
<div class="card">
  <div class="card-header">
    Crear Cuenta
  </div>
  <div class="card-body">
      {!! Form::open(['route' => 'cuentas.store']) !!}

        @include('cuentas.partials.form')

      {!! Form::close() !!}
  </div>
</div>
@endsection