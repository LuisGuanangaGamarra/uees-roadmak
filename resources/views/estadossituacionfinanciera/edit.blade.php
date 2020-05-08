@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Breadcrumbs::render('estadossituacionfinanciera.show', $estadosSituacionFinanciera) }}
    </div>
</div>
<div class="card">
  <div class="card-header">
  Editar Estado de Situacion Financiera
  </div>
  <div class="card-body">
      {!! Form::model($estadosSituacionFinanciera, ['route' =>['estadossituacionfinanciera.update', $estadosSituacionFinanciera->id],
      'method' => 'PUT']) !!}

        @include('estadossituacionfinanciera.partials.form')

      {!! Form::close() !!}
  </div>
</div>
@endsection