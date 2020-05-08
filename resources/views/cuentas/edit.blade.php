@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
    {{ Breadcrumbs::render('cuentas.edit',$cuentas,$cuentas->estadoFinancieroById($cuentas->id_estado_financiero) ) }}
    </div>
</div>
<div class="card">
  <div class="card-header">
  Editar Cuenta
  </div>
  <div class="card-body">
      {!! Form::model($cuentas, ['route' =>['cuentas.update', $cuentas->id],
      'method' => 'PUT']) !!}
      <div class="form-group">
      {{$estadofinanciero_cuenta->name_estado}}
      <div class="form-group">
        @include('cuentas.partials.form')

      {!! Form::close() !!}
  </div>
</div>
@endsection