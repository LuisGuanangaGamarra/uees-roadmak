@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
      {{ Breadcrumbs::render('cliente.create')}}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Datos de cliente
    {{Form::open(['route' => 'cliente.index', 'method' => 'GET', 'class' => 'form-inline pull-rigth']) }}
      <div class="form-group">
          {{Form::text('cedula_ruc', null, ['class' => 'form-control', 'placeholder' => 'Cedula o RUC']) }}
      </div>
      <div class='form-group'>
        <button type="submit" class="btn bnt-default">
          <span class="fas fa-search"></span>
        </button>
      </div>
    {{Form::close() }}
  </div>
  <div class="card-body">
      {!! Form::model($cliente, ['route' => 'cliente.store']) !!}

        @include('clientes.partials.form')

      {!! Form::close() !!}
  </div>
</div>
@endsection