@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Breadcrumbs::render('ci.create') }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Consultoria&plantilla
  </div>
  <div class="card-body">
      {!! Form::open(['route' => 'consultoriasplantilla.store']) !!}

        @include('consultoriasplantilla.partials.form')

      {!! Form::close() !!}
  </div>
</div>
@endsection