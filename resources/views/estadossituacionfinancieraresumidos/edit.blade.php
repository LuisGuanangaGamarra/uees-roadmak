@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Breadcrumbs::render('estadossituacionfinancieraresumidos.show', $situacionfinancieraresumido) }}
    </div>
</div>

<div class="card">
  <div class="card-header">
  Editar Estado de Situacion Financiera
  </div>
  <div class="card-body">
      {!! Form::model($situacionfinancieraresumido, ['route' =>['estadossituacionfinancieraresumidos.update', $situacionfinancieraresumido->id],
      'method' => 'PUT']) !!}

        @include('estadossituacionfinancieraresumidos.partials.form')

      {!! Form::close() !!}
  </div>
</div>
@endsection