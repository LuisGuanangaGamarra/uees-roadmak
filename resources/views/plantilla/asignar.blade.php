@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Breadcrumbs::render('plantilla.show', $plantilla) }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Plantilla
  </div>
  <div class="card-body">
      {!! Form::open(['route' => 'consultoriasplantilla.store']) !!}

        @include('plantilla.partials.formconsul')

      {!! Form::close() !!}
  </div>
</div>
@endsection