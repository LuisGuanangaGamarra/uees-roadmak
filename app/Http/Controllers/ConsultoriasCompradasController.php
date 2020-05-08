<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;

use App\ConsultoriasCompradas;
use App\formulario;
use App\Consultoria;
use App\Historico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use Illuminate\Support\Facades\DB;

class ConsultoriasCompradasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ip='__ffff_127.0.0.1';
       
       
        if(Auth::user()->isRole('consultor') ){//SI ES CONSULTOR
           // dd(Auth::user()->id);
            $consultoria_comprada = ConsultoriasCompradas::where('consultor',Auth::user()->id)->get();/* ->paginate(5) */
            return view('consultorias_compradas.index',compact('consultoria_comprada', 'ip'));

        }else if(Auth::user()->isRole('SuperAdmin')){//SI ES SUPERADMINISTRADOR
            $consultoria_comprada = ConsultoriasCompradas::get();
            return view('consultorias_compradas.index',compact('consultoria_comprada', 'ip'));

        }else{//SI ES OTRO ROL
            return redirect()->route('/');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ConsultoriasCompradas  $consultoriasCompradas
     * @return \Illuminate\Http\Response
     */
    public function show(ConsultoriasCompradas $consultoriasCompradas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ConsultoriasCompradas  $consultoriasCompradas
     * @return \Illuminate\Http\Response
     */
    public function edit(ConsultoriasCompradas $consultoriasCompradas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ConsultoriasCompradas  $consultoriasCompradas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConsultoriasCompradas $consultoriasCompradas)
    {
        //
    }



    public function destroy(ConsultoriasCompradas $consultoria)
    {

        $consultoria = ConsultoriasCompradas::find($consultoria->id);
        if(empty($consultoria)){
            Flash::error('mensaje error');
            return redirect()->back();
        }
     
       

        //2.1 ELIMINAR ARCHIVO LOCAL        ||  ELIMINAR ARCHIVO ONLYOFFICE  ||  ELIMINAR INFORME
        
            //ELIMINAR ARCHIVO DE LOCAL
            $destinationPath = 'uploads';
            $directorio='/var/www/html/uees-roadmak/public/'.$destinationPath.'/'.$consultoria->archivo;
            if(file_exists ($directorio )){
                unlink($directorio);               
            }
            //ELIMINAR ARCHIVO ONLYOFFICE
                $url = 'http://localhost:4000/file/';
                //ARCHIVO CARGADO
                $cliente = new Client();
                $response =   $cliente->request(  'DELETE', $url,[ 'headers' => ['x-forwarded-for'=>'__ffff_127.0.0.1'],  'query'   => ['filename'=>$consultoria->archivo],]);
                //ARCHIVO PROCESADO
                $client = new Client();
                $response =   $client->request(  'DELETE', $url,[ 'headers' => ['x-forwarded-for'=>'__ffff_127.0.0.1'],  'query'   => ['filename'=>'procesado_'.$consultoria->archivo],]);

             //ELIMINAR INFORME
             $client = new Client();
             $response =$client->delete('http://localhost:3988/api/deleteInforme/'.$consultoria->id);



        //1. ELIMINAR       ||   ARCHIVO = ''
        $consultoria->archivo="";
        //2. CAMBIAR        ||   ESTADO  = 'activo'
        $consultoria->estado='activo';

        $consultoria->save();
        //3. REDIRECCIONAR  ||   ROUTER  = consultoria_comprada.index
            return redirect()->route('consultoria_comprada.index');

    }



    /*
        MÉTODO QUE PERMITE LIBERAR LA CONSULTORÍA COMPRADA UNA VEZ QUE EL CONSULTOR LA HAYA EDITADO
    */
    public function  liberar(ConsultoriasCompradas $consultoria){
        $ip='__ffff_127.0.0.1';
        $usuario = ConsultoriasCompradas::find($consultoria->id);
        if(empty($usuario)){
            Flash::error('mensaje error');
            return redirect()->back();
        }
        //EDITAR EL ESTADO DE LA CONSULTORIA COMPRADA
        $usuario->estado='activo';
        $usuario->save();

/*        $actualizaestado_his = Historico::where('id_consultoria_comprada',$consultoria->id)->first();
        $actualizaestado_his->estado = 'activo';
        $actualizaestado_his->save();*/


        if(Auth::user()->isRole('consultor') ){//SI ES CONSULTOR
            // dd(Auth::user()->id);
             $consultoria_comprada = ConsultoriasCompradas::where('consultor',Auth::user()->id)->/* paginate(5) */get();
              return view('consultorias_compradas.index',compact('consultoria_comprada', 'ip'));
 
         }else if(Auth::user()->isRole('SuperAdmin')){//SI ES SUPERADMINISTRADOR
             $consultoria_comprada = ConsultoriasCompradas::/* paginate(5) */get();
             return view('consultorias_compradas.index',compact('consultoria_comprada', 'ip'));
 
         }else{//SI ES OTRO ROL
             return redirect()->route('/');
         }

        //return view('consultorias_compradas.index',compact('consultoria_comprada'));

        

    }

    public function procesar(ConsultoriasCompradas $consultoria)
    {
        $inputFileType = 'Xlsx';
        $inputFileName = 'uploads/'.$consultoria->archivo;
        $sheetname = 'BALANCES';

        $reader = IOFactory::createReader($inputFileType);
        $spreadsheet = $reader->load($inputFileName);

      //  $valor = $spreadsheet->getSheetByName($sheetname)->getCell('J52')->getCalculatedValue();
        
        
        var_dump($valor);
    }

}
