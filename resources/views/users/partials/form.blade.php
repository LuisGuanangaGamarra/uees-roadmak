<div class="form-group">
{{Form::label('name', 'Nombres')}}
{{Form::text('name', null, ['class'=>'form-control'])}}
</div>
<div class="form-group">
{{Form::label('lastname', 'Apellidos')}}
{{Form::text('lastname', null, ['class'=>'form-control'])}}
</div>
<hr>
<h3>Lista de roles</h3>
<div class="form-group">
@if ($descripcion_rol!=null)
    @if ($descripcion_rol->slug == 'cliente' || $descripcion_rol->slug == 'consultor')
        <ul class="list-unstyled">
            @foreach($roles as $role)
                <li>
                    <label>
                        {{ Form::checkbox('roles[]', $role->id, null)}}
                        {{ $role->name}}
                        <em>({{ $role->description ?: 'N/A'}})</em>
                    </label>
                </li>
            @endforeach
        </ul>
    @else
        <ul class="list-unstyled">
        El usuario tiene roll de <b> {{$descripcion_rol->name}}</b>
        </ul>
    @endif
@else
    <ul class="list-unstyled">
            @foreach($roles as $role)
                <li>
                    <label>
                        {{ Form::checkbox('roles[]', $role->id, null)}}
                        {{ $role->name}}
                        <em>({{ $role->description ?: 'N/A'}})</em>
                    </label>
                </li>
            @endforeach
    </ul>

@endif

</div>
<div class="form-group">
{{Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary'])}}
</div>