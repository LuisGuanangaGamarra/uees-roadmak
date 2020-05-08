<?php

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('dasboard.index'));
});

// Home > Users
Breadcrumbs::register('users', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Users', route('users.index'));
});

// Home > Users > [ID]
Breadcrumbs::register('users.show', function ($breadcrumbs, $user) {
    $breadcrumbs->parent('users');
    $breadcrumbs->push($user->id, route('users.show', $user->id));
});

// Home > Users > [ID] > [Edit]
Breadcrumbs::register('users.edit', function ($breadcrumbs, $user) {
    $breadcrumbs->parent('users.show', $user);
    $breadcrumbs->push('Edit', route('users.edit', $user->id));
});

// Home > C&I
Breadcrumbs::register('ci', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('CI', route('consultoriasplantilla.index'));
});

// Home > C&I > [ID]
Breadcrumbs::register('ci.show', function ($breadcrumbs, $ci) {
    $breadcrumbs->parent('ci');
    $breadcrumbs->push($ci->id, route('consultoriasplantilla.show', $ci->id));
});

// Home > C&I > create

Breadcrumbs::register('ci.create', function ($breadcrumbs) {
    $breadcrumbs->parent('ci');
    $breadcrumbs->push('Crear', route('consultoriasplantilla.create'));
});


// Home > C&I > [ID] > EDIT
Breadcrumbs::register('ci.edit', function ($breadcrumbs, $ci) {
    $breadcrumbs->parent('ci.show', $ci);
    $breadcrumbs->push('Edit', route('consultoriasplantilla.edit', $ci->id));
});


// Home > Consultorias
Breadcrumbs::register('consultorias', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Consultorías', route('consultorias.index'));
});

// Home > Consultorias > Create
Breadcrumbs::register('consultorias.create', function ($breadcrumbs) {
    $breadcrumbs->parent('consultorias');
    $breadcrumbs->push('Crear', route('consultorias.create'));
});


// Home > Consultorias > [ID]
Breadcrumbs::register('consultorias.show', function ($breadcrumbs, $consultoria) {
    $breadcrumbs->parent('consultorias');
    $breadcrumbs->push( $consultoria, route('consultorias.show', $consultoria));
});

// Home > Consultorias > [ID] > [Edit]
Breadcrumbs::register('consultorias.edit', function ($breadcrumbs, $consultoria) {
   // $breadcrumbs->parent('consultorias.show', $consultoria->id_product);
    $breadcrumbs->parent('subconsultorias', $consultoria->id_product);
   
    $breadcrumbs->push('Edit', route('consultorias.edit', $consultoria->id_product));
});


// Home > Consultorias Índices
Breadcrumbs::register('consultoriasplantilla', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Consultorias-Índices', route('consultoriasplantilla.index'));
});



// Home > Consultorias > SubConsultorias
Breadcrumbs::register('subconsultorias', function ($breadcrumbs,$consultoria) {
    $breadcrumbs->parent('consultorias');
    $breadcrumbs->push('Sub-Consultorías', route('subconsultorias.index',$consultoria));
});


// Home > Consultorias > SubConsultorias  > Show
Breadcrumbs::register('subconsultorias.show', function ($breadcrumbs,$subConsultorias) {
    $breadcrumbs->parent('subconsultorias',$subConsultorias->grupo );
    $breadcrumbs->push($subConsultorias->name, route('subconsultorias.show',$subConsultorias->id));
});


// Home > Consultorias > SubConsultorias  > Edit
Breadcrumbs::register('subconsultorias.edit', function ($breadcrumbs,$subConsultorias) {
    $breadcrumbs->parent('subconsultorias',$subConsultorias->grupo );
    $breadcrumbs->push('Edit', route('subconsultorias.edit',$subConsultorias->id));
});


// Home > Consultorias > SubConsultorias  > Create
Breadcrumbs::register('subconsultorias.create', function ($breadcrumbs,$subConsultorias) {
    $breadcrumbs->parent('subconsultorias',$subConsultorias );
    $breadcrumbs->push('Create', route('subconsultorias.create',$subConsultorias));
});



// Home > Articulos
Breadcrumbs::register('articulos', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Artículos', route('articulos.index'));
});

// Home > Articulos > [ID]
Breadcrumbs::register('articulos.show', function ($breadcrumbs, $articulo) {
    $breadcrumbs->parent('articulos');
    $breadcrumbs->push($articulo->id_product, route('articulos.show', $articulo->id_product));
});


// Home > Plantilla
Breadcrumbs::register('plantilla', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Plantilla', route('plantilla.index'));
});

// Home > Plantilla > [ID]
Breadcrumbs::register('plantilla.show', function ($breadcrumbs, $articulo) {
    $breadcrumbs->parent('plantilla');
    $breadcrumbs->push($articulo->id, route('plantilla.show', $articulo->id));
});

// Home > Plantilla > Create
Breadcrumbs::register('plantilla.create', function ($breadcrumbs) {
    $breadcrumbs->parent('plantilla');
    $breadcrumbs->push('Crear', route('plantilla.create'));
});


// Home > Roles
Breadcrumbs::register('roles', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Roles', route('roles.index'));
});

// Home > Roles > Create
Breadcrumbs::register('roles.create', function ($breadcrumbs) {
    $breadcrumbs->parent('roles');
    $breadcrumbs->push('Crear', route('roles.create'));
});

// Home > Roles > [ID]
Breadcrumbs::register('roles.show', function ($breadcrumbs, $rol) {
    $breadcrumbs->parent('roles');
    $breadcrumbs->push($rol->id, route('roles.show', $rol->id));
});


// Home > [NOMBRE ESTADO FINANCIERO]
Breadcrumbs::register('cuentas.index', function ($breadcrumbs,$estadofinanciero) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push($estadofinanciero->name_estado, route('cuentas.estadofinanciero',$estadofinanciero->id));
});
// Home > [NOMBRE ESTADO FINANCIERO] >SHOW
Breadcrumbs::register('cuentas.show', function ($breadcrumbs, $cuenta,$estadofinanciero) {
    $breadcrumbs->parent('cuentas.index',$estadofinanciero);
    $breadcrumbs->push($cuenta->name, route('cuentas.show', $cuenta->id));
});
// Home > [NOMBRE ESTADO FINANCIERO] >EDIT
Breadcrumbs::register('cuentas.edit', function ($breadcrumbs, $cuenta,$estadofinanciero) {
    $breadcrumbs->parent('cuentas.index',$estadofinanciero);
    $breadcrumbs->push($cuenta->name, route('cuentas.edit', $cuenta->id));
});


// Home > Balance 
Breadcrumbs::register('balance', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Balance', route('balance.index'));
});

// Home > Balance > Create
Breadcrumbs::register('balance.create', function ($breadcrumbs) {
    $breadcrumbs->parent('balance');
    $breadcrumbs->push('Crear', route('balance.create'));
});

// Home > Balance > Show 
Breadcrumbs::register('balance.show', function ($breadcrumbs, $balance) {
    $breadcrumbs->parent('balance');
    $breadcrumbs->push($balance->id, route('balance.show', $balance->id));
});





// Home > Resultados 
Breadcrumbs::register('resultado', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Resultados', route('resultado.index'));
});


// Home > Resultados > Create
Breadcrumbs::register('resultado.create', function ($breadcrumbs) {
    $breadcrumbs->parent('resultado');
    $breadcrumbs->push('Crear', route('resultado.create'));
});

// Home > Resultados > Show 
Breadcrumbs::register('resultado.show', function ($breadcrumbs, $balance) {
    $breadcrumbs->parent('resultado');
    $breadcrumbs->push($balance->id, route('resultado.show', $balance->id));
});



// Home > Flujos
Breadcrumbs::register('flujos', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Flujo Efectivo', route('flujos.index'));
});

// Home > Flujos > Create
Breadcrumbs::register('flujos.create', function ($breadcrumbs) {
    $breadcrumbs->parent('flujos');
    $breadcrumbs->push('Crear', route('flujos.create'));
});

// Home > Flujos > Show 
Breadcrumbs::register('flujos.show', function ($breadcrumbs, $balance) {
    $breadcrumbs->parent('flujos');
    $breadcrumbs->push($balance->id, route('flujos.show', $balance->id));
});



// Home > Estado de Resultado Integral
Breadcrumbs::register('estadosresultadosintegrales', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Estado de Resultado Integral', route('estadosresultadosintegrales.index'));
});

// Home > Estado de Resultado Integral > Create
Breadcrumbs::register('estadosresultadosintegrales.create', function ($breadcrumbs) {
    $breadcrumbs->parent('estadosresultadosintegrales');
    $breadcrumbs->push('Crear', route('estadosresultadosintegrales.create'));
});

// Home > Estado de Resultado Integral > Show 
Breadcrumbs::register('estadosresultadosintegrales.show', function ($breadcrumbs, $balance) {
    $breadcrumbs->parent('estadosresultadosintegrales');
    $breadcrumbs->push($balance->id, route('estadosresultadosintegrales.show', $balance->id));
});




// Home >  Estado de Situacion Financiera
Breadcrumbs::register('estadossituacionfinanciera', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Estado de Situacion Financiera', route('estadossituacionfinanciera.index'));
});

// Home > Estado de Situacion Financiera > Create
Breadcrumbs::register('estadossituacionfinanciera.create', function ($breadcrumbs) {
    $breadcrumbs->parent('estadossituacionfinanciera');
    $breadcrumbs->push('Crear', route('estadossituacionfinanciera.create'));
});

// Home > Estado de Situacion Financiera > Show 
Breadcrumbs::register('estadossituacionfinanciera.show', function ($breadcrumbs, $balance) {
    $breadcrumbs->parent('estadossituacionfinanciera');
    $breadcrumbs->push($balance->id, route('estadossituacionfinanciera.show', $balance->id));
});






// Home > Estado de Situacion Financiera Resumidos
Breadcrumbs::register('estadossituacionfinancieraresumidos', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Estado de Situacion Financiera Resumidos', route('estadossituacionfinancieraresumidos.index'));
});

// Home > Estado de Situacion Financiera Resumidos > Create
Breadcrumbs::register('estadossituacionfinancieraresumidos.create', function ($breadcrumbs) {
    $breadcrumbs->parent('estadossituacionfinancieraresumidos');
    $breadcrumbs->push('Crear', route('estadossituacionfinancieraresumidos.create'));
});

// Home > Estado de Situacion Financiera Resumidos > Show 
Breadcrumbs::register('estadossituacionfinancieraresumidos.show', function ($breadcrumbs, $balance) {
    $breadcrumbs->parent('estadossituacionfinancieraresumidos');
    $breadcrumbs->push($balance->id, route('estadossituacionfinancieraresumidos.show', $balance->id));
});




// Home > Estado de Situacion Financiera Resumidos
Breadcrumbs::register('estadosflujosefectivos', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Estado de Flujo Efectivo', route('estadosflujosefectivos.index'));
});

// Home > Estado de Situacion Financiera Resumidos > Create
Breadcrumbs::register('estadosflujosefectivos.create', function ($breadcrumbs) {
    $breadcrumbs->parent('estadosflujosefectivos');
    $breadcrumbs->push('Crear', route('estadosflujosefectivos.create'));
});

// Home > Estado de Situacion Financiera Resumidos > Show 
Breadcrumbs::register('estadosflujosefectivos.show', function ($breadcrumbs, $balance) {
    $breadcrumbs->parent('estadosflujosefectivos');
    $breadcrumbs->push($balance->id, route('estadosflujosefectivos.show', $balance->id));
});


// Home > Mis consultorías
Breadcrumbs::register('bandeja_mis_consultorias.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Mis consultorías', route('bandeja.index'));
});

// Home > Mis consultorías > Carga de Archivo 
Breadcrumbs::register('bandeja_mis_consultorias.index_file', function ($breadcrumbs, $consultoria) {
    $breadcrumbs->parent('bandeja_mis_consultorias.index');
    $breadcrumbs->push($consultoria->id, route('bandeja.index_file',$consultoria->id));
});




// Home > Procesamiento
Breadcrumbs::register('consultoria_comprada.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Procesamiento', route('consultoria_comprada.index'));
});

// Home > Procesamiento > Editar consultoría comprada
Breadcrumbs::register('comprar.edit', function ($breadcrumbs, $compra) {
    $breadcrumbs->parent('consultoria_comprada.index');
    $breadcrumbs->push('Editar Consultoría comprada', route('comprar.edit',$compra->id));
});




// Home > Comprar
Breadcrumbs::register('comprar.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Comprar', route('comprar.index'));
});


// Home > comprar  > Datos compra
Breadcrumbs::register('cliente.create', function ($breadcrumbs) {
    $breadcrumbs->parent('comprar.index');
    $breadcrumbs->push('Datos Cliente', route('cliente.create'));
});
// Home > comprar > Datos Cliente > 1
Breadcrumbs::register('compra.create', function ($breadcrumbs,$cliente) {
    $breadcrumbs->parent('cliente.create');
    $breadcrumbs->push($cliente->id, route('comprar.create',$cliente->id));
});



?>