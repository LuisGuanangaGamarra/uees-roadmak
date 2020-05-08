@extends('template.index')

@section('content')
<div class="card">
  <div class="card-header">
   Archivo Cargado
  </div>
  <p><b>Nombre de archivo:</b> {{$file->getClientOriginalName()}}</p>

</div>
@endsection


@section('scripts')
@endsection