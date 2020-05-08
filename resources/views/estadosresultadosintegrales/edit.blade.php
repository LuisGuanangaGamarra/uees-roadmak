@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Breadcrumbs::render('estadosresultadosintegrales.show', $estadosResultadosIntegrales) }}
    </div>
</div>
<div class="card">
  <div class="card-header">
  Editar Estado de Resultado Integral
  </div>
  <div class="card-body">
      {!! Form::model($estadosResultadosIntegrales, ['route' =>['estadosresultadosintegrales.update', $estadosResultadosIntegrales->id],
      'method' => 'PUT']) !!}

        @include('estadosresultadosintegrales.partials.form')

      {!! Form::close() !!}
  </div>
</div>
@endsection