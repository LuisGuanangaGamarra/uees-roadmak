@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
    {{ Breadcrumbs::render('compra.create',$cliente) }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Compra
  </div>
  <div class="card-body">
      {!! Form::open(['route' => 'comprar.store']) !!}
        @include('comprar.partials.form')
      {!! Form::close() !!}
  </div>
</div>
@endsection