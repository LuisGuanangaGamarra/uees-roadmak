@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Breadcrumbs::render('estadossituacionfinanciera.create') }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Crear Estado de Situacion Financiera
  </div>
  <div class="card-body">
      {!! Form::open(['route' => 'estadossituacionfinanciera.store']) !!}

        @include('estadossituacionfinanciera.partials.form')

      {!! Form::close() !!}
  </div>
</div>
@endsection