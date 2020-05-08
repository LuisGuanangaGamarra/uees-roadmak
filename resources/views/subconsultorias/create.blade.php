@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
    {{ Breadcrumbs::render('subconsultorias.create',$subconsultoria) }}
    
    </div>
</div>
<div class="card">
  <div class="card-header">
    CREAR SUB-CONSULTORÍAS
  </div>
  <div class="card-body">
      {!! Form::open(['route' => 'subconsultorias.store']) !!}

        @include('subconsultorias.partials.form')

      {!! Form::close() !!}
  </div>
</div>
@endsection