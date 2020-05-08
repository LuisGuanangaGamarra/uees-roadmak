@can('mis_consultoria_comprada.index')
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
                            <!-- <a  href="{{route('informe_cliente.informaciongeneral_dos',$consultoria)}}">
                                1. {{$Informe->titulo3}}</a> -->
                            <a  href="#titulo3" > 1. {{$Informe->titulo3}}</a>
                        </li>

                        <li class="has-sub">  

                            <a class="js-arrow" href="#titulo4">
                                <!--<i class="fas fa-tachometer-alt"></i>-->2. {{$Informe->titulo4}} </a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li class="nav-item">
                                    <!-- <a class="nav-link" href="{{ route('informe_cliente.situacioneconomica',$consultoria) }}">2.1. {{$Informe->titulo5}}</a> -->
                                    <a class="nav-link" href="#titulo5">2.1. {{$Informe->titulo5}}</a>
                                </li>
                                <li class="nav-item">
                                    <!-- <a class="nav-link" href="{{ route('informe_cliente.sectorauto_cliente',$consultoria)}}">2.2. {{$Informe->titulo6}}</a> -->
                                    <a class="nav-link"  href="#titulo6">2.2. {{$Informe->titulo6}}</a>
                                </li>
                            </ul>
                        </li>




                        <li class="has-sub">

                            <a class="js-arrow" href="#titulo7">
                                <!--<i class="fas fa-tachometer-alt"></i>-->3. {{$Informe->titulo7}}</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li class="nav-item">
                                    <!-- <a class="nav-link" href="{{ route('informe_cliente.financiero_historico_cliente',$consultoria) }}">3.1. {{$Informe->titulo8}}</a> -->
                                    <a class="nav-link"  href="#titulo8">3.1. {{$Informe->titulo8}}</a>
                                </li>
                                <li class="nav-item">
                                    <!-- <a class="nav-link" href="{{ route('informe_cliente.analisis_cifras_financieras_cliente',$consultoria)}}">3.2. {{$Informe->titulo9}}</a> -->
                                    <a class="nav-link" href="#titulo9">3.2. {{$Informe->titulo9}}</a>
                                </li>
                                <li class="nav-item">
                                    <!-- <a class="nav-link" href="{{ route('informe_cliente.analisis_rendimiento_cliente',$consultoria) }}">3.3. {{$Informe->titulo10}} </a> -->
                                    <a class="nav-link" href="#titulo10">3.3. {{$Informe->titulo10}} </a>
                                </li>
                                <li class="nav-item">
                                <!-- <a class="nav-link" href="{{ route('informe_cliente.analisis_rotacion_cliente',$consultoria)}}">3.4. {{$Informe->titulo11}}</a> -->
                                <a class="nav-link" href="#titulo11"">3.4. {{$Informe->titulo11}}</a>
                                </li>
                                <li class="nav-item">
                                <!-- <a class="nav-link" href="{{ route('informe_cliente.analisis_liquidez_cliente',$consultoria)}}">3.5. {{$Informe->titulo12}}</a> -->
                                <a class="nav-link" href="#titulo12">3.5. {{$Informe->titulo12}}</a>
                                </li>
                            </ul>
                        </li>





                        <li class="has-sub">

                            <a class="js-arrow" href="#titulo13">
                                <!--<i class="fas fa-tachometer-alt"></i>-->4. {{$Informe->titulo13}}</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li class="nav-item">
                                    <!-- <a class="nav-link " href="{{ route('informe_cliente.horizonte_proyeccion_cliente',$consultoria) }}">{{$Informe->titulo14}}</a> -->
                                    <a class="nav-link" href="#titulo14">4.1. {{$Informe->titulo14}}</a>
                                </li>
                                <li class="nav-item">
                                    <!-- <a class="nav-link " href="{{ route('informe_cliente.proyeccion_ingresos_cliente',$consultoria)}}">4.2. {{$Informe->titulo15}}</a> -->
                                    <a class="nav-link" href="#titulo15">4.2. {{$Informe->titulo15}}</a>
                                </li>
                                <li class="nav-item">
                                    <!-- <a class="nav-link " href="{{ route('informe_cliente.proyeccion_financiera_cliente',$consultoria) }}">4.3. {{$Informe->titulo16}}</a> -->
                                    <a class="nav-link" href="#titulo16">4.3. {{$Informe->titulo16}}</a> 
                                </li>
                                <li class="nav-item">
                                    <!-- <a class="nav-link " href="{{ route('informe_cliente.endeudamiento_propuesto_cliente',$consultoria)}}">4.4. {{$Informe->titulo17}}</a> -->
                                    <a class="nav-link" href="#titulo17">4.4. {{$Informe->titulo17}}</a>
                                </li>
                                <li class="nav-item">
                                    <!-- <a class="nav-link " href="{{ route('informe_cliente.estados_financieros_cliente',$consultoria) }}">4.5. {{$Informe->titulo18}}</a> -->
                                    <a class="nav-link" href="#titulo18">4.5. {{$Informe->titulo18}}</a>
                                </li>
                                <li class="nav-item">
                                <!-- <a class="nav-link " href="{{ route('informe_cliente.comentarios_flujo_endeudamiento_cliente',$consultoria)}}">4.6. {{$Informe->titulo19}}</a> -->
                                <a class="nav-link" href="#titulo19">4.6. {{$Informe->titulo19}}</a> 
                                </li>
                            </ul>
                        </li>










                        
                        <li>
                            <!-- <a  href="{{route('informe_cliente.recomendaciones_cliente',$consultoria)}}">
                            5. {{$Informe->titulo20}}</a> -->
                            <a  href="#titulo20"> 5. {{$Informe->titulo20}}</a>
                        </li>
                        
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
                            <!-- <a  href="{{route('informe_cliente.informaciongeneral_dos',$consultoria)}}"> -->
                            <a  href="#titulo3" > 1. {{$Informe->titulo3}}</a>
                        </li>

                        <li class="active has-sub abajo">
                        <a class="js-arrow" href="#titulo4">
                                <!--<i class="fas fa-users"></i>-->2. {{$Informe->titulo4}} </a>

                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="nav-item arriba">
                                    <!-- <a class="nav-link" href="{{ route('informe_cliente.situacioneconomica',$consultoria) }}">2.1. {{$Informe->titulo5}}</a> -->
                                    <a class="nav-link" href="#titulo5">2.1. {{$Informe->titulo5}}</a>
                                </li>

                                <li class="nav-item arriba">
                                    <!-- <a class="nav-link" href="{{ route('informe_cliente.sectorauto_cliente',$consultoria)}}">2.2. {{$Informe->titulo6}}</a> -->
                                    <a class="nav-link"  href="#titulo6">2.2. {{$Informe->titulo6}}</a>
                                </li>
                            </ul>
                        </li>
                      
                        <li class="active has-sub abajo">
                        <a class="js-arrow" href="#titulo7">
                                <!--<i class="fas fa-users"></i>-->3. {{$Informe->titulo7}}</a>

                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="nav-item arriba">
                                    <!-- <a class="nav-link" href="{{ route('informe_cliente.financiero_historico_cliente',$consultoria) }}">3.1. {{$Informe->titulo8}}</a> -->
                                    <a class="nav-link"  href="#titulo8">3.1. {{$Informe->titulo8}}</a>
                                </li>

                                <li class="nav-item arriba">
                                    <!-- <a class="nav-link" href="{{ route('informe_cliente.analisis_cifras_financieras_cliente',$consultoria)}}">3.2. {{$Informe->titulo9}}</a> -->
                                    <a class="nav-link" href="#titulo9">3.2. {{$Informe->titulo9}}</a>
                                </li>
                                <li class="nav-item arriba">
                                    <!-- <a class="nav-link" href="{{ route('informe_cliente.analisis_rendimiento_cliente',$consultoria) }}">3.3. {{$Informe->titulo10}} </a> -->
                                    <a class="nav-link" href="#titulo10">3.3. {{$Informe->titulo10}} </a>
                                </li>

                                <li class="nav-item arriba">
                                    <!-- <a class="nav-link" href="{{ route('informe_cliente.analisis_rotacion_cliente',$consultoria)}}">3.4. {{$Informe->titulo11}}</a> -->
                                    <a class="nav-link" href="#titulo11"">3.4. {{$Informe->titulo11}}</a>
                                </li>
                                <li class="nav-item arriba">
                                    <!-- <a class="nav-link" href="{{ route('informe_cliente.analisis_liquidez_cliente',$consultoria)}}">3.5. {{$Informe->titulo12}}</a> -->
                                    <a class="nav-link" href="#titulo12">3.5. {{$Informe->titulo12}}</a>
                                </li>
                            </ul>
                        </li>
                   
                        <li class="active has-sub abajo">
                        <a class="js-arrow" href="#titulo13">
                                <!--<i class="fas fa-users"></i>-->4. {{$Informe->titulo13}}</a>

                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="nav-item">
                                    <!-- <a class="nav-link arriba" href="{{ route('informe_cliente.horizonte_proyeccion_cliente',$consultoria) }}">4.1. {{$Informe->titulo14}}</a> -->
                                    <a class="nav-link arriba" href="#titulo14">4.1. {{$Informe->titulo14}}</a>
                                </li>

                                <li class="nav-item"> 
                                    <!-- <a class="nav-link arriba" href="{{ route('informe_cliente.proyeccion_ingresos_cliente',$consultoria)}}">4.2. {{$Informe->titulo15}}</a> -->
                                    <a class="nav-link arriba" href="#titulo15">4.2. {{$Informe->titulo15}}</a>
                                </li>
                                <li class="nav-item">
                                    <!-- <a class="nav-link arriba" href="{{ route('informe_cliente.proyeccion_financiera_cliente',$consultoria) }}">4.3. {{$Informe->titulo16}}</a> -->
                                    <a class="nav-link arriba" href="#titulo16">4.3. {{$Informe->titulo16}}</a> 
                                </li>

                                <li class="nav-item">
                                    <!-- <a class="nav-link arriba" href="{{ route('informe_cliente.endeudamiento_propuesto_cliente',$consultoria)}}">4.4. {{$Informe->titulo17}}</a> -->
                                    <a class="nav-link arriba" href="#titulo17">4.4. {{$Informe->titulo17}}</a>
                                </li>
                                <li class="nav-item">
                                    <!-- <a class="nav-link arriba" href="{{ route('informe_cliente.estados_financieros_cliente',$consultoria) }}">4.5. {{$Informe->titulo18}}</a> -->
                                    <a class="nav-link arriba" href="#titulo18">4.5. {{$Informe->titulo18}}</a>
                                </li>

                                <li class="nav-item">
                                    <!-- <a class="nav-link arriba" href="{{ route('informe_cliente.comentarios_flujo_endeudamiento_cliente',$consultoria)}}">4.6. {{$Informe->titulo19}}</a> -->
                                    <a class="nav-link arriba" href="#titulo19">4.6. {{$Informe->titulo19}}</a> 
                                </li>
                            </ul>
                        </li>
                 
                                            

                        <li class="active has-sub">
                            <!-- <a  href="{{route('informe_cliente.recomendaciones_cliente',$consultoria)}}">
                            5. {{$Informe->titulo20}}</a> -->
                            <a  href="#titulo20"> 5. {{$Informe->titulo20}}</a>
                           
                        </li>
                      
                        
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
                          <form class="form-header" action="" method="POST">
 

                                <a   href="{{ route('informe.download_pdf',$consultoria)}}" 
                                        class="btn btn-light ml-5" target="_blank" ><i class="fas fa-file-pdf fa-2x" style="color:#c82333; width:6; height:6;"></i></i>
                                        Descargar
                                </a>

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
                                          <!--    <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="{{ route('perfil.index') }}">
                                                        <i class="zmdi zmdi-account"></i>Perfil</a>
                                                </div>
                                               <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div> 
                                            </div>-->
                                         <!--   <div class="account-dropdown__footer">
                                                 <a href="#">
                                                    <i class="zmdi zmdi-power"></i>Logout</a> 
                                                    <a href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                        <i class="zmdi zmdi-power"></i>
                                                        Logout
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        {{ csrf_field() }}
                                                    </form>
                                            </div>-->
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
@endcan
