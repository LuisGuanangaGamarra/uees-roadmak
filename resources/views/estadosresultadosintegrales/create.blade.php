@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Breadcrumbs::render('estadosresultadosintegrales.create') }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Crear Estado de Resultado Integral
  </div>
  <div class="card-body">
      {!! Form::open(['route' => 'estadosresultadosintegrales.store']) !!}

        @include('estadosresultadosintegrales.partials.form')

      {!! Form::close() !!}
  </div>
</div>
@endsection