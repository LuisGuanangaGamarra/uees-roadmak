@extends('template.index')

@section('content')
<div class="card">
  <div class="card-header">
    Perfil
  </div>
  <div class="card-body">  
    <div class="row">
        <div class="col-md-12 text-center">
            @if(Auth::user()->file)
            <img src="{{ asset( Auth::user()->file) }}" alt="{{ 'Avatar '.Auth::user()->name }}" class="mx-auto rounded-circle" alt="{{ 'Avatar '.$usuario->name}}" width="256" height="256"/>
            @else
            <img src="{{ asset('/images/users/avatar.png') }}" alt="Avatar" class="mx-auto rounded-circle" alt="{{ 'Avatar '.$usuario->name}}" width="256" height="256"/>
            @endif
            <!-- <img src="{{ asset($usuario->file)}}" class="mx-auto rounded-circle" alt="{{ 'Avatar '.$usuario->name}}" width="256" height="256">  -->
            {!! Form::model($usuario, ['route' =>['perfil.update', $usuario->id],
            'method' => 'PUT', 'files' => true]) !!}

                @include('perfil.partials.form')

            {!! Form::close() !!}
        </div>
    </div>
  </div>
</div>
@endsection