@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Breadcrumbs::render('plantilla.create') }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Plantilla
  </div>
  <div class="card-body">
      {!! Form::open(['route' => ['plantilla.store'], 'files' => true ]  ) !!}

        @include('plantilla.partials.form')

      {!! Form::close() !!}

  </div>
</div>
@endsection