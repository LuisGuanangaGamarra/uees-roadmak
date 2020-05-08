@extends('template.index')

@section('content')
<div class="card">
  <div class="card-header">
    Artículos
  </div>
  <div class="card-body">
      {!! Form::open(['route' => 'consultorias.store']) !!}

        @include('consultorias.partials.form')

      {!! Form::close() !!}
  </div>
</div>
@endsection