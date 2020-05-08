@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Breadcrumbs::render('consultorias.edit',$consultoria ) }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Editar Consultoría
  </div>
  <div class="card-body">
      {!! Form::model($consultoria, ['route' =>['consultorias.update', $consultoria->id_product],
      'method' => 'PUT']) !!}

        @include('consultorias.partials.form')

      {!! Form::close() !!}
  </div>
</div>
@endsection