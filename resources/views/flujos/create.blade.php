@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Breadcrumbs::render('flujos.create') }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Crear Flujo
  </div>
  <div class="card-body">
      {!! Form::open(['route' => 'flujos.store']) !!}

        @include('flujos.partials.form')

      {!! Form::close() !!}
  </div>
</div>
@endsection