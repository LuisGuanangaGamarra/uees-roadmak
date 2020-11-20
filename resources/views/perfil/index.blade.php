@extends('template.index')

@section('content')
<div class="card">
  <div class="card-header">
    Perfil
    <a href="{{route('perfil.edit')}}"
    class="btn btn-primary pull-right">
        Editar
    </a>
  </div>
  <div class="card-body">  
    <div class="row">
        <div class="col-md-12 text-center">
          @if(Auth::user()->file)
          <img src="{{ asset($usuario->file)}}" class="mx-auto rounded-circle" alt="{{ 'Avatar '.$usuario->name}}" width="150" height="150"> 
          @else
          <img src="{{ asset('/images/users/avatar.png') }}" class="mx-auto rounded-circle" alt="{{ 'Avatar '.$usuario->name}}" width="150" height="150"> 
          @endif
            
            <h3 class="card-title">{{ $usuario->name .' '.$usuario->lastname }}</h3>
            <span class="email">{{ $usuario->email }}</span>
        </div>
    </div>
  </div>
</div>
@endsection
