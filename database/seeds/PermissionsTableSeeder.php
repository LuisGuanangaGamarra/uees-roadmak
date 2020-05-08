<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;
use Caffeinated\Shinobi\Models\Role;
use App\User;


//use App\Role;


class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //CREACION DE ROLES
          //rol administrador
        $admin = Role::create([
            'name'      => 'Administrador',
            'slug'      => 'admin',
        ]);

         //rol consultor
        $consultor = Role::create([
            'name'      => 'Consultor',
            'slug'      => 'consultor',
        ]);

       /*CREACION DE USUARIOY ROL SUPERADMIN*/
        $user = User::create([
            'name' => 'Pierre',
            'lastname' => 'Chavez', 
            'email' => 'pchavezp@uees.edu.ec', 
            'password' => bcrypt('AdminPierre'), 
            'file' => '/images/users/miavatar.png',
        ]);

        $role = Role::create([
            'name'      => 'SuperAdmin',
            'slug'      => 'superadmin',
            'special'   => 'all-access',
        ]);

        $user->roles()->attach($role);

        /*FIN DE SUPERADMIN*/

        //rol cliente
        $cliente = Role::create([
            'name'      => 'Cliente',
            'slug'      => 'cliente',
        ]);

        //rol operador
        $operador = Role::create([
            'name'      => 'Operador',
            'slug'      => 'operador',
        ]);


        //Users
        $p1= Permission::create([
            'name'          => 'Navegar usuarios',
            'slug'          => 'users.index',
            'description'   => 'Lista y navega todos los usuarios del sistema',

        ]);

        //relacion permiso->rol
        $p1->roles()->attach($admin);
        $p1->roles()->attach($operador);
        $p1->roles()->attach($consultor);


        $p2= Permission::create([
            'name'          => 'Ver detalles usuarios',
            'slug'          => 'users.show',
            'description'   => 'Ver en detalle cada usuario del sistema',

        ]);

        $p2->roles()->attach($admin);
        $p2->roles()->attach($operador);
        $p2->roles()->attach($consultor);



        $p3 = Permission::create([
            'name'          => 'Edición de usuarios',
            'slug'          => 'users.edit',
            'description'   => 'Editar cualquier dato de un usuario del sistema',

        ]);

        $p3->roles()->attach($admin);
        $p3->roles()->attach($operador);
        $p3->roles()->attach($consultor);



        $p4 = Permission::create([
            'name'          => 'Eliminar usuarios',
            'slug'          => 'users.destroy',
            'description'   => 'Eliminar cualquier usuario del sistema',

        ]);

        $p4->roles()->attach($admin);
        $p4->roles()->attach($operador);
        $p4->roles()->attach($consultor);



        //Roles
        $p5= Permission::create([
            'name'          => 'Navegar roles',
            'slug'          => 'roles.index',
            'description'   => 'Lista y navega todos los rol del sistema',

        ]);

        $p5->roles()->attach($admin);


        $p6 = Permission::create([
            'name'          => 'Ver detalles roles',
            'slug'          => 'roles.show',
            'description'   => 'Ver en detalle cada rol del sistema',

        ]);

        $p6->roles()->attach($admin);


        $p7 = Permission::create([
            'name'          => 'Creación de roles',
            'slug'          => 'roles.create',
            'description'   => 'Editar cualquier dato de un rol del sistema',

        ]);

        $p7->roles()->attach($admin);

        $p8 = Permission::create([
            'name'          => 'Edición de rol',
            'slug'          => 'roles.edit',
            'description'   => 'Editar cualquier dato de un rol del sistema',

        ]);

        $p8->roles()->attach($admin);

        $p9 = Permission::create([
            'name'          => 'Eliminar roles',
            'slug'          => 'roles.destroy',
            'description'   => 'Eliminar cualquier rol del sistema',

        ]);

        $p9->roles()->attach($admin);

            
        //consultorias
        $p10 = Permission::create([
            'name'          => 'Navegar consultorías',
            'slug'          => 'consultorias.index',
            'description'   => 'Lista y navega todos las consultorías del sistema',

        ]);

        $p10->roles()->attach($admin);
        $p10->roles()->attach($operador);

        $p11 = Permission::create([
            'name'          => 'Ver detalles consultorías',
            'slug'          => 'consultorias.show',
            'description'   => 'Ver en detalle cada consultoría del sistema',

        ]);

        $p11->roles()->attach($admin);
        $p11->roles()->attach($operador);

        $p12 = Permission::create([
            'name'          => 'Creación de consultoría',
            'slug'          => 'consultorias.create',
            'description'   => 'Editar cualquier dato de una consultoría del sistema',

        ]);

        $p12->roles()->attach($admin);
        $p12->roles()->attach($operador);

        $p13 = Permission::create([
            'name'          => 'Edición de consultoría',
            'slug'          => 'consultorias.edit',
            'description'   => 'Editar cualquier dato de una consultoría del sistema',

        ]);

        $p13->roles()->attach($admin);
        $p13->roles()->attach($operador);

        $p14 = Permission::create([
            'name'          => 'Eliminar consultoría',
            'slug'          => 'consultorias.destroy',
            'description'   => 'Eliminar cualquier consultoría del sistema',

        ]);

        $p14->roles()->attach($admin);
        $p14->roles()->attach($operador);

        //CUENTAS
        Permission::create([
            'name'          => 'Navegar en el submenú de Cuentas',
            'slug'          => 'cuentas.index',
            'description'   => 'Muestra el submenú de todas las cuentas del sistema',

        ]);
        //ANALISIS
        Permission::create([
            'name'          => 'Navegar en el submenú de Cuentas para Análisis',
            'slug'          => 'menuanalisis.index',
            'description'   => 'Muestra el submenú de todas las cuentas para Análisis',

        ]);



        //balance
        Permission::create([
            'name'          => 'Navegar cuentas del balance',
            'slug'          => 'balance.index',
            'description'   => 'Lista y navega todos las cuentas del balance del sistema',

        ]);

        Permission::create([
            'name'          => 'Ver detalles del balance',
            'slug'          => 'balance.show',
            'description'   => 'Ver en detalle cada cuenta del balance del sistema',

        ]);

        Permission::create([
            'name'          => 'Creación de balance',
            'slug'          => 'balance.create',
            'description'   => 'Editar cualquier dato de una cuenta del balance del sistema',

        ]);
        Permission::create([
            'name'          => 'Edición de balance',
            'slug'          => 'balance.edit',
            'description'   => 'Editar cualquier dato de una cuenta del balance del sistema',

        ]);

        Permission::create([
            'name'          => 'Eliminar cuenta del balance',
            'slug'          => 'balance.destroy',
            'description'   => 'Eliminar cualquier cuenta del balance del sistema',

        ]);
        
         //Articulos
        $p22 = Permission::create([
            'name'          => 'Navegar artículos',
            'slug'          => 'articulos.index',
            'description'   => 'Lista y navega todos los artículos del sistema',

        ]);

        $p22->roles()->attach($admin);
        $p22->roles()->attach($operador);


        $p23 = Permission::create([
            'name'          => 'Ver detalles artículos',
            'slug'          => 'articulos.show',
            'description'   => 'Ver en detalle cada artículo del sistema',

        ]);
        $p23->roles()->attach($admin);
        $p23->roles()->attach($operador);

        //plantilla
        $p24 = Permission::create([
            'name'          => 'Navegar plantilla',
            'slug'          => 'plantilla.index',
            'description'   => 'Lista y navega todos los plantilla del sistema',

        ]);
        $p24->roles()->attach($admin);
        $p24->roles()->attach($operador);


        $p25 = Permission::create([
            'name'          => 'Ver detalles plantilla',
            'slug'          => 'plantilla.show',
            'description'   => 'Ver en detalle cada plantilla del sistema',

        ]);
        $p25->roles()->attach($admin);
        $p25->roles()->attach($operador);

        $p26 = Permission::create([
            'name'          => 'Creación de plantilla',
            'slug'          => 'plantilla.create',
            'description'   => 'Editar cualquier dato de un plantilla del sistema',

        ]);
        $p26->roles()->attach($admin);
        $p26->roles()->attach($operador);

        $p27 = Permission::create([
            'name'          => 'Edición de plantilla',
            'slug'          => 'plantilla.edit',
            'description'   => 'Editar cualquier dato de un plantilla del sistema',

        ]);
        $p27->roles()->attach($admin);
        $p27->roles()->attach($operador);

        $p28 = Permission::create([
            'name'          => 'Eliminar plantilla',
            'slug'          => 'plantilla.destroy',
            'description'   => 'Eliminar cualquier plantilla del sistema',

        ]);
        $p28->roles()->attach($admin);
        $p28->roles()->attach($operador);

         //Flujos
         Permission::create([
            'name'          => 'Navegar flujos',
            'slug'          => 'flujos.index',
            'description'   => 'Lista y navega todos los flujos del sistema',

        ]);

        Permission::create([
            'name'          => 'Ver detalles flujos',
            'slug'          => 'flujos.show',
            'description'   => 'Ver en detalle cada flujo del sistema',

        ]);

        Permission::create([
            'name'          => 'Creación de flujos',
            'slug'          => 'flujos.create',
            'description'   => 'Editar cualquier dato de un flujo del sistema',

        ]);
        Permission::create([
            'name'          => 'Edición de flujos',
            'slug'          => 'flujos.edit',
            'description'   => 'Editar cualquier dato de un flujo del sistema',

        ]);

        Permission::create([
            'name'          => 'Eliminar flujos',
            'slug'          => 'flujos.destroy',
            'description'   => 'Eliminar cualquier flujo del sistema',

        ]);

 //Resultados
 Permission::create([
    'name'          => 'Navegar resultado',
    'slug'          => 'resultado.index',
    'description'   => 'Lista y navega todos los resultados del sistema',

]);

Permission::create([
    'name'          => 'Ver detalles resultado',
    'slug'          => 'resultado.show',
    'description'   => 'Ver en detalle cada resultado del sistema',

]);

Permission::create([
    'name'          => 'Creación de resultados',
    'slug'          => 'resultado.create',
    'description'   => 'Editar cualquier dato de un resultado del sistema',

]);
Permission::create([
    'name'          => 'Edición de resultados',
    'slug'          => 'resultado.edit',
    'description'   => 'Editar cualquier dato de un resultado del sistema',

]);

Permission::create([
    'name'          => 'Eliminar resultados',
    'slug'          => 'resultado.destroy',
    'description'   => 'Eliminar cualquier resultado del sistema',

]);


//Estados Resultados Integrales
Permission::create([
    'name'          => 'Navegar Estados Resultados Integrales',
    'slug'          => 'estadosresultadosintegrales.index',
    'description'   => 'Lista y navega todos los Estados Resultados Integrales del sistema',

]);

Permission::create([
    'name'          => 'Ver detalles Estados Resultados Integrales',
    'slug'          => 'estadosresultadosintegrales.show',
    'description'   => 'Ver en detalle cada Estado Resultado Integral del sistema',

]);

Permission::create([
    'name'          => 'Creación de Estados Resultados Integrales',
    'slug'          => 'estadosresultadosintegrales.create',
    'description'   => 'Editar cualquier dato de un Estado Resultado Integral del sistema',

]);
Permission::create([
    'name'          => 'Edición de Estados Resultados Integrales',
    'slug'          => 'estadosresultadosintegrales.edit',
    'description'   => 'Editar cualquier dato de un Estado Resultado Integral del sistema',

]);

Permission::create([
    'name'          => 'Eliminar Estados Resultados Integrales',
    'slug'          => 'estadosresultadosintegrales.destroy',
    'description'   => 'Eliminar cualquier Estado Resultado Integral del sistema',

]);

//Estados Situación Financiera
Permission::create([
    'name'          => 'Navegar Estados Situación Financiera',
    'slug'          => 'estadossituacionfinanciera.index',
    'description'   => 'Lista y navega todos los Estados de Situación Financiera del sistema',

]);

Permission::create([
    'name'          => 'Ver detalles Estados Situación Financiera',
    'slug'          => 'estadossituacionfinanciera.show',
    'description'   => 'Ver en detalle cada Estado Situación Financiera del sistema',

]);

Permission::create([
    'name'          => 'Creación de Estados Situación Financiera',
    'slug'          => 'estadossituacionfinanciera.create',
    'description'   => 'Editar cualquier dato de un Situación Financiera del sistema',

]);
Permission::create([
    'name'          => 'Edición de Estados Situación Financiera',
    'slug'          => 'estadossituacionfinanciera.edit',
    'description'   => 'Editar cualquier dato de un Estado Situación Financiera del sistema',

]);

Permission::create([
    'name'          => 'Eliminar Estados Situación Financiera',
    'slug'          => 'estadossituacionfinanciera.destroy',
    'description'   => 'Eliminar cualquier Estado Situación Financiera del sistema',

]);

//Estados Situación Financiera Resumidos
Permission::create([
    'name'          => 'Navegar Estados Situación Financiera Resumidos',
    'slug'          => 'estadossituacionfinancieraresumidos.index',
    'description'   => 'Lista y navega todos los Estados de Situación Financiera Resumidos del sistema',

]);

Permission::create([
    'name'          => 'Ver detalles Estados Situación Financiera Resumidos',
    'slug'          => 'estadossituacionfinancieraresumidos.show',
    'description'   => 'Ver en detalle cada Estado Situación Financiera Resumido del sistema',

]);

Permission::create([
    'name'          => 'Creación de Estados Situación Financiera Resumidos',
    'slug'          => 'estadossituacionfinancieraresumidos.create',
    'description'   => 'Editar cualquier dato de un Situación Financiera Resumido del sistema',

]);
Permission::create([
    'name'          => 'Edición de Estados Situación Financiera Resumidos',
    'slug'          => 'estadossituacionfinancieraresumidos.edit',
    'description'   => 'Editar cualquier dato de un Estado Situación Financiera Resumido del sistema',

]);

Permission::create([
    'name'          => 'Eliminar Estados Situación Financiera Resumidos',
    'slug'          => 'estadossituacionfinancieraresumidos.destroy',
    'description'   => 'Eliminar cualquier Estado Situación Financiera Resumidos del sistema',

]);


//Estados Situación Flujos Efectivo
Permission::create([
    'name'          => 'Navegar Estados Flujos Efectivos',
    'slug'          => 'estadosflujosefectivos.index',
    'description'   => 'Lista y navega todos los Estados de Flujos Efectivos del sistema',

]);

Permission::create([
    'name'          => 'Ver detalles Estados Flujos Efectivos',
    'slug'          => 'estadosflujosefectivos.show',
    'description'   => 'Ver en detalle cada Estado Flujos Efectivo del sistema',

]);

Permission::create([
    'name'          => 'Creación de Estados Flujos Efectivos',
    'slug'          => 'estadosflujosefectivos.create',
    'description'   => 'Editar cualquier dato de un Flujos Efectivo del sistema',

]);
Permission::create([
    'name'          => 'Edición de Estados Flujos Efectivos',
    'slug'          => 'estadosflujosefectivos.edit',
    'description'   => 'Editar cualquier dato de un Estado Flujos Efectivo del sistema',

]);

Permission::create([
    'name'          => 'Eliminar Estados Flujos Efectivos',
    'slug'          => 'estadosflujosefectivos.destroy',
    'description'   => 'Eliminar cualquier Estado Flujos Efectivos del sistema',

]);


//Ventas
Permission::create([
    'name'          => 'Navegar las cuentas de Ventas',
    'slug'          => 'cuentasventas.index',
    'description'   => 'Lista y navega todas las Cuentas de Ventas del sistema',

]);

Permission::create([
    'name'          => 'Ver detalles de las cuentas de Ventas',
    'slug'          => 'cuentasventas.show',
    'description'   => 'Ver en detalle cada cuenta de Ventas del sistema',

]);

Permission::create([
    'name'          => 'Creación de  Cuentas de Ventas',
    'slug'          => 'cuentasventas.create',
    'description'   => 'Editar cualquier dato de una cuenta de Ventas del sistema',

]);
Permission::create([
    'name'          => 'Edición de las Cuentas de Ventas',
    'slug'          => 'cuentasventas.edit',
    'description'   => 'Editar cualquier dato de una cuenta de Ventas del sistema',

]);

Permission::create([
    'name'          => 'Eliminar  las Cuentas de Ventas',
    'slug'          => 'cuentasventas.destroy',
    'description'   => 'Eliminar cualquier dato de una cuenta de Ventas  del sistema',

]);



//Amortización
Permission::create([
    'name'          => 'Navegar las cuentas de Amortización',
    'slug'          => 'cuentasamortizacion.index',
    'description'   => 'Lista y navega todas las Cuentas de Amortización del sistema',

]);

Permission::create([
    'name'          => 'Ver detalles de las cuentas de Amortización',
    'slug'          => 'cuentasamortizacion.show',
    'description'   => 'Ver en detalle cada cuenta de Amortización del sistema',

]);

Permission::create([
    'name'          => 'Creación de  Cuentas de Amortización',
    'slug'          => 'cuentasamortizacion.create',
    'description'   => 'Editar cualquier dato de una cuenta de Amortización del sistema',

]);
Permission::create([
    'name'          => 'Edición de las Cuentas de Amortización',
    'slug'          => 'cuentasamortizacion.edit',
    'description'   => 'Editar cualquier dato de una cuenta de Amortización del sistema',

]);

Permission::create([
    'name'          => 'Eliminar  las Cuentas de Amortización',
    'slug'          => 'cuentasamortizacion.destroy',
    'description'   => 'Eliminar cualquier dato de una cuenta de Amortización  del sistema',

]);


//C & I

$p69 = Permission::create([
    'name'          => 'Navegar en C&I',
    'slug'          => 'c&i.index',
    'description'   => 'Lista y navega todos las consultorías e índices del sistema',

]);
$p69->roles()->attach($admin);
$p69->roles()->attach($operador);

$p70 = Permission::create([
    'name'          => 'Ver detalles de C&I',
    'slug'          => 'c&i.show',
    'description'   => 'Ver en detalle cada Estado Situación Financiera del sistema',

]);
$p70->roles()->attach($admin);
$p70->roles()->attach($operador);

$p71 = Permission::create([
    'name'          => 'Creación de C&I',
    'slug'          => 'c&i.create',
    'description'   => 'Editar cualquier dato de una consultoría e índice',

]);
$p71->roles()->attach($admin);
$p71->roles()->attach($operador);

$p72 = Permission::create([
    'name'          => 'Edición de C&I',
    'slug'          => 'c&i.edit',
    'description'   => 'Editar cualquier dato de una consultoría e índice del sistema',

]);
$p72->roles()->attach($admin);
$p72->roles()->attach($operador);

$p73 = Permission::create([
    'name'          => 'Eliminar C&I',
    'slug'          => 'c&i.destroy',
    'description'   => 'Eliminar cualquier Consultoría e índice del sistema',

]);
$p73->roles()->attach($admin);
$p73->roles()->attach($operador);



//COMPRAS
$p74 = Permission::create([
    'name'          => 'Navegar en Compras',
    'slug'          => 'compras.index',
    'description'   => 'Lista y navega todos las consultorías e índices del sistema',

]);

$p74->roles()->attach($admin);
$p74->roles()->attach($operador);

$p75 = Permission::create([
    'name'          => 'Ver detalles de compras',
    'slug'          => 'compras.show',
    'description'   => 'Ver en detalle cada Estado Situación Financiera del sistema',

]);
$p75->roles()->attach($admin);
$p75->roles()->attach($operador);

$p76 = Permission::create([
    'name'          => 'Creación de compras',
    'slug'          => 'compras.create',
    'description'   => 'Editar cualquier dato de una consultoría e índice',

]);
$p76->roles()->attach($admin);
$p76->roles()->attach($operador);


$p77 = Permission::create([
    'name'          => 'Edición de compras',
    'slug'          => 'compras.edit',
    'description'   => 'Editar cualquier dato de una consultoría e índice del sistema',

]);
$p77->roles()->attach($admin);
$p77->roles()->attach($operador);


$p78 = Permission::create([
    'name'          => 'Eliminar compras',
    'slug'          => 'compras.destroy',
    'description'   => 'Eliminar cualquier Compra del sistema',

]);
$p78->roles()->attach($admin);
$p78->roles()->attach($operador);

//

$p79 = Permission::create([
    'name'          => 'Navega de Compra de Sistema',
    'slug'          => 'comprar.index',
    'description'   => 'Lista y navega todos las compras del sistema',

]);
$p79->roles()->attach($admin);
$p79->roles()->attach($operador);

$p80 = Permission::create([
    'name'          => 'Creación de compras',
    'slug'          => 'comprar.create',
    'description'   => 'Crear compras - operador',

]);
$p80->roles()->attach($admin);
$p80->roles()->attach($operador);

$p81 = Permission::create([
    'name'          => 'Editar una compra',
    'slug'          => 'comprar.edit',
    'description'   => 'Editar una compra realizada por el operador (CONSULTOR)',

]);
$p81->roles()->attach($admin);
$p81->roles()->attach($operador);
$p81->roles()->attach($consultor);

$p82 = Permission::create([
    'name'          => 'Actualizar una compra realizada por el usuario',
    'slug'          => 'comprar.update',
    'description'   => 'Actualizar una compra el usuario',

]);
$p82->roles()->attach($consultor);


//



//PARAMETRIZACION
$p83 = Permission::create([
    'name'          => 'Ver menú Parametrización',
    'slug'          => 'parametrizacion.index',
    'description'   => 'Lista y navega el menú de Parametrización',

]);
$p83->roles()->attach($admin);
$p83->roles()->attach($operador);

//MENU BANDEJA 
$p84 = Permission::create([
    'name'          => 'Ver menú Bandeja',
    'slug'          => 'bandeja.index',
    'description'   => 'Lista y navega la bandeja',

]);
$p84->roles()->attach($consultor);
$p84->roles()->attach($cliente);

//BANDEJA CLIENTE
$p85 = Permission::create([
    'name'          => 'Ver bandeja de mis consultorías compradas',
    'slug'          => 'mis_consultoria_comprada.index',
    'description'   => 'Lista y navega la bandeja de mis consultorías compradas',

]);
$p85->roles()->attach($cliente);

//BANDEJA CLIENTE CARGA DE ARCHIVO


$p86 = Permission::create([
    'name'          => 'Carga de archivo por consultoría comprada',
    'slug'          => 'bandeja_cliente.file',
    'description'   => 'Carga de archivo en la bandeja cliente de mis consultorías compradas',

]);

$p86->roles()->attach($cliente);


$p87 = Permission::create([
    'name'          => 'Ver estado del archivo cargado en la bandeja por consultoría comprada',
    'slug'          => 'bandeja_cliente.file_show',
    'description'   => 'Ver estado del archivo cargado en la bandeja cliente de mis consultorías compradas',

]);
$p87->roles()->attach($cliente);



//BANDEJA PARA EL CONSULTOR
$p88 = Permission::create([
    'name'          => 'Ver bandeja de mis consultorías por procesar',
    'slug'          => 'mis_consultoria_procesar.procesar',
    'description'   => 'Lista y navega la bandeja de mis consultorías por procesar',

]);
$p88->roles()->attach($consultor);

//BANDEJA CONSULTOR PULL 
$p89 = Permission::create([
    'name'          => 'Archivo Cargado con los últimos cambios de la bandeja por el consultor',
    'slug'          => 'onlyoffice.pullfile',
    'description'   => 'Archivo Cargado con los últimos cambios de la bandeja por el consultor',

]);
$p89->roles()->attach($consultor);


//BANDEJA CONSULTOR VER ARCHIVO ONLINE 
$p90 = Permission::create([
    'name'          => 'Ver archivo Online para la edición de la bandeja por el consultor',
    'slug'          => 'onlyoffice.view',
    'description'   => 'Ver archivo Online para la edición de la bandeja por el consultor',

]);
$p90->roles()->attach($consultor);


//BANDEJA CONSULTOR
$p91 = Permission::create([
    'name'          => 'Ver consultorías asignadas',
    'slug'          => 'consultoria_comprada.index',
    'description'   => 'Lista y navega las consultorías asignadas',

]);

$p91->roles()->attach($consultor);


$p92 = Permission::create([
    'name'          => 'Procesar consultorías asignadas',
    'slug'          => 'consultoria_comprada.procesar',
    'description'   => 'Permite procesar las consultorías asignadas',

]);

$p92->roles()->attach($consultor);



    }
}
