@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Breadcrumbs::render('resultado.show', $resultados) }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Editar Resultado
  </div>
  <div class="card-body">
      {!! Form::model($resultados, ['route' =>['resultado.update', $resultados->id],
      'method' => 'PUT']) !!}

        @include('resultado.partials.form')

      {!! Form::close() !!}
  </div>
</div>
@endsection