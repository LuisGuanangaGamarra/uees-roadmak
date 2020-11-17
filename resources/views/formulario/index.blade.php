@extends('template.index')

@section('cssSectionPropio')
<link rel="stylesheet" href="{{asset('css/formulario/index.css')}}">
@endsection

@section('scriptsPropios')
    
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
    <!--{{ Breadcrumbs::render('roles.create') }}-->
    </div>
</div>
<div class="card">
  <div class="card-header">
    &nbsp
  </div>
  <div class="card-body">

      {!! Form::model($consultoria, ['route' =>['formulario.store', $consultoria],'files' => true,
'method' => 'POST']) !!}
        @include('formulario.partials.form')

      {!! Form::close() !!}
  </div>

  
  <script type="text/javascript">
    $(document).ready(function () {        
        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm: function (event, element) {
                element.closest('form').submit();
            }
        });   
    });
</script>








</div>
@endsection