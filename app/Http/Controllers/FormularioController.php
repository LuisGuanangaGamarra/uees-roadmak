<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\formulario;
use App\ConsultoriasCompradas;
use App\SectorEconomico;

use App\SubPlantilla;
use App\PlantillaSubPlantilla;
use App\Indice;
use App\CompraIndice;
use App\Historico;

use Illuminate\Http\Request;
use App\Http\Requests\FormularioStoreRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;


class FormularioController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($consultoria)
    {
    
        $existe = Formulario::where('idconsultoria',$consultoria)->get();
        if (!empty($existe[0])){

            if(Auth::user()->isRole('cliente') ){//SI ES cliente
                $consultoria_comprada = ConsultoriasCompradas::where('cliente',Auth::user()->id)->/* paginate(5) */get();
//              return view('bandeja.index',compact('consultoria_comprada'));
                return redirect()->route('bandeja.index',$consultoria_comprada);

    
            }else if(Auth::user()->isRole('SuperAdmin')){//SI ES SUPERADMINISTRADOR
                $consultoria_comprada = ConsultoriasCompradas::/* paginate(5) */get();
                
                //return view('bandeja.index',compact('consultoria_comprada'));
                return redirect()->route('bandeja.index',$consultoria_comprada);
    
            }else{//SI ES OTRO ROL
                return redirect()->route('/');
            }
        }else{ 
            





            $sectorEconomicoQuery = SectorEconomico::get();
            $actividad_economica = array();
            
            foreach($sectorEconomicoQuery as $selectActividadEconomica) {
                    $actividad_economica[$selectActividadEconomica->id] = $selectActividadEconomica->id ." - ". $selectActividadEconomica->name;
            }



            return view('formulario.index', compact('consultoria','actividad_economica'));
        }

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormularioStoreRequest $request, $consultoria)
    {
        $existe = Formulario::where('idconsultoria',$consultoria)->get();
        if (empty($existe[0])){

      

                    $formulario = Formulario::create($request->all());

                    //dd($formulario->respuesta1);
                    //#############INDICADORES POR DEFECTO
                    // MARGEN BRUTO (fila 25/fila 13)
                    // MARGEN OPERATIVO (fila 51/fila 13)
                    // TASA EFECTIVA DE IMPUESTOS (fila 68/fila 66)
                    $CompraIndice = CompraIndice::create(['id_compra' => $consultoria,
                                                                'id_indice' => '1']);
                    $CompraIndice = CompraIndice::create(['id_compra' => $consultoria,
                                                                'id_indice' => '2']);
                    $CompraIndice = CompraIndice::create(['id_compra' => $consultoria,
                                                                'id_indice' => '3']);
                    // DÍAS DE COBRO (fila 151 * 360 / fila 8)
                    // DÍAS DE INVENTARIO (-fila 20 * 360 / fila 21)
                    // DÍAS DE PAGO (fila 194 * 360 / (fila 17+fila 97))
                    // CICLO CONVERSION EFECTIVO = días cobro + días inventario – días pago
                    $CompraIndice = CompraIndice::create(['id_compra' => $consultoria,
                                                                'id_indice' => '10']);
                    $CompraIndice = CompraIndice::create(['id_compra' => $consultoria,
                                                                'id_indice' => '13']);
                    $CompraIndice = CompraIndice::create(['id_compra' => $consultoria,
                                                                'id_indice' => '14']);
                    $CompraIndice = CompraIndice::create(['id_compra' => $consultoria,
                                                                'id_indice' => '17']);
                    // LIQUIDEZ
                    // NOF: (170-259)-(206+213+214-265)
                    // FONDO DE MANIOBRA: 266+267-261
                    // NOF SOBRE VENTAS (260/(8+9))
                    $CompraIndice = CompraIndice::create(['id_compra' => $consultoria,
                                                                'id_indice' => '24']);
                    $CompraIndice = CompraIndice::create(['id_compra' => $consultoria,
                                                                'id_indice' => '25']);
                    $CompraIndice = CompraIndice::create(['id_compra' => $consultoria,
                                                                'id_indice' => '26']);

                    // RENDIMIENTO
                    // ROS (69/13)
                    // ROA (69/262) en este caso 262 es de la columna anterior
                    // ROE (69/267) en este caso 267 es de la columna anterior
                    // ENDEUDAMIENTO ((265+266)/262)
                    // APALANCAMIENTO (262/267) 
                    // GAF (63/66)
                    $CompraIndice = CompraIndice::create(['id_compra' => $consultoria,
                                                                'id_indice' => '18']);
                    $CompraIndice = CompraIndice::create(['id_compra' => $consultoria,
                                                                'id_indice' => '19']);
                    $CompraIndice = CompraIndice::create(['id_compra' => $consultoria,
                                                                'id_indice' => '20']);
                    $CompraIndice = CompraIndice::create(['id_compra' => $consultoria,
                                                                'id_indice' => '21']);
                    $CompraIndice = CompraIndice::create(['id_compra' => $consultoria,
                                                                'id_indice' => '22']);
                    $CompraIndice = CompraIndice::create(['id_compra' => $consultoria,
                                                                'id_indice' => '23']);       

                    //########FIN INDICADORES POR DEFECTO

                    //########INDICADORES EN BASE A LAS PREGUNTAS
                    if($formulario->respuesta1 == 'Servicios' || $formulario->respuesta1 == 'Industrial'){
                        // PROPORCIÓN MATERIA PRIMA (101/114)
                        // PROPORCIÓN MANO DE OBRA (107/114)
                        // PROPORCIÓN COSTOS INDIRECTOS (112/114)
                        // DÍAS DE MATERIA PRIMA (-100 * 360/101)
                        // DÍAS DE PRODUCTOS EN PROCESO (-117 * 360/118)
                        // DÍAS DE PRODUCTOS TERMINADOS (-121 * 360/122)
                        $CompraIndice = CompraIndice::create(['id_compra' => $consultoria,
                                                                    'id_indice' => '4']);
                        $CompraIndice = CompraIndice::create(['id_compra' => $consultoria,
                                                                    'id_indice' => '5']);
                        $CompraIndice = CompraIndice::create(['id_compra' => $consultoria,
                                                                    'id_indice' => '6']);
                        $CompraIndice = CompraIndice::create(['id_compra' => $consultoria,
                                                                    'id_indice' => '7']);
                        $CompraIndice = CompraIndice::create(['id_compra' => $consultoria,
                                                                    'id_indice' => '8']);
                        $CompraIndice = CompraIndice::create(['id_compra' => $consultoria,
                                                                    'id_indice' => '9']);

                    }

                    if($formulario->respuesta2 == 'si') {
                        // DÍAS COBRO EXPORTACION (152 * 360/9)
                        // DÍAS PAGO IMPORTACIONES (195 * 360/(18+98))
                        $CompraIndice = CompraIndice::create(['id_compra' => $consultoria,
                                                                    'id_indice' => '11']);//DÍAS COBRO EXPORTACION
                        $CompraIndice = CompraIndice::create(['id_compra' => $consultoria,
                                                                    'id_indice' => '15']);//DÍAS PAGO IMPORTACIONES

                    }

                    if($formulario->respuesta3 == 'si'){
                        // DÍAS COBRO RELACIONADOS (153 * 360/10)
                        // DÍAS PAGO RELACIONADOS (196 * 360/(19+99))
                        $CompraIndice = CompraIndice::create(['id_compra' => $consultoria,
                                                                    'id_indice' => '12']);//DÍAS COBRO RELACIONADOS
                        $CompraIndice = CompraIndice::create(['id_compra' => $consultoria,
                                                                    'id_indice' => '16']); //DÍAS PAGO RELACIONADOS
                    }
                	//dd($consultoria);
                    $actualizaestado = ConsultoriasCompradas::where('id',$consultoria)->first();
                    $nuevoestado ='por aceptar';
                    $actualizaestado->estado = 'por aceptar';
                    $actualizaestado->save();

/*
                    $actualizaestado_his = Historico::where('id_consultoria_comprada',$consultoria)->first();
                    $actualizaestado_his->estado = 'por aceptar';
                    $actualizaestado_his->save();*/

                    return redirect()->route('bandeja.index')
                    ->with('info', 'El Formulario de la compra: '.$consultoria.' se ha registrado Exitosamente!');  
               
            }else{
    
               
    
                return redirect()->route('bandeja.index')
                ->with('info', 'El formulario ha sido completado anteriormente');
            }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\formulario  $formulario
     * @return \Illuminate\Http\Response
     */
    public function show(formulario $formulario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\formulario  $formulario
     * @return \Illuminate\Http\Response
     */
    public function edit(formulario $formulario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\formulario  $formulario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, formulario $formulario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\formulario  $formulario
     * @return \Illuminate\Http\Response
     */
    public function destroy(formulario $formulario)
    {
        //
    }
}
