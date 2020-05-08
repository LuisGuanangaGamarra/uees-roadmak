

<!-- Bootstrap CSS-->
<link href="{{ asset('vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

<div class="row">
    <div class="col-md-12">
        <center><h1> Galería </h1></center>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <a href="{{route('galeria.create',$consultoria)}}" class="btn btn-primary pull-right">
            Crear
        </a>
    </div>
    <div class="card-body ">
        <div class="table-responsive">
            <table class="table table-strip table-hover">
                <thead>
                    <tr>
                        <!--<th width="10px">ID</th>-->
                        <th>IMAGEN</th>
                        <th>RUTA</th>
                        <th colspan="3">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($Galeria as $imagen)
                    <tr>
                        <!--<td>{{$imagen->id}}</td>-->  
                        <td width='170'>
                            <?php echo "<img src=../../images/$imagen->file alt='' 
                            height='170' width='170'>" ?>
                        </td>
                        <td width='170'>
                            <center>  <p id="{{$imagen->id}}">{{$subruta}}/images/{{$imagen->file}}</p>
                            <button class="btn btn-success" onclick="copiarAlPortapapeles('{{$imagen->id}}')">
                            Copiar Ruta</button></center>
                        </td>
                        <td width="10px" width='170'>           
                            {!! Form::open(['route'=>['galeria.destroy', $imagen->id], 
                                'method'=>'DELETE']) !!}
                                <button class="btn btn-sm btn-warning">
                                    Eliminar
                                </button>
                            {!! Form::close() !!}        
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{$Galeria->links("pagination::bootstrap-4")}}
    </div>
</div>
<!-- Jquery JS-->
    <script src="{{ asset('vendor/jquery-3.2.1.min.js') }}"></script>
<!-- Bootstrap JS-->
    <script src="{{ asset('vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
<!-- Vendor JS -->
    <script src="{{ asset('vendor/animsition/animsition.min.js') }}"></script>
<!-- Main JS-->
    <script src="{{ asset('js/main.js')}}"></script>

<script>
    function copiarAlPortapapeles(id_elemento) {
        // Copiar en portapapeles 
        var aux = document.createElement("input");
        aux.setAttribute("value", document.getElementById(id_elemento).innerHTML);
        document.body.appendChild(aux);
        aux.select();
        document.execCommand("copy");
        document.body.removeChild(aux);
        // Fin del copiado  
        // Avisar que se copio
        var css = document.createElement("style");
        var estilo = document.createTextNode("#aviso {position:fixed; z-index: 9999999; widht: 120px; top:30%;left:50%;margin-left: -60px;padding: 20px; background: gold;border-radius: 8px;font-size: 14px;font-family: sans-serif;}");
        css.appendChild(estilo);
        document.head.appendChild(css);
        var aviso = document.createElement("div");
        aviso.setAttribute("id", "aviso");
        var contenido = document.createTextNode("URL copiada");
        aviso.appendChild(contenido);
        document.body.appendChild(aviso);
        window.load = setTimeout("document.body.removeChild(aviso)", 2000);
        // fin de aviso
    }
</script>