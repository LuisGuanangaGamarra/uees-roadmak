@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Breadcrumbs::render('resultado.create') }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Crear Resultado
  </div>
  <div class="card-body">
      {!! Form::open(['route' => 'resultado.store']) !!}

        @include('resultado.partials.form')

      {!! Form::close() !!}
  </div>
</div>
@endsection