@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Breadcrumbs::render('balance.create') }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Cuentas
  </div>
  <div class="card-body">
      {!! Form::open(['route' => 'balance.store']) !!}

        @include('balance.partials.form')

      {!! Form::close() !!}
  </div>
</div>
@endsection