@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
       
    </div>
</div>
<div class="card">
  <div class="card-header">
    Índices
  </div>
  <div class="card-body">
      {!! Form::model($indice, ['route' =>['indice.update', $indice->id],
        'files' => true,'method' => 'PUT' ]) !!}

        @include('indices.partials.form')

      {!! Form::close() !!}
  </div>
</div>
@endsection