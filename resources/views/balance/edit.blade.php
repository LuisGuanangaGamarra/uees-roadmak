@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Breadcrumbs::render('balance.show', $balance) }}
    </div>
</div>

<div class="card">
  <div class="card-header">
    Cuentas
  </div>
  <div class="card-body">
      {!! Form::model($balance, ['route' =>['balance.update', $balance->id],
      'method' => 'PUT']) !!}

        @include('balance.partials.form')

      {!! Form::close() !!}
  </div>
</div>
@endsection