@extends('informe_cliente.index')

@section('content')




<div class="row">
    <div class="col-md-12">
    {{ Breadcrumbs::render('home') }}
    </div>
</div>
 

<div class="container">
    <div class="row bg-white ">
        <div class="col-md-12 mt-4">
        </div>
        <div class="col-md-12 mt-3">
            <center>
            <h3>{{$Informe->titulo1}}</h3>
            <h2>{{$Informe->titulo2}}</h2>
            </center>
        </div>
        <div class="col-md-1">
        </div>
        <div class="col-md-10 border  rounded mt-3 mb-5">
            <div class="mt-2 mx-2">
              <!--  <p class="text-dark mt-3"><b>{{$Informe->titulo3}}</b></p>
                -->
                      
            
          
               
         


<div class="text-dark text-justify mt-2">
<?php  
echo "$Informe->parrafo1"
 ?>
                </div>

                
                
                
            </div>

           
          <!--  <div class="mt-2 mx-2">
                <p class="text-dark mt-3"><b>CERTIFICADO DEL CONSULTOR</b></p>
                    <p class="text-justify mt-2">
                    ROADMAK SOLUTIONS CÍA. LTDA. certifica que:
                    </p>
                    <Ul class="mt-1 ml-3 text-justify">
                        <li class="mt-3 "><p>Ningún socio o empleado de ROADMAK SOLUTIONS CÍA. LTDA. tiene un interés 
                        actual o futuro en los activos, inversión y/o negocio evaluados en el presente informe.</p></li>
                        <li class="mt-3">Los honorarios de la consultoría no dependen de los valores informados, y no 
                        están sujetos al resultado del presente informe.</li>
                        <li class="mt-3">Solamente quienes prepararon el análisis, evaluación y opiniones incluidas en 
                        este informe conocen su contenido y se obligan a mantener dentro de la más estricta 
                        confidencialidad y en calidad de secreto profesional, toda la información recibida por parte 
                        del cliente para la ejecución de la consultoría.</li>
                    <Ul>
            </div>   
            <div class="mt-2 mx-2">
                <p class="text-dark mt-3"><b>LIMITACIONES DEL SERVICIO</b></p>
                    <p class="text-justify mt-2">
                    Dada la naturaleza del presente servicio y las posibles limitaciones que se puedan encontrar 
                    durante la ejecución para la aplicación de los procedimientos que se efectuarán con la información 
                    y/o documentación que nos sea proporcionada, el propósito del presente trabajo no es la detección 
                    de errores, fraudes u otros actos ilegales, en caso de existir. No obstante, se informará al cliente 
                    acerca de cualquier acto ilegal, error significativo o evidencia de fraude, según corresponda, de 
                    los cuales se tome conocimiento.
                    </p>
                    <br/>
                    <p class="text-justify mt-2">Las revisiones de los aspectos contable-financieros están sujetas a 
                    normas internacionales que determinan su alcance fuera de toda duda. Estas normas establecen los 
                    siguientes parámetros:
                    </p>
                    <ol class="mt-1 ml-5 text-justify">
                        <li class="mt-3 "><p>El Consultor no audita, en los términos que esta palabra abarca, los 
                        saldos establecidos por la Gerencia del cliente sobre su estado de situación financiera o estado 
                        de resultados integrales; por lo tanto, en ningún caso el Consultor emite una opinión profesional 
                        sobre la razonabilidad de los mismos ni de los estados financieros tomados en su conjunto. 
                        Sin embargo, el Consultor ha asumido que toda la información proporcionada por el cliente, 
                        sea de forma impresa o por medios magnéticos y/o electrónicos, sí refleja razonablemente la 
                        situación actual y condición financiera del negocio. Se ha utilizado esta información, así como 
                        información de libre acceso público, sin efectuar ningún tipo de verificación adicional, excepto 
                        en los casos y en la forma indicada específicamente en el presente informe.</p></li>
                        <li class="mt-3">El Consultor presumirá la veracidad de la información que el cliente proporcione 
                        para la ejecución de su trabajo, siendo responsabilidad del cliente el establecer y mantener sus 
                        procedimientos de control interno.</li>
                        <li class="mt-3">El Consultor no ha realizado una investigación para determinar la pertenencia 
                        jurídica de los activos y pasivos presentados en los estados financieros del cliente, excepto en 
                        los casos en que ha sido señalado específicamente en el presente informe.</li>
                        <li class="mt-3">El Consultor ha asumido que el cliente ha cumplido con las leyes y regulaciones 
                        aplicables de la Superintendencia de Compañías y de los otros entes reguladores de su actividad.  
                        Así mismo, el Consultor ha asumido que todas las licencias, permisos y autorizaciones jurídicas o 
                        administrativas necesarias han sido o pueden ser obtenidas, renovadas o transferidas, y sin efectos 
                        significativos en efectuar tales transacciones.</li>
                        <li class="mt-3">En la ejecución de este trabajo, el Consultor ha asumido que las operaciones 
                        del cliente continuarán en el futuro en las mismas condiciones actuales, y no se ha considerado 
                        la liquidación del negocio ni la terminación de sus operaciones.</li>
                        <li class="mt-3">Los trabajos antes mencionados se realizan con el claro propósito de cuantificar 
                        una alternativa estratégica. Por lo tanto, se infiere que no deberían tener un uso distinto al 
                        descrito.</li>
                        <li class="mt-3">Este informe de consultoría es aplicable solamente al conjunto de operaciones del 
                        negocio que es materia del presente análisis. Los valores individuales de cualquier activo contenido 
                        en el negocio de la empresa no han sido determinados, excepto en los casos señalados específicamente 
                        en este informe.</li>
                        <li class="mt-3">Dado que una parte de la labor del consultor se basa en proyecciones y estimaciones 
                        de hechos futuros, y por tanto, sujetos a incertidumbre, el consultor no puede emitir una opinión con 
                        relación a la factibilidad de los sucesos previstos y de su posible ocurrencia. En tal sentido, generalmente 
                        surgirán diferencias entre los resultados proyectados y los reales, ya que con frecuencia, los hechos y 
                        circunstancias no ocurren de la manera como se esperaba al momento de la proyección. Estas diferencias 
                        podrán ser significativas, por lo que el consultor no se responsabiliza de la actualización de su informe, 
                        debido a hechos y circunstancias imprevistas que puedan ocurrir con posterioridad a la fecha de su emisión, 
                        tales como cambios en las leyes o reglamentaciones que regulan el mercado, o estrategias propias de la 
                        compañía que no hayan podido ser determinadas por su Administración en la forma como éstas afectan en la 
                        totalidad a la operación de la misma. Por consiguiente, el Consultor no puede asegurar que los resultados 
                        y el valor estimados sean obtenidos en la realidad.</li>  
                    <ol>
            </div>-->
 

    

        </div>
        <div class="col-md-1">
        </div>
        <div class="col-12 mb-3">
       <!-- <center><button class=" col-3 btn btn-dark" style="width:50%; font-size:10px" data-toggle="modal" data-target="#modalDescargoDeResponsabilidad">Editar</button>
           </center>-->
        </div>
    </div>
  
</div>

<script>

    ClassicEditor
        .create( document.querySelector( '#editor' ),{language: 'es', toolbar: [  'heading', '|', 'alignment:left', 'alignment:right', 'alignment:center', 'alignment:justify','imageUpload', ... ],

        } )
        
        .catch( error => {
            console.error( error );
            
        } );
</script>




@endsection