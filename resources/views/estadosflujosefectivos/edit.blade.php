@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Breadcrumbs::render('estadosflujosefectivos.show', $estadosFlujosEfectivo) }}
    </div>
</div>
<div class="card">
  <div class="card-header">
  Editar Estado Flujos de Efectivos
  </div>
  <div class="card-body">
      {!! Form::model($estadosFlujosEfectivo, ['route' =>['estadosflujosefectivos.update', $estadosFlujosEfectivo->id],
      'method' => 'PUT']) !!}

        @include('estadosflujosefectivos.partials.form')

      {!! Form::close() !!}
  </div>
</div>
@endsection