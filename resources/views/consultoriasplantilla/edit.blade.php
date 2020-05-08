@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Breadcrumbs::render('ci.edit', $consultoriaPlantilla) }}
    </div>
</div>
<div class="card">
  <div class="card-header">
    Editar Consultoria
  </div>
  <div class="card-body">
      {!! Form::model($consultoriaPlantilla, ['route' =>['consultoriasplantilla.update', $consultoriaPlantilla->id],
      'method' => 'PUT']) !!}

        @include('consultoriasplantilla.partials.form')

      {!! Form::close() !!}



      

  </div>
</div>
@endsection