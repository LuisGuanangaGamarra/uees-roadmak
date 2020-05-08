
<!-- Bootstrap CSS-->
<link href="{{ asset('vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">
<div class="card">
  <div class="card-header">
    Agregar imagen a la galeria
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-12 text-center">
        @if(Auth::user()->file)
          <img src="{{ asset( Auth::user()->file) }}" alt="{{ 'Avatar '.Auth::user()->name }}" 
          class="mx-auto rounded-circle" alt="" width="256" height="256"/>
        @else
          <img src="{{ asset('/images/users/avatar.png') }}" alt="Avatar" class="mx-auto rounded-circle" 
          alt="" width="256" height="256"/>
        @endif
        {!! Form::open(['route' => 'galeria.store', 'files' => true]) !!}
          @include('informe.galeria.partials.form')
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
