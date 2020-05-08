@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Breadcrumbs::render('consultorias.create') }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Consultoría
  </div>
  <div class="card-body">
      {!! Form::open(['route' => 'consultorias.store']) !!}

        @include('consultorias.partials.form')

      {!! Form::close() !!}
  </div>
</div>
@endsection