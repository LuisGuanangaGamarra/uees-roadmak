@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
    {{ Breadcrumbs::render('subconsultorias.edit',$subConsultorias) }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Editar Sub-Consultoría
  </div>
  <div class="card-body">
      {!! Form::model($subConsultorias, ['route' =>['subconsultorias.update', $subConsultorias->id],
      'method' => 'PUT']) !!}

        @include('subconsultorias.partials.form_edit')

      {!! Form::close() !!}

  </div>
</div>
@endsection