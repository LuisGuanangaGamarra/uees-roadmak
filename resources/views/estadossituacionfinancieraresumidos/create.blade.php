@extends('template.index')

@section('content')
}<div class="row">
    <div class="col-md-12">
        {{ Breadcrumbs::render('estadossituacionfinancieraresumidos.create') }}
    </div>
</div>

<div class="card">
  <div class="card-header">
    Crear Estado de Situacion Financiera Resumido
  </div>
  <div class="card-body">
      {!! Form::open(['route' => 'estadossituacionfinancieraresumidos.store']) !!}

        @include('estadossituacionfinancieraresumidos.partials.form')

      {!! Form::close() !!}
  </div>
</div>
@endsection