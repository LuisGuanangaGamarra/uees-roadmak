 @if(Auth::user()->isRole('consultor') || Auth::user()->isRole('admin') || Auth::user()->isRole('superadmin'))
                                                   
                                              

<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset('vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet" media="all">
    <!-- CKEDITOR 
    <script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/decoupled-document/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>-->
</head>


<body class="">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="{{ route('dasboard.index') }}">
                            <img src="{{ asset('/images/icon/logo.png') }}" alt="Roadmak" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                <ul class="navbar-mobile__list list-unstyled">
                        <li>
                        <a  href="#titulo3" > 1. {{$Informe->titulo3}}</a>
                               <!--  <a href="#titulo1" href="{{route('informe.informacion_dos',$consultoria)}}">
                                1. Información general de la empresa</a> -->
                        </li>

                        <li class="has-sub">
                            <a class="nav-link"   href="#titulo4">2. {{$Informe->titulo4}} </a>
                            <!-- <a class="nav-link" href="{{ route('informe.situacion',$consultoria) }}">2.1. Análisis general de la situación económica del país</a> -->
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li class="nav-item">
                                    <!-- <a class="nav-link" href="{{ route('informe_cliente.situacioneconomica',$consultoria) }}">2.1. Análisis general de la situación económica del país</a> -->
                                    <a class="nav-link" href="#titulo5">2.1. {{$Informe->titulo5}}</a>
                                </li>
                                <li class="nav-item">
                                    <!-- <a class="nav-link" href="{{ route('informe.sectorauto',$consultoria)}}">2.2. Análisis del sector automotriz</a> -->
                                    <a class="nav-link"  href="#titulo6">2.2. {{$Informe->titulo6}}</a>
                                </li>
                            </ul>
                        </li>




                        <li class="has-sub">

                            <a class="js-arrow" href="#titulo7">
                                <i class="fas fa-tachometer-alt"></i>3. {{$Informe->titulo7}}</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li class="nav-item">
                                    <!-- <a class="nav-link" href="{{ route('informe.financiero_historico',$consultoria) }}">3.1. Estados Financieros Históricos</a> -->
                                    <a class="nav-link"  href="#titulo8">3.1. {{$Informe->titulo8}}</a>
                                </li>
                                <li class="nav-item">
                                    <!-- <a class="nav-link" href="{{ route('informe.analisis_cifras_financieras',$consultoria)}}">3.2. Análisis general de cifras financieras</a> -->
                                    <a class="nav-link" href="#titulo9">3.2. {{$Informe->titulo9}}</a>
                                </li>
                                <li class="nav-item">
                                    <!-- <a class="nav-link" href="{{ route('informe.analisis_rendimiento',$consultoria) }}">3.3. Análisis de rendimiento (margenes y retornos) </a> -->
                                    <a class="nav-link" href="#titulo10">3.3. {{$Informe->titulo10}} </a>
                                </li>
                                <li class="nav-item">
                                    <!-- <a class="nav-link" href="{{ route('informe.analisis_rotacion',$consultoria)}}">3.4. Análisis de rotación</a> -->
                                    <a class="nav-link" href="#titulo11"">3.4. {{$Informe->titulo11}}</a>
                                </li>
                                <li class="nav-item">
                                    <!-- <a class="nav-link" href="{{ route('informe.analisis_liquidez',$consultoria)}}">3.5. Análisis de liquidez</a> -->
                                    <a class="nav-link" href="#titulo12">3.5. {{$Informe->titulo12}}</a>
                                </li>
                            </ul>
                        </li>





                        <li class="has-sub">

                            <a class="js-arrow" href="#titulo13">
                                <i class="fas fa-tachometer-alt"></i>4. {{$Informe->titulo13}}</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li class="nav-item">
                                    <!-- <a class="nav-link" href="{{ route('informe.horizonte_proyeccion',$consultoria) }}">4.1. Horizonte de Proyección</a> -->
                                    <a class="nav-link" href="#titulo14">4.1. {{$Informe->titulo14}}</a>
                                </li>
                                <li class="nav-item">
                                    <!-- <a class="nav-link" href="{{ route('informe.proyeccion_ingresos',$consultoria)}}">4.2. Proyección de Ingresos</a> -->
                                    <a class="nav-link" href="#titulo15">4.2. {{$Informe->titulo15}}</a>
                                </li>
                                <li class="nav-item">
                                    <!-- <a class="nav-link" href="{{ route('informe.proyeccion_financiera',$consultoria) }}">4.3. Proyecciones de indicadores claves de la gestión financieras</a> -->
                                    <a class="nav-link" href="#titulo16">4.3. {{$Informe->titulo16}}</a> 
                                </li>
                                <li class="nav-item">
                                    <!-- <a class="nav-link" href="{{ route('informe.endeudamiento_propuesto',$consultoria)}}">4.4. Endeudamiento propuesto</a> -->
                                    <a class="nav-link" href="#titulo17">4.4. {{$Informe->titulo17}}</a>
                                </li>
                                <li class="nav-item">
                                    <!-- <a class="nav-link" href="{{ route('informe.estados_financieros',$consultoria) }}">4.5. Estados Financieros proyectados</a> -->
                                    <a class="nav-link" href="#titulo18">4.5. {{$Informe->titulo18}}</a>
                                </li>
                                <li class="nav-item">
                                    <!-- <a class="nav-link" href="{{ route('informe.comentarios_flujo_endeudamiento',$consultoria)}}">4.6. Comentarios sobre el flujo de efectivo y el endeudamiento</a> -->
                                    <a class="nav-link" href="#titulo19">4.6. {{$Informe->titulo19}}</a> 
                                </li>
                            </ul>
                        </li>
                        <li>
                       <!--  <a  href="{{route('informe.recomendaciones',$consultoria)}}">
                        5. Conclusiones y recomendaciones finales</a> -->
                        <a  href="#titulo20"> 5. {{$Informe->titulo20}}</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->
        
        <!-- ESPACIOS MENU -->
        <style>
        .abajo{
            margin-bottom:-20px;


        }

        .arriba{
            margin-top: -17px;
        }

        .fondotitmenu{
            background-color:#2FB5D2;
        }
        </style>


        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="{{ route('dasboard.index') }}">
                    <img src="{{ asset('/images/icon/logo.png') }}" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                       
                        <li class="active has-sub abajo " >
                            <a  href="#titulo3" > 1. {{$Informe->titulo3}}</a>
                        </li>

                        <li class="active has-sub abajo">
                            <a class="js-arrow"   href="#titulo4">2. {{$Informe->titulo4}} </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="nav-item arriba">
                                   <!--  <a class="nav-link" href="{{ route('informe.situacion',$consultoria) }}">2.1. {{$Informe->titulo5}}</a> -->
                                   <a class="nav-link" href="#titulo5">2.1. {{$Informe->titulo5}}</a>

                                </li>

                                <li class="nav-item arriba">
                                    <!-- <a class="nav-link" href="{{ route('informe.sectorauto',$consultoria)}}">2.2. {{$Informe->titulo6}}</a> -->
                                    <a class="nav-link"  href="#titulo6">2.2. {{$Informe->titulo6}}</a>
                                </li>
                            </ul>
                        </li>
                      
                        <li class="active has-sub abajo">
                        <a class="js-arrow"   href="#titulo7">
                                <!--<i class="fas fa-users"></i>-->3. {{$Informe->titulo7}}</a>

                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="nav-item arriba">
                                    <!-- <a class="nav-link" href="{{ route('informe.financiero_historico',$consultoria) }}">3.1. {{$Informe->titulo8}}</a> -->
                                    <a class="nav-link"  href="#titulo8">3.1. {{$Informe->titulo8}}</a>
                                </li>

                                <li class="nav-item arriba">
                                    <!-- <a class="nav-link" href="{{ route('informe.analisis_cifras_financieras',$consultoria)}}">3.2. {{$Informe->titulo9}}</a> -->
                                    <a class="nav-link" href="#titulo9">3.2. {{$Informe->titulo9}}</a>
                                </li>
                                <li class="nav-item arriba">
                                    <!-- <a class="nav-link" href="{{ route('informe.analisis_rendimiento',$consultoria) }}">3.3. {{$Informe->titulo10}} </a> -->
                                    <a class="nav-link" href="#titulo10">3.3. {{$Informe->titulo10}} </a>
                                </li>

                                <li class="nav-item arriba">
                                    <!-- <a class="nav-link" href="{{ route('informe.analisis_rotacion',$consultoria)}}">3.4. {{$Informe->titulo11}}</a> -->
                                    <a class="nav-link" href="#titulo11"">3.4. {{$Informe->titulo11}}</a>
                                </li>
                                <li class="nav-item arriba">
                                    <!-- <a class="nav-link" href="{{ route('informe.analisis_liquidez',$consultoria)}}">3.5. {{$Informe->titulo12}}</a> -->
                                    <a class="nav-link" href="#titulo12">3.5. {{$Informe->titulo12}}</a>
                                </li>
                            </ul>
                        </li>
                  
                        <li class="active has-sub abajo">
                            <a class="js-arrow"   href="#titulo13">4. {{$Informe->titulo13}}</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="nav-item">
                                    <!-- <a class="nav-link arriba" href="{{ route('informe.horizonte_proyeccion',$consultoria) }}">4.1. {{$Informe->titulo14}}</a> -->
                                    <a class="nav-link arriba" href="#titulo14">4.1. {{$Informe->titulo14}}</a>
                                </li>
                                <li class="nav-item"> 
                                    <!-- <a class="nav-link arriba" href="{{ route('informe.proyeccion_ingresos',$consultoria)}}">4.2. {{$Informe->titulo15}}</a> -->
                                    <a class="nav-link arriba" href="#titulo15">4.2. {{$Informe->titulo15}}</a>
                                </li>
                                <li class="nav-item">
                                    <!-- <a class="nav-link arriba" href="{{ route('informe.proyeccion_financiera',$consultoria) }}">4.3. {{$Informe->titulo16}}</a> -->
                                    <a class="nav-link arriba" href="#titulo16">4.3. {{$Informe->titulo16}}</a> 
                                </li>
                                <li class="nav-item">
                                    <!-- <a class="nav-link arriba" href="{{ route('informe.endeudamiento_propuesto',$consultoria)}}">4.4. {{$Informe->titulo17}}</a> -->
                                    <a class="nav-link arriba" href="#titulo17">4.4. {{$Informe->titulo17}}</a>
                                </li>
                                <li class="nav-item">
                                    <!-- <a class="nav-link arriba" href="{{ route('informe.estados_financieros',$consultoria) }}">4.5. {{$Informe->titulo18}}</a> -->
                                    <a class="nav-link arriba" href="#titulo18">4.5. {{$Informe->titulo18}}</a>
                                </li>
                                <li class="nav-item">
                                    <!-- <a class="nav-link arriba" href="{{ route('informe.comentarios_flujo_endeudamiento',$consultoria)}}">4.6. {{$Informe->titulo19}}</a> -->
                                    <a class="nav-link arriba" href="#titulo19">4.6. {{$Informe->titulo19}}</a> 
                                </li>
                            </ul>
                        </li>
                        <li class="active has-sub">
                           <a  href="#titulo20"> 5. {{$Informe->titulo20}}</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <div class="form-header">
                                <a class="btn btn-secondary" href="{{ route('consultoria_comprada.index')}}"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
                               
                                <a class="btn btn-success ml-5" href="{{ route('galeria.index',$consultoria)}}" target="_blank" onclick="window.open(this.href, this.target, 'top=70,left=170,width=1000,height=900'); return false;"> <i class="fas fa-images"></i> Galeria</a>

                                @if($validaconsultoria->estado=='cerrado')

                                    <a href="javascript:;" data-toggle="modal" onclick="sendOpenInforme({{$consultoria}})" 
                                    data-target="#abrirInformeModal" class="btn btn-primary ml-5" data-backdrop="static" style="max-width: max-content;"><i class="fas fa-lock-open"></i>
                                    Abrir Informe</a>
                                @else
                                    <a href="javascript:;" data-toggle="modal" onclick="sendEmailInforme({{$consultoria}})" 
                                    data-target="#cerrarInformeModal" class="btn btn-danger ml-5" data-backdrop="static" style="max-width: max-content;"><i class="fas fa-lock"></i>
                                    Cerrar Informe</a>
                                @endif 
                            </div>
                                <a   href="{{ route('informe.download_pdf',$consultoria)}}" 
                                    class="btn btn-light ml-5" target="_blank" ><i class="fas fa-file-pdf fa-2x" style="color:#c82333; width:6; height:6;"></i></i>
                                    Descargar
                                </a>
                              
                            <div class="header-button">
                                <div class="noti-wrap">
                                </div>
                             
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            @if(Auth::user()->file)
                                            <img src="{{ asset( Auth::user()->file) }}" alt="{{ 'Avatar '.Auth::user()->name }}" />
                                            @else
                                            <img src="{{ asset('/images/users/avatar.png') }}" alt="Avatar" />
                                            @endif
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">{{{ Auth::user()->name}}}
                                               @if(Auth::user()->isRole('admin'))
                                                    {{'(Admin)'}}
                                               @endif
                                               @if(Auth::user()->isRole('suspendido'))
                                                    {{'(Suspendido)'}}
                                               @endif
                                            </a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        @if(Auth::user()->file)
                                                        <img src="{{ asset( Auth::user()->file) }}" alt="{{ 'Avatar '.Auth::user()->name }}" />
                                                        @else
                                                        <img src="{{ asset('/images/users/avatar.png') }}" alt="Avatar" />
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">{{{ Auth::user()->name}}}</a>
                                                    </h5>
                                                    <span class="email">{{{ Auth::user()->email}}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        @if(session('info'))
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12"> 
                                    <!-- col-md-offset-2 -->
                                        <div class="alert alert-success">

                                            <!--SECCIÓN PARA EL PDF -->
                                            <div class="invoice"> 
                                                {{ session('info')}}
                                            </div> 
                                            <!--SECCIÓN PARA EL PDF -->
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if(count($errors))
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-danger">
                                           <ul class="list-unstyled">
                                                @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                           </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @yield('content')
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <!-- <p>Copyright © 2019 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    @include('template.popup') 
    @yield('scripts')
    <!-- Jquery JS-->
    <script src="{{ asset('vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS -->
    <script src="{{ asset('vendor/animsition/animsition.min.js') }}"></script>
    <!-- Main JS-->
    <script src="{{ asset('js/main.js')}}"></script>



 
</body>

</html>
<!-- end document-->



<!-- Inclusion del Popup -->
@include('informe.popup') 

@else
<a href="">Acceso denegado...</a>
@endif




































