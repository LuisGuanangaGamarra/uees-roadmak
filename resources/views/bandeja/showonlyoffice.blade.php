
@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        <a href="{{ route('consultoria_comprada.index')}}" class="btn btn-primary pull-right">Ok</a>
    </div>
</div>
<div class="card">
    <iframe  src="http://159.89.183.216:82/editor?fileName={{$consultoria->archivo}}&ip={{$ip}}" id="pdf"   height="800px"></iframe>   
</div>
@endsection
