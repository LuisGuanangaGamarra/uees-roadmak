@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
    
    </div>
</div>
<div class="card">
  <div class="card-header">
    CREAR SUB-CONSULTORÍA
  </div>
  <div class="card-body">
      {!! Form::model($subconsultorias, ['route' =>['c_s.update', $subconsultorias->id],
      'method' => 'PUT']) !!}
        @include('subconsultorias.partials.form_consultoria')
      {!! Form::close() !!}

  </div>
</div>
@endsection