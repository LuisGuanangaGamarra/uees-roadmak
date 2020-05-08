@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
    {{ Breadcrumbs::render('roles.create') }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Rol
  </div>
  <div class="card-body">
      {!! Form::open(['route' => 'roles.store']) !!}

        @include('roles.partials.form')

      {!! Form::close() !!}
  </div>
</div>
@endsection