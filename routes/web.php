<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. ThFese
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Mail\Welcome as WelcomeEmail;
use GuzzleHttp\Client;
use App\ConsultoriasCompradas;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Mail;
//use Illuminate\Mail\Message;
use Carbon\Carbon;
use App\SubConsultorias;



Route::get('/welcome', function () {
/*         Mail::to('jnieves@uees.edu.ec', 'Joselyne Nieves')
        ->send(new WelcomeEmail()); */


});

Route::get('/', function () {

        if(Auth::user()->isRole('cliente') ){//SI ES cliente
                return redirect()->route('bandeja.index');

        }else if(Auth::user()->isRole('superadmin') || Auth::user()->isRole('operador') || Auth::user()->isRole('admin') ){//SI ES SUPERADMINISTRADOR
                $consultoria = ConsultoriasCompradas::count(); 
		$consul_ultima_semana = ConsultoriasCompradas::whereDate('created_at', '>=', Carbon::now()->subDays(7))->count();
                $ventas = ConsultoriasCompradas::all();
                $total = 0;
                 foreach($ventas as $venta){
                        $id_consultoria = $venta->consultorias;
                        $subconsultoria = SubConsultorias::find($id_consultoria);
                        //$total = $total + $subconsultoria->precio;
			$total = $total + str_replace([','],['.'], $subconsultoria->precio);
                } 
 
		//data de 4 meses atras
                $data = ConsultoriasCompradas::selectRaw('COUNT(*) as count, YEAR(created_at) year, MONTH(created_at) month')
                ->where('created_at', '>=', Carbon::now()->subMonths(4))
                ->groupBy('year', 'month')
                ->get();

                $meses=array();
                $ventasxmes=array();

                foreach($data as $datames){
                       //dd($datames);
                       $nmes=$datames->month;
                       $nventas=$datames->count;
                       $mes=Carbon::create()->day(1)->month($nmes)->format('F');
                        //dd($mes);
                       array_push($meses, $mes);
                       array_push($ventasxmes, $nventas);
                       

                }

		$data2 = ConsultoriasCompradas::selectRaw('COUNT(*) as count, consultorias as id_consultoria')
                ->groupBy('consultorias')
                ->get();
                $consultorias=array();
                $ventasxconsultorias=array();
                $coloresxconsultorias=array();
                $objconsultorias=array();

                $faker = Faker\Factory::create();
                foreach($data2 as $consulto){
                        $obj=array();
                        $color=$faker->hexcolor;
                        array_push($obj, $subconsultoria->name);
                        array_push($obj, $color);
                        $id_consultoria=$consulto->id_consultoria;
                        $ventaxconsultoria=$consulto->count;
                        $subconsultoria = SubConsultorias::find($id_consultoria);
                        array_push($consultorias, $subconsultoria->name);
                        array_push($ventasxconsultorias, $ventaxconsultoria);
                        array_push($coloresxconsultorias, $color);
                        array_push($objconsultorias, $obj);
 
                }
                

                $user = User::count();
                return view('dashboard.index', compact('consultoria','user', 'consul_ultima_semana', 'total', 'meses', 'ventasxmes', 'consultorias', 'ventasxconsultorias', 'coloresxconsultorias', 'objconsultorias'));
 

                //$user = User::count();
                //return view('dashboard.index', compact('consultoria','user', 'consul_ultima_semana', 'total', 'meses', 'ventasxmes'));


		//$user = User::count();
                //return view('dashboard.index', compact('consultoria','user', 'consul_ultima_semana', 'total'));

        }else{//SI ES OTRO ROL
                return redirect()->route('consultoria_comprada.index');
                
        }
})->name('dasboard.index')->middleware('auth');

//->middleware('auth', 'role:admin');
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
//////////////////////////////////////////////////////////////////////////////////////////

/**
 * 
 * MIS RUTAS
 * 
 */
/* 
Route::get('api-consultorias', function() {
        #$model = App\Consultoria::query();

        $client = new Client([
                // Base URI is used with relative requests
                'base_uri' => 'http://localhost:3988/api/',
                // You can set any number of default request options.
                'timeout'  => 2.0,
            ]);
            $response = $client->request('GET', 'consultorias');
            $datos=json_decode($response->getBody()->getContents());
            $model = $datos->consultorias; 
    
        return DataTables::eloquent($model)->make();
}); */


Route::get('/template', function () {
    return view('template.index');
});

Route::get('/ingresar', function () {
    return view('template.login');
})->name('ingresar');;

Route::get('/registrar', function () {
    return view('template.register');
})->name('registrar');;

//////////////////////////////////////////////////////////////////////////////////////////


Route::middleware(['auth'])->group(function(){
        //imagenes

        //Route::get('imagen','imagesController@index')->name('images.index')->middleware('permission:roles.create');;

        Route::get('imagen','ConsultoriaController@indeximagen')->name('consultorias.indeximagen')
        ->middleware('permission:consultorias.index');

        //////////////////////////////////////////////////////////////////////////////////////////

        /**
         * 
         * PERFIL DE USUARIO
         * 
         */

        Route::get('perfil','PerfilController@index')->name('perfil.index');

        Route::get('perfil/edit', 'PerfilController@edit')->name('perfil.edit');

        Route::put('perfil/{usuario}/update','PerfilController@update')->name('perfil.update');

        //////////////////////////////////////////////////////////////////////////////////////////
        
        /**
         * 
         * ROLES
         * 
         */

        Route::post('roles/store','RoleController@store')->name('roles.store')
            ->middleware('permission:roles.create');
      
        Route::get('roles','RoleController@index')->name('roles.index')
            ->middleware('permission:roles.index');

        Route::get('roles/create','RoleController@create')->name('roles.create')
            ->middleware('permission:roles.create');

        Route::put('roles/{role}','RoleController@update')->name('roles.update')
            ->middleware('permission:roles.edit');

        Route::get('roles/{role}','RoleController@show')->name('roles.show')
            ->middleware('permission:roles.show');
        
        Route::delete('roles/{role}','RoleController@destroy')->name('roles.destroy')
            ->middleware('permission:roles.destroy');
        
        Route::get('roles/{role}/edit','RoleController@edit')->name('roles.edit')
            ->middleware('permission:roles.edit');

        /**
         * 
         * CONSULTORIAS
         * 
         */

        Route::post('consultorias/store','ConsultoriaController@store')->name('consultorias.store')
                ->middleware('permission:consultorias.create');

        Route::get('consultorias','ConsultoriaController@index')->name('consultorias.index')
                ->middleware('permission:consultorias.index');

        Route::get('consultorias/create','ConsultoriaController@create')->name('consultorias.create')
                ->middleware('permission:consultorias.create');

        Route::put('consultorias/{consultoria}','ConsultoriaController@update')->name('consultorias.update')
                ->middleware('permission:consultorias.edit');

        Route::get('consultorias/{consultoria}','ConsultoriaController@show')->name('consultorias.show')
                ->middleware('permission:consultorias.show');
        

        Route::delete('consultorias/{consultoria}','ConsultoriaController@destroy')->name('consultorias.destroy')
                ->middleware('permission:consultorias.destroy');
                 
        Route::get('consultorias/{consultoria}/edit','ConsultoriaController@edit')->name('consultorias.edit')
                ->middleware('permission:consultorias.edit');

        //////////////////////////////////////////////////////////////////////////////////////////

        /**
         * 
         * SUB CONSULTORIAS
         * 
         */

        Route::get('subconsultorias','SubConsultoriasController@index')->name('subconsultorias.index2');
        //->middleware('permission:consultorias.index');


        Route::get('subconsultorias/{consultoria}/index','SubConsultoriasController@subconsultoriasindex')->name('subconsultorias.index');
        //->middleware('permission:consultorias.index');

        
        
        Route::post('subconsultorias/store','SubConsultoriasController@store')->name('subconsultorias.store');
                //->middleware('permission:consultorias.create');

        Route::get('subconsultorias/create/{subconsultoria}','SubConsultoriasController@create')->name('subconsultorias.create');
                //->middleware('permission:consultorias.create');

        Route::put('subconsultorias/{subConsultorias}','SubConsultoriasController@update')->name('subconsultorias.update');
                //->middleware('permission:consultorias.edit');

        Route::get('subconsultorias/{subConsultorias}','SubConsultoriasController@show')->name('subconsultorias.show');
                //->middleware('permission:consultorias.show');
        
        Route::delete('subconsultorias/{subConsultorias}','SubConsultoriasController@destroy')->name('subconsultorias.destroy');
                //->middleware('permission:consultorias.destroy');
        
        Route::get('subconsultorias/{subConsultorias}/edit','SubConsultoriasController@edit')->name('subconsultorias.edit');
                //->middleware('permission:consultorias.edit');


        //////////////////////////////////////////////////////////////////////////////////////////

        
        /**
         * 
         * CONSULTORIAS&SUBCONSULTORIAS
         * 
        */

        Route::get('c_s/{subconsultorias}/edit','ConsultoriaController@c_s_edit')->name('c_s.edit')
        ->middleware('permission:consultorias.edit');

        Route::put('c_s/{subconsultorias}','ConsultoriaController@c_s_update')->name('c_s.update');
                //->middleware('permission:consultorias.edit');

        //////////////////////////////////////////////////////////////////////////////////////////




        
        /**
         * 
         * CONSULTORIAS&INDICES
         * 
        */

        Route::post('consultoriasplantilla/store','ConsultoriaPlantillaController@store')->name('consultoriasplantilla.store')
        ->middleware('permission:c&i.create');

        Route::get('consultoriasplantilla','ConsultoriaPlantillaController@index')->name('consultoriasplantilla.index')
                ->middleware('permission:c&i.index');

        Route::get('consultoriasplantilla/create','ConsultoriaPlantillaController@create')->name('consultoriasplantilla.create')
                ->middleware('permission:c&i.create');

        Route::put('consultoriasplantilla/{consultoriaPlantilla}','ConsultoriaPlantillaController@update')->name('consultoriasplantilla.update')
                ->middleware('permission:c&i.edit');

        Route::get('consultoriasplantilla/{consultoriaPlantilla}','ConsultoriaPlantillaController@show')->name('consultoriasplantilla.show')
                ->middleware('permission:c&i.show');

                
        Route::delete('consultoriasplantilla/{consultoriaPlantilla}','ConsultoriaPlantillaController@destroy')->name('consultoriasplantilla.destroy')
                ->middleware('permission:c&i.destroy');

        Route::get('consultoriasplantilla/{consultoriaPlantilla}/edit','ConsultoriaPlantillaController@edit')->name('consultoriasplantilla.edit')
                ->middleware('permission:c&i.edit');
        Route::get('consultoriasplantilla/seleccion/{consultoriaPlantilla}','ConsultoriaPlantillaController@CambiarEstado')->name('consultoriasplantilla.CambiarEstado')
                ->middleware('permission:c&i.edit');

        //////////////////////////////////////////////////////////////////////////////////////////
         
        /**
         * 
         * INDICES
         * 
         */
        Route::post('indices/store','IndiceController@store')->name('indice.store')
        ->middleware('permission:indice.create');

        Route::get('indices/create','IndiceController@create')->name('indice.create')
                ->middleware('permission:indice.create');

        Route::get('indices','IndiceController@index')->name('indice.index')
                ->middleware('permission:indice.index');
        
        Route::get('indices/{indice}/edit','IndiceController@edit')->name('indice.edit')
                ->middleware('permission:indice.edit');

        Route::put('indices/{indice}','IndiceController@update')->name('indice.update')
                ->middleware('permission:indice.edit');

        Route::get('indices/{indice}','IndiceController@show')->name('indice.show')
                ->middleware('permission:indice.show');
        //fin inidices

        Route::post('plantilla/store','PlantillaController@store')->name('plantilla.store')
        ->middleware('permission:plantilla.create');

        Route::get('plantilla','PlantillaController@index')->name('plantilla.index')
                ->middleware('permission:plantilla.index');

        Route::get('plantilla/create','PlantillaController@create')->name('plantilla.create')
                ->middleware('permission:plantilla.create');

        Route::put('plantilla/{plantilla}','PlantillaController@update')->name('plantilla.update')
                ->middleware('permission:plantilla.edit');

        Route::get('plantilla/{plantilla}','PlantillaController@show')->name('plantilla.show')
                ->middleware('permission:plantilla.show'); 

                
        Route::delete('plantilla/{plantilla}','PlantillaController@destroy')->name('plantilla.destroy')
                ->middleware('permission:plantilla.destroy');

        Route::get('plantilla/{plantilla}/edit','PlantillaController@edit')->name('plantilla.edit')
                ->middleware('permission:plantilla.edit');

        Route::get('plantilla/{plantilla}/asignar','PlantillaController@asignar')->name('plantilla.asignar')
        ->middleware('permission:plantilla.edit');

        Route::post('plantilla/createasig','PlantillaController@create')->name('plantilla.createasig')
        ->middleware('permission:plantilla.createasig');
        
        Route::get('download/{plantilla}','PlantillaController@downloadPlantilla')->name('plantilla.download')
                /*->middleware('permission:plantilla.edit')*/;
        
        //////////////////////////////////////////////////////////////////////////////////////////
        
        /**
         * 
         * ARTICULOS
         * 
         */

        Route::post('articulos/store','ArticulosController@store')->name('articulos.store')
        ->middleware('permission:articulos.create');

        Route::get('articulos','ArticulosController@index')->name('articulos.index')
        ->middleware('permission:articulos.index');

        Route::get('articulos/create','ArticulosController@create')->name('articulos.create')
        ->middleware('permission:articulos.create');

        Route::get('articulos/{articulo}','ArticulosController@show')->name('articulos.show')
        ->middleware('permission:articulos.show');

        //////////////////////////////////////////////////////////////////////////////////////////

        /**
         * 
         * USERS
         * 
         */

        Route::get('users','UserController@index')->name('users.index')
                ->middleware('permission:users.index');

        Route::put('users/{user}','UserController@update')->name('users.update')
                ->middleware('permission:users.edit');

        Route::get('users/{user}','UserController@show')->name('users.show')
                ->middleware('permission:users.show');
        
        Route::delete('users/{user}','UserController@destroy')->name('users.destroy')
                ->middleware('permission:users.destroy');
        
        Route::get('users/{user}/edit','UserController@edit')->name('users.edit')
                ->middleware('permission:users.edit');
        
        //////////////////////////////////////////////////////////////////////////////////////////

        /**
         * 
         * Balance
         * 
         */
        
        Route::post('balance/store','BalanceController@store')->name('balance.store')
        ->middleware('permission:balance.create');

        Route::get('balance','BalanceController@index')->name('balance.index')
                ->middleware('permission:balance.index');

        Route::get('balance/create','BalanceController@create')->name('balance.create')
                ->middleware('permission:balance.create');
        
        Route::put('balance/{balance}','BalanceController@update')->name('balance.update')
                ->middleware('permission:balance.edit');

        Route::get('balance/{balance}','BalanceController@show')->name('balance.show')
                ->middleware('permission:balance.show');
        
        Route::delete('balance/{balance}','BalanceController@destroy')->name('balance.destroy')
                ->middleware('permission:balance.destroy');
        
        Route::get('balance/{balance}/edit','BalanceController@edit')->name('balance.edit')
                ->middleware('permission:balance.edit');

        //////////////////////////////////////////////////////////////////////////////////////////

        /**
         * 
         * INFORME
         * Inicio de rutas del informe del CONSULTOR
         */

        //DESCARGAR INFORME PDF
        Route::get('informe/{consultoria}/download_pdf','InformeController@download_pdf')->name('informe.download_pdf')
        /* ->middleware('permission:consultoria_comprada.procesar') */;     
        Route::get('informe/{consultoria}/fRefreshPage','InformeController@fRefreshPage')->name('informe.fRefreshPage');


        //INFORME PRINCIPAL
                //CARGAR INFORME PRINCIPAL - VISTA:INFORME.INFORMACIONGENERAL
        Route::get('informe/{consultoria}','InformeController@index')->name('informe.index')
        ->middleware('permission:consultoria_comprada.procesar');
                //ABRIR VISTA EDITAR INFORME PRINCIPAL - VISTA:INFORME.EDITAR.EMERG 
        Route::get('informe/{consultoria}/edit','InformeController@emerg')
        ->name('informe.emerg')
        ->middleware('permission:consultoria_comprada.procesar');
                //FUNCION PARA ACTUALIZAR EL INFORME PRINCIPAL 
        Route::put('informe/{Informe}','InformeController@update')->name('informe.update')
        ->middleware('permission:consultoria_comprada.procesar');
        
        //1 INFORMACION_GENERAL_DOS
        /* Informacion general
        Route::get('informe/{consultoria}/informacion','InformeController@informacion')->name('informe.informacion');*/
                //CARGAR INFORMACION GENERAL - VISTA:INFORME.INFORMACIONGENERAL_DOS
        Route::get('informe/{consultoria}/informaciongeneral_dos','InformeController@informacion_dos')
        ->name('informe.informacion_dos')
        ->middleware('permission:consultoria_comprada.procesar');
                //ABRIR VISTA EDITAR INFORMACION GENERAL - VISTA:INFORME.EDITAR.EMERGINFORME 
        Route::get('informe/{consultoria}/informaciongeneral_dos_edit','InformeController@informacion_dos_edit')
        ->name('informe.informacion_dos_edit')
        ->middleware('permission:consultoria_comprada.procesar');
                //FUNCION PARA ACTUALIZAR INFORMACION GENERAL
        Route::put('informe/informacion_dos/{Informe}','InformeController@updateinf')
        ->name('informe.updateinf')
        ->middleware('permission:consultoria_comprada.procesar');

        //2 ANALISIS MACROECONOMICO DE LA EMPRESA
        //2.1 ANALISIS GENERAL DE LA SITUACION ECONOMICA DEL PAIS
                //CARGAR SITUACION ECONOMICA - VISTA:INFORME.SITUACIONECONOMICA
        Route::get('informe/{consultoria}/situacioneconomica','InformeController@situacion')
        ->name('informe.situacion')
        ->middleware('permission:consultoria_comprada.procesar');
                //ABRIR VISTA EDITAR SITUACION ECONOMICA - VISTA:INFORME.EDITAR.EMERG2-1
        Route::get('informe/{consultoria}/situacioneconomica_edit','InformeController@situacion_edit')
        ->name('informe.situacion_edit')
        ->middleware('permission:consultoria_comprada.procesar');
                //FUNCION PARA ACTUALIZAR SITUACION ECONOMICA
        Route::put('informe/situacioneconomica/{Informe}','InformeController@updatesituacion')
        ->name('informe.updatesituacion')
        ->middleware('permission:consultoria_comprada.procesar');
        //2.2 ANALISIS DEL SECTOR AUTOMOTRIZ
                //CARGAR SECTOR AUTOMOTRIZ - VISTA:INFORME.SECTORAUTOMOTRIZ
        Route::get('informe/{consultoria}/sectorautomotriz','InformeController@sectorauto')
        ->name('informe.sectorauto')
        ->middleware('permission:consultoria_comprada.procesar');
                //ABRIR VISTA EDITAR SECTOR AUTOMOTRIZ - VISTA:INFORME.EDITAR.EMERG2-2
        Route::get('informe/{consultoria}/sectorautomotriz_edit','InformeController@sectorauto_edit')
        ->name('informe.sector_edit')
        ->middleware('permission:consultoria_comprada.procesar');
                //FUNCION PARA ACTUALIZAR SECTOR AUTOMOTRIZ
        Route::put('informe/sectorautomotriz/{Informe}','InformeController@updatesector')
        ->name('informe.updatesector')
        ->middleware('permission:consultoria_comprada.procesar');

        //3 ANALISIS DE INFORMACION FINANCIERA
        //3.1 ESTADOS FINANCIEROS HISTORICOS
                //CARGAR ESTADOS FINANCIEROS HISTORICOS - VISTA:INFORME.FINANCIEROHISTORICO
        Route::get('informe/{consultoria}/financierohistorico','InformeController@financiero_historico')
        ->name('informe.financiero_historico')
        ->middleware('permission:consultoria_comprada.procesar');
                //ABRIR VISTA EDITAR ESTADOS FINANCIEROS HISTORICOS - VISTA:INFORME.EDITAR.EMERG3-1
        Route::get('informe/{consultoria}/financierohistorico_edit','InformeController@financiero_historico_edit')
        ->name('informe.financiero_historico_edit')
        ->middleware('permission:consultoria_comprada.procesar');
                //FUNCION PARA ACTUALIZAR ESTADOS FINANCIEROS HISTORICOS
        Route::put('informe/financierohistorico/{Informe}','InformeController@updatefinanciero_historico')
        ->name('informe.updatefinanciero_historico')
        ->middleware('permission:consultoria_comprada.procesar');

        //3.2. ANALISIS GENERAL DE CIFRAS FINANCIERAS
                //CARGAR CIFRAS FINANCIERAS - VISTA:INFORME.ANALISISCIFRAS
        Route::get('informe/{consultoria}/analisiscifras','InformeController@analisis_cifras_financieras')
        ->name('informe.analisis_cifras_financieras')
        ->middleware('permission:consultoria_comprada.procesar');
                //ABRIR VISTA EDITAR CIFRAS FINANCIERAS - VISTA:INFORME.EDITAR.EMERG3-2
        Route::get('informe/{consultoria}/analisiscifras_edit','InformeController@analisiscifras_edit')
        ->name('informe.analisiscifras_edit')
        ->middleware('permission:consultoria_comprada.procesar');
                //FUNCION PARA ACTUALIZAR CIFRAS FINANCIERAS
        Route::put('informe/analisiscifras/{Informe}','InformeController@updateanalisiscifras')
        ->name('informe.updateanalisiscifras')
        ->middleware('permission:consultoria_comprada.procesar');    

        //3.3. ANALISIS DE RENDIMIENTO
                //CARGAR ANALISIS DE RENDIMIENTO - VISTA:INFORME.ANALISISRENDIMIENTO
        Route::get('informe/{consultoria}/analisisrendimiento','InformeController@analisis_rendimiento')
        ->name('informe.analisis_rendimiento')
        ->middleware('permission:consultoria_comprada.procesar');
                //ABRIR VISTA EDITAR ANALISIS DE RENDIMIENTO - VISTA:INFORME.EDITAR.EMERG3-3
        Route::get('informe/{consultoria}/analisisrendimiento_edit','InformeController@analisis_rendimiento_edit')
        ->name('informe.analisis_rendimiento_edit')
        ->middleware('permission:consultoria_comprada.procesar');
                //FUNCION PARA ACTUALIZAR ANALISIS DE RENDIMIENTO
        Route::put('informe/analisisrendimiento/{Informe}','InformeController@updateanalisis_rendimiento')
        ->name('informe.updateanalisis_rendimiento')
        ->middleware('permission:consultoria_comprada.procesar');

        //3.4. ANALISIS DE ROTACION
                //CARGAR ANALISIS DE ROTACION - VISTA:INFORME.ANALISISROTACION
        Route::get('informe/{consultoria}/analisisrotacion','InformeController@analisis_rotacion')
        ->name('informe.analisis_rotacion')
        ->middleware('permission:consultoria_comprada.procesar');
                //ABRIR VISTA EDITAR ANALISIS DE ROTACION - VISTA:INFORME.EDITAR.EMERG3-4
        Route::get('informe/{consultoria}/analisisrotacion_edit','InformeController@analisis_rotacion_edit')
        ->name('informe.analisis_rotacion_edit')
        ->middleware('permission:consultoria_comprada.procesar');
                //FUNCION PARA ACTUALIZAR ANALISIS DE ROTACION
        Route::put('informe/analisisrotacion/{Informe}','InformeController@updateanalisis_rotacion')
        ->name('informe.updateanalisis_rotacion')
        ->middleware('permission:consultoria_comprada.procesar');


        //3.5. ANALISIS DE LIQUIDEZ
                //CARGAR ANALISIS DE LIQUIDEZ - VISTA:INFORME.ANALISISLIQUIDEZ
        Route::get('informe/{consultoria}/analisisliquidez','InformeController@analisis_liquidez')
        ->name('informe.analisis_liquidez')
        ->middleware('permission:consultoria_comprada.procesar');
                //ABRIR VISTA EDITAR ANALISIS DE LIQUIDEZ - VISTA:INFORME.EDITAR.EMERG3-5
        Route::get('informe/{consultoria}/analisisliquidez_edit','InformeController@analisis_liquidez_edit')
        ->name('informe.analisis_liquidez_edit')
        ->middleware('permission:consultoria_comprada.procesar');
                //FUNCION PARA ACTUALIZAR ANALISIS DE LIQUIDEZ
        Route::put('informe/analisisliquidez/{Informe}','InformeController@updateanalisis_liquidez')
        ->name('informe.updateanalisis_liquidez')
        ->middleware('permission:consultoria_comprada.procesar');

        //4 METODOLOGIAS DE ELABORACION DE PROYECCIONES
        //4.1. HORIZONTE DE PROYECCION 
                //CARGAR HORIZONTE DE PROYECCION - VISTA:INFORME.HORIZONTEPROYECCION
        Route::get('informe/{consultoria}/horizonteproyeccion','InformeController@horizonte_proyeccion')
        ->name('informe.horizonte_proyeccion')
        ->middleware('permission:consultoria_comprada.procesar');
                //ABRIR VISTA EDITAR HORIZONTE DE PROYECCION - VISTA:INFORME.EDITAR.EMERG4-1
        Route::get('informe/{consultoria}/horizonteproyeccion_edit','InformeController@horizonte_proyeccion_edit')
        ->name('informe.horizonte_proyeccion_edit')
        ->middleware('permission:consultoria_comprada.procesar');
                //FUNCION PARA ACTUALIZAR HORIZONTE DE PROYECCION
        Route::put('informe/horizonteproyeccion/{Informe}','InformeController@updatehorizonte_proyeccion')
        ->name('informe.updatehorizonte_proyeccion')
        ->middleware('permission:consultoria_comprada.procesar');
        
        //4.2. PROYECCION DE INGRESOS
                //CARGAR PROYECCION DE INGRESOS - VISTA:INFORME.PROYECCIONINGRESOS
        Route::get('informe/{consultoria}/proyeccioningresos','InformeController@proyeccion_ingresos')
        ->name('informe.proyeccion_ingresos')
        ->middleware('permission:consultoria_comprada.procesar');
                //ABRIR VISTA EDITAR PROYECCION DE INGRESOS - VISTA:INFORME.EDITAR.EMERG4-2
        Route::get('informe/{consultoria}/proyeccioningresos_edit','InformeController@proyeccion_ingresos_edit')
        ->name('informe.proyeccion_ingresos_edit')
        ->middleware('permission:consultoria_comprada.procesar');
                //FUNCION PARA ACTUALIZAR PROYECCION DE INGRESOS
        Route::put('informe/proyeccioningresos/{Informe}','InformeController@updateproyeccion_ingresos')
        ->name('informe.updateproyeccion_ingresos')
        ->middleware('permission:consultoria_comprada.procesar');

        //4.3. PROYECCIONES DE INDICADORES CLAVES DE LA GESTION FINANCIERAS
                //CARGAR PROYECCION DE INDICADORES - VISTA:INFORME.PROYECCIONFINANCIERA
        Route::get('informe/{consultoria}/proyeccionfinanciera','InformeController@proyeccion_financiera')
        ->name('informe.proyeccion_financiera')
        ->middleware('permission:consultoria_comprada.procesar');
                //ABRIR VISTA EDITAR PROYECCION DE INDICADORES - VISTA:INFORME.EDITAR.EMERG4-3
        Route::get('informe/{consultoria}/proyeccionfinanciera_edit','InformeController@proyeccion_financiera_edit')
        ->name('informe.proyeccion_financiera_edit')
        ->middleware('permission:consultoria_comprada.procesar');
                //FUNCION PARA ACTUALIZAR PROYECCION DE INDICADORES
        Route::put('informe/proyeccionfinanciera/{Informe}','InformeController@updateproyeccion_financiera')
        ->name('informe.updateproyeccion_financiera')
        ->middleware('permission:consultoria_comprada.procesar');

        //4.4. ENDEUDAMIENTO PROPUESTO
                //CARGAR ENDEUDAMIENTO PROPUESTO  - VISTA:INFORME.ENDEUDAMIENTOPROPUESTO
        Route::get('informe/{consultoria}/endeudamientopropuesto','InformeController@endeudamiento_propuesto')
        ->name('informe.endeudamiento_propuesto')
        ->middleware('permission:consultoria_comprada.procesar');
                //ABRIR VISTA ENDEUDAMIENTO PROPUESTO - VISTA:INFORME.EDITAR.EMERG4-4
        Route::get('informe/{consultoria}/endeudamientopropuesto_edit','InformeController@endeudamiento_propuesto_edit')
        ->name('informe.endeudamiento_propuesto_edit')
        ->middleware('permission:consultoria_comprada.procesar');
                //FUNCION PARA ACTUALIZAR ENDEUDAMIENTO PROPUESTO
        Route::put('informe/endeudamientopropuesto/{Informe}','InformeController@updateendeudamiento_propuesto')
        ->name('informe.updateendeudamiento_propuesto')
        ->middleware('permission:consultoria_comprada.procesar');

        //4.5. ESTADOS FINANCIEROS PROYECTADOS
                //CARGAR ESTADOS FINANCIEROS PROYECTADOS - VISTA:INFORME.ESTADOSFINANCIEROS
        Route::get('informe/{consultoria}/estadosfinancieros','InformeController@estados_financieros')
        ->name('informe.estados_financieros')
        ->middleware('permission:consultoria_comprada.procesar');
                //ABRIR VISTA ESTADOS FINANCIEROS PROYECTADOS - VISTA:INFORME.EDITAR.EMERG4-5
        Route::get('informe/{consultoria}/estadosfinancieros_edit','InformeController@estados_financieros_edit')
        ->name('informe.estados_financieros_edit')
        ->middleware('permission:consultoria_comprada.procesar');//;
                //FUNCION PARA ACTUALIZAR ESTADOS FINANCIEROS PROYECTADOS
        Route::put('informe/estadosfinancieros/{Informe}','InformeController@updateestados_financieros')
        ->name('informe.updateestados_financieros')
        ->middleware('permission:consultoria_comprada.procesar');

        //4.6. COMENTARIOS SOBRE EL FLUJO DE EFECTIVO Y EL ENDEUDAMIENTO 
                //CARGAR COMENTARIOS SOBRE EL FLUJO - VISTA:INFORME.COMENTARIOSFLUJOYENDEUDAMIENTO
        Route::get('informe/{consultoria}/comentariosflujoyendeudamiento','InformeController@comentarios_flujo_endeudamiento')
        ->name('informe.comentarios_flujo_endeudamiento')
        ->middleware('permission:consultoria_comprada.procesar');
                //ABRIR VISTA COMENTARIOS SOBRE EL FLUJO - VISTA:INFORME.EDITAR.EMERG4-6
        Route::get('informe/{consultoria}/comentariosflujoyendeudamiento_edit','InformeController@comentarios_flujo_endeudamiento_edit')
        ->name('informe.comentarios_flujo_endeudamiento_edit')
        ->middleware('permission:consultoria_comprada.procesar');
                //FUNCION PARA ACTUALIZAR COMENTARIOS SOBRE EL FLUJO
        Route::put('informe/comentariosflujoyendeudamiento/{Informe}','InformeController@updatecomentarios_flujo_endeudamiento')
        ->name('informe.updatecomentarios_flujo_endeudamiento')
        ->middleware('permission:consultoria_comprada.procesar');

        //5.0. CONCLUSIONES Y RECOMENDACIONES FINALES
                //CARGAR CONCLUSIONES Y RECOMENDACIONES FINALES - VISTA:INFORME.CONCLUSIONESYRECOMENDACIONES
        Route::get('informe/{consultoria}/conclusionesyrecomendaciones','InformeController@recomendaciones')
        ->name('informe.recomendaciones')
        ->middleware('permission:consultoria_comprada.procesar');
                //ABRIR VISTA CONCLUSIONES Y RECOMENDACIONES FINALES - VISTA:INFORME.EDITAR.EMERG5
        Route::get('informe/{consultoria}/conclusionesyrecomendaciones_edit','InformeController@recomendaciones_edit')
        ->name('informe.recomendaciones_edit')
        ->middleware('permission:consultoria_comprada.procesar');
                //FUNCION PARA ACTUALIZAR CONCLUSIONES Y RECOMENDACIONES FINALES
        Route::put('informe/conclusionesyrecomendaciones/{Informe}','InformeController@updaterecomendaciones')
        ->name('informe.updaterecomendaciones')
        ->middleware('permission:consultoria_comprada.procesar');



        //CERRAR INFORME
        Route::get('informe/{consultoria}/close','InformeController@closeInforme')->name('informe.close')
        ->middleware('permission:consultoria_comprada.procesar');

        //OPEN INFORME  
        Route::get('informe/{consultoria}/open','InformeController@openInforme')->name('informe.open')
        ->middleware('permission:consultoria_comprada.procesar');
        

        /**
         * 
         * GALERIA
         * 
         */

        Route::get('informe/{consultoria}/galeria','GaleriaController@index')->name('galeria.index');
        Route::get('informe/{consultoria}/galeria/crear','GaleriaController@create')->name('galeria.create');
        Route::post('informe/galeria/store','GaleriaController@store')->name('galeria.store');
        Route::delete('informe/galeria/{galeria}','GaleriaController@destroy')->name('galeria.destroy');
        
        /*fin de rutas del informe CONSULTOR*/
        //////////////////////////////////////////////////////////////////////////////////////////

        /**
         * 
         * INFORME CLIENTE
         * inicio de rutas de informe del CLIENTE
         */

        //INFORME_CLIENTE
        Route::get('informe_cliente/{consultoria}','InformeController@index_cliente')
        ->name('informe.index_cliente');  
        //INFORMACION_GENERAL
        Route::get('informe_cliente/informacion_cliente','InformeController@informacion_cliente')
        ->name('informe_cliente.informacion_cliente');
        //1.0 INFORMACION_GENERAL_DOS
        Route::get('informe_cliente/{consultoria}/informaciongeneral_dos','InformeController@informacion_dos_cliente')
        ->name('informe_cliente.informaciongeneral_dos');
        //2.1 SITUACION FINANCIERA DEL PAIS
        Route::get('informe_cliente/{consultoria}/situacioneconomica','InformeController@situacion_cliente')
        ->name('informe_cliente.situacioneconomica');
        //2.2 SECTOR AUTOMOTRIZ
        Route::get('informe_cliente/{consultoria}/sectorautomotriz','InformeController@sectorauto_cliente')
        ->name('informe_cliente.sectorauto_cliente');
        //3.1 FINANCIERO HISTORICO
        Route::get('informe_cliente/{consultoria}/financierohistorico','InformeController@financiero_historico_cliente')
        ->name('informe_cliente.financiero_historico_cliente');
        //3.2. ANALISIS DE CIFRAS FINANCIERAS
        Route::get('informe_cliente/{consultoria}/analisiscifras','InformeController@analisis_cifras_financieras_cliente')
        ->name('informe_cliente.analisis_cifras_financieras_cliente');
        //3.3. ANALISIS DE RENDIMIENTO
        Route::get('informe_cliente/{consultoria}/analisisrendimiento','InformeController@analisis_rendimiento_cliente')
        ->name('informe_cliente.analisis_rendimiento_cliente');
        //3.4. ANALISI DE ROTACION
        Route::get('informe_cliente/{consultoria}/analisisrotacion','InformeController@analisis_rotacion_cliente')
        ->name('informe_cliente.analisis_rotacion_cliente');
        //3.5. ANALISIS DE LIQUIDEZ
        Route::get('informe_cliente/{consultoria}/analisisliquidez','InformeController@analisis_liquidez_cliente')
        ->name('informe_cliente.analisis_liquidez_cliente');
        //4.1. HORIZONTE DE PROYECCION 
        Route::get('informe_cliente/{consultoria}/horizonteproyeccion','InformeController@horizonte_proyeccion_cliente')
        ->name('informe_cliente.horizonte_proyeccion_cliente');
        //4.2. PROYECCION DE INGRESOS
        Route::get('informe_cliente/{consultoria}/proyeccioningresos','InformeController@proyeccion_ingresos_cliente')
        ->name('informe_cliente.proyeccion_ingresos_cliente');
        //4.3. PROYECCION DE INDICADORES DE LA GESTION FINANCIERA
        Route::get('informe_cliente/{consultoria}/proyeccionfinanciera','InformeController@proyeccion_financiera_cliente')
        ->name('informe_cliente.proyeccion_financiera_cliente');
        //4.4. ENDEUDAMIENTO PROPUESTO
        Route::get('informe_cliente/{consultoria}/endeudamientopropuesto','InformeController@endeudamiento_propuesto_cliente')
        ->name('informe_cliente.endeudamiento_propuesto_cliente');
        //4.5. ESTADOS FINANCIEROS PROYECTADOS
        Route::get('informe_cliente/{consultoria}/estadosfinancieros','InformeController@estados_financieros_cliente')
        ->name('informe_cliente.estados_financieros_cliente');
        //4.6. COMENTARIO DEL FLUJO DE EFECTIVO Y ENDEUDAMIENTO
        Route::get('informe_cliente/{consultoria}/comentariosflujoyendeudamiento','InformeController@comentarios_flujo_endeudamiento_cliente')
        ->name('informe_cliente.comentarios_flujo_endeudamiento_cliente');
        //5.0 RECOMENDACIONES Y CONCLUSIONES
        Route::get('informe_cliente/{consultoria}/conclusionesyrecomendaciones','InformeController@recomendaciones_cliente')
        ->name('informe_cliente.recomendaciones_cliente');

        /*fin de rutas de informe del CLIENTE*/
        //////////////////////////////////////////////////////////////////////////////////////////

        /**
         * 
         * RESULTADO
         * 
         */
        
       Route::post('resultado/store','ResultadosController@store')->name('resultado.store')
        ->middleware('permission:resultado.create');

       Route::get('resultado','ResultadosController@index')->name('resultado.index')
               ->middleware('permission:resultado.index');

       Route::get('resultado/create','ResultadosController@create')->name('resultado.create')
               ->middleware('permission:resultado.create');

       Route::put('resultado/{resultados}','ResultadosController@update')->name('resultado.update')
               ->middleware('permission:resultado.edit');

       Route::get('resultado/{resultados}','ResultadosController@show')->name('resultado.show')
               ->middleware('permission:resultado.show');
       
       Route::delete('resultado/{resultados}','ResultadosController@destroy')->name('resultado.destroy')
               ->middleware('permission:resultado.destroy');
       
       Route::get('resultado/{resultados}/edit','ResultadosController@edit')->name('resultado.edit')
               ->middleware('permission:resultado.edit');

        //////////////////////////////////////////////////////////////////////////////////////////

        /**
         * 
         * FLUJOS
         * 
         *  */ 

           Route::post('flujos/store','FlujosController@store')->name('flujos.store')
           ->middleware('permission:flujos.create');
   
          Route::get('flujos','FlujosController@index')->name('flujos.index')
                  ->middleware('permission:flujos.index');
   
          Route::get('flujos/create','FlujosController@create')->name('flujos.create')
                  ->middleware('permission:flujos.create');
   
          Route::put('flujos/{flujos}','FlujosController@update')->name('flujos.update')
                  ->middleware('permission:flujos.edit');
   
          Route::get('flujos/{flujos}','FlujosController@show')->name('flujos.show')
                  ->middleware('permission:flujos.show');
          
          Route::delete('flujos/{flujos}','FlujosController@destroy')->name('flujos.destroy')
                  ->middleware('permission:flujos.destroy');
          
          Route::get('flujos/{flujos}/edit','FlujosController@edit')->name('flujos.edit')
                  ->middleware('permission:flujos.edit');

        //////////////////////////////////////////////////////////////////////////////////////////

        /**
         * 
         * ESTADOS RESULTADOS INTEGRALES
         * 
         */
        
         Route::post('estadosresultadosintegrales/store','EstadosResultadosIntegralesController@store')->name('estadosresultadosintegrales.store')
          ->middleware('permission:estadosresultadosintegrales.create');
  
         Route::get('estadosresultadosintegrales','EstadosResultadosIntegralesController@index')->name('estadosresultadosintegrales.index')
                 ->middleware('permission:estadosresultadosintegrales.index');
  
         Route::get('estadosresultadosintegrales/create','EstadosResultadosIntegralesController@create')->name('estadosresultadosintegrales.create')
                 ->middleware('permission:estadosresultadosintegrales.create');
  
         Route::put('estadosresultadosintegrales/{estadosResultadosIntegrales}','EstadosResultadosIntegralesController@update')->name('estadosresultadosintegrales.update')
                 ->middleware('permission:estadosresultadosintegrales.edit');
  
         Route::get('estadosresultadosintegrales/{estadosResultadosIntegrales}','EstadosResultadosIntegralesController@show')->name('estadosresultadosintegrales.show')
                 ->middleware('permission:estadosresultadosintegrales.show');
         
         Route::delete('estadosresultadosintegrales/{estadosResultadosIntegrales}','EstadosResultadosIntegralesController@destroy')->name('estadosresultadosintegrales.destroy')
                 ->middleware('permission:estadosresultadosintegrales.destroy');
         
         Route::get('estadosresultadosintegrales/{estadosResultadosIntegrales}/edit','EstadosResultadosIntegralesController@edit')->name('estadosresultadosintegrales.edit')
                 ->middleware('permission:estadosresultadosintegrales.edit');        

        //////////////////////////////////////////////////////////////////////////////////////////

        /**
         * 
         * ESTADOS SITUACION FINANCIERA
         * 
         */

         Route::post('estadossituacionfinanciera/store','EstadosSituacionFinancieraController@store')->name('estadossituacionfinanciera.store')
          ->middleware('permission:estadossituacionfinanciera.create');
  
         Route::get('estadossituacionfinanciera','EstadosSituacionFinancieraController@index')->name('estadossituacionfinanciera.index')
                 ->middleware('permission:estadossituacionfinanciera.index');
  
         Route::get('estadossituacionfinanciera/create','EstadosSituacionFinancieraController@create')->name('estadossituacionfinanciera.create')
                 ->middleware('permission:estadossituacionfinanciera.create');
  
         Route::put('estadossituacionfinanciera/{estadosSituacionFinanciera}','EstadosSituacionFinancieraController@update')->name('estadossituacionfinanciera.update')
                 ->middleware('permission:estadossituacionfinanciera.edit');
  
         Route::get('estadossituacionfinanciera/{estadosSituacionFinanciera}','EstadosSituacionFinancieraController@show')->name('estadossituacionfinanciera.show')
                 ->middleware('permission:estadossituacionfinanciera.show');
         
         Route::delete('estadossituacionfinanciera/{estadosSituacionFinanciera}','EstadosSituacionFinancieraController@destroy')->name('estadossituacionfinanciera.destroy')
                 ->middleware('permission:estadossituacionfinanciera.destroy');
         
         Route::get('estadossituacionfinanciera/{estadosSituacionFinanciera}/edit','EstadosSituacionFinancieraController@edit')->name('estadossituacionfinanciera.edit')
                 ->middleware('permission:estadossituacionfinanciera.edit');        

        //////////////////////////////////////////////////////////////////////////////////////////

        /**
         * 
         * ESTADOS SISTUACION FINANCIERA RESUMIDOS
         * 
         */
        
         Route::post('estadossituacionfinancieraresumidos/store','EstadosSituacionFinancieraResumidosController@store')->name('estadossituacionfinancieraresumidos.store')
          ->middleware('permission:estadossituacionfinancieraresumidos.create');
  
         Route::get('estadossituacionfinancieraresumidos','EstadosSituacionFinancieraResumidosController@index')->name('estadossituacionfinancieraresumidos.index')
                 ->middleware('permission:estadossituacionfinancieraresumidos.index');
  
         Route::get('estadossituacionfinancieraresumidos/create','EstadosSituacionFinancieraResumidosController@create')->name('estadossituacionfinancieraresumidos.create')
                 ->middleware('permission:estadossituacionfinancieraresumidos.create');
  
         Route::put('estadossituacionfinancieraresumidos/{situacionfinancieraresumido}','EstadosSituacionFinancieraResumidosController@update')->name('estadossituacionfinancieraresumidos.update')
                 ->middleware('permission:estadossituacionfinancieraresumidos.edit');
  
         Route::get('estadossituacionfinancieraresumidos/{situacionfinancieraresumido}','EstadosSituacionFinancieraResumidosController@show')->name('estadossituacionfinancieraresumidos.show')
                 ->middleware('permission:estadossituacionfinancieraresumidos.show');
         
         Route::delete('estadossituacionfinancieraresumidos/{situacionfinancieraresumido}','EstadosSituacionFinancieraResumidosController@destroy')->name('estadossituacionfinancieraresumidos.destroy')
                 ->middleware('permission:estadossituacionfinancieraresumidos.destroy');
         
         Route::get('estadossituacionfinancieraresumidos/{situacionfinancieraresumido}/edit','EstadosSituacionFinancieraResumidosController@edit')->name('estadossituacionfinancieraresumidos.edit')
                 ->middleware('permission:estadossituacionfinancieraresumidos.edit');        

        //////////////////////////////////////////////////////////////////////////////////////////

        /**
         * 
         * ESTADOS FLUJOS EFECTIVO
         * 
         */
        
        Route::post('estadosflujosefectivos/store','EstadosFlujosEfectivoController@store')->name('estadosflujosefectivos.store')
         ->middleware('permission:estadosflujosefectivos.create');
 
        Route::get('estadosflujosefectivos','EstadosFlujosEfectivoController@index')->name('estadosflujosefectivos.index')
                ->middleware('permission:estadosflujosefectivos.index');
 
        Route::get('estadosflujosefectivos/create','EstadosFlujosEfectivoController@create')->name('estadosflujosefectivos.create')
                ->middleware('permission:estadosflujosefectivos.create');
 
        Route::put('estadosflujosefectivos/{estadosFlujosEfectivo}','EstadosFlujosEfectivoController@update')->name('estadosflujosefectivos.update')
                ->middleware('permission:estadossituacionfinancieraresumidos.edit');
 
        Route::get('estadosflujosefectivos/{estadosFlujosEfectivo}','EstadosFlujosEfectivoController@show')->name('estadosflujosefectivos.show')
                ->middleware('permission:estadosflujosefectivos.show');
        
        Route::delete('estadosflujosefectivos/{estadosFlujosEfectivo}','EstadosFlujosEfectivoController@destroy')->name('estadosflujosefectivos.destroy')
                ->middleware('permission:estadossituacionfinancieraresumidos.destroy');
        
        Route::get('estadosflujosefectivos/{estadosFlujosEfectivo}/edit','EstadosFlujosEfectivoController@edit')->name('estadosflujosefectivos.edit')
                ->middleware('permission:estadossituacionfinancieraresumidos.edit');        

        //////////////////////////////////////////////////////////////////////////////////////////





        /**
         * 
         * CUENTAS
         * 
         */
        
        Route::post('cuentas/store','CuentasController@store')->name('cuentas.store');
        // ->middleware('permission:estadosflujosefectivos.create');
 
        Route::get('cuentas','CuentasController@index')->name('cuentas.index');
                //->middleware('permission:estadosflujosefectivos.index');
                

                //CUENTAS ACTUALES
                Route::get('cuentas/{estadofinanciero}','CuentasController@estadofinanciero')->name('cuentas.estadofinanciero');
                //->middleware('permission:estadosflujosefectivos.index');

                Route::get('cuentas/{cuentas}/index','CuentasController@estadofinancieroindex')->name('cuentas.estadofinancieroindex');
                //->middleware('permission:estadosflujosefectivos.index');
 
                   
                Route::put('cuentas/{cuentas}/update','CuentasController@estadofinancieroupdate')->name('cuentas.update');
                        //->middleware('permission:estadossituacionfinancieraresumidos.edit');
        
                Route::get('cuentas/{cuentas}/show','CuentasController@estadofinancieroshow')->name('cuentas.show');
                        //->middleware('permission:estadosflujosefectivos.show');

                Route::get('cuentas/{cuentas}/edit','CuentasController@estadofinancieroedit')->name('cuentas.edit');
                // ->middleware('permission:estadossituacionfinancieraresumidos.edit');       






        



        /**
         * 
         * CARGA DE ARCHIVOS
         * 
         */

        Route::get('/file/{consultoria}','BandejaMisConsultoriasController@index_file')->name('bandeja.index_file')
        ->middleware('permission:bandeja_cliente.file');

        //ELIMINAR ARCHIVOS 
        Route::get('/file/{consultoria}/drop','BandejaMisConsultoriasController@drop_index_file')->name('bandeja.delete_file')
        ->middleware('permission:bandeja_cliente.file');
        
        //CARGAR ARCHIVOS 
        Route::post('/file/{consultoria}','BandejaMisConsultoriasController@showUploadFile')->name('bandeja.show_file')
        ->middleware('permission:bandeja_cliente.file_show');

        //ENVIAR ARCHIVO ->ONLYOFFICE 
        Route::get('/file/{consultoria}/onlyoffice','BandejaMisConsultoriasController@sendArchivoOnlyOffice')->name('bandeja.office_file')
        ->middleware('permission:bandeja_cliente.file_show');

        

        //////////////////////////////////////////////////////////////////////////////////////////

         /**
         * 
         * FORMULARIO
         * 
         */

        Route::get('/formulario/{consultoria}','FormularioController@index')->name('formulario.index')
        ->middleware('permission:mis_consultoria_comprada.index');

        Route::post('/formulario/store/{consultoria}','FormularioController@store')->name('formulario.store')
        ->middleware('permission:mis_consultoria_comprada.index');
        
        
        //////////////////////////////////////////////////////////////////////////////////////////

        /**
         * 
         * CONSULTORIAS COMPRADAS
         * 
         */

       Route::get('consultoria_comprada','ConsultoriasCompradasController@index')->name('consultoria_comprada.index')
       ->middleware('permission:consultoria_comprada.index');

       Route::get('consultoria_comprada/{consultoria}/procesar','ConsultoriasCompradasController@procesar')->name('consultoria_comprada.procesar')
       ->middleware('permission:consultoria_comprada.procesar');

       Route::get('consultoria_comprada/{consultoria}', 'ConsultoriasCompradasController@liberar')->name('bandeja.liberar')
       ->middleware('permission:consultoria_comprada.index');

       Route::delete('consultoria_comprada/{consultoria}','ConsultoriasCompradasController@destroy')->name('consultoria_comprada.destroy')
       ->middleware('permission:consultoria_comprada.index');

        //////////////////////////////////////////////////////////////////////////////////////////

        /**
         * 
         * BANDEJA MIS CONSULTORIAS
         * 
         */
        
       Route::get('bandeja_mis_consultorias','BandejaMisConsultoriasController@index')->name('bandeja.index')
       ->middleware('permission:mis_consultoria_comprada.index');

       Route::get('bandeja_mis_consultorias/{consultoria}/procesar','BandejaMisConsultoriasController@procesar')->name('bandeja.procesar')
       ->middleware('permission:mis_consultoria_procesar.procesar');

       Route::get('onlyoffice/{consultoria}', 'BandejaMisConsultoriasController@onlyoffice')->name('bandeja.showonlyoffice')
       ->middleware('permission:onlyoffice.view');

       Route::get('onlyoffice_procesado/{consultoria}', 'BandejaMisConsultoriasController@onlyoffice_procesado')->name('bandeja.showonlyoffice_procesado')
       ->middleware('permission:onlyoffice.view');


       Route::get('onlyoffice/{consultoria}/pullFile', 'BandejaMisConsultoriasController@pullFile')->name('bandeja.pullFile')
       ->middleware('permission:onlyoffice.pullfile');

        //////////////////////////////////////////////////////////////////////////////////////////

        /**
         * 
         * CLIENTE
         * 
         */

        Route::get('cliente','ClienteController@index')->name('cliente.index')
               ->middleware('permission:comprar.create');

        Route::get('cliente/create','ClienteController@create')->name('cliente.create')
               ->middleware('permission:comprar.create');

        Route::post('cliente/store','ClienteController@store')->name('cliente.store')
               ->middleware('permission:comprar.create');

        Route::put('cliente/{cliente}','ClienteController@update')->name('cliente.update')
               ->middleware('permission:comprar.create');

        //////////////////////////////////////////////////////////////////////////////////////////

        /**
         * 
         * COMPRAR
         * 
         */

        Route::get('comprar','CompraController@index')->name('comprar.index')
        ->middleware('permission:comprar.index');

        Route::get('comprar/{id}/crear','CompraController@create')->name('comprar.create')
        ->middleware('permission:comprar.create');

        Route::post('comprar/store','CompraController@store')->name('comprar.store')
        ->middleware('permission:comprar.create');

        Route::get('comprar/{compra}/editar','CompraController@edit')->name('comprar.edit')
        ->middleware('permission:comprar.edit');

        Route::put('comprar/{compra}','CompraController@update')->name('comprar.update')
        ->middleware('permission:comprar.update');

        //////////////////////////////////////////////////////////////////////////////////////////
        
        /**
         * 
         * CONTROLADOR PARA LA RUTA DE LAS IMAGENES GUARDADAS EN SOURCE
         * 
         */

        Route::get('/images/{idempresa}/{file}','ImageController@getImage');//->middleware('permission:consultorias.index');;
        Route::get('/PDF/{carpeta}/{file}','PDFController@getpdf');//->middleware('permission:consultorias.index');;

        //////////////////////////////////////////////////////////////////////////////////////////

});

        //////////////////////////////////////////////////////////////////////////////////////////

/*     Route::get('/doceditor', function () {
        return view('onlyoffice.doceditor')->name('onlyoffice.doceditor');
    }); */
    
  //  Route::get('doceditor')->name('onlyoffice.doceditor');
    
