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
        
        <div class="col-md-1  ">
     
        </div>
       <div class="col-md-10 border  rounded my-3">
       <p class="text-dark mt-3"><b>1. INFORMACIÓN GENERAL DE LA EMPRESA</b></p>
<br>

<div class="text-dark text-justify mt-2">

                
       <?php  
echo "$Informe->parrafo2"
 ?>
</div>
<!--
        <br><p style="color:#2FB5D2;"><b>1.1. Datos generales</b></p>

        <ol class="mt-1 ml-5 text-justify">
        <li type="a"> <u>Razón social</u> </li>
        <p>FRENO PRECISO CÍA. LTDA. </p>
        <br><li type="a"> <u>Número de RUC</u> </li>
        <p>0992180056001</p>
        <br><li type="a"> <u>Domicilio, Dirección, Teléfono y Fax de la oficina principal</u> </li>
        <p>Provincia:   Guayas</p>
        <p>Provincia:   Guayas</p>
        <p>Domicilio:   Cantón Guayaquil</p>
        <p>Dirección:   Lorenzo de Garaycoa 525 entre Padre Solano y Luis Urdaneta</p>
        <p>Teléfono:    042305360</p>

        </ol>

       <br> <p style="color:#2FB5D2;"><b>1.2. Fecha de otorgamiento de la escritura pública de constitución e inscripción en registro mercantil</b></p>
        <p class="text-justify mt-2">
        Freno Preciso Cía. Ltda. fue constituida mediante escritura pública otorgada ante el Notario Vigésimo Primero del cantón Guayaquil, Ab. Marcos Díaz Casquete, el 28 de julio de 2000, inscrita en el Registro Mercantil del mismo cantón, el 25 de octubre de 2000.
        </p>


       <br> <p style="color:#2FB5D2;"><b>1.3. Plazo de duración de la compañía</b></p>
        <p class="text-justify mt-2">
        El plazo de duración de Freno Preciso Cía. Ltda. es de 50 años, contados a partir de la inscripción de la escritura de constitución en el Registro Mercantil.
        </p>


        <br><p style="color:#2FB5D2;"><b>1.4. Objeto Social</b></p>
        <p class="text-justify mt-2">
        Freno Preciso Cía. Ltda. consta registrada en la Superintendencia de Compañías, Valores y Seguros (SCVS) bajo el Código CIIU G4530.00 cuya descripción es “Comercio y reparación de vehículos automotores y motocicletas. Venta de todo tipo de partes, componentes, suministros, herramientas, etc.”.
        </p>


        <br><p style="color:#2FB5D2;"><b>1.5. Capital autorizado, Suscrito y Pagado</b></p>
        <p class="text-justify mt-2">
        <ol class="mt-1 ml-5 text-justify">
        <li type="a">Capital Suscrito y Pagado: 	US$   800,oo</li>
        </ol>
        </p>


        <br><p style="color:#2FB5D2;"><b>1.6. Número de acciones, clase, valor nominal</b></p>
        <p class="text-justify mt-2">
        <ol class="mt-1 ml-5 text-justify">
        <li type="a">No. Acciones: 			200</li>
        <li type="a">Clase:				Ordinarias y nominativas</li>
        <li type="a">Serie:				No se ha previsto series para las acciones</li>
        <li type="a">Valor Nominal por acción: 	US$  4,00</li>
        </ol>
        </p>


      <br>  <p style="color:#2FB5D2;"><b>1.7. Representantes legales, directores y administradores</b></p>
        <p class="text-justify mt-2">

        <center>
        <table style="text-align:center"; border="1"; width="520">
        <tr>
            <th>Nombre</th>
            <th>Cargo</th>
            <th>Fecha Nombramiento</th>
            <th>Tipo</th>
        </tr>
        <tr>
            <td>Echeverría Vasquez Fernando Alberto</td>
            <td>Gerente</td>
            <td>31-julio-2013</td>
            <td>Rep. Legal</td>
        </tr>
        </table>
        </center>
        </p>


       <br> <p style="color:#2FB5D2;"><b>1.8. Accionistas de la Empresa</b></p>
       <p class="text-justify mt-2">

        <center>
        <table style="text-align:center"; border="1"; width="520">
        <tr>
            <th>Accionista</th>
            <th>No. Acciones</th>
            <th>Valor Nominal</th>
            <th>Valor Total</th>
        </tr>
        <tr>
            <td>Calderón Neira Segundo Rosendo</td>
            <td>1</td>
            <td>4.00</td>
            <td>4,00</td>
        </tr>
        <tr>
            <td>Echeverría Vásquez Fernando Alberto</td>
            <td>194</td>
            <td>4.00</td>
            <td>776,00</td>
        </tr>
        <tr>
            <td>Echeverría Vásquez Johnny Alejandro</td>
            <td>5</td>
            <td>4.00</td>
            <td>20,00</td>
        </tr>
        <tr>
            <td>Total</td>
            <td>200</td>
            <td></td>
            <td>800,00</td>
        </tr>
        </table>
        </center>
        </p>


      <br>  <p style="color:#2FB5D2;"><b>1.9. Procedimientos realizados en la consultoría</b></p>
        <p class="text-justify mt-2">
        Se ha procedido a la elaboración de un diagnóstico financiero sobre la información financiera proporcionada por el cliente, respecto de los ejercicios fiscales 2015 a 2017. Este diagnóstico incluye un examen de varios factores cruciales de todo negocio, como son el rendimiento (márgenes y retornos), la rotación, la liquidez y el endeudamiento, para lo cual se ha procedido a elaborar una serie de indicadores de gestión financiera los cuales serán expuestos y analizados en detalle en el presente informe.
        <br><br>
        A partir del diagnóstico financiero inicial de los estados financieros proporcionados por la administración de la firma, se determinó los principales indicadores clave (Key Drivers) que impactan significativamente el rendimiento financiero de la empresa, luego de lo cual se realizaron supuestos de la situación futura de tales indicadores.
        <br><br>
        Una vez determinados y proyectados los Key Drivers, se realizó una proyección de los Estados Financieros (Estado de Resultados, Estado de Situación Financiera, Estado de Flujos de Efectivo) de la firma, con la finalidad de determinar la capacidad de pago de nuevos endeudamientos por parte del cliente.
        <br><br>
        Finalmente, luego del análisis de los resultados obtenidos, se expone una serie de recomendaciones que deberá seguir la administración de la empresa, a fin de mejorar la salud financiera de toda la compañía.
        </p>      

    </div>
    -->

    <div class="col-12 mb-3">
       <!-- <center><button class=" col-3 btn btn-dark" style="width:50%; font-size:10px" data-toggle="modal" data-target="#modalDescargoDeResponsabilidad7">Editar</button>
           </center>-->
        </div>
        </div>
</div>
</div>



@endsection