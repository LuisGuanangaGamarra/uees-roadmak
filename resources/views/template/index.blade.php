<!DOCTYPE html>
<html lang="en">

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
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" media="all">
    


    

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
    <!-- Modal CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{ asset('css/scroll-ios.css') }}" rel="stylesheet">
    @yield('cssSectionPropio')
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
                    @can('parametrizacion.index')
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Parametrización</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                 @can('plantilla.index')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('plantilla.index') }}">Plantillas</a>
                                </li>
                                @endcan 
                                @can('consultorias.index')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('consultorias.index') }}">Consultorías</a>
                                </li>
                               @endcan

<!--                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('subconsultorias.index2') }}">Sub-consultorias</a>
                                </li> -->

                                @can('indice.index')
                                <li class="nav-item"> 
                                    <a class="nav-link" href="{{ route('indice.index') }}">Índices</a>
                                </li>
                                @endcan 
                                @can('articulos.index')
                                <li class="nav-item">
                                <a class="nav-link" href="{{ route('articulos.index') }}">Artículos</a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan 
                        <!-- <li>
                            <a href="chart.html">
                                <i class="fas fa-chart-bar"></i>Charts</a>
                        </li>
                        <li>
                            <a href="table.html">
                                <i class="fas fa-table"></i>Tables</a>
                        </li>
                        <li>
                            <a href="form.html">
                                <i class="far fa-check-square"></i>Forms</a>
                        </li> -->
                        @can('users.index')
                        <li class="active has-sub">
                            <a href="{{route('users.index')}}">
                                <i class="fas fa-users"></i>Usuarios</a>
                        </li>
                        @endcan
                        @can('roles.index')
                        <li class="active has-sub">
                            <a href="{{route('roles.index')}}">
                                <i class="fas fa-sitemap"></i>Roles</a>
                        </li>
                        @endcan

                        @can('cuentas.index')
                        <li  class="has-sub">
                            <a class="js-arrow" href="#">
                                    <i class="fas fa-cogs"></i>Cuentas
                            </a>

                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">


                            
                                <!--@can('balance.index')
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('balance.index') }}">Balance</a>
                                    </li>
                                @endcan
                                    @can('resultado.index')
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('resultado.index') }}">Resultados</a>
                                    </li>
                                    @endcan
                                    @can('flujos.index')
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('flujos.index') }}">Flujo Efectivo</a>
                                    </li>
                                    @endcan

                                    @can('cuentasventas.index')
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('balance.index') }}">Ventas</a>
                                    </li>
                                    @endcan   
                                    @can('cuentasamortizacion.index')
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('balance.index') }}">Amortización</a>
                                    </li>
                                    @endcan-->

                                    @can('menuanalisis.index')    
                                    <li >                         
                                        <a class="js-arrow" href="#">
                                            <i class="fas fa-chart-line"></i><b>Análisis</b>
                                        </a>


                                        <ul class="list-unstyled navbar__sub-list js-sub-list">
<!--                                         
                                            @can('estadosresultadosintegrales.index')
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('estadosresultadosintegrales.index') }}">ERI</a>
                                            </li>
                                            @endcan
                                            @can('estadossituacionfinanciera.index')
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('estadossituacionfinanciera.index') }}">ESF</a>
                                            </li>
                                            @endcan
                                            @can('estadossituacionfinancieraresumidos.index')
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('estadossituacionfinancieraresumidos.index') }}">ESF Resumido</a>
                                            </li>
                                            @endcan
                                            @can('estadosflujosefectivos.index')
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('estadosflujosefectivos.index') }}">EFE</a>
                                            </li>
                                            @endcan

                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('cuentas.index') }}">CUENTAS GENERALES</a>
                                            </li> -->

                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('cuentas.estadofinanciero', 1) }}">ESTADOS DE RESULTADOS INTEGRALES</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('cuentas.estadofinanciero', 2) }}">ESTADOS DE COSTOS DE PRODUCCIÓN</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('cuentas.estadofinanciero', 3) }}">ESTADOS DE SITUACIÓN FINANCIERA</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('cuentas.estadofinanciero', 4) }}">ESTADOS DE SITUACIÓN FINANCIERA RESUMIDOS</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('cuentas.estadofinanciero', 5) }}">ESTADOS DE FLUJOS DE EFECTIVO PROYECTADOS</a>
                                            </li>
                                    
                                        </ul>
                                    </li>
                                    @endcan
                            </ul>

                        </li>
                        @endcan


                        @can('bandeja.index')
                        <li  class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-envelope"></i>Bandeja
                            </a>

                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            @can('mis_consultoria_comprada.index')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('bandeja.index') }}">Mis Consultorías</a>
                                </li>
                            @endcan
                            @can('mis_consultoria_procesar.procesar')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('consultoria_comprada.index')}}">Procesamiento</a>
                                </li>
                            @endcan
                            </ul>
                        </li>
                        @endcan
                        @can('comprar.index')
                        <li  class="has-sub">
                            <a href="{{route('comprar.index')}}">
                                <i class="fas fa-shopping-cart"></i>Compras</a>
                        </li>
                        @endcan


                        <!-- <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="button.html">Button</a>
                                </li>
                                <li>
                                    <a href="badge.html">Badges</a>
                                </li>
                                <li>
                                    <a href="tab.html">Tabs</a>
                                </li>
                                <li>
                                    <a href="card.html">Cards</a>
                                </li>
                                <li>
                                    <a href="alert.html">Alerts</a>
                                </li>
                                <li>
                                    <a href="progress-bar.html">Progress Bars</a>
                                </li>
                                <li>
                                    <a href="modal.html">Modals</a>
                                </li>
                                <li>
                                    <a href="switch.html">Switchs</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grids</a>
                                </li>
                                <li>
                                    <a href="fontawesome.html">Fontawesome Icon</a>
                                </li>
                                <li>
                                    <a href="typo.html">Typography</a>
                                </li>
                            </ul>
                        </li> -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

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
                    @can('parametrizacion.index')
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Parametrización</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                 @can('plantilla.index')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('plantilla.index') }}">Plantillas</a>
                                </li>
                                @endcan 
                                @can('consultorias.index')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('consultorias.index') }}">Consultorías</a>
                                </li>
                                @endcan

<!--                                 <li class="nav-item">
                                    <a class="nav-link" href="{{ route('subconsultorias.index2') }}">Sub-consultorias</a>
                                </li> -->

                                
                                @can('indice.index')
                                <li class="nav-item"> 
                                    <a class="nav-link" href="{{ route('indice.index') }}">Índices</a>
                                </li>
                                @endcan
                                @can('articulos.index')
                               <li class="nav-item">
                                    <a class="nav-link" href="{{ route('articulos.index') }}">Artículos</a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan  
                        <!-- <li>
                            <a href="chart.html">
                                <i class="fas fa-chart-bar"></i>Charts</a>
                        </li>
                        <li>
                            <a href="table.html">
                                <i class="fas fa-table"></i>Tables</a>
                        </li>
                        <li>
                            <a href="form.html">
                                <i class="far fa-check-square"></i>Forms</a>
                        </li> -->
                        @can('users.index')
                        <li class="active has-sub">
                            <a href="{{route('users.index')}}">
                                <i class="fas fa-users"></i>Usuarios</a>
                        </li>
                        @endcan
                        @can('roles.index')
                        <li class="active has-sub">
                            <a href="{{route('roles.index')}}">
                                <i class="fas fa-sitemap"></i>Roles</a>
                        </li>
                        @endcan
                        @can('cuentas.index')
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                    <i class="fas fa-cogs"></i>Cuentas
                            </a>

                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <!--@can('balance.index')
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('balance.index') }}">Balance</a>
                                    </li>
                                @endcan
                                    @can('resultado.index')
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('resultado.index') }}">Resultados</a>
                                    </li>
                                    @endcan
                                    @can('flujos.index')
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('flujos.index') }}">Flujo Efectivo</a>
                                    </li>
                                    @endcan

                                    @can('cuentasventas.index')
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('balance.index') }}">Ventas</a>
                                    </li>
                                    @endcan   
                                    @can('cuentasamortizacion.index')
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('balance.index') }}">Amortización</a>
                                    </li>
                                    @endcan-->

                                    @can('menuanalisis.index')    
                                    <li >                         
                                        <a class="js-arrow" href="#">
                                            <i class="fas fa-chart-line"></i><b>Análisis</b>
                                        </a>

                                        <ul class="list-unstyled navbar__sub-list js-sub-list">
<!--                                         
                                            @can('estadosresultadosintegrales.index')
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('estadosresultadosintegrales.index') }}">ERI</a>
                                            </li>
                                            @endcan
                                            @can('estadossituacionfinanciera.index')
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('estadossituacionfinanciera.index') }}">ESF</a>
                                            </li>
                                            @endcan
                                            @can('estadossituacionfinancieraresumidos.index')
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('estadossituacionfinancieraresumidos.index') }}">ESF Resumido</a>
                                            </li>
                                            @endcan
                                            @can('estadosflujosefectivos.index')
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('estadosflujosefectivos.index') }}">EFE</a>
                                            </li>
                                            @endcan

                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('cuentas.index') }}">CUENTAS GENERALES</a>
                                            </li> -->
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('cuentas.estadofinanciero', 1) }}">ESTADOS DE RESULTADOS INTEGRALES</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('cuentas.estadofinanciero', 2) }}">ESTADOS DE COSTOS DE PRODUCCIÓN</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('cuentas.estadofinanciero', 3) }}">ESTADOS DE SITUACIÓN FINANCIERA</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('cuentas.estadofinanciero', 4) }}">ESTADOS DE SITUACIÓN FINANCIERA RESUMIDOS</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('cuentas.estadofinanciero', 5) }}">ESTADOS DE FLUJOS DE EFECTIVO PROYECTADOS</a>
                                            </li>
                                    
                                        </ul>
                                    </li>
                                    @endcan
                            </ul>

                        </li>
                        @endcan


                    
                        @can('bandeja.index')
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-envelope"></i>Bandeja
                            </a>

                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                            @can('mis_consultoria_comprada.index')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('bandeja.index') }}">Mis Consultorías</a>
                                </li>
                            @endcan
                            @can('mis_consultoria_procesar.procesar')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('consultoria_comprada.index')}}">Procesamiento</a>
                                </li>
                            @endcan
                            </ul>
                        </li>
                        @endcan
                        @can('comprar.index')
                        <li class="active has-sub">
                            <a href="{{route('comprar.index')}}">
                                <i class="fas fa-shopping-cart"></i>Compras</a>
                        </li>
                        @endcan
                        <!-- <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="button.html">Button</a>
                                </li>
                                <li>
                                    <a href="badge.html">Badges</a>
                                </li>
                                <li>
                                    <a href="tab.html">Tabs</a>
                                </li>
                                <li>
                                    <a href="card.html">Cards</a>
                                </li>
                                <li>
                                    <a href="alert.html">Alerts</a>
                                </li>
                                <li>
                                    <a href="progress-bar.html">Progress Bars</a>
                                </li>
                                <li>
                                    <a href="modal.html">Modals</a>
                                </li>
                                <li>
                                    <a href="switch.html">Switchs</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grids</a>
                                </li>
                                <li>
                                    <a href="fontawesome.html">Fontawesome Icon</a>
                                </li>
                                <li>
                                    <a href="typo.html">Typography</a>
                                </li>
                            </ul>
                        </li> -->
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
                            <form class="form-header" action="" method="GET" style="visibility: hidden;">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <!-- <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-comment-more"></i>
                                        <span class="quantity">1</span>
                                        <div class="mess-dropdown js-dropdown">
                                            <div class="mess__title">
                                                <p>You have 2 news message</p>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Michelle Moreno" />
                                                </div>
                                                <div class="content">
                                                    <h6>Michelle Moreno</h6>
                                                    <p>Have sent a photo</p>
                                                    <span class="time">3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-04.jpg" alt="Diane Myers" />
                                                </div>
                                                <div class="content">
                                                    <h6>Diane Myers</h6>
                                                    <p>You are now connected on message</p>
                                                    <span class="time">Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="mess__footer">
                                                <a href="#">View all messages</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-email"></i>
                                        <span class="quantity">1</span>
                                        <div class="email-dropdown js-dropdown">
                                            <div class="email__title">
                                                <p>You have 3 New Emails</p>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, 3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-05.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-04.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, April 12,,2018</span>
                                                </div>
                                            </div>
                                            <div class="email__footer">
                                                <a href="#">See all emails</a>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 3 Notifications</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Your account has been blocked</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a new file</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                    </div> -->
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
                                               @if(Auth::user()->isRole('SuperAdmin'))
                                                    {{'(SuperAdmin)'}}
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
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="{{ route('perfil.index') }}">
                                                        <i class="zmdi zmdi-account"></i>Perfil</a>
                                                </div>
                                                <!-- <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div> -->
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <!-- <a href="#">
                                                    <i class="zmdi zmdi-power"></i>Logout</a> -->
                                                    <a href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                        <i class="zmdi zmdi-power"></i>
                                                        Logout
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        {{ csrf_field() }}
                                                    </form>
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
                                            {{ session('info')}}
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
                                   <!--  <p>Copyright © 2019 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p> -->
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
    <!--<script src="{{ asset('vendor/jquery-3.2.1.min.js') }}"></script>-->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    
   
    <!-- Bootstrap JS-->
   <!-- <script src="{{ asset('vendor/bootstrap-4.1/popper.min.js') }}"></script>-->
    <!--<script src="{{ asset('vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>-->
    <!-- Vendor JS -->
    <script src="{{ asset('vendor/animsition/animsition.min.js') }}"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>




    <script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable({
    "language": {
      "url": "https://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }, "lengthMenu": [[5, 10, 20,100, -1], [5, 10, 20,100, "Todos"]]
  });
        
    } );
    </script>
    <!-- Main JS-->
    <script src="{{ asset('js/main.js')}}"></script>
    <!-- script Modal-->

 <!--    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>--> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



   @yield('scriptsPropios')

 
</body>

</html>
<!-- end document-->
