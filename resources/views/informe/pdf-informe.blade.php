<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Document</title>
     <link rel="stylesheet" href="{{ public_path('css/bootstrap.min.css')}}"> 
         <!-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}"> -->
    <style>
    body {
 
        }
    page {
        background: white;
        display: block;
        
        box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
    }
    page[size="A4"] {  
    
    }
    page[size="A4"][layout="landscape"] {

    }
    page[size="A3"] {
        width: 29.7cm;
        height: 42cm;
    }
    page[size="A3"][layout="landscape"] {
        width: 42cm;
        height: 29.7cm;  
    }
    page[size="A5"] {
        width: 14.8cm;
        height: 21cm;
    }
    page[size="A5"][layout="landscape"] {
        width: 21cm;
        height: 14.8cm;  
    }
    @media print {
        body, page {
            margin: 0;
            box-shadow: 0;
        }
    }
    p{
        text-align: justify;
    }
    </style> 
</head>
<body>
<div class="container">
    <div class="row bg-white ">
        <div class="col-md-12 mt-3">


            <!--COMIENZO INFORME -->
            <div style="text-align:center;">
                    <h3>{{$Informe->titulo1}}</h3>
                    <h2>{{$Informe->titulo2}}</h2>
            </div>
       

            <!--SECCIÓN MENÚ-->
<!--             <div>
                <div class="idc-box">
                        <center><p class="idc-titulo">CONTENIDO</p></center>
                    <ul class="idc-lista">

                        <li>
                            <a href="#titulo3">1 {{$Informe->titulo3}}</a>
                        </li>

                        <li><a href="#titulo4">2 {{$Informe->titulo4}}</a>
                            <ul>
                                <li><a href="#subindice1">2.1 {{$Informe->titulo5}}</a></li>
                                <li><a href="#subindice2">2.2 {{$Informe->titulo6}}</a></li>
                            </ul>
                        </li>

                        <li><a href="#titulo7">3 {{$Informe->titulo7}}</a>
                            <ul>
                                <li><a href="#subindice1">3.1 {{$Informe->titulo8}}</a></li>
                                <li><a href="#subindice2">3.2 {{$Informe->titulo9}}</a></li>
                                <li><a href="#subindice1">3.3 {{$Informe->titulo10}}</a></li>
                                <li><a href="#subindice2">3.4 {{$Informe->titulo11}}</a></li>
                                <li><a href="#subindice1">3.5 {{$Informe->titulo12}}</a></li>
                            </ul>
                        </li>

                        <li><a href="#titulo13">4 {{$Informe->titulo13}}</a>
                            <ul>
                                <li><a href="#subindice1">4.1 {{$Informe->titulo14}}</a></li>
                                <li><a href="#subindice2">4.2 {{$Informe->titulo15}}</a></li>
                                <li><a href="#subindice1">4.3 {{$Informe->titulo16}}</a></li>
                                <li><a href="#subindice2">4.4 {{$Informe->titulo17}}</a></li>
                                <li><a href="#subindice1">4.5 {{$Informe->titulo18}}</a></li>
                                <li><a href="#subindice1">4.5 {{$Informe->titulo19}}</a></li>
                            </ul>
                        </li>

                        <li><a href="#titulo20">5 {{$Informe->titulo20}}</a></li>
                    </ul>
                </div>
            </div> -->
        
    


        <!--DESCARGO DE RESPONSABILIDAD-->
        <!--1. Información general de la empresa   3-->
        <!--2. Análisis macroeconómico del país y la industria  4-->
            <!--2.1 Análisis general de la situación económica del país  5-->
            <!--2.2 Análisis del sector automotriz  6-->
        <!--3 Análisis de información financiera  7-->
            <!--3.1 Estados Financieros Históricos  8-->
            <!--3.2 Análisis general de cifras financieras  9-->
            <!--3.3 Análisis de rendimiento (margenes y retornos)  10-->
            <!--3.4 Análisis de rotación  11-->
            <!--3.5 Análisis de liquidez  12-->
        <!--4 Metodologías de elaboración de proyecciones  13-->
            <!--4.1 Horizonte de Proyección  14-->
            <!--4.2 de Proyección 	Proyección de Ingresos  15-->
            <!--4.3 Proyecciones de indicadores claves de la gestión financieras 16-->
            <!--4.4 Endeudamiento propuesto 17-->
            <!--4.5 Estados Financieros proyectados  18-->
            <!--4.6 Comentarios sobre el flujo de efectivo y el endeudamiento  19-->
        <!--5 Conclusiones y recomendaciones finales  20-->            




        <!--DESCARGO DE RESPONSABILIDAD-->
        <div class="col-md-10 border ">
                <?php  
                echo "$Informe->parrafo1";
                ?>
        </div>

        <!--1. Información general de la empresa   3-->
     <!--    <div>
                <div  id="titulo3" class="mt-2 mx-2">
                    <p class="text-dark mt-3">
                        <b>1. {{$Informe->titulo3}}</b><br>
                    </p><br>
                </div>
                <div class="text-dark text-justify mt-2">
                   
                    echo "$Informe->parrafo2";
                 
                </div>
        </div>
 -->
        <!--2. Análisis macroeconómico del país y la industria  4-->
            <!--2.1 Análisis general de la situación económica del país  5-->
       <!--  <div >
                <div id="titulo4" class="mt-2 mx-2">
                    <p class="text-dark mt-3">
                        <b>2. {{$Informe->titulo4}}</b><br>
                        <b>2.1. {{$Informe->titulo5}}</b>
                    </p><br>
                </div>
                <div class="text-dark text-justify mt-2">
                  
                    echo "$Informe->parrafo3";
                  
                </div>
        </div> -->

        <!--2. Análisis macroeconómico del país y la industria  4-->
            <!--2.2 Análisis del sector automotriz  6-->
       <!--  <div class="col-md-10 border  rounded my-3">
                <div class="mt-2 mx-2">
                    <p class="text-dark mt-3">
                        <b>2. {{$Informe->titulo4}}</b><br>
                        <b>2.2. {{$Informe->titulo6}}</b>
                    </p><br>
                </div>
                <div class="text-dark text-justify mt-2">
                    
                    echo "$Informe->parrafo4";
                
                </div>
        </div> -->


        <!--3 Análisis de información financiera  7-->
            <!--3.1 Estados Financieros Históricos  8-->
       <!--  <div id="titulo7" class="col-md-10 border  rounded my-3">
                <div class="mt-2 mx-2">
                    <p class="text-dark mt-3">
                        <b>3. {{$Informe->titulo7}}</b><br>
                        <b>3.1. {{$Informe->titulo8}}</b>
                    </p><br>
                </div>
                <div class="text-dark text-justify mt-2">
                  
                    echo "$Informe->parrafo5";
                  
                </div>
        </div> -->
        <!--3 Análisis de información financiera  7-->
            <!--3.2 Análisis general de cifras financieras  9-->
       <!--  <div class="col-md-10 border  rounded my-3">
                <div class="mt-2 mx-2">
            
                    <p class="text-dark mt-3">
                        <b>3. {{$Informe->titulo7}}</b><br>
                        <b>3.2. {{$Informe->titulo9}}</b>
                    </p><br>
                    </div>
                <div class="text-dark text-justify mt-2">
                  
                    echo "$Informe->parrafo6";
                  
                </div>
        </div> -->


        <!--3 Análisis de información financiera  7-->
            <!--3.3 Análisis de rendimiento (margenes y retornos)  10-->
        <!-- <div class="col-md-10 border  rounded my-3">
                <div class="mt-2 mx-2">
                    <p class="text-dark mt-3">
                        <b>3. {{$Informe->titulo7}}</b><br>
                        <b>3.3. {{$Informe->titulo10}}</b>
                    </p><br>
                </div>
                <div class="text-dark text-justify mt-2">
                    
                    echo "$Informe->parrafo7";
                  
                </div>
        </div> -->

        <!--3 Análisis de información financiera  7-->
            <!--3.4 Análisis de rotación  11-->
      <!--   <div class="col-md-10 border  rounded my-3">
                <div class="mt-2 mx-2">
                    <p class="text-dark mt-3">
                        <b>3. {{$Informe->titulo7}}</b><br>
                        <b>3.4. {{$Informe->titulo11}}</b>
                    </p><br>
                </div>
                <div class="text-dark text-justify mt-2">    
                 
                    echo "$Informe->parrafo8";
                   
                </div>
        </div> -->


        <!--3 Análisis de información financiera  7-->
            <!--3.5 Análisis de liquidez  12-->
      <!--   <div class="col-md-10 border  rounded my-3">
                <div class="mt-2 mx-2">
                    <p class="text-dark mt-3">
                        <b>3. {{$Informe->titulo7}}</b><br>
                        <b>3.5. {{$Informe->titulo12}}</b>
                    </p><br>
                </div>
                <div class="text-dark text-justify mt-2">
                  
                    echo "$Informe->parrafo9";
                  
                </div>
        </div>
 -->

       <!--4 Metodologías de elaboración de proyecciones  13-->
            <!--4.1 Horizonte de Proyección  14-->
      <!--   <div id="titulo13">
                <div class="mt-2 mx-2">
            
                    <p class="text-dark mt-3">
                        <b>4. {{$Informe->titulo13}}</b><br>
                        <b>4.1. {{$Informe->titulo14}}</b>
                    </p><br>
                </div>
                <div class="text-dark text-justify mt-2">    
                 
                    echo "$Informe->parrafo10";
                  
                </div>
        </div>
 -->
       <!--4 Metodologías de elaboración de proyecciones  13-->
            <!--4.2 de Proyección 	Proyección de Ingresos  15-->
        <!-- <div class="col-md-10 border  rounded my-3">
                <div class="mt-2 mx-2">
            
                    <p class="text-dark mt-3">
                        <b>4. {{$Informe->titulo13}}</b><br>
                        <b>4.2. {{$Informe->titulo15}}</b>
                    </p><br>
                </div>
                <div class="text-dark text-justify mt-2">    
                
                    echo "$Informe->parrafo11";
                 
                </div>
        </div> -->


       <!--4 Metodologías de elaboración de proyecciones  13-->
            <!--4.3 Proyecciones de indicadores claves de la gestión financieras 16-->
       <!--  <div class="col-md-10 border  rounded my-3">
                <div class="mt-2 mx-2">
                    <p class="text-dark mt-3">
                        <b>4. {{$Informe->titulo13}}</b><br>
                        <b>4.3. {{$Informe->titulo16}}</b>
                    </p><br>
                </div>
                <div class="text-dark text-justify mt-2">    
                     
                    echo "$Informe->parrafo12";
                   
                </div>
        </div>
 -->


       <!--4 Metodologías de elaboración de proyecciones  13-->
            <!--4.4 Endeudamiento propuesto 17-->
       <!--  <div class="col-md-10 border  rounded my-3">
                <div class="mt-2 mx-2">
            
                    <p class="text-dark mt-3">
                        <b>4. {{$Informe->titulo13}}</b><br>
                        <b>4.4. {{$Informe->titulo17}}</b>
                    </p><br>
                </div>
                <div class="text-dark text-justify mt-2">    
                     
                    echo "$Informe->parrafo13";
                  
                </div>
        </div> -->


       <!--4 Metodologías de elaboración de proyecciones  13-->
            <!--4.5 Estados Financieros proyectados  18-->
       <!--  <div class="col-md-10 border  rounded my-3">
                <div class="mt-2 mx-2">
                    <p class="text-dark mt-3">
                        <b>4. {{$Informe->titulo13}}</b><br>
                        <b>4.5. {{$Informe->titulo18}}</b>
                    </p><br>
                </div>
                <div class="text-dark text-justify mt-2">    
                    
                    echo "$Informe->parrafo14";
                   
                </div>
        </div> -->

       <!--4 Metodologías de elaboración de proyecciones  13-->
            <!--4.6 Comentarios sobre el flujo de efectivo y el endeudamiento  19-->
        <!-- <div class="col-md-10 border  rounded my-3">
                <div class="mt-2 mx-2">
            
                    <p class="text-dark mt-3">
                        <b>4. {{$Informe->titulo13}}</b><br>
                        <b>4.6. {{$Informe->titulo19}}</b>
                    </p><br> 
                </div>
                <div class="text-dark text-justify mt-2">    
                  
                    echo "$Informe->parrafo15";
                  
                </div>
        </div> -->

        <!--5 Conclusiones y recomendaciones finales  20-->            
       <!--  <page  size="A4">
            <div>
                    <div>
                
                        <p id="titulo20" >
                            <b>5. {{$Informe->titulo20}}</b><br>
                        </p><br>
                    </div>
                    <div>
                    
                        
                        echo "$Informe->parrafo17";
                       
                    </div>
            </div>
      
        <page>
             -->
    </div>

</div>
</body>
</html>


