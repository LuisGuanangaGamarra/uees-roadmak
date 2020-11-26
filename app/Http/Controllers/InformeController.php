<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade as PDF;

use App\EstadosSituacionFinanciera;
use App\ConsultoriasCompradas;
use App\SubConsultorias;
use App\Informe;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Balance;
use App\Galeria;
use GuzzleHttp\Client;
//use App\Http\Controllers\DOMPDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\CloseInforme as CloseInformeEmail;
use File;
class InformeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index($consultoria)
    {  
        $validaconsultoria = ConsultoriasCompradas::find($consultoria);
        if(empty($validaconsultoria)){
            Session::flash('message', 'El usuario se creo exitosamente.');
            return redirect('/');
        }
      
        $informe = Informe::where('idcompra',$consultoria)->get();
        if(empty($informe[0])){
            $client = new Client();
            $response = $client->GET('http://localhost:3988/api/insertinforme/'.$consultoria);
        }else{
            $Informe = $informe[0];
            return view('informe.informaciongeneral',compact('Informe', 'consultoria','validaconsultoria'));
        }
        
        $informe = Informe::where('idcompra',$consultoria)->get();
        $Informe = $informe[0];
        return view('informe.informaciongeneral',compact('Informe', 'consultoria','validaconsultoria'));
    }


    /*****************************************************************************/
    public function download_pdf($consultoria) {
        $validaconsultoria = ConsultoriasCompradas::find($consultoria);
        if(empty($validaconsultoria)){
            Session::flash('message', 'El usuario se creo exitosamente.');
            return redirect('/');
        }

        $informe = Informe::where('idcompra',$consultoria)->get();
        $Informe = $informe[0];
        
        $fechaactual = getdate();
        $fechaactual=$fechaactual['year'].'_'.$fechaactual['mon'].'_'.$fechaactual['mday'];

        $pdf =  PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])::loadView('informe.pdf-informe', compact('Informe',"consultoria","validaconsultoria"));
        $pdf->setPaper('A4');
        //$pdf->save("informes/".'Informe_'.$consultoria.'_'.$fechaactual.'.pdf');
        return $pdf->download('Informe_'.$consultoria.'_'.$fechaactual.'.pdf');
        return view('informe.pdf-informe', compact('Informe',"consultoria","validaconsultoria"));
        //return redirect('informe.index');
    }

    public function fRefreshPage($consultoria) {
        $validaconsultoria = ConsultoriasCompradas::find($consultoria);
        if(empty($validaconsultoria)){
            Session::flash('message', 'El usuario se creo exitosamente.');
            return redirect('/');
        }

        $informe = Informe::where('idcompra',$consultoria)->get();
        $Informe = $informe[0];
        
        $fechaactual = getdate();
        $fechaactual=$fechaactual['year'].'_'.$fechaactual['mon'].'_'.$fechaactual['mday'];

        $pdf =  PDF::loadView('informe.pdf-informe', compact('Informe',"consultoria","validaconsultoria"));
        $pdf->setPaper('A4');


        //ELIMINAR EL ARCHIVO CARGADO (si existe)
         //ELIMINAR ARCHIVO DE LOCAL
         $destinationPath = 'informes';
         $directorio='/var/www/html/uees-roadmak/public/'.$destinationPath.'/'.'Informe_'.$consultoria.'_'.$fechaactual.'.pdf';
         if(file_exists ($directorio )){
             unlink($directorio);               
         }

        $pdf->save("informes/".'Informe_'.$consultoria.'_'.$fechaactual.'.pdf');
         return redirect()->route('informe.index',$consultoria);
    }

    

    public function getData($consultoria) {

        $validaconsultoria = ConsultoriasCompradas::find($consultoria);
        if(empty($validaconsultoria)){
            Session::flash('message', 'El usuario se creo exitosamente.');
            return redirect('/');
        }
      
        $informe = Informe::where('idcompra',$consultoria)->get();
        if(empty($informe[0])){
            $client = new Client();
            $response = $client->GET('http://localhost:3988/api/insertinforme/'.$consultoria);
        }else{
            $Informe = $informe[0];
            return view('informe.informaciongeneral',compact('Informe', 'consultoria','validaconsultoria'));
        }
        
        $informe = Informe::where('idcompra',$consultoria)->get();
        $Informe = $informe[0];
        //return view('informe.informaciongeneral',compact('Informe', 'consultoria','validaconsultoria'));

        /*$data =  [
            'quantity'      => '1' ,
            'description'   => 'some ramdom text',
            'price'   => '500',
            'total'     => '500'
        ];*/
       
    }
    /*****************************************************************************/



    public function closeInforme(ConsultoriasCompradas $consultoria){
        $datos_subconsultoria= SubConsultorias::find($consultoria->consultorias);

        //CAMBIAR EL ESTADO
        $consultoriacomp = ConsultoriasCompradas::find($consultoria->id);
        if(empty($consultoriacomp)){
            Flash::error('mensaje error');
            return redirect()->back();
        }

        $consultoriacomp->estado='cerrado';
        $consultoriacomp->save(); 


        //ENVIAR EL EMAIL
        Mail::to('approadmak@gmail.com', 'Roadmak') //DATOS CORREO ROADMAK
        ->send(new CloseInformeEmail($datos_subconsultoria->name));

        return redirect()->route('consultoria_comprada.index');
    }

    public function openInforme(ConsultoriasCompradas $consultoria){

        //CAMBIAR EL ESTADO
        $consultoriacomp = ConsultoriasCompradas::find($consultoria->id);
        if(empty($consultoriacomp)){
            Flash::error('mensaje error');
            return redirect()->back();
        }

        $consultoriacomp->estado='procesando';
        $consultoriacomp->save(); 
      

      // return redirect()->route('consultoria_comprada.index');
        return redirect()->route('informe.index',$consultoria->id);
    }


    public function informacion_dos($consultoria)
    {
        $validaconsultoria = ConsultoriasCompradas::find($consultoria);
        if(empty($validaconsultoria)){
            Session::flash('message', 'El usuario se creo exitosamente.');
            return redirect('/');
        }

        $informe = Informe::where('idcompra',$consultoria)->get();
        $Informe = $informe[0];

        return view('informe.informaciongeneral_dos',compact('Informe',"consultoria","validaconsultoria"));
    }
    
    public function situacion($consultoria)
    {
        $validaconsultoria = ConsultoriasCompradas::find($consultoria);
        if(empty($validaconsultoria)){
            Session::flash('message', 'El usuario se creo exitosamente.');
            return redirect('/');
        }

        $informe = Informe::where('idcompra',$consultoria)->get();
        $Informe = $informe[0];
        return view('informe.situacioneconomica',compact('Informe',"consultoria","validaconsultoria"));
    }
    
    public function sectorauto($consultoria)
    {
        $validaconsultoria = ConsultoriasCompradas::find($consultoria);
        if(empty($validaconsultoria)){
            Session::flash('message', 'El usuario se creo exitosamente.');
            return redirect('/');
        }

        $informe = Informe::where('idcompra',$consultoria)->get();
        $Informe = $informe[0];
        return view('informe.sectorautomotriz',compact('Informe',"consultoria","validaconsultoria"));
    }
    
    public function financiero_historico($consultoria)
    {
        $validaconsultoria = ConsultoriasCompradas::find($consultoria);
        if(empty($validaconsultoria)){
            Session::flash('message', 'El usuario se creo exitosamente.');
            return redirect('/');
        }

        $informe = Informe::where('idcompra',$consultoria)->get();
        $Informe = $informe[0];
        return view('informe.financierohistorico',compact('Informe',"consultoria","validaconsultoria"));
    }
    
    public function analisis_cifras_financieras($consultoria)
    {
        $validaconsultoria = ConsultoriasCompradas::find($consultoria);
        if(empty($validaconsultoria)){
            Session::flash('message', 'El usuario se creo exitosamente.');
            return redirect('/');
        }

        $informe = Informe::where('idcompra',$consultoria)->get();
        $Informe = $informe[0];

        return view('informe.analisiscifras',compact('Informe',"consultoria",'validaconsultoria',"validaconsultoria"));
    }
    
    public function analisis_rendimiento($consultoria)
    {
        $validaconsultoria = ConsultoriasCompradas::find($consultoria);
        if(empty($validaconsultoria)){
            Session::flash('message', 'El usuario se creo exitosamente.');
            return redirect('/');
        }

        $informe = Informe::where('idcompra',$consultoria)->get();
        $Informe = $informe[0];
        return view('informe.analisisrendimiento',compact('Informe',"consultoria","validaconsultoria"));
    }
    
    public function analisis_rotacion($consultoria)
    {
        $validaconsultoria = ConsultoriasCompradas::find($consultoria);
        if(empty($validaconsultoria)){
            Session::flash('message', 'El usuario se creo exitosamente.');
            return redirect('/');
        }

        $informe = Informe::where('idcompra',$consultoria)->get();
        $Informe = $informe[0];
        return view('informe.analisisrotacion',compact('Informe',"consultoria","validaconsultoria"));
    }
    
    public function analisis_liquidez($consultoria)
    {
        $validaconsultoria = ConsultoriasCompradas::find($consultoria);
        if(empty($validaconsultoria)){
            Session::flash('message', 'El usuario se creo exitosamente.');
            return redirect('/');
        }

        $informe = Informe::where('idcompra',$consultoria)->get();
        $Informe = $informe[0];
        return view('informe.analisisliquidez',compact('Informe',"consultoria","validaconsultoria"));
    }
    
    public function horizonte_proyeccion($consultoria)
    {
        $validaconsultoria = ConsultoriasCompradas::find($consultoria);
        if(empty($validaconsultoria)){
            Session::flash('message', 'El usuario se creo exitosamente.');
            return redirect('/');
        }

        $informe = Informe::where('idcompra',$consultoria)->get();
        $Informe = $informe[0];
        return view('informe.horizonteproyeccion',compact('Informe',"consultoria","validaconsultoria"));
    }
    
    public function proyeccion_ingresos($consultoria)
    {
        $validaconsultoria = ConsultoriasCompradas::find($consultoria);
        if(empty($validaconsultoria)){
            Session::flash('message', 'El usuario se creo exitosamente.');
            return redirect('/');
        }

        $informe = Informe::where('idcompra',$consultoria)->get();
        $Informe = $informe[0];
        return view('informe.proyeccioningresos',compact('Informe',"consultoria","validaconsultoria"));
    }
    
    public function proyeccion_financiera($consultoria)
    {
        $validaconsultoria = ConsultoriasCompradas::find($consultoria);
        if(empty($validaconsultoria)){
            Session::flash('message', 'El usuario se creo exitosamente.');
            return redirect('/');
        }

        $informe = Informe::where('idcompra',$consultoria)->get();
        $Informe = $informe[0];
        return view('informe.proyeccionfinanciera',compact('Informe',"consultoria","validaconsultoria"));
    }
    
    public function endeudamiento_propuesto($consultoria)
    {
        $validaconsultoria = ConsultoriasCompradas::find($consultoria);
        if(empty($validaconsultoria)){
            Session::flash('message', 'El usuario se creo exitosamente.');
            return redirect('/');
        }

        $informe = Informe::where('idcompra',$consultoria)->get();
        $Informe = $informe[0];
        return view('informe.endeudamientopropuesto',compact('Informe',"consultoria","validaconsultoria"));
    }
    
    public function estados_financieros($consultoria)
    {
        $validaconsultoria = ConsultoriasCompradas::find($consultoria);
        if(empty($validaconsultoria)){
            Session::flash('message', 'El usuario se creo exitosamente.');
            return redirect('/');
        }

        $informe = Informe::where('idcompra',$consultoria)->get();
        $Informe = $informe[0];
        return view('informe.estadosfinancieros',compact('Informe',"consultoria","validaconsultoria"));
    }
    
    public function comentarios_flujo_endeudamiento($consultoria)
    {
        $validaconsultoria = ConsultoriasCompradas::find($consultoria);
        if(empty($validaconsultoria)){
            Session::flash('message', 'El usuario se creo exitosamente.');
            return redirect('/');
        }

        $informe = Informe::where('idcompra',$consultoria)->get();
        $Informe = $informe[0];
        return view('informe.comentariosflujoyendeudamiento',compact('Informe',"consultoria","validaconsultoria"));
    }

    public function recomendaciones($consultoria)
    {
        $validaconsultoria = ConsultoriasCompradas::find($consultoria);
        if(empty($validaconsultoria)){
            Session::flash('message', 'El usuario se creo exitosamente.');
            return redirect('/');
        }

        $informe = Informe::where('idcompra',$consultoria)->get();
        $Informe = $informe[0];


        return view('informe.conclusionesyrecomendaciones',compact('Informe',"consultoria",'validaconsultoria'));
    }

    /*

    Redireccionar a la Galeria

    */

    public function galeria($consultoria)
    { 
        $informe= Informe::all();
        $Informe= $informe->last();
        $estadosSituacionFinanciera = EstadosSituacionFinanciera::/* paginate(5) */get();
        $Galeria= Galeria::/* paginate(5) */get();
        return view('informe.galeria.index',compact('Informe','estadosSituacionFinanciera','Galeria',"consultoria"));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function show(Informe $informe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function edit(Informe $informe)
    {
        //
    }

    /**
     * INICIO DE LOS UPDATES
     * Actualizar el index del informe
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Informe $Informe)
    {
        $var = Informe::find($Informe->id);
        $var->titulo1 = Input::get('titulo1');
        $var->titulo2 = Input::get('titulo2');
        $var->parrafo1 = Input::get('parrafo1');
        $var->save();
        echo '<script>window.close();</script>';
    }

    public function updateinf(Request $request, Informe $Informe)
    {
        $var = Informe::find($Informe->id);
        $var->titulo3 = Input::get('titulo3');
        $var->parrafo2 = Input::get('parrafo2');
        $var->save();
        echo '<script>window.close();</script>'; 
    }


    public function updatesituacion(Request $request, Informe $Informe)
    {
        $var = Informe::find($Informe->id);
        $var->titulo4 = Input::get('titulo4');
        $var->titulo5 = Input::get('titulo5'); 
        $var->parrafo3 = Input::get('parrafo3');
        $var->save();
        echo '<script>window.close();</script>';
    }

    public function updatesector(Request $request, Informe $Informe)
    {
        $var = Informe::find($Informe->id);
        $var->titulo4 = Input::get('titulo4');
        $var->titulo6 = Input::get('titulo6');
        $var->parrafo4 = Input::get('parrafo4');
        $var->save();
        echo '<script>window.close();</script>';
    }


    public function updatefinanciero_historico(Request $request, Informe $Informe)
    {
        $var = Informe::find($Informe->id);
        $var->titulo7 = Input::get('titulo7');
        $var->titulo8 = Input::get('titulo8');
        $var->parrafo5 = Input::get('parrafo5');
        $var->save();
        echo '<script>window.close();</script>';
    }


    public function updateanalisiscifras(Request $request, Informe $Informe)
    {
        $var = Informe::find($Informe->id);
        $var->titulo7 = Input::get('titulo7');
        $var->titulo9 = Input::get('titulo9');
        $var->parrafo6 = Input::get('parrafo6');
        $var->save();
        echo '<script>window.close();</script>';
    }
    
    public function updateanalisis_rendimiento(Request $request, Informe $Informe)
    {
        $var = Informe::find($Informe->id);
        $var->titulo7 = Input::get('titulo7');
        $var->titulo10 = Input::get('titulo10');
        $var->parrafo7 = Input::get('parrafo7');
        $var->save();
        echo '<script>window.close();</script>';
    }


    public function updateanalisis_rotacion(Request $request, Informe $Informe)
    {
        $var = Informe::find($Informe->id);
        $var->titulo7 = Input::get('titulo7');
        $var->titulo11 = Input::get('titulo11');
        $var->parrafo8 = Input::get('parrafo8');
        $var->save();
        echo '<script>window.close();</script>';
    }
    
    public function updateanalisis_liquidez(Request $request, Informe $Informe)
    {
        $var = Informe::find($Informe->id);
        $var->titulo7 = Input::get('titulo7');
        $var->titulo12 = Input::get('titulo12');
        $var->parrafo9 = Input::get('parrafo9');
        $var->save();
        echo '<script>window.close();</script>';
    }
    

    public function updatehorizonte_proyeccion(Request $request, Informe $Informe)
    {
        $var = Informe::find($Informe->id);  
        $var->titulo13 = Input::get('titulo13');
        $var->titulo14 = Input::get('titulo14');
        $var->parrafo10 = Input::get('parrafo10');
        $var->save();
        echo '<script>window.close();</script>';
    }

    public function updateproyeccion_ingresos(Request $request, Informe $Informe)
    {
        $var = Informe::find($Informe->id); 
        $var->titulo13 = Input::get('titulo13');
        $var->titulo15 = Input::get('titulo15');
        $var->parrafo11 = Input::get('parrafo11');
        $var->save();
        echo '<script>window.close();</script>';
    }

   
    public function updateproyeccion_financiera(Request $request, Informe $Informe)
    {
        $var = Informe::find($Informe->id);
        $var->titulo13 = Input::get('titulo13');
        $var->titulo16 = Input::get('titulo16');
        $var->parrafo12 = Input::get('parrafo12');
        $var->save();
        echo '<script>window.close();</script>';
    }


    public function updateendeudamiento_propuesto(Request $request, Informe $Informe)
    {
        $var = Informe::find($Informe->id);  
        $var->titulo13 = Input::get('titulo13');
        $var->titulo17 = Input::get('titulo17');  
        $var->parrafo13 = Input::get('parrafo13');
        $var->save();
        echo '<script>window.close();</script>';
    }

    public function updateestados_financieros(Request $request, Informe $Informe)
    {
        $var = Informe::find($Informe->id);
        $var->titulo13 = Input::get('titulo13');
        $var->titulo18 = Input::get('titulo18');  
        $var->parrafo14 = Input::get('parrafo14');
        $var->save();
        echo '<script>window.close();</script>';
    }

  
    public function updatecomentarios_flujo_endeudamiento(Request $request, Informe $Informe)
    {
        $var = Informe::find($Informe->id);     
        $var->titulo13 = Input::get('titulo13');
        $var->titulo19 = Input::get('titulo19');
        $var->parrafo15 = Input::get('parrafo15');
        $var->save();
        echo '<script>window.close();</script>';
    }
   
    public function updaterecomendaciones(Request $request, Informe $Informe)
    {
        $var = Informe::find($Informe->id);
        $var->titulo20 = Input::get('titulo20');
        $var->parrafo17 = Input::get('parrafo17');
        $var->save();
        echo '<script>window.close();</script>';
    }

    /**   
    * --------------FIN DE UPDATES-----------------       
    */


    //ler@updateanalisis_rendimiento')->name('informe.updateanalisis_rendimiento')

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Informe $informe)
    {
        //
    }

/*inicio de funciones de informe del cliente*/

    public function index_cliente($consultoria)
    {
        $cuentas_balance = Balance::/* paginate(5) */get();
        $informe = Informe::where('idcompra',$consultoria)->get();
        $Informe = $informe[0];
        return view('informe_cliente.informaciongeneral',compact('cuentas_balance','Informe', 'consultoria'));
        /*
        $client = new Client([
        // Base URI is used with relative requests
        'base_uri' => 'http://localhost:3988/api/',
        // You can set any number of default request options.
        'timeout'  => 2.0,
        ]);
        $response = $client->request('GET', 'consultorias');
        //dd($response);
        $datos=json_decode($response->getBody()->getContents());
        //dd($articulos);
        $datos2 = $datos->consultorias;  
        dd($datos2);
        // return view('informe.informaciongeneral')->compact('datos2');
        */
}


    public function informacion_cliente()
    {
        return view('informe_cliente.informaciongeneral');
    }
    public function informacion_dos_cliente($consultoria)
    {

        $informe = Informe::where('idcompra',$consultoria)->get();
        $Informe = $informe[0];

        return view('informe_cliente.informaciongeneral_dos',compact('Informe',"consultoria"));
    }
    
    public function situacion_cliente($consultoria)
    {
        $informe = Informe::where('idcompra',$consultoria)->get();
        $Informe = $informe[0];

        return view('informe_cliente.situacioneconomica',compact('Informe',"consultoria"));
    }
    public function sectorauto_cliente($consultoria)
    {
        $informe = Informe::where('idcompra',$consultoria)->get();
        $Informe = $informe[0];;
        return view('informe_cliente.sectorautomotriz',compact('Informe',"consultoria"));
    }

    public function financiero_historico_cliente($consultoria)
    {
        $informe = Informe::where('idcompra',$consultoria)->get();
        $Informe = $informe[0];
        return view('informe_cliente.financierohistorico',compact('Informe',"consultoria"));
    }
    public function analisis_cifras_financieras_cliente($consultoria)
    {
        $informe = Informe::where('idcompra',$consultoria)->get();
        $Informe = $informe[0];
        return view('informe_cliente.analisiscifras',compact('Informe',"consultoria"));
    }
    public function analisis_rendimiento_cliente($consultoria)
    {
        $informe = Informe::where('idcompra',$consultoria)->get();
        $Informe = $informe[0];
        return view('informe_cliente.analisisrendimiento',compact('Informe',"consultoria"));
    }
    public function analisis_rotacion_cliente($consultoria)
    {
        $informe = Informe::where('idcompra',$consultoria)->get();
        $Informe = $informe[0];
        return view('informe_cliente.analisisrotacion',compact('Informe',"consultoria"));
    }
    public function analisis_liquidez_cliente($consultoria)
    {
        $informe = Informe::where('idcompra',$consultoria)->get();
        $Informe = $informe[0];
        return view('informe_cliente.analisisliquidez',compact('Informe',"consultoria"));
    }
   
    public function horizonte_proyeccion_cliente($consultoria)
    {
        $informe = Informe::where('idcompra',$consultoria)->get();
        $Informe = $informe[0];
        return view('informe_cliente.horizonteproyeccion',compact('Informe',"consultoria"));
    }
    public function proyeccion_ingresos_cliente($consultoria)
    {
        $informe = Informe::where('idcompra',$consultoria)->get();
        $Informe = $informe[0];
        return view('informe_cliente.proyeccioningresos',compact('Informe',"consultoria"));
    }
    public function proyeccion_financiera_cliente($consultoria)
    {
        $informe = Informe::where('idcompra',$consultoria)->get();
        $Informe = $informe[0];
        return view('informe_cliente.proyeccionfinanciera',compact('Informe',"consultoria"));
    }
    public function endeudamiento_propuesto_cliente($consultoria)
    {
        $informe = Informe::where('idcompra',$consultoria)->get();
        $Informe = $informe[0];
        return view('informe_cliente.endeudamientopropuesto',compact('Informe',"consultoria"));
    }
    public function estados_financieros_cliente($consultoria)
    {
        $informe = Informe::where('idcompra',$consultoria)->get();
        $Informe = $informe[0];
        return view('informe_cliente.estadosfinancieros',compact('Informe',"consultoria"));
    }
    public function comentarios_flujo_endeudamiento_cliente($consultoria)
    {
        $informe = Informe::where('idcompra',$consultoria)->get();
        $Informe = $informe[0];
        return view('informe_cliente.comentariosflujoyendeudamiento',compact('Informe',"consultoria"));   
    }
  
    public function recomendaciones_cliente($consultoria)
    {
        $informe = Informe::where('idcompra',$consultoria)->get();
        $Informe = $informe[0];
        return view('informe_cliente.conclusionesyrecomendaciones',compact('Informe',"consultoria"));
    }
 /*fin de funciones del informe del cliente*/



/* 
    Redireccion a edicion
*/

public function emerg($consultoria)
    {
        $informe = Informe::where('idcompra',$consultoria)->get();
        $Informe = $informe[0];
        return view('informe.editar.emerg',compact('Informe','consultoria'));
    }
    public function informacion_dos_edit($consultoria)
    {
        $informe= Informe::where('idcompra',$consultoria)->get();
        $Informe= $informe[0] ;
        return view('informe.editar.emerginforme',compact('Informe',"consultoria"));
    }

    public function situacion_edit($consultoria)
    {
        $informe= Informe::where('idcompra',$consultoria)->get();
        $Informe= $informe[0] ;
        return view('informe.editar.emerg2-1',compact('Informe',"consultoria"));
    }

    public function sectorauto_edit($consultoria) 
    {
        $informe= Informe::where('idcompra',$consultoria)->get();
        $Informe= $informe[0] ;
        return view('informe.editar.emerg2-2',compact('Informe',"consultoria"));
    }

    public function financiero_historico_edit($consultoria) 
    {
        $informe= Informe::where('idcompra',$consultoria)->get();
        $Informe= $informe[0] ;
        return view('informe.editar.emerg3-1',compact('Informe',"consultoria"));
    }
    public function analisiscifras_edit($consultoria) 
    {
        $informe= Informe::where('idcompra',$consultoria)->get();
        $Informe= $informe[0] ;
        return view('informe.editar.emerg3-2',compact('Informe',"consultoria"));
    }
    public function analisis_rendimiento_edit($consultoria) 
    {
        $informe= Informe::where('idcompra',$consultoria)->get();
        $Informe= $informe[0] ;
        return view('informe.editar.emerg3-3',compact('Informe',"consultoria"));
    }
   
    public function analisis_rotacion_edit($consultoria) 
    {
        $informe= Informe::where('idcompra',$consultoria)->get();
        $Informe= $informe[0] ;
        return view('informe.editar.emerg3-4',compact('Informe',"consultoria"));
    }
    public function  analisis_liquidez_edit($consultoria) 
    {
        $informe= Informe::where('idcompra',$consultoria)->get();
        $Informe= $informe[0] ;
        return view('informe.editar.emerg3-5',compact('Informe',"consultoria"));
    }
    public function  horizonte_proyeccion_edit($consultoria) 
    {
        $informe= Informe::where('idcompra',$consultoria)->get();
        $Informe= $informe[0] ;
        return view('informe.editar.emerg4-1',compact('Informe',"consultoria"));
    }

    public function  proyeccion_ingresos_edit($consultoria) 
    {
        $informe= Informe::where('idcompra',$consultoria)->get();
        $Informe= $informe[0] ;
        return view('informe.editar.emerg4-2',compact('Informe',"consultoria"));
    }


    public function  proyeccion_financiera_edit($consultoria) 
    {
        $informe= Informe::where('idcompra',$consultoria)->get();
        $Informe= $informe[0] ;
        return view('informe.editar.emerg4-3',compact('Informe',"consultoria"));
    }
   
    public function  endeudamiento_propuesto_edit($consultoria) 
    {
        $informe= Informe::where('idcompra',$consultoria)->get();
        $Informe= $informe[0] ;
        return view('informe.editar.emerg4-4',compact('Informe',"consultoria"));
    }
 
    public function  estados_financieros_edit($consultoria) 
    {
        $informe= Informe::where('idcompra',$consultoria)->get();
        $Informe= $informe[0] ;
        return view('informe.editar.emerg4-5',compact('Informe',"consultoria"));
    }
   
    public function  comentarios_flujo_endeudamiento_edit($consultoria) 
    {
        $informe= Informe::where('idcompra',$consultoria)->get();
        $Informe= $informe[0] ;
        return view('informe.editar.emerg4-6',compact('Informe',"consultoria"));
    }

    public function  recomendaciones_edit($consultoria) 
    {
        $informe= Informe::where('idcompra',$consultoria)->get();
        $Informe= $informe[0] ;
        return view('informe.editar.emerg5',compact('Informe',"consultoria"));
    }  
}
