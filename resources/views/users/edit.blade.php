@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
    {{ Breadcrumbs::render('users.edit', $user) }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Usuario
  </div>
  <div class="card-body">
      {!! Form::model($user, ['route' =>['users.update', $user->id],
      'method' => 'PUT']) !!}

        @include('users.partials.form')

      {!! Form::close() !!}
  </div>
</div>
@endsection