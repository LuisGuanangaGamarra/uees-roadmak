<?php

namespace App\Http\Controllers;

use App\Compra;
use App\Cliente;
use App\CompraIndice;
use App\SubConsultorias;
use App\formulario;
use App\SubPlantilla;
use App\Indice;
use App\PlantillaSubPlantilla;
use App\Historico;


use GuzzleHttp\Client;



use App\User;
use Carbon\Carbon;
use App\ConsultoriasCompradas;
use App\ConsultoriaPlantilla;
use App\role_user;
use App\Plantilla;
use App\Http\Requests\CompraUpdateRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\Compra as CompraEmail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultoria_comprada = ConsultoriasCompradas::/* paginate(5) */get();
      
        return view('comprar.index',compact('consultoria_comprada'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        $role_consultor = role_user::where('role_id',2)->get();
        $role_cliente = role_user::where('role_id',4)->get();
        $cliente = Cliente::where('id', $id)->firstOrFail();



        //TAREA_#45
        //CREAR UN API QUE EXTRAÍGA TODOS LOS SUBPRODUCTOS
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost:3988/api/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);

      


        $consultoriasQuery = SubConsultorias::where('estado','A')->get();
        $consultoriasArray = array();
        
        foreach($consultoriasQuery as $selectConsultorias) {

            $response = $client->request('GET', 'Consultorias_status_id/'.$selectConsultorias->grupo);
            $datos=json_decode($response->getBody()->getContents());
            Log::info('Consultorias_status_id', ['datos' => $datos,'id'=>$selectConsultorias->grupo]);
            if($datos->consultorias){
                if($datos->consultorias[0]->active && $datos->consultorias[0]->TOTAL>0){//1->activo
                    $consultoria =SubConsultorias::find($selectConsultorias->id);
                    $nombre = $consultoria->name;//OBTENER EL NOMBRE DEL SUBPRODUCTO
                    $consultoriasArray[$selectConsultorias->id] = $selectConsultorias->id." - ". $nombre;
                }
            }
            
        }

        
            //JNIEVES VERSION 1.1
/*         $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost:3988/api/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        $response = $client->request('GET', 'consultorias');
        $datos=json_decode($response->getBody()->getContents());
        $datos2 = $datos->consultorias;
        $consultoriasArray = array();
        foreach($datos2 as $category) {
            $consultoriasArray[$category->id_product] = $category->id_product ." - ". $category->name;
        } */
            //JNIEVES VERSION 2.1

/*--

        $consultoriasPlantilla = ConsultoriaPlantilla::get();
        $consultoriasArray = array();
        
        foreach($consultoriasPlantilla as $selecplantilla) {
                $consultoria = ConsultoriasCompradas::consultoria($selecplantilla->id_consultoria);
                $plantilla = ConsultoriasCompradas::plantilla_ById_static($selecplantilla->id_plantilla);
               // dd($consultoria);
               $nombre = $consultoria[0]->name;
                $consultoriasArray[$selecplantilla->id] = $selecplantilla->id ." - ". $nombre ." (".$plantilla->anios." años)";
        }
--
*/

        $consultores = array();

        foreach($role_consultor as $selecplantilla) {
            $user = User::find($selecplantilla->user_id);
            $consultores[$user->id] = $user->id ." - ". $user->name;
        }

        $clientes = array();

        foreach($role_cliente as $selecplantilla) {
            $user = User::find($selecplantilla->user_id);
            $clientes[$user->id] = $user->id ." - ". $user->name;
        }
    
        return view('comprar.create', compact('clientes','consultores','cliente','consultoriasArray'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $compra = ConsultoriasCompradas::create($request->all());
        $carpeta = '/var/www/html/uees-roadmak/storage/images/'.$compra->cliente; 
        if (!file_exists($carpeta)) {
            mkdir($carpeta, 0777, true);
        }

        //DATOS PARA ENVIAR CORREO 
        $datos_cliente= ConsultoriasCompradas::usuario_static_ById($compra->cliente);//correo
        //BITÁCORA
        $datos_subconsultoria= SubConsultorias::find($compra->consultorias);
        $datos_consultoria=ConsultoriasCompradas::consultoria($datos_subconsultoria->grupo);//[0]
        $datos_cliente=Cliente::find($compra->datos_compra);
        
        $datos_comprador=User::find($compra->cliente);
        $datos_consultor=User::find($compra->consultor);

        //dd($datos_subconsultoria->name);
        //CONSUMIR PARA CONOCER EL NOMBRE DEL SUBPRODUCTO Y EL PERIODO COMPRADO PARA ENVIARLO POR CORREO

        Mail::to($datos_comprador->email,$datos_comprador->name) //datos de usuario para envio de email
        ->send(new CompraEmail($datos_subconsultoria->name));

        $datos_cliente= Historico::create(
            [
                  //CONSULTORIAS
                'name_consultoria' =>   $datos_consultoria[0]->name,
                'precio_consultoria' =>     $datos_consultoria[0]->price,
                'descripcion_consultoria'=> $datos_consultoria[0]->description,

                //SUB-CONSULTORIAS
                'name_subconsultoria' =>    $datos_subconsultoria->name,
                'precio_subconsultoria' =>  $datos_subconsultoria->precio,

                //DATOS CLIENTE
                'cedula_ruc_cliente' =>     $datos_cliente->cedula_ruc,
                'nombre_cliente' =>         $datos_cliente->nombre,
                'apellidos_cliente' =>      $datos_cliente->apellidos,
                'empresa_cliente' =>        $datos_cliente->empresa,
                'direccion_cliente' =>      $datos_cliente->direccion,
                'ciudad_cliente' =>         $datos_cliente->ciudad,
                'telefono_cliente' =>       $datos_cliente->telefono,
                'pais_cliente' =>           $datos_cliente->pais,


                //CONSULTORIA COMPRADA
                'id_consultoria_comprada' =>$compra->id,

                //PERIODO
                'num_periodos' =>           $compra->num_periodos,

                //ESTADO COMPRA
                'estado' =>                 $compra->estado,

                //ARCHIVO COMPRA
                'archivo' =>                $compra->archivo,

                //DATOS COMPRADOR
                'name_usercomprador' =>     $datos_comprador->name,
                'lastname_usercomprador' => $datos_comprador->lastname,
                'email_usercomprador' =>    $datos_comprador->email,

                //DATOS CONSULTOR
                'name_userconsultor' =>     $datos_consultor->name,
                'lastname_userconsultor' =>    $datos_consultor->lastname,
                'email_userconsultor'=>$datos_consultor->email
            ]
        );


        
        return redirect()->route('comprar.index')->with('info', 'Compra creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show(Compra $compra)
    {
        //
    }

    /*CONSULTOR: FUNCIÓN PARA EDITAR LA CONSULTORIA COMPRADA*/
    public function edit( $compra){
        $consultoria_comprada= ConsultoriasCompradas::find($compra);
       
        
        //CONSULTAR LA ENCUESTA
        $formulario_cliente = formulario::where('idconsultoria',$consultoria_comprada->id)->first();
       //$formulario_cliente = formulario::find(1);
       
        //INDICES 
        $plantilla_generales = SubPlantilla::get();

        
        $cliente = Cliente::where('id',  $consultoria_comprada->datos_compra)->firstOrFail();

        $usuario_cliente= User::find($consultoria_comprada->cliente);
        $consultor= User::find($consultoria_comprada->consultor);





/*
               //1. OBTENER EL CI
        $c_i = ConsultoriaPlantilla::find($consultoria_comprada->consultorias);
        //2. LLAMAR A DATOS DEL CI PARA CONSULTORIA
        $info_consultoria = ConsultoriasCompradas::consultoria($c_i->id_consultoria);
        $info_consultoria=$info_consultoria[0];
        //3. LLAMAR A DATOS DEL CI PARA INDICE
        $info_plantilla = Plantilla::find($c_i->id_plantilla);
*/              //JNI VERSION 1.1


        //JNIEVES 2.1
        $info_consultoria = ConsultoriasCompradas::subConsultoriaById($consultoria_comprada->consultorias);//CONTENDRÁ EL PERIODO
        $info_consultoria=$info_consultoria;
        //JNIEVES 2.1



        //JNI VERSION 1.1

/*         $consultoriasPlantilla = ConsultoriaPlantilla::get();
        $consultoriasPlantilla2 = array();
        foreach($consultoriasPlantilla as $selecplantilla) {
                $consultoria = ConsultoriasCompradas::consultoria($selecplantilla->id_consultoria);
                $plantilla = ConsultoriasCompradas::plantilla_ById_static($selecplantilla->id_plantilla);

               $nombre = $consultoria[0]->name;
                $consultoriasPlantilla2[$selecplantilla->id] = $selecplantilla->id ." - ". $nombre ." (".$plantilla->anios." años)";
        } */
        //JNI VERSION 1.1




        $CompraIndices = CompraIndice::where('id_compra', $compra)->get();
        $indices = Indice::get();
        
         
        //return view('comprar.edit', compact('consultoria_comprada','usuario_cliente','consultor','cliente','consultoriasPlantilla2','info_consultoria','info_plantilla','formulario_cliente','plantilla_generales','subplantilla'));  VERSION 1.1
        return view('comprar.edit', compact('consultoria_comprada','usuario_cliente','consultor','cliente','info_consultoria','formulario_cliente','plantilla_generales', 'CompraIndices', 'indices'));//VERSION 2.1

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(CompraUpdateRequest $request,$compra)
    {
        //informe controller

       // dd($request);

        // $variabletabla1->campo=getInput('id_input');
        // $variabletabla1->save();
        // $variabletabla2->campo=getInput('id_input');
        // $variabletabla2->save();
        //$id_consultoria = $request->consultorias;

         //SUBINDICES
        //eliminar los subplantilla de esta consultoria
        $res=CompraIndice::where('id_compra',$compra)->delete();
        //insertar los nuevos plantilla
        $indices = $request->get('indices');

        if($indices){
            foreach($indices as $indice){
                $CompraIndice = new CompraIndice;
                $CompraIndice->id_compra = $compra;
                $CompraIndice->id_indice = $indice;
                $CompraIndice->save();
            }
    
        }
        

        
        //CONSULTORIA COMPRADA
        //$consultoria_comprada = ConsultoriasCompradas::find($compra);
        //$consultoria_comprada->update($request->all());

       

        // $consultoria_comprada = plantilla_sub_plantilla::find($compra);
        // $consultoria_comprada->update($request->all());


        return redirect()->route('consultoria_comprada.index')
        ->with('info', 'Consultoría Comprada actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compra $compra)
    {
        //
    }
}
