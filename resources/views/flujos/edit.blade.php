@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Breadcrumbs::render('flujos.show', $flujos) }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Editar flujo
  </div>
  <div class="card-body">
      {!! Form::model($flujos, ['route' =>['flujos.update', $flujos->id],
      'method' => 'PUT']) !!}

        @include('flujos.partials.form')

      {!! Form::close() !!}
  </div>
</div>
@endsection