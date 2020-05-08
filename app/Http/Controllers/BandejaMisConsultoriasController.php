<?php

namespace App\Http\Controllers;
use App\ConsultoriasCompradas;
use App\EstadosResultadosIntegrales;
use App\EstadosSituacionFinanciera;
use App\formulario;
use App\SectorEconomico;
use App\CompraIndice;
use App\Historico;


use App\Cuentas;

use App\Indice;

use GuzzleHttp\Client;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Chart\Title;
use PhpOffice\PhpSpreadsheet\Chart\Chart;
use PhpOffice\PhpSpreadsheet\Chart\PlotArea;
use PhpOffice\PhpSpreadsheet\Chart\Layout;
use PhpOffice\PhpSpreadsheet\Chart\Legend;
use PhpOffice\PhpSpreadsheet\Chart\DataSeries;
use PhpOffice\PhpSpreadsheet\Chart\DataSeriesValues;
use Illuminate\Support\Facades\DB;
set_time_limit(900);

class BandejaMisConsultoriasController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(){

        if(Auth::user()->isRole('cliente') ){//SI ES cliente
            $consultoria_comprada = ConsultoriasCompradas::where('cliente',Auth::user()->id)->get()/* ->paginate(5) */;
            return view('bandeja.index',compact('consultoria_comprada'));
            
            }else if(Auth::user()->isRole('superadmin') || Auth::user()->isRole('operador') || Auth::user()->isRole('admin') ){//SI ES SUPERADMINISTRADOR
            $consultoria_comprada = ConsultoriasCompradas::get()/* paginate(5) */;
            return view('bandeja.index',compact('consultoria_comprada'));
            

        }else{//SI ES OTRO ROL
            return redirect()->route('/');
        }


    }

 


    public function obtenerListadoDeArchivos(ConsultoriasCompradas $consultoria){
        $res = array();
        $data2 = [];
        if($consultoria->archivo){
            $destinationPath = 'uploads';
            //$directorio = $destinationPath .'/'.$consultoria->archivo;
            $directorio='/var/www/html/uees-roadmak/public/'.$destinationPath.'/'.$consultoria->archivo;
            if(file_exists ($directorio )){

                // a partir de PHP 5.4
            /*$res = [
                    "name" => $consultoria->archivo,
                    "size" => filesize($directorio),
                    "date" => fileatime($directorio)
                ]; */

                /*                 $res=array_add($res, 'name', $consultoria->archivo);
                $res=array_add($res, 'size', filesize($directorio));
                $res=array_add($res, 'date',fileatime($directorio)); */


                
             
                    $data2= [
                        "name" => $consultoria->archivo,
                        "size" => filesize($directorio),
                        "date" => fileatime($directorio)
                    ];
              

                
                //array_push($res,$consultoria->archivo);//NOMBRE ARCHIVO
                //array_push($res,filesize($directorio));//TAMAÑO
                //array_push($res,fileatime($directorio));//FECHA ULTIMA MODIFICACION
            }else{ 
                
                //array_push($res,"Sin Archivo");//NOMBRE ARCHIVO
                //array_push($res,"");//TAMAÑO
                //array_push($res,"");//FECHA ULTIMA MODIFICACION
                /*$res = [
                    "name" =>"Sin Archivo",
                    "size" => "",
                    "date" => ""
                ]; */

                /*$res=array_add($res, 'name',"Sin Archivo");
                $res=array_add($res, 'size', "");
                $res=array_add($res, 'date',""); */

                $data2[]= [  
                "name" =>"Sin Archivo",
                "size" => "",
                "date" => ""
                ];
            }
        }return  $data2;
    }


    public function index_file(ConsultoriasCompradas $consultoria) {
       // $datos_excel=$this->obtenerListadoDeArchivos($consultoria);
       $nombre="";$size="";$date="";
       if($consultoria->archivo){
            $destinationPath = 'uploads';
            $directorio='/var/www/html/uees-roadmak/public/'.$destinationPath.'/'.$consultoria->archivo;
           
            if(file_exists ($directorio )){
                $nombre=$consultoria->archivo;$size=filesize($directorio). ' bytes';$date= date("F d Y H:i:s.", fileatime($directorio));
            }
        
        }
        return view('bandeja.index_file',compact('consultoria','nombre','size','date'));
    }


    //ELIMINAR EL ARCHIVO CARGADO
    public function drop_index_file(ConsultoriasCompradas $consultoria) {
        $usuario = ConsultoriasCompradas::find($consultoria->id);
        if($usuario->archivo){
            $usuario = ConsultoriasCompradas::find($consultoria->id);
            if(empty($usuario)){
                Flash::error('mensaje error');
                return redirect()->back();
            }

            //ELIMINAR ARCHIVO DE LOCAL
            $destinationPath = 'uploads';
            $directorio='/var/www/html/uees-roadmak/public/'.$destinationPath.'/'.$usuario->archivo;
            if(file_exists ($directorio )){
                unlink($directorio);               
            }

        
            $usuario->archivo="";
            //$usuario->estado='activo';
            $usuario->save();
        }
    
        return redirect()->route('bandeja.index_file',$consultoria->id);
  }



public function sendArchivoOnlyOffice(ConsultoriasCompradas $consultoria){
    $client = new Client([
        'base_uri' => 'http://159.89.183.216:4000/',
        'timeout'  => 2.0,
    ]);
   
    if($consultoria->archivo){
        $destinationPath = 'uploads';
        $directorio='/var/www/html/uees-roadmak/public/'.$destinationPath.'/'.$consultoria->archivo;

        if(file_exists ($directorio )){
            $response = $client->request('POST', 'upload', [  
                'headers' => ['x-forwarded-for'=>'__ffff_127.0.0.1'],      
                'multipart' => [
                    [
                        'name'     => 'uploadedFile',
                        'FileContents'  => fopen($directorio, 'r'),
                        'contents'      => fopen($directorio, 'r'),
                        'filename' => $consultoria->archivo
                    ],
                    [
                        'name'     => 'userid',
                        'contents' => 'uid-1',
                    ],
                    [
                        'name'     => 'name',
                        'contents' => 'Jonn Smith',
                    ]
                            ]
                ]); 
                $usuario = ConsultoriasCompradas::find($consultoria->id);
                if(empty($usuario)){
                    Flash::error('mensaje error');
                    return redirect()->back();
                }
            
                $usuario->archivo=$consultoria->archivo;
                $usuario->estado='pendiente';
                $usuario->save();

                return redirect()->route('bandeja.index');

        }else{ 
                return redirect()->route('bandeja.index_file',$consultoria->id);
        }

    }else{
        return redirect()->route('bandeja.index_file',$consultoria->id);
    }
}





  
    public function showUploadFile(Request $request, ConsultoriasCompradas $consultoria) {
        if($request->file('image')){
            $file = $request->file('image');
            $destinationPath = 'uploads';
            $file->move($destinationPath,'consult'.$consultoria->id.'_'.$file->getClientOriginalName());
    
           /*  $client = new Client([
                'base_uri' => 'http://localhost:4000/',
                'timeout'  => 2.0,
            ]);
    
            $path = $destinationPath .'/'. 'consult'.$consultoria->id.'_'.$file->getClientOriginalName();
            $response = $client->request('POST', 'upload', [        
                'multipart' => [
                    [
                        'name'     => 'uploadedFile',
                        'FileContents'  => fopen($path, 'r'),
                        'contents'      => fopen($path, 'r'),
                        'filename' => 'consult'.$consultoria->id.'_'.$file->getClientOriginalName()
                    ],
                    [
                        'name'     => 'userid',
                        'contents' => 'uid-1',
                    ],
                    [
                        'name'     => 'name',
                        'contents' => 'Jonn Smith',
                    ]
                            ]
                ]);  */
    
            $usuario = ConsultoriasCompradas::find($consultoria->id);
            if(empty($usuario)){
                Flash::error('mensaje error');
                return redirect()->back();
            }
        
            $usuario->archivo='consult'.$consultoria->id.'_'.$file->getClientOriginalName();
            /* $usuario->estado='pendiente'; */
            $usuario->save();
            //bitacoriza archivo y estado 
/*            $actualiza_his = Historico::where('id_consultoria_comprada',$consultoria->id)->first();
            $actualiza_his->archivo='consult'.$consultoria->id.'_'.$file->getClientOriginalName();
            $actualiza_his->estado = 'pendiente';
            $actualiza_his->save();*/
        
            //$archivo='consult'.$consultoria->id.'_'.$file->getClientOriginalName();
           // return view('bandeja.index_file', compact('consultoria','archivo'));    
           return redirect()->route('bandeja.index_file',$consultoria->id);


        }else{
            echo '<script>location.reload();</script>';
            return view('bandeja.index_file', compact('consultoria','archivo'));    

        }



    }


    public function pullFile(ConsultoriasCompradas $consultoria){
        $ip="__ffff_".$_SERVER["REMOTE_ADDR"];
        //redirect(Request::url())
        $ip="__ffff_".$_SERVER["REMOTE_ADDR"];

        $url = 'http://159.89.183.216:4000/download/';
        $path = 'uploads/'.$consultoria->archivo;

        $client = new Client();

        $response =   $client->get(
            $url,
            [
                'headers' => ['x-forwarded-for'=>'__ffff_127.0.0.1'],
                'query'   => ['fileName'=>$consultoria->archivo],
                'save_to' => $path,//'/path/to/local.file',
            ]);

    


        //$consultoria_comprada = ConsultoriasCompradas::/* paginate(5) */get();
        //return view('consultorias_compradas.index', compact('consultoria_comprada','ip'));

       // $this->procesar($consultoria);


    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
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
    public function update(Request $request, ConsultoriasCompradas $consultoriasCompradas){
    }

    public function destroy(ConsultoriasCompradas $consultoriasCompradas){    
    }

    public function procesar(ConsultoriasCompradas $consultoria){


        ///////////////////////PULLFILE///////////////////////////////////////////
        $ip="__ffff_127.0.0.1";

        $url_download = 'http://159.89.183.216:4000/download/';
        $path_upload = 'uploads/'.$consultoria->archivo;

        $client_download = new Client();

        $response_download =   $client_download->get(
            $url_download,
            [
                'headers' => ['x-forwarded-for'=>'__ffff_127.0.0.1'],
                'query'   => ['fileName'=>$consultoria->archivo],
                'save_to' => $path_upload,//'/path/to/local.file',
            ]);
        ////////////////////////PULLFILE////////////////////////////////////////
    

        //LLAMAR A TODOS LOS MÉTODOS SEGÚN CONSULTORÍA
        $destinationPath = 'uploads';
        $path = $destinationPath .'/'.$consultoria->archivo;

        /*
        1 	ESTADO DE RESULTADOS INTEGRALES
        2 	ESTADO DE COSTOS DE PRODUCCION
        3 	ESTADO DE SITUACION FINANCIERA
        4 	ESTADO DE SITUACION FINANCIERA RESUMIDOS
        5   ESTADOS DE FLUJOS DE EFECTIVO   
        */

        //VARIABLES
	//mejorar de memoria
	ini_set('memory_limit', '-1');
	//fin mejora de memoria
        $sheet='Proyecciones';

        $inputFileType = 'Xlsx';
        $inputFileName = 'uploads/'.$consultoria->archivo;

        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setIncludeCharts(true); 
        $spreadsheet = $reader->load($inputFileName);

        $boolean_exist=0;

        //COMPROBRAR SI EXISTE
        for($i=0;$i<count($spreadsheet->getSheetNames());$i++){
            if(strcmp ($spreadsheet->getSheetNames()[$i] , $sheet )== 0){
                $boolean_exist=1;
           }
        }
        
        if($boolean_exist){
           //ELIMINAR SI EXISTE
           $sheetIndex = $spreadsheet->getIndex($spreadsheet->getSheetByName($sheet));
           $spreadsheet->removeSheetByIndex($sheetIndex); 
        }
        $worksheet1 = $spreadsheet->createSheet();
        $worksheet1->setTitle($sheet);
        

        $writer = new Xlsx($spreadsheet);
	    $writer->setPreCalculateFormulas(true);
        $writer->save($inputFileName);



        $formulario = formulario::where('idconsultoria', $consultoria->id)->first();

        $compra_indice=CompraIndice::where('id_compra',$consultoria->id)->get();
        $arreglo_A=array();$arreglo_B=array();$arreglo_C_1=array();$arreglo_C_2=array();$arreglo_D=array();

        for($i=0;$i<count($compra_indice);$i++){
            $resul_indices=Indice::find($compra_indice[$i]->id_indice);
            switch ($resul_indices->estadosfinancieros_id) {
                case 1:
                    array_push($arreglo_A,$resul_indices->id);
                    break;
                case 2:
                    array_push($arreglo_B,$resul_indices->id);
                    break;
                case 3:
                    array_push($arreglo_C_1,$resul_indices->id);
                    break;
                case 4:
                    array_push($arreglo_C_2,$resul_indices->id);
                    break;
                default:
                    array_push($arreglo_D,$resul_indices->id);
                    break;
            }
        }

        //A 
        $this->procesar_ERI($consultoria, $sheet,1,'ESTADO DE RESULTADOS INTEGRALES',$arreglo_A);//ESTADO DE RESULTADOS INTEGRALES
        //B 
        $this->procesarECP($consultoria, $sheet,2,'ESTADO DE COSTOS DE PRODUCCION', $formulario,$arreglo_B);//ESTADO DE COSTOS DE PRODUCCION
        //C
        $this->procesar_ESF($consultoria, $sheet,3,'ESTADO DE SITUACION FINANCIERA',$formulario,$arreglo_C_1);//ESTADO DE SITUACION FINANCIERA         
        $this->procesar_ESFR($consultoria, $sheet,4,'ESTADO DE SITUACION FINANCIERA RESUMIDOS',$arreglo_C_2);//ESTADO DE SITUACION FINANCIERA RESUMIDOS
        //D
        $this->procesar_EFEP($consultoria, $sheet,5,'ESTADOS DE FLUJOS DE EFECTIVO',$arreglo_D);//ESTADOS DE FLUJOS DE EFECTIVO
        //SECTOR ECONOMICO
        $this->procesar_SE($consultoria, $sheet,6,'SECTOR ECONOMICO',$formulario,2,$arreglo_B);//SECTOR ECONOMICO
       

        $consultoriacomp = ConsultoriasCompradas::find($consultoria->id);
        $consultoriacomp->estado='procesando';
        $consultoriacomp->save(); 

        $destinationPath = 'uploads';
        $path = $destinationPath .'/'.$consultoria->archivo; 

/*        $actualiza_his = Historico::where('id_consultoria_comprada',$consultoria->id)->first();
        $actualiza_his->estado = 'procesando';
        $actualiza_his->save();*/

        // SI EXISTE -> ELIMINAR EL ARCHIVO 
        $url = 'http://159.89.183.216:4000/file/';
        $cliente = new Client();
        $response =   $cliente->request(  'DELETE', $url,[ 'headers' => ['x-forwarded-for'=>'__ffff_127.0.0.1'],  'query'   => ['filename'=>'procesado_'.$consultoria->archivo],]);
        // SI EXISTE -> ELIMINAR EL ARCHIVO     

        $client = new Client([
             'base_uri' => 'http://159.89.183.216:4000/',
             'timeout'  => 2.0,
             'headers' => ['x-forwarded-for'=>'__ffff_127.0.0.1']
        ]);
    
        $response = $client->request('POST', 'upload',
         [
             'connection'=>['remoteAddress'=> 'HOLA'],
             'multipart' => [
                 [
                     'name'     => 'uploadedFile',
                     'FileContents'  => fopen($path, 'r'),
                     'contents'      => fopen($path, 'r'),
                     'filename' => 'procesado_'.$consultoria->archivo
                 ],
                 [
                     'name'     => 'userid',
                     'contents' => 'uid-1',
                 ],
                 [
                     'name'     => 'name',
                     'contents' => 'Jonn Smith',
                    
                 ],
                
                 ]
            
        ]); 
        //return redirect()->route('consultoria_comprada.index');
        return redirect()->route('dasboard.index');
    }


//VERSIONES ACTUALES
    public function procesar_ERI(ConsultoriasCompradas $consultoria,$sheet,$id_estado_financiero,$name_estado_financiero,$compra_indice ){//ESTADO DE RESULTADOS INTEGRALES

        $inputFileType = 'Xlsx';
        $inputFileName = 'uploads/'.$consultoria->archivo;


        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setIncludeCharts(true); 
        $spreadsheet = $reader->load($inputFileName);

        $writer = new Xlsx($spreadsheet);

        $usuario = Cuentas::where('id_estado_financiero',$id_estado_financiero)->get();

        if(empty($usuario)){
            Flash::error('mensaje error');
            return redirect()->back();
        }

        $consultoriacomp = ConsultoriasCompradas::find($consultoria->id);
        $datos_compra_comprada= ConsultoriasCompradas::cliente_ById($consultoriacomp->datos_compra);
        /*
        stylefont
            1 styleTitle
            2 styleArrayTotales
            3 styleArrayTitle
            4 styleArrayTitle_periodo
            5 styleArrayTitle_periodo_proy
        */

        

        //DATOS EMPRESA
        $spreadsheet->getSheetByName($sheet)->setCellValue('A'.($this->findletter($id_estado_financiero,4)-3), $datos_compra_comprada[0]->empresa);
        $spreadsheet->getSheetByName($sheet)->getStyle('A'.($this->findletter($id_estado_financiero,4)-3))->applyFromArray( $this->stylefont(1));

        //NOMBRE DEL ESTADO FINANCIERO
        $spreadsheet->getSheetByName($sheet)->setCellValue('A'.($this->findletter($id_estado_financiero,4)-2), $name_estado_financiero);
        $spreadsheet->getSheetByName($sheet)->getStyle('A'.($this->findletter($id_estado_financiero,4)-2))->applyFromArray($this->stylefont(1));

        //DATOS CONSULTORIA COMPRADA
        $consult_plantilla=ConsultoriasCompradas::where('consultorias',$consultoriacomp->consultorias)->first();
        $periodos=$consult_plantilla->num_periodos;
        $now = new \DateTime();
        $resta=$now->format('Y')-$periodos;



        /*
            1 LETRA FORMULA
            2 LETRA CUENTA
            3 NUMERO FORMULA
            4 NUMERO CUENTA
            3 RANGO INICIAL
            4 RANGO FINAL
        */

        $letra=$this->findletter($id_estado_financiero,1);
        //$letra="E";
        $c=$this->findletter($id_estado_financiero,4)-2;
        $i=$this->findletter($id_estado_financiero,4)-2;
        //$c=5;//$i=5;
        
        for ($contador=0; $contador < $periodos+1; $contador++) { //+1 por  el año presente
           
            $spreadsheet->getSheetByName($sheet)->setCellValue($letra.$c, $resta+$contador); $spreadsheet->getSheetByName($sheet)->getStyle($letra.$c)->applyFromArray($this->stylefont(4));
            $letra++;
        }

        
        
        $inventario_inicial;
        $inventario_final;
        $variable_tmp="";


        foreach($usuario as $valor) {
            if(strpos($valor->name,'.')){
                //SI TIENE SUBCUENTA                             CUENTAS
                //CADENA ---> Ingresos.Ventas Nacionales
                $subcuenta = substr($valor->name, strpos($valor->name,'.')+1);//Ventas Nacionales
                $cuenta = substr($valor->name, 0, strpos($valor->name,'.')); // Ingresos
                
                    //CAPTURAR LA CELDA ANTERIOR COMPARADA CON LA SUBCUENTA
                    if( $variable_tmp==$cuenta ){
                        $spreadsheet->getSheetByName($sheet)->setCellValue($valor->posicion_cuenta, $subcuenta);             
                    } else{
                        $variable_tmp=$cuenta;
                        $spreadsheet->getSheetByName($sheet)->setCellValue($valor->posicion_cuenta, $subcuenta);
                    }
            }else{
                //SI NO TIENE SUBCUENTA
                $spreadsheet->getSheetByName($sheet)->setCellValue($valor->posicion_cuenta, $valor->name);
                $spreadsheet->getSheetByName($sheet)->getStyle($valor->posicion_cuenta)->applyFromArray($this->stylefont(3));
            }

            //PERIODO
            $letra_Inicial=  substr($valor->posicion_formula, 0, 1);
            $numero_Inicial=  substr($valor->posicion_formula, 1, strlen($valor->posicion_formula));
            $formulinita=$valor->formula;

            if($valor->formula!=""){
                preg_match_all('/^=([A-Z])|[!]+([A-Z])|[:]+([A-Z])|[(]+([A-Z])+$/', $valor->formula, $matches, PREG_SET_ORDER);
                $cadena_obj=end($matches)[0];//OBTIENE LA VARIABLE
                $letra=  substr($cadena_obj, 1, 2);//OBTENGO SOLO LA LETRA
                $var="!".$letra; $variable_anterior="!".$letra;  
                $variable2_anterior=":".$letra; $var2=":".$letra;$variable3_anterior="=".$letra; $var3="=".$letra;
                $variable4_anterior="(".$letra; $var4="(".$letra;$variable5_anterior="+".$letra; $var5="+".$letra;
                $variable6_anterior="-".$letra; $var6="-".$letra;$variable7_anterior="/".$letra; $var7="/".$letra;
                $variable8_anterior="*".$letra; $var8="*".$letra;
            }else{
                $variable_anterior="!H";  $var="!H"; $variable2_anterior=":H"; $var2=":H";$variable3_anterior="=H"; $var3="=H";
                $variable4_anterior="(H"; $var4="(H";$variable5_anterior="+H"; $var5="+H";$variable6_anterior="-H"; $var6="-H";
                $variable7_anterior="/H"; $var7="/H";$variable8_anterior="*H"; $var8="*H";

                
            }
            for ($contador=0; $contador < $periodos+1; $contador++) { //+1 por  el año presente
               
                $spreadsheet->getSheetByName($sheet)->setCellValue( $letra_Inicial.$numero_Inicial, $formulinita);
                //$spreadsheet->getSheetByName($sheet)->getStyle( $letra_Inicial.$numero_Inicial)->applyFromArray($styleArrayTotales);

                $var++; $var2++;$var3++;$var4++;$var5++;$var6++;$var7++;$var8++;
                $letra_Inicial++;
                $formulinita = str_replace($variable_anterior, $var, $formulinita);
                $formulinita = str_replace($variable2_anterior, $var2, $formulinita);
                $formulinita = str_replace($variable3_anterior, $var3, $formulinita);
                $formulinita = str_replace($variable4_anterior, $var4, $formulinita);
                $formulinita = str_replace($variable5_anterior, $var5, $formulinita);
                $formulinita = str_replace($variable6_anterior, $var6, $formulinita);
                $formulinita = str_replace($variable7_anterior, $var7, $formulinita);
                $formulinita = str_replace($variable8_anterior, $var8, $formulinita);
                $variable_anterior++; $variable2_anterior++;$variable3_anterior++;$variable4_anterior++;$variable5_anterior++;$variable6_anterior++;$variable7_anterior++;$variable8_anterior++;

            }
            $i++;
          
        }  
        $spreadsheet->getSheetByName($sheet)->getColumnDimension('A')->setWidth(1);
        $spreadsheet->getSheetByName($sheet)->getColumnDimension('B')->setWidth(1);
        $spreadsheet->getSheetByName($sheet)->getColumnDimension('C')->setWidth(55);

    
        //INDICES////////////////////////////////////////////////////////

        //$Indices = Indice::where('estadosfinancieros_id',$id_estado_financiero)->get();
        $Indices = Indice::where('estadosfinancieros_id',$id_estado_financiero)
        ->whereIn('id', $compra_indice)->get();


        foreach($Indices as $indice){
            $spreadsheet->getSheetByName($sheet)->setCellValue($indice->posicion_cuenta, $indice->name);

            $letra_Inicial=  substr($indice->posicion_formula, 0, 1);
            $numero_Inicial=  substr($indice->posicion_formula, 1, strlen($valor->posicion_formula));
            $formulinita=$indice->formula;


            if($indice->formula!=""){
                preg_match_all('/^=([A-Z])|[!]+([A-Z])|[:]+([A-Z])|[(]+([A-Z])+$/', $indice->formula, $matches, PREG_SET_ORDER);
                $cadena_obj=end($matches)[0];//OBTIENE LA VARIABLE
                $letra=  substr($cadena_obj, 1, 2);//OBTENGO SOLO LA LETRA
                $var="!".$letra; $variable_anterior="!".$letra;$variable2_anterior=":".$letra; $var2=":".$letra;$variable3_anterior="=".$letra; $var3="=".$letra;
                $variable4_anterior="(".$letra; $var4="(".$letra;$variable5_anterior="+".$letra; $var5="+".$letra;$variable6_anterior="-".$letra; $var6="-".$letra;
                $variable7_anterior="/".$letra; $var7="/".$letra;$variable8_anterior="*".$letra; $var8="*".$letra;
            }else{
                $variable_anterior="!H";  $var="!H"; $variable2_anterior=":H"; $var2=":H";$variable3_anterior="=H"; $var3="=H";
                $variable4_anterior="(H"; $var4="(H";$variable5_anterior="+H"; $var5="+H";$variable6_anterior="-H"; $var6="+-";
                $variable7_anterior="/H"; $var7="/H";$variable8_anterior="*H"; $var8="*H";
            }

            for ($contador=0; $contador < $periodos+1; $contador++) {
            
                $spreadsheet->getSheetByName($sheet)->setCellValue( $letra_Inicial.$numero_Inicial, $formulinita);
               // $spreadsheet->getSheetByName($sheet)->getStyle( $letra_Inicial.$numero_Inicial)->applyFromArray($styleArrayTotales);
                $var++; $var2++;$var3++;$var4++;$var5++;$var6++;$var7++;$var8++;
                $letra_Inicial++;
                $formulinita = str_replace($variable_anterior, $var, $formulinita);
                $formulinita = str_replace($variable2_anterior, $var2, $formulinita);
                $formulinita = str_replace($variable3_anterior, $var3, $formulinita);
                $formulinita = str_replace($variable4_anterior, $var4, $formulinita);
                $formulinita = str_replace($variable5_anterior, $var5, $formulinita);
                $formulinita = str_replace($variable6_anterior, $var6, $formulinita);
                $formulinita = str_replace($variable7_anterior, $var7, $formulinita);
                $formulinita = str_replace($variable8_anterior, $var8, $formulinita);
                $variable_anterior++; $variable2_anterior++;$variable3_anterior++;$variable4_anterior++;$variable5_anterior++;$variable6_anterior++;$variable7_anterior++;$variable8_anterior++;

            }            
        }
        //INDICES////////////////////////////////////////////////////////

        $writer->setPreCalculateFormulas(true);
        $writer->save($inputFileName);

      
    }

    public function procesar_ECP(ConsultoriasCompradas $consultoria,$sheet,$id_estado_financiero,$name_estado_financiero){//ESTADO  DE COSTOS DE PRODUCCIÓN
        $inputFileType = 'Xlsx';
        $inputFileName = 'uploads/'.$consultoria->archivo;


        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setIncludeCharts(true); 
        $spreadsheet = $reader->load($inputFileName);
        $writer = new Xlsx($spreadsheet);

        $usuario = Cuentas::where('id_estado_financiero',$id_estado_financiero)->get();

        if(empty($usuario)){
            Flash::error('mensaje error');
            return redirect()->back();
        }

        $consultoriacomp = ConsultoriasCompradas::find($consultoria->id);

        $datos_compra_comprada= ConsultoriasCompradas::cliente_ById($consultoriacomp->datos_compra);

        //ESTILOS

        //DATOS EMPRESA
        $spreadsheet->getSheetByName($sheet)->setCellValue('A'.($this->findletter($id_estado_financiero,4)-3), $datos_compra_comprada[0]->empresa);
        $spreadsheet->getSheetByName($sheet)->getStyle('A'.($this->findletter($id_estado_financiero,4)-3))->applyFromArray( $this->stylefont(1));

        //NOMBRE DEL ESTADO FINANCIERO
        $spreadsheet->getSheetByName($sheet)->setCellValue('A'.($this->findletter($id_estado_financiero,4)-2), $name_estado_financiero);
        $spreadsheet->getSheetByName($sheet)->getStyle('A'.($this->findletter($id_estado_financiero,4)-2))->applyFromArray($this->stylefont(1));

    
        //DATOS CONSULTORIA COMPRADA
        $consult_plantilla=ConsultoriasCompradas::where('consultorias',$consultoriacomp->consultorias)->first();
        $periodos=$consult_plantilla->num_periodos;
        $now = new \DateTime();
        $resta=$now->format('Y')-$periodos;
        
        /*
            1 LETRA FORMULA
            2 LETRA CUENTA
            3 NUMERO FORMULA
            4 NUMERO CUENTA
            3 RANGO INICIAL
            4 RANGO FINAL
        */
        $letra=$this->findletter($id_estado_financiero,1);
        //$letra="E";
        $c=$this->findletter($id_estado_financiero,4)-2;
        $i=$this->findletter($id_estado_financiero,4)-2;
        //$c=5;//$i=5;


        for ($contador=0; $contador < $periodos+1; $contador++) { //+1 por  el año presente
           
            $spreadsheet->getSheetByName($sheet)->setCellValue($letra.$c, $resta+$contador); $spreadsheet->getSheetByName($sheet)->getStyle($letra.$c)->applyFromArray($this->stylefont(4));
            $letra++;
        }


        //$i=93;
        $inventario_inicial;
        $inventario_final;
        $variable_tmp="";


          foreach($usuario as $valor) {
            if(strpos($valor->name,'.')){
                //SI TIENE SUBCUENTA                             CUENTAS
                //CADENA ---> Ingresos.Ventas Nacionales
                $subcuenta = substr($valor->name, strpos($valor->name,'.')+1);//Ventas Nacionales
                $cuenta = substr($valor->name, 0, strpos($valor->name,'.')); // Ingresos
                
                //CAPTURAR LA CELDA ANTERIOR COMPARADA CON LA SUBCUENTA
                if( $variable_tmp==$cuenta ){
                    $spreadsheet->getSheetByName($sheet)->setCellValue($valor->posicion_cuenta, $subcuenta);
                                    
                } else{
                 //   $spreadsheet->getSheetByName($sheet)->setCellValue($valor->posicion_cuenta, $cuenta);
                    $variable_tmp=$cuenta;

                   // $spreadsheet->getSheetByName($sheet)->getStyle($valor->posicion_cuenta)->applyFromArray($styleArrayTitle);

                   //$i++;
                    $spreadsheet->getSheetByName($sheet)->setCellValue($valor->posicion_cuenta, $subcuenta);
                }
                    
            }else{
                //SI NO TIENE SUBCUENTA
                //$i++;
                $spreadsheet->getSheetByName($sheet)->setCellValue($valor->posicion_cuenta, $valor->name);
                $spreadsheet->getSheetByName($sheet)->getStyle($valor->posicion_cuenta)->applyFromArray($this->stylefont(3));
            }

            //PERIODO
            $letra_Inicial=  substr($valor->posicion_formula, 0, 1);
            $numero_Inicial=  substr($valor->posicion_formula, 1, strlen($valor->posicion_formula));
            $formulinita=$valor->formula;

            $var="!H"; $variable_anterior="!H";  $variable2_anterior=":H"; $var2=":H";
            for ($contador=0; $contador < $periodos+1; $contador++) { //+1 por  el año presente
               
               
                $spreadsheet->getSheetByName($sheet)->setCellValue( $letra_Inicial.$numero_Inicial, $formulinita);
                $var++; $var2++;
                $letra_Inicial++;
                $formulinita = str_replace($variable_anterior, $var, $formulinita);
                $formulinita = str_replace($variable2_anterior, $var2, $formulinita);
                $variable_anterior++; $variable2_anterior++;

            }
            $i++;

          
        }  
        $spreadsheet->getSheetByName($sheet)->getColumnDimension('A')->setWidth(1);
        $spreadsheet->getSheetByName($sheet)->getColumnDimension('B')->setWidth(1);
        $spreadsheet->getSheetByName($sheet)->getColumnDimension('C')->setWidth(55);
         
        
        //GUARDAR EXEL
        $writer->setPreCalculateFormulas(true);
        $writer->save($inputFileName);
    }

    public function procesar_ESF(ConsultoriasCompradas $consultoria,$sheet,$id_estado_financiero,$name_estado_financiero, $formulario,$compra_indice){// ESTADOS DE SITUACION FINANCIERA
        $inputFileType = 'Xlsx';
        $inputFileName = 'uploads/'.$consultoria->archivo;


        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setIncludeCharts(true); 
        $spreadsheet = $reader->load($inputFileName);
        $writer = new Xlsx($spreadsheet);

        $usuario = Cuentas::where('id_estado_financiero',$id_estado_financiero)->get();

        if(empty($usuario)){
            Flash::error('mensaje error');
            return redirect()->back();
        }

        $consultoriacomp = ConsultoriasCompradas::find($consultoria->id);

        $datos_compra_comprada= ConsultoriasCompradas::cliente_ById($consultoriacomp->datos_compra);

        //ESTILOS


        //DATOS EMPRESA
        $spreadsheet->getSheetByName($sheet)->setCellValue('A'.($this->findletter($id_estado_financiero,4)-3), $datos_compra_comprada[0]->empresa);
        $spreadsheet->getSheetByName($sheet)->getStyle('A'.($this->findletter($id_estado_financiero,4)-3))->applyFromArray( $this->stylefont(1));

        //NOMBRE DEL ESTADO FINANCIERO
        $spreadsheet->getSheetByName($sheet)->setCellValue('A'.($this->findletter($id_estado_financiero,4)-2), $name_estado_financiero);
        $spreadsheet->getSheetByName($sheet)->getStyle('A'.($this->findletter($id_estado_financiero,4)-2))->applyFromArray($this->stylefont(1));


        /*//DATOS EMPRESA
        $spreadsheet->getSheetByName($sheet)->setCellValue('A142', $datos_compra_comprada[0]->empresa);
        $spreadsheet->getSheetByName($sheet)->getStyle('A142')->applyFromArray($this->stylefont(1));


        //NOMBRE DEL ESTADO FINANCIERO
        $spreadsheet->getSheetByName($sheet)->setCellValue('A143', $name_estado_financiero);
        $spreadsheet->getSheetByName($sheet)->getStyle('A143')->applyFromArray($this->stylefont(1)); */
        
        //DATOS CONSULTORIA COMPRADA
        $consult_plantilla=ConsultoriasCompradas::where('consultorias',$consultoriacomp->consultorias)->first();
        $periodos=$consult_plantilla->num_periodos;
        $now = new \DateTime();
        $resta=$now->format('Y')-$periodos;


        /*
            1 LETRA FORMULA
            2 LETRA CUENTA
            3 NUMERO FORMULA
            4 NUMERO CUENTA
            3 RANGO INICIAL
            4 RANGO FINAL
        */
        $letra=$this->findletter($id_estado_financiero,1);
        //$letra="E";
        $c=$this->findletter($id_estado_financiero,4)-2;
        $i=$this->findletter($id_estado_financiero,4)-2;
        //$c=144;//$i=144;

        for ($contador=0; $contador < $periodos+1; $contador++) { //+1 por  el año presente
           
            $spreadsheet->getSheetByName($sheet)->setCellValue($letra.$c, $resta+$contador); 
            $spreadsheet->getSheetByName($sheet)->getStyle($letra.$c)->applyFromArray($this->stylefont(4));
            $letra++;

            if($contador == $periodos){

                for ($contador_sub=1; $contador_sub < $periodos+1; $contador_sub++) { //+1 por  el año presente
           
                    $spreadsheet->getSheetByName($sheet)->setCellValue($letra.$c, $now->format('Y')+$contador_sub); 
                    $spreadsheet->getSheetByName($sheet)->getStyle($letra.$c)->applyFromArray($this->stylefont(5));
                    $letra++;
                }

            }

        }


        //$i=144;
        $inventario_inicial;
        $inventario_final;
        $variable_tmp="";


          foreach($usuario as $valor) {
            if(strpos($valor->name,'.')){
                //SI TIENE SUBCUENTA                             CUENTAS
                //CADENA ---> Ingresos.Ventas Nacionales
                $subcuenta = substr($valor->name, strpos($valor->name,'.')+1);//Ventas Nacionales
                $cuenta = substr($valor->name, 0, strpos($valor->name,'.')); // Ingresos
                
                if(strpos($subcuenta,'.')){//TIENE MÁS DE DOS CUENTAS
                  //  dd($valor->name, $subcuenta, strpos($subcuenta,'.'),substr($subcuenta, strpos($subcuenta,'.')+1));
                    $sub_subcuenta = substr($subcuenta, strpos($subcuenta,'.')+1);
                    $spreadsheet->getSheetByName($sheet)->setCellValue($valor->posicion_cuenta, $sub_subcuenta);    

                }else{
                    //CAPTURAR LA CELDA ANTERIOR COMPARADA CON LA SUBCUENTA
                    if( $variable_tmp==$cuenta ){
                        $spreadsheet->getSheetByName($sheet)->setCellValue($valor->posicion_cuenta, $subcuenta);             
                    } else{
                        $variable_tmp=$cuenta;
                        $spreadsheet->getSheetByName($sheet)->setCellValue($valor->posicion_cuenta, $subcuenta);
                    }
                }

               
               
            }else{
                //SI NO TIENE SUBCUENTA
                $spreadsheet->getSheetByName($sheet)->setCellValue($valor->posicion_cuenta, $valor->name);
                $spreadsheet->getSheetByName($sheet)->getStyle($valor->posicion_cuenta)->applyFromArray($this->stylefont(3));
            }

            //PERIODO
            $letra_Inicial=  substr($valor->posicion_formula, 0, 1);
            $numero_Inicial=  substr($valor->posicion_formula, 1, strlen($valor->posicion_formula));
            $formulinita=$valor->formula;

            if($valor->formula!=""){
                
                preg_match_all('/^=([A-Z])|[!]+([A-Z])|[:]+([A-Z])|[(]+([A-Z])+$/', $valor->formula, $matches, PREG_SET_ORDER);
                $cadena_obj=end($matches)[0];//OBTIENE LA VARIABLE
                $letra=  substr($cadena_obj, 1, 2);//OBTENGO SOLO LA LETRA
                $var="!".$letra; $variable_anterior="!".$letra;$variable2_anterior=":".$letra; $var2=":".$letra;$variable3_anterior="=".$letra; $var3="=".$letra;
                $variable4_anterior="(".$letra; $var4="(".$letra;$variable5_anterior="+".$letra; $var5="+".$letra;$variable6_anterior="-".$letra; $var6="-".$letra;
                $variable7_anterior="/".$letra; $var7="/".$letra;$variable8_anterior="*".$letra; $var8="*".$letra;
            }else{
                $variable_anterior="!H";  $var="!H"; $variable2_anterior=":H"; $var2=":H";
                $variable3_anterior="=H"; $var3="=H";$variable4_anterior="(H"; $var4="(H";
                $variable5_anterior="+H"; $var5="+H";$variable6_anterior="-H"; $var6="-H";
                $variable7_anterior="/H"; $var7="/H";$variable8_anterior="*H"; $var8="*H";
            }
            for ($contador=0; $contador < $periodos+1; $contador++) { //+1 por  el año presente
               

                $spreadsheet->getSheetByName($sheet)->setCellValue( $letra_Inicial.$numero_Inicial, $formulinita);
                $var++; $var2++;$var3++;$var4++;$var5++;$var6++;$var7++;$var8++;
                $letra_Inicial++;
                $formulinita = str_replace($variable_anterior, $var, $formulinita);$formulinita = str_replace($variable2_anterior, $var2, $formulinita);
                $formulinita = str_replace($variable3_anterior, $var3, $formulinita);$formulinita = str_replace($variable4_anterior, $var4, $formulinita);
                $formulinita = str_replace($variable5_anterior, $var5, $formulinita);$formulinita = str_replace($variable6_anterior, $var6, $formulinita);
                $formulinita = str_replace($variable7_anterior, $var7, $formulinita);$formulinita = str_replace($variable8_anterior, $var8, $formulinita);
                $variable_anterior++; $variable2_anterior++;$variable3_anterior++;$variable4_anterior++;$variable5_anterior++;$variable6_anterior++;$variable7_anterior++;$variable8_anterior++;


                if($contador == $periodos){
                        if(!strpos($valor->name,'.')){//NO TIENE NIVELES Y SU POSICIÓN CUENTA SEA EN LA CELDA B
                        for ($contador_sub=1; $contador_sub < $periodos+1; $contador_sub++) { //+1 por  el año presente
                            $spreadsheet->getSheetByName($sheet)->setCellValue( $letra_Inicial.$numero_Inicial, $formulinita);
                            //$spreadsheet->getSheetByName($sheet)->getStyle( $letra_Inicial.$numero_Inicial)->applyFromArray($styleArrayTotales);
                            $var++; $var2++;$var3++;$var4++;$var5++;$var6++;$var7++;$var8++;
                            $letra_Inicial++;
                            $formulinita = str_replace($variable_anterior, $var, $formulinita);$formulinita = str_replace($variable2_anterior, $var2, $formulinita);$formulinita = str_replace($variable3_anterior, $var3, $formulinita);
                            $formulinita = str_replace($variable4_anterior, $var4, $formulinita);$formulinita = str_replace($variable5_anterior, $var5, $formulinita);
                            $formulinita = str_replace($variable6_anterior, $var6, $formulinita);$formulinita = str_replace($variable7_anterior, $var7, $formulinita);
                            $formulinita = str_replace($variable8_anterior, $var8, $formulinita);
                            $variable_anterior++; $variable2_anterior++;$variable3_anterior++;$variable4_anterior++;$variable5_anterior++;$variable6_anterior++;$variable7_anterior++;$variable8_anterior++;

                        }
        
                    }
                }

            }
            $i++;

          
        }  
        $spreadsheet->getSheetByName($sheet)->getColumnDimension('A')->setWidth(1);
        $spreadsheet->getSheetByName($sheet)->getColumnDimension('B')->setWidth(1);
        $spreadsheet->getSheetByName($sheet)->getColumnDimension('C')->setWidth(55);



        //INDICES////////////////////////////////////////////////////////



        /*if(strtoupper($formulario->respuesta2) == 'NO' && strtoupper($formulario->respuesta3) == 'SI'){
            $Indices = Indice::where('estadosfinancieros_id',$id_estado_financiero)->whereNotIn('name', ['Días de Cobro Exportación','Días de Pago Importaciones'])->get();
        }elseif (strtoupper($formulario->respuesta2) == 'SI' && strtoupper($formulario->respuesta3) == 'NO') {
            $Indices = Indice::where('estadosfinancieros_id',$id_estado_financiero)->whereNotIn('name', ['Días de Cobro Relacionados','Días de Pago Relacionados'])->get();
        }elseif (strtoupper($formulario->respuesta2) == 'NO' && strtoupper($formulario->respuesta3) == 'NO') {
            $Indices = Indice::where('estadosfinancieros_id',$id_estado_financiero)->whereNotIn('name', ['Días de Cobro Exportación','Días de Pago Importaciones','Días de Cobro Relacionados','Días de Pago Relacionados'])->get();
        }
        else{
            $Indices = Indice::where('estadosfinancieros_id',$id_estado_financiero)->get();
        }*/

        $Indices = Indice::where('estadosfinancieros_id',$id_estado_financiero)
        ->whereIn('id', $compra_indice)->get();


        foreach($Indices as $indice){

        //dd(strtoupper($formulario->respuesta2));    
                /* if( (strtoupper($formulario->respuesta2) == 'SI') || ( strtoupper($formulario->respuesta2) == 'NO' &&  ($indice->name != 'Días de Cobro Exportación' ) ) || (strtoupper($formulario->respuesta2) == 'NO' &&  ($indice->name != 'Días de Cobro Exportación' && $indice->name != 'Días de Cobro Relacionados') ))
                { */
                    
                    $spreadsheet->getSheetByName($sheet)->setCellValue($indice->posicion_cuenta, $indice->name);
                    $letra_Inicial=  substr($indice->posicion_formula, 0, 1);
                    $numero_Inicial=  substr($indice->posicion_formula, 1, strlen($valor->posicion_formula));
                    $formulinita=$indice->formula;
    
    
                    if($indice->formula!=""){
                        preg_match_all('/^=([A-Z])|[!]+([A-Z])|[:]+([A-Z])|[(]+([A-Z])+$/', $indice->formula, $matches, PREG_SET_ORDER);
                        $cadena_obj=end($matches)[0];//OBTIENE LA VARIABLE
                        $letra=  substr($cadena_obj, 1, 2);//OBTENGO SOLO LA LETRA
                        $var="!".$letra; $variable_anterior="!".$letra;$variable2_anterior=":".$letra; $var2=":".$letra;$variable3_anterior="=".$letra; $var3="=".$letra;
                        $variable4_anterior="(".$letra; $var4="(".$letra;$variable5_anterior="+".$letra; $var5="+".$letra;$variable6_anterior="-".$letra; $var6="-".$letra;
                        $variable7_anterior="/".$letra; $var7="/".$letra;$variable8_anterior="*".$letra; $var8="*".$letra;
                    }else{
                        $variable_anterior="!H";  $var="!H"; $variable2_anterior=":H"; $var2=":H";$variable3_anterior="=H"; $var3="=H";
                        $variable4_anterior="(H"; $var4="(H";$variable5_anterior="+H"; $var5="+H";$variable6_anterior="-H"; $var6="+-";
                        $variable7_anterior="/H"; $var7="/H";$variable8_anterior="*H"; $var8="*H";
                    }
    
                    for ($contador=0; $contador < $periodos+1; $contador++) {
                    
                        $spreadsheet->getSheetByName($sheet)->setCellValue( $letra_Inicial.$numero_Inicial, $formulinita);
                        //$spreadsheet->getSheetByName($sheet)->getStyle( $letra_Inicial.$numero_Inicial)->applyFromArray($styleArrayTotales);
    
                        $var++; $var2++;$var3++;$var4++;$var5++;$var6++;$var7++;$var8++;
                        $letra_Inicial++;
                        $formulinita = str_replace($variable_anterior, $var, $formulinita);
                        $formulinita = str_replace($variable2_anterior, $var2, $formulinita);
                        $formulinita = str_replace($variable3_anterior, $var3, $formulinita);
                        $formulinita = str_replace($variable4_anterior, $var4, $formulinita);
                        $formulinita = str_replace($variable5_anterior, $var5, $formulinita);
                        $formulinita = str_replace($variable6_anterior, $var6, $formulinita);
                        $formulinita = str_replace($variable7_anterior, $var7, $formulinita);
                        $formulinita = str_replace($variable8_anterior, $var8, $formulinita);
                        $variable_anterior++; $variable2_anterior++;$variable3_anterior++;$variable4_anterior++;$variable5_anterior++;$variable6_anterior++;$variable7_anterior++;$variable8_anterior++;
    
                    }
                /* } */
                
           

        }
        //INDICES////////////////////////////////////////////////////////


        $writer->setPreCalculateFormulas(true);
        $writer->save($inputFileName);

      
    }

    public function procesar_ESFR(ConsultoriasCompradas $consultoria,$sheet,$id_estado_financiero,$name_estado_financiero,$compra_indice){//ESTADOS DE SITUACIÓN FINANCIERA RESUMIDOS
        $inputFileType = 'Xlsx';
        $inputFileName = 'uploads/'.$consultoria->archivo;


        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setIncludeCharts(true); 
        $spreadsheet = $reader->load($inputFileName);
        $writer = new Xlsx($spreadsheet);

        $usuario = Cuentas::where('id_estado_financiero',$id_estado_financiero)->get();

        if(empty($usuario)){
            Flash::error('mensaje error');
            return redirect()->back();
        }

        $consultoriacomp = ConsultoriasCompradas::find($consultoria->id);

        $datos_compra_comprada= ConsultoriasCompradas::cliente_ById($consultoriacomp->datos_compra);

        //ESTILOS


        //DATOS EMPRESA
        $spreadsheet->getSheetByName($sheet)->setCellValue('A'.($this->findletter($id_estado_financiero,4)-3), $datos_compra_comprada[0]->empresa);
        $spreadsheet->getSheetByName($sheet)->getStyle('A'.($this->findletter($id_estado_financiero,4)-3))->applyFromArray( $this->stylefont(1));

        //NOMBRE DEL ESTADO FINANCIERO
        $spreadsheet->getSheetByName($sheet)->setCellValue('A'.($this->findletter($id_estado_financiero,4)-2), $name_estado_financiero);
        $spreadsheet->getSheetByName($sheet)->getStyle('A'.($this->findletter($id_estado_financiero,4)-2))->applyFromArray($this->stylefont(1));


        /*//DATOS EMPRESA
        $spreadsheet->getSheetByName($sheet)->setCellValue('A254', $datos_compra_comprada[0]->empresa);
        $spreadsheet->getSheetByName($sheet)->getStyle('A254')->applyFromArray($this->stylefont(1));


        //NOMBRE DEL ESTADO FINANCIERO
        $spreadsheet->getSheetByName($sheet)->setCellValue('A255', $name_estado_financiero);
        $spreadsheet->getSheetByName($sheet)->getStyle('A255')->applyFromArray($this->stylefont(1)); */
        
        //DATOS CONSULTORIA COMPRADA
        $consult_plantilla=ConsultoriasCompradas::where('consultorias',$consultoriacomp->consultorias)->first();
        $periodos=$consult_plantilla->num_periodos;
        $now = new \DateTime();
        $resta=$now->format('Y')-$periodos;

        /*
            1 LETRA FORMULA
            2 LETRA CUENTA
            3 NUMERO FORMULA
            4 NUMERO CUENTA
            3 RANGO INICIAL
            4 RANGO FINAL
        */
        $letra=$this->findletter($id_estado_financiero,1);
        //$letra="E";
        $c=$this->findletter($id_estado_financiero,4)-2;
        $i=$this->findletter($id_estado_financiero,4)-2;
        //$c=256;//$i=256;

        for ($contador=0; $contador < $periodos+1; $contador++) { //+1 por  el año presente
           
            $spreadsheet->getSheetByName($sheet)->setCellValue($letra.$c, $resta+$contador); 
            $spreadsheet->getSheetByName($sheet)->getStyle($letra.$c)->applyFromArray($this->stylefont(4));
            $letra++;

            if($contador == $periodos){

                for ($contador_sub=1; $contador_sub < $periodos+1; $contador_sub++) { //+1 por  el año presente
           
                    $spreadsheet->getSheetByName($sheet)->setCellValue($letra.$c, $now->format('Y')+$contador_sub); 
                    $spreadsheet->getSheetByName($sheet)->getStyle($letra.$c)->applyFromArray($this->stylefont(5));
                    $letra++;
                }

            }

        }


        //$i=256;
        $inventario_inicial;
        $inventario_final;
        $variable_tmp="";


          foreach($usuario as $valor) {
            if(strpos($valor->name,'.')){
                //SI TIENE SUBCUENTA                             CUENTAS
                //CADENA ---> Ingresos.Ventas Nacionales
                $subcuenta = substr($valor->name, strpos($valor->name,'.')+1);//Ventas Nacionales
                $cuenta = substr($valor->name, 0, strpos($valor->name,'.')); // Ingresos
                
                if(strpos($subcuenta,'.')){//TIENE MÁS DE DOS CUENTAS
                    $sub_subcuenta = substr($subcuenta, strpos($subcuenta,'.')+1);
                    $spreadsheet->getSheetByName($sheet)->setCellValue($valor->posicion_cuenta, $sub_subcuenta);    

                }else{
                    //CAPTURAR LA CELDA ANTERIOR COMPARADA CON LA SUBCUENTA
                    if( $variable_tmp==$cuenta ){
                        $spreadsheet->getSheetByName($sheet)->setCellValue($valor->posicion_cuenta, $subcuenta);             
                    } else{
                        $variable_tmp=$cuenta;
                        $spreadsheet->getSheetByName($sheet)->setCellValue($valor->posicion_cuenta, $subcuenta);
                    }
                }

               
               
            }else{
                //SI NO TIENE SUBCUENTA
                $spreadsheet->getSheetByName($sheet)->setCellValue($valor->posicion_cuenta, $valor->name);
                $spreadsheet->getSheetByName($sheet)->getStyle($valor->posicion_cuenta)->applyFromArray($this->stylefont(3));
            }

            //PERIODO
            $letra_Inicial=  substr($valor->posicion_formula, 0, 1);
            $numero_Inicial=  substr($valor->posicion_formula, 1, strlen($valor->posicion_formula));
            $formulinita=$valor->formula;

            if($valor->formula!=""){
                preg_match_all('/^=([A-Z])|[!]+([A-Z])|[:]+([A-Z])|[(]+([A-Z])+$/', $valor->formula, $matches, PREG_SET_ORDER);
                $cadena_obj=end($matches)[0];//OBTIENE LA VARIABLE
                $letra=  substr($cadena_obj, 1, 2);//OBTENGO SOLO LA LETRA
                $var="!".$letra; $variable_anterior="!".$letra;  
                $variable2_anterior=":".$letra; $var2=":".$letra;$variable3_anterior="=".$letra; $var3="=".$letra;
                $variable4_anterior="(".$letra; $var4="(".$letra;$variable5_anterior="+".$letra; $var5="+".$letra;
                $variable6_anterior="-".$letra; $var6="-".$letra;$variable7_anterior="/".$letra; $var7="/".$letra;
                $variable8_anterior="*".$letra; $var8="*".$letra;
            }else{
                $variable_anterior="!H";  $var="!H"; $variable2_anterior=":H"; $var2=":H";
                $variable3_anterior="=H"; $var3="=H";$variable4_anterior="(H"; $var4="(H";
                $variable5_anterior="+H"; $var5="+H";$variable6_anterior="-H"; $var6="-H";
                $variable7_anterior="/H"; $var7="/H";$variable8_anterior="*H"; $var8="*H";   
            }
            for ($contador=0; $contador < $periodos+1; $contador++) { //+1 por  el año presente
               
                $spreadsheet->getSheetByName($sheet)->setCellValue( $letra_Inicial.$numero_Inicial, $formulinita);
                $var++; $var2++;$var3++;$var4++;$var5++;$var6++;$var7++;$var8++;
                $letra_Inicial++;
                $formulinita = str_replace($variable_anterior, $var, $formulinita);$formulinita = str_replace($variable2_anterior, $var2, $formulinita);
                $formulinita = str_replace($variable3_anterior, $var3, $formulinita);$formulinita = str_replace($variable4_anterior, $var4, $formulinita);
                $formulinita = str_replace($variable5_anterior, $var5, $formulinita);$formulinita = str_replace($variable6_anterior, $var6, $formulinita);
                $formulinita = str_replace($variable7_anterior, $var7, $formulinita);$formulinita = str_replace($variable8_anterior, $var8, $formulinita);
                $variable_anterior++; $variable2_anterior++;$variable3_anterior++;$variable4_anterior++;$variable5_anterior++;$variable6_anterior++;$variable7_anterior++;$variable8_anterior++;


                if($contador == $periodos){
                        if(!strpos($valor->name,'.')){//NO TIENE NIVELES Y SU POSICIÓN CUENTA SEA EN LA CELDA B
                        for ($contador_sub=1; $contador_sub < $periodos+1; $contador_sub++) { //+1 por  el año presente
                            $spreadsheet->getSheetByName($sheet)->setCellValue( $letra_Inicial.$numero_Inicial, $formulinita);
                           // $spreadsheet->getSheetByName($sheet)->getStyle( $letra_Inicial.$numero_Inicial)->applyFromArray($styleArrayTotales);
                            $var++; $var2++;$var3++;$var4++;$var5++;$var6++;$var7++;$var8++;
                            $letra_Inicial++;
                            $formulinita = str_replace($variable_anterior, $var, $formulinita);$formulinita = str_replace($variable2_anterior, $var2, $formulinita);$formulinita = str_replace($variable3_anterior, $var3, $formulinita);
                            $formulinita = str_replace($variable4_anterior, $var4, $formulinita);$formulinita = str_replace($variable5_anterior, $var5, $formulinita);
                            $formulinita = str_replace($variable6_anterior, $var6, $formulinita);$formulinita = str_replace($variable7_anterior, $var7, $formulinita);
                            $formulinita = str_replace($variable8_anterior, $var8, $formulinita);
                            $variable_anterior++; $variable2_anterior++;$variable3_anterior++;$variable4_anterior++;$variable5_anterior++;$variable6_anterior++;$variable7_anterior++;$variable8_anterior++;

                        }
        
                    }
                }

            }
            $i++;

          
        }  
        $spreadsheet->getSheetByName($sheet)->getColumnDimension('A')->setWidth(1);
        $spreadsheet->getSheetByName($sheet)->getColumnDimension('B')->setWidth(1);
        $spreadsheet->getSheetByName($sheet)->getColumnDimension('C')->setWidth(55);



        //INDICES////////////////////////////////////////////////////////
        //$Indices = Indice::where('estadosfinancieros_id',$id_estado_financiero)->get();


        $Indices = Indice::where('estadosfinancieros_id',$id_estado_financiero)
        ->whereIn('id', $compra_indice)->get();


        foreach($Indices as $indice){
            $spreadsheet->getSheetByName($sheet)->setCellValue($indice->posicion_cuenta, $indice->name);

            $letra_Inicial=  substr($indice->posicion_formula, 0, 1);
            $numero_Inicial=  substr($indice->posicion_formula, 1, strlen($valor->posicion_formula));
            $formulinita=$indice->formula;


            if($indice->formula!=""){
                preg_match_all('/^=([A-Z])|[!]+([A-Z])|[:]+([A-Z])|[(]+([A-Z])+$/', $indice->formula, $matches, PREG_SET_ORDER);
                $cadena_obj=end($matches)[0];//OBTIENE LA VARIABLE
                $letra=  substr($cadena_obj, 1, 2);//OBTENGO SOLO LA LETRA
                $var="!".$letra; $variable_anterior="!".$letra;$variable2_anterior=":".$letra; $var2=":".$letra;$variable3_anterior="=".$letra; $var3="=".$letra;
                $variable4_anterior="(".$letra; $var4="(".$letra;$variable5_anterior="+".$letra; $var5="+".$letra;$variable6_anterior="-".$letra; $var6="-".$letra;
                $variable7_anterior="/".$letra; $var7="/".$letra;$variable8_anterior="*".$letra; $var8="*".$letra;
            }else{
                $variable_anterior="!H";  $var="!H"; $variable2_anterior=":H"; $var2=":H";$variable3_anterior="=H"; $var3="=H";
                $variable4_anterior="(H"; $var4="(H";$variable5_anterior="+H"; $var5="+H";$variable6_anterior="-H"; $var6="+-";
                $variable7_anterior="/H"; $var7="/H";$variable8_anterior="*H"; $var8="*H";
            }

            for ($contador=0; $contador < $periodos+1; $contador++) {
            
                $spreadsheet->getSheetByName($sheet)->setCellValue( $letra_Inicial.$numero_Inicial, $formulinita);
                //$spreadsheet->getSheetByName($sheet)->getStyle( $letra_Inicial.$numero_Inicial)->applyFromArray($styleArrayTotales);
                $var++; $var2++;$var3++;$var4++;$var5++;$var6++;$var7++;$var8++;
                $letra_Inicial++;
                $formulinita = str_replace($variable_anterior, $var, $formulinita);
                $formulinita = str_replace($variable2_anterior, $var2, $formulinita);
                $formulinita = str_replace($variable3_anterior, $var3, $formulinita);
                $formulinita = str_replace($variable4_anterior, $var4, $formulinita);
                $formulinita = str_replace($variable5_anterior, $var5, $formulinita);
                $formulinita = str_replace($variable6_anterior, $var6, $formulinita);
                $formulinita = str_replace($variable7_anterior, $var7, $formulinita);
                $formulinita = str_replace($variable8_anterior, $var8, $formulinita);
                $variable_anterior++; $variable2_anterior++;$variable3_anterior++;$variable4_anterior++;$variable5_anterior++;$variable6_anterior++;$variable7_anterior++;$variable8_anterior++;

            }            
        }
        //INDICES////////////////////////////////////////////////////////



            $writer->setPreCalculateFormulas(true);
            $writer->save($inputFileName);

      
    }

    public function procesar_EFEP(ConsultoriasCompradas $consultoria,$sheet,$id_estado_financiero,$name_estado_financiero,$compra_indice){// ESTADOS DE FLUJOS DE EFECTIVO 	
        $inputFileType = 'Xlsx';
        $inputFileName = 'uploads/'.$consultoria->archivo;


        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setIncludeCharts(true); 
        $spreadsheet = $reader->load($inputFileName);
        $writer = new Xlsx($spreadsheet);

        $usuario = Cuentas::where('id_estado_financiero',$id_estado_financiero)->get();

        if(empty($usuario)){
            Flash::error('mensaje error');
            return redirect()->back();
        }

        $consultoriacomp = ConsultoriasCompradas::find($consultoria->id);

        $datos_compra_comprada= ConsultoriasCompradas::cliente_ById($consultoriacomp->datos_compra);

        //ESTILOS

        //DATOS EMPRESA
        $spreadsheet->getSheetByName($sheet)->setCellValue('A'.($this->findletter($id_estado_financiero,4)-3), $datos_compra_comprada[0]->empresa);
        $spreadsheet->getSheetByName($sheet)->getStyle('A'.($this->findletter($id_estado_financiero,4)-3))->applyFromArray( $this->stylefont(1));

        //NOMBRE DEL ESTADO FINANCIERO
        $spreadsheet->getSheetByName($sheet)->setCellValue('A'.($this->findletter($id_estado_financiero,4)-2), $name_estado_financiero);
        $spreadsheet->getSheetByName($sheet)->getStyle('A'.($this->findletter($id_estado_financiero,4)-2))->applyFromArray($this->stylefont(1));

        /*//DATOS EMPRESA
        $spreadsheet->getSheetByName($sheet)->setCellValue('A288', $datos_compra_comprada[0]->empresa);
        $spreadsheet->getSheetByName($sheet)->getStyle('A288')->applyFromArray($this->stylefont(1));


        //NOMBRE DEL ESTADO FINANCIERO
        $spreadsheet->getSheetByName($sheet)->setCellValue('A289',$name_estado_financiero);
        $spreadsheet->getSheetByName($sheet)->getStyle('A289')->applyFromArray($this->stylefont(1)); */

        //DATOS CONSULTORIA COMPRADA
        $consult_plantilla=ConsultoriasCompradas::where('consultorias',$consultoriacomp->consultorias)->first();
        $periodos=$consult_plantilla->num_periodos;
        $now = new \DateTime();
        $resta=$now->format('Y')-$periodos;

        /*
            1 LETRA FORMULA
            2 LETRA CUENTA
            3 NUMERO FORMULA
            4 NUMERO CUENTA
            3 RANGO INICIAL
            4 RANGO FINAL
        */
        $letra=$this->findletter($id_estado_financiero,1);
        //$letra="E";
        $c=$this->findletter($id_estado_financiero,4)-2;
        $i=$this->findletter($id_estado_financiero,4)-2;
        //$c=290;//$i=290;


        for ($contador=0; $contador < $periodos+1; $contador++) { //+1 por  el año presente
           
            $spreadsheet->getSheetByName($sheet)->setCellValue($letra.$c, $resta+$contador); 
            $spreadsheet->getSheetByName($sheet)->getStyle($letra.$c)->applyFromArray($this->stylefont(4));
            $letra++;

            if($contador == $periodos){

                for ($contador_sub=1; $contador_sub < $periodos+1; $contador_sub++) { //+1 por  el año presente
           
                    $spreadsheet->getSheetByName($sheet)->setCellValue($letra.$c, $now->format('Y')+$contador_sub); 
                    $spreadsheet->getSheetByName($sheet)->getStyle($letra.$c)->applyFromArray($this->stylefont(5));
                    $letra++;
                }

            }

        }


        //$i=290;
        $inventario_inicial;
        $inventario_final;
        $variable_tmp="";


          foreach($usuario as $valor) {
            if(strpos($valor->name,'.')){
                //SI TIENE SUBCUENTA                             CUENTAS
                //CADENA ---> Ingresos.Ventas Nacionales
                $subcuenta = substr($valor->name, strpos($valor->name,'.')+1);//Ventas Nacionales
                $cuenta = substr($valor->name, 0, strpos($valor->name,'.')); // Ingresos
                
                if(strpos($subcuenta,'.')){//TIENE MÁS DE DOS CUENTAS
                    $sub_subcuenta = substr($subcuenta, strpos($subcuenta,'.')+1);
                    $spreadsheet->getSheetByName($sheet)->setCellValue($valor->posicion_cuenta, $sub_subcuenta);    

                }else{
                    //CAPTURAR LA CELDA ANTERIOR COMPARADA CON LA SUBCUENTA
                    if( $variable_tmp==$cuenta ){
                        $spreadsheet->getSheetByName($sheet)->setCellValue($valor->posicion_cuenta, $subcuenta);             
                    } else{
                        $variable_tmp=$cuenta;
                        $spreadsheet->getSheetByName($sheet)->setCellValue($valor->posicion_cuenta, $subcuenta);
                    }
                }

               
               
            }else{
                //SI NO TIENE SUBCUENTA
                $spreadsheet->getSheetByName($sheet)->setCellValue($valor->posicion_cuenta, $valor->name);
                $spreadsheet->getSheetByName($sheet)->getStyle($valor->posicion_cuenta)->applyFromArray($this->stylefont(3));
            }

            //PERIODO
            $letra_Inicial=  substr($valor->posicion_formula, 0, 1);
            $numero_Inicial=  substr($valor->posicion_formula, 1, strlen($valor->posicion_formula));
            $formulinita=$valor->formula;

            if($valor->formula!=""){
                preg_match_all('/^=([A-Z])|[!]+([A-Z])|[:]+([A-Z])|[(]+([A-Z])+$/', $valor->formula, $matches, PREG_SET_ORDER);
                $cadena_obj=end($matches)[0];//OBTIENE LA VARIABLE
                $letra=  substr($cadena_obj, 1, 2);//OBTENGO SOLO LA LETRA
                $var="!".$letra; $variable_anterior="!".$letra;  
                $variable2_anterior=":".$letra; $var2=":".$letra;$variable3_anterior="=".$letra; $var3="=".$letra;
                $variable4_anterior="(".$letra; $var4="(".$letra;$variable5_anterior="+".$letra; $var5="+".$letra;
                $variable6_anterior="-".$letra; $var6="-".$letra;$variable7_anterior="/".$letra; $var7="/".$letra;
                $variable8_anterior="*".$letra; $var8="*".$letra;
            }else{
                $variable_anterior="!H";  $var="!H"; $variable2_anterior=":H"; $var2=":H";
                $variable3_anterior="=H"; $var3="=H";$variable4_anterior="(H"; $var4="(H";
                $variable5_anterior="+H"; $var5="+H";$variable6_anterior="-H"; $var6="-H";
                $variable7_anterior="/H"; $var7="/H";$variable8_anterior="*H"; $var8="*H";   
            }
            for ($contador=0; $contador < $periodos+1; $contador++) { //+1 por  el año presente

                $spreadsheet->getSheetByName($sheet)->setCellValue( $letra_Inicial.$numero_Inicial, $formulinita);
                //$spreadsheet->getSheetByName($sheet)->getStyle( $letra_Inicial.$numero_Inicial)->applyFromArray($styleArrayTotales);

                $var++; $var2++;$var3++;$var4++;$var5++;$var6++;$var7++;$var8++;
                $letra_Inicial++;
                $formulinita = str_replace($variable_anterior, $var, $formulinita);$formulinita = str_replace($variable2_anterior, $var2, $formulinita);
                $formulinita = str_replace($variable3_anterior, $var3, $formulinita);$formulinita = str_replace($variable4_anterior, $var4, $formulinita);
                $formulinita = str_replace($variable5_anterior, $var5, $formulinita);$formulinita = str_replace($variable6_anterior, $var6, $formulinita);
                $formulinita = str_replace($variable7_anterior, $var7, $formulinita);$formulinita = str_replace($variable8_anterior, $var8, $formulinita);
                $variable_anterior++; $variable2_anterior++;$variable3_anterior++;$variable4_anterior++;$variable5_anterior++;$variable6_anterior++;$variable7_anterior++;$variable8_anterior++;


                if($contador == $periodos){
                        if(!strpos($valor->name,'.')){//NO TIENE NIVELES Y SU POSICIÓN CUENTA SEA EN LA CELDA B
                        for ($contador_sub=1; $contador_sub < $periodos+1; $contador_sub++) { //+1 por  el año presente
                            //dd( $letra_Inicial.$numero_Inicial, $formulinita);
                            $spreadsheet->getSheetByName($sheet)->setCellValue( $letra_Inicial.$numero_Inicial, $formulinita);
                            $var++; $var2++;$var3++;$var4++;$var5++;$var6++;$var7++;$var8++;
                            $letra_Inicial++;
                            $formulinita = str_replace($variable_anterior, $var, $formulinita);$formulinita = str_replace($variable2_anterior, $var2, $formulinita);$formulinita = str_replace($variable3_anterior, $var3, $formulinita);
                            $formulinita = str_replace($variable4_anterior, $var4, $formulinita);$formulinita = str_replace($variable5_anterior, $var5, $formulinita);
                            $formulinita = str_replace($variable6_anterior, $var6, $formulinita);$formulinita = str_replace($variable7_anterior, $var7, $formulinita);
                            $formulinita = str_replace($variable8_anterior, $var8, $formulinita);
                            $variable_anterior++; $variable2_anterior++;$variable3_anterior++;$variable4_anterior++;$variable5_anterior++;$variable6_anterior++;$variable7_anterior++;$variable8_anterior++;

                        }
        
                    }
                }
            }
            $i++;

          
        }  
        $spreadsheet->getSheetByName($sheet)->getColumnDimension('A')->setWidth(1);
        $spreadsheet->getSheetByName($sheet)->getColumnDimension('B')->setWidth(1);
        $spreadsheet->getSheetByName($sheet)->getColumnDimension('C')->setWidth(55);



        //INDICES////////////////////////////////////////////////////////

        $Indices = Indice::where('estadosfinancieros_id',$id_estado_financiero)
        ->whereIn('id', $compra_indice)->get();

        //$Indices = Indice::where('estadosfinancieros_id',$id_estado_financiero)->get();
        foreach($Indices as $indice){
            $spreadsheet->getSheetByName($sheet)->setCellValue($indice->posicion_cuenta, $indice->name);

            $letra_Inicial=  substr($indice->posicion_formula, 0, 1);
            $numero_Inicial=  substr($indice->posicion_formula, 1, strlen($valor->posicion_formula));
            $formulinita=$indice->formula;


            if($indice->formula!=""){
                preg_match_all('/^=([A-Z])|[!]+([A-Z])|[:]+([A-Z])|[(]+([A-Z])+$/', $indice->formula, $matches, PREG_SET_ORDER);
                $cadena_obj=end($matches)[0];//OBTIENE LA VARIABLE
                $letra=  substr($cadena_obj, 1, 2);//OBTENGO SOLO LA LETRA
                $var="!".$letra; $variable_anterior="!".$letra;$variable2_anterior=":".$letra; $var2=":".$letra;$variable3_anterior="=".$letra; $var3="=".$letra;
                $variable4_anterior="(".$letra; $var4="(".$letra;$variable5_anterior="+".$letra; $var5="+".$letra;$variable6_anterior="-".$letra; $var6="-".$letra;
                $variable7_anterior="/".$letra; $var7="/".$letra;$variable8_anterior="*".$letra; $var8="*".$letra;
            }else{
                $variable_anterior="!H";  $var="!H"; $variable2_anterior=":H"; $var2=":H";$variable3_anterior="=H"; $var3="=H";
                $variable4_anterior="(H"; $var4="(H";$variable5_anterior="+H"; $var5="+H";$variable6_anterior="-H"; $var6="+-";
                $variable7_anterior="/H"; $var7="/H";$variable8_anterior="*H"; $var8="*H";
            }

            for ($contador=0; $contador < $periodos+1; $contador++) {
            
                $spreadsheet->getSheetByName($sheet)->setCellValue( $letra_Inicial.$numero_Inicial, $formulinita);
                //$spreadsheet->getSheetByName($sheet)->getStyle( $letra_Inicial.$numero_Inicial)->applyFromArray($styleArrayTotales);

                $var++; $var2++;$var3++;$var4++;$var5++;$var6++;$var7++;$var8++;
                $letra_Inicial++;
                $formulinita = str_replace($variable_anterior, $var, $formulinita);
                $formulinita = str_replace($variable2_anterior, $var2, $formulinita);
                $formulinita = str_replace($variable3_anterior, $var3, $formulinita);
                $formulinita = str_replace($variable4_anterior, $var4, $formulinita);
                $formulinita = str_replace($variable5_anterior, $var5, $formulinita);
                $formulinita = str_replace($variable6_anterior, $var6, $formulinita);
                $formulinita = str_replace($variable7_anterior, $var7, $formulinita);
                $formulinita = str_replace($variable8_anterior, $var8, $formulinita);
                $variable_anterior++; $variable2_anterior++;$variable3_anterior++;$variable4_anterior++;$variable5_anterior++;$variable6_anterior++;$variable7_anterior++;$variable8_anterior++;

            }            
        }
        //INDICES////////////////////////////////////////////////////////


        $writer->setPreCalculateFormulas(true);
        $writer->save($inputFileName);

      
    }

    public function procesar_SE(ConsultoriasCompradas $consultoria,$sheet,$id_estado_financiero,$name_estado_financiero,$formulario,$id_ECP,$compra_indice){// SECTOR ECONOMICO

        $inputFileType = 'Xlsx';
        $inputFileName = 'uploads/'.$consultoria->archivo;


        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setIncludeCharts(true); 
        $spreadsheet = $reader->load($inputFileName);
        $writer = new Xlsx($spreadsheet);

        $usuario = Cuentas::where('id_estado_financiero',$id_estado_financiero)->get();

        if(empty($usuario)){
            Flash::error('mensaje error');
            return redirect()->back();
        }

        $consultoriacomp = ConsultoriasCompradas::find($consultoria->id);
        $datos_compra_comprada= ConsultoriasCompradas::cliente_ById($consultoriacomp->datos_compra);

        //SECTOR ECONOMICO
        $datos_sector_economico =SectorEconomico::find($formulario->respuesta4);
        

        //DATOS CONSULTORIA COMPRADA
        $consult_plantilla=ConsultoriasCompradas::where('consultorias',$consultoriacomp->consultorias)->first();
        $periodos=$consult_plantilla->num_periodos;


        //ESTILOS


        //DATOS EMPRESA
        $spreadsheet->getSheetByName($sheet)->setCellValue('A'.($this->findletter($id_estado_financiero,4)-3), $datos_compra_comprada[0]->empresa);
        $spreadsheet->getSheetByName($sheet)->getStyle('A'.($this->findletter($id_estado_financiero,4)-3))->applyFromArray( $this->stylefont(1));

        //NOMBRE DEL ESTADO FINANCIERO
        $spreadsheet->getSheetByName($sheet)->setCellValue('A'.($this->findletter($id_estado_financiero,4)-2), $name_estado_financiero);
        $spreadsheet->getSheetByName($sheet)->getStyle('A'.($this->findletter($id_estado_financiero,4)-2))->applyFromArray($this->stylefont(1));

        /*//DATOS EMPRESA
        $spreadsheet->getSheetByName($sheet)->setCellValue('A338', $datos_compra_comprada[0]->empresa);
        $spreadsheet->getSheetByName($sheet)->getStyle('A338')->applyFromArray($this->stylefont(1));

        //NOMBRE DEL ESTADO FINANCIERO
        $spreadsheet->getSheetByName($sheet)->setCellValue('A339',$name_estado_financiero);
        $spreadsheet->getSheetByName($sheet)->getStyle('A339')->applyFromArray($this->stylefont(1)); */


        //SACAR COLUMNA (LETRA) INICIAL
        
        /*
            1 LETRA FORMULA
            2 LETRA CUENTA
            3 NUMERO FORMULA
            4 NUMERO CUENTA
            3 RANGO INICIAL
            4 RANGO FINAL
        */
        $letra=$this->findletter($id_estado_financiero,1);
        //$letra="E";
        $c=$this->findletter($id_estado_financiero,4)-2;
        $i=$this->findletter($id_estado_financiero,4)-2;
        //$c=341;//$i=341;


        $variable_tmp="";


          foreach($usuario as $valor) {
            if(strpos($valor->name,'.')){
                //SI TIENE SUBCUENTA                             CUENTAS
                //CADENA ---> Ingresos.Ventas Nacionales
                $subcuenta = substr($valor->name, strpos($valor->name,'.')+1);//Ventas Nacionales
                $cuenta = substr($valor->name, 0, strpos($valor->name,'.')); // Ingresos
                
                if(strpos($subcuenta,'.')){//TIENE MÁS DE DOS CUENTAS
                    $sub_subcuenta = substr($subcuenta, strpos($subcuenta,'.')+1);
                    $spreadsheet->getSheetByName($sheet)->setCellValue($valor->posicion_cuenta, $sub_subcuenta);    
                    $spreadsheet->getSheetByName($sheet)->setCellValue($valor->posicion_formula, $valor->formula);   

                }else{
                    //CAPTURAR LA CELDA ANTERIOR COMPARADA CON LA SUBCUENTA
                    if( $variable_tmp==$cuenta ){
                        $spreadsheet->getSheetByName($sheet)->setCellValue($valor->posicion_cuenta, $datos_sector_economico->name); 
                        $spreadsheet->getSheetByName($sheet)->setCellValue($valor->posicion_formula, $datos_sector_economico->beta);             
                    } else{
                        $variable_tmp=$cuenta;
                        $spreadsheet->getSheetByName($sheet)->setCellValue($valor->posicion_cuenta, $datos_sector_economico->name);
                        $spreadsheet->getSheetByName($sheet)->setCellValue($valor->posicion_formula, $datos_sector_economico->beta); 
                    }
                }

            }else{
                //SI NO TIENE SUBCUENTA
                $spreadsheet->getSheetByName($sheet)->setCellValue($valor->posicion_cuenta, $valor->name);
                $spreadsheet->getSheetByName($sheet)->setCellValue($valor->posicion_formula, $valor->formula);   
                $spreadsheet->getSheetByName($sheet)->getStyle($valor->posicion_cuenta)->applyFromArray($this->stylefont(3));
            }

            //FORMULA
            
            $i++;

          
        }  

        $spreadsheet->getSheetByName($sheet)->getColumnDimension('A')->setWidth(1);
        $spreadsheet->getSheetByName($sheet)->getColumnDimension('B')->setWidth(1);
        $spreadsheet->getSheetByName($sheet)->getColumnDimension('C')->setWidth(55);


        
        //ELIMINAR EL ESPACIO
        $first_posicion_cuenta = Cuentas::where('id_estado_financiero',$id_ECP)->get();
        if(empty($first_posicion_cuenta)){
            Flash::error('mensaje error');
            return redirect()->back();
        }


        $numero_menor=9999;
        $numero_mayor=0;
        
        for($i=0;$i<count($first_posicion_cuenta); $i++) {
            $posicion_primera_cuenta = substr($first_posicion_cuenta[$i]->posicion_cuenta, 1, strlen($first_posicion_cuenta[$i]->posicion_cuenta));
            $letra_posicion = substr($first_posicion_cuenta[$i]->posicion_cuenta, 0,1);
            $letra_posicion_formula= substr($first_posicion_cuenta[$i]->posicion_formula, 0,1);
           
            if ($posicion_primera_cuenta < $numero_menor){
                $numero_menor = $posicion_primera_cuenta;
            
            }
            if ($posicion_primera_cuenta > $numero_mayor){
                $numero_mayor = $posicion_primera_cuenta;
            
            }
            if($i==count($first_posicion_cuenta)-1){
                //if($formulario->respuesta1 == 'Comercial'){
                    if(!$compra_indice){//SI NO HAY NADA BORRA TODO
                    
                    for ($contador=0; $contador < $periodos+1; $contador++) { //+1 por  el año presente
                        $letra_posicion_formula++;
            
                        if($contador == $periodos){
            
                            for ($contador_sub=1; $contador_sub < $periodos+1; $contador_sub++) { //+1 por  el año presente
                                $letra_posicion_formula++;


                                if($contador_sub == $periodos){
                                   // DD($letra_posicion.$numero_menor, $letra_posicion_formula.$numero_mayor,($numero_mayor-$numero_menor));
                                    $spreadsheet->getSheetByName($sheet)->removeRow($numero_menor,($numero_mayor-$numero_menor));
                                    //$spreadsheet->getSheetByName($sheet)->removeRow($letra_posicion.$numero_menor,$contador);
                                }
                            }
            
                        }
            
                    }







                   
                }
            }
          
            
        } 
        


        $writer->setPreCalculateFormulas(true);
        $writer->save($inputFileName);



    }


    public function findletter($id_estado_financiero,$type){

        //ELIMINAR EL ESPACIO
        $first_posicion_cuenta = Cuentas::where('id_estado_financiero',$id_estado_financiero)->get();
        if(empty($first_posicion_cuenta)){
            Flash::error('mensaje error');
            return redirect()->back();
        }
        

        $numero_menor=9999;
        $numero_mayor=0;

        $primer_rango="";$segundo_rango="";
        $numero_formula;$numero_cuenta;
        $letra_formula="";$letra_cuenta="";
        
        
        for($i=0;$i<count($first_posicion_cuenta); $i++) {
            $posicion_primera_cuenta = substr($first_posicion_cuenta[$i]->posicion_cuenta, 1, strlen($first_posicion_cuenta[$i]->posicion_cuenta));
            $letra_posicion_cuenta = substr($first_posicion_cuenta[$i]->posicion_cuenta, 0,1);
            $letra_posicion_formula= substr($first_posicion_cuenta[$i]->posicion_formula, 0,1);
           
            if ($posicion_primera_cuenta < $numero_menor){
                $numero_menor = $posicion_primera_cuenta;

                $numero_cuenta=$numero_menor;//numero cuenta MENOR

                $letra_cuenta=$letra_posicion_cuenta;//letra cuenta
                $letra_formula=$letra_posicion_formula;//letra formula
            
            }
            if ($posicion_primera_cuenta > $numero_mayor){
                $numero_mayor = $posicion_primera_cuenta;
            
            }
            
            //////////////letra
            /* if($i==count($first_posicion_cuenta)-1){
                if($formulario->respuesta1 == 'Comercial'){

                    for ($contador=0; $contador < $periodos+1; $contador++) { //+1 por  el año presente
                        $letra_posicion_formula++;
            
                        if($contador == $periodos){
            
                            for ($contador_sub=1; $contador_sub < $periodos+1; $contador_sub++) { //+1 por  el año presente
                                $letra_posicion_formula++;


                                if($contador_sub == $periodos){
                                    //DD($letra_posicion.$numero_menor, $letra_posicion_formula.$numero_mayor);

                                    $primer_rango=$letra_posicion.$numero_menor;
                                    $segundo_rango=$letra_posicion_formula.$numero_mayor;

                                    //$spreadsheet->getSheetByName($sheet)->removeRow($letra_posicion.$numero_menor, $letra_posicion_formula.$numero_mayor);
                                }
                            }
            
                        }
            
                    }
                   
                }
            } */
            //////////////letra
            

                        /*
            1 LETRA FORMULA
            2 LETRA CUENTA
            3 NUMERO FORMULA
            4 NUMERO CUENTA
            5 RANGO INICIAL
            6 RANGO FINAL
        */
        
                switch($type){
                case 1:
                    return $letra_formula;
                    break;
                case 2:
                    return $letra_cuenta;
                    break;
                case 3:
                return $numero_formula;
                    break;
                case 4:
                    return $numero_cuenta;
                    break;
                case 5:
                    return $primer_rango;
                    break;
                default:
                    return $segundo_rango;
                break;
            }
            


        }
        

    }

    public function stylefont($type){
        
        //ESTILOS
        $styleTitle = array(
            'font' => array(
            'bold' => true,
            'color' => array('rgb' => '161617'),
            'size' => 12,
            'name' => 'Verdana'
        ));
        $styleArrayTotales = array(
            'font' => array(
              'bold' => true,
              'color' => array('rgb' => '161617'),
              'size' => 10,
              'name' => 'Verdana'
                ),
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['rgb' => '000000'],
                    ],

                ]
        );
        $styleArrayTitle = array(
            'font' => array(
              'bold' => true,
              'color' => array('rgb' => '161617'),
              'size' => 10,
              'name' => 'Verdana'
        ));
        $styleArrayTitle_periodo = array(
            'font' => array(
              'bold' => true,
              'color' => array('rgb' => '161617'),
              'size' => 10,
              'name' => 'Verdana'
                ),
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                    'startColor' => [
                        'argb' => 'EEECE1',
                    ],
                    'endColor' => [
                        'argb' => 'EEECE1',
                    ],
                ]
        );
        $styleArrayTitle_periodo_proy = array(
            'font' => array(
              'bold' => true,
              'color' => array('rgb' => '161617'),
              'size' => 10,
              'name' => 'Verdana'
                ),
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                    'startColor' => [
                        'argb' => 'B7DEE8',
                    ],
                    'endColor' => [
                        'argb' => 'B7DEE8',
                    ],
                ]
        );

        /*
        stylefont
            1 styleTitle
            2 styleArrayTotales
            3 styleArrayTitle
            4 styleArrayTitle_periodo
            5 styleArrayTitle_periodo_proy
        */

        switch ($type) {
            case 1:
                return $styleTitle;
                break;
            case 2:
                return $styleArrayTotales;
                break;
            case 3:
                return $styleArrayTitle;   
                break;
            case 4:
                return $styleArrayTitle_periodo;                
                break;
            default:
                return $styleArrayTitle_periodo_proy;
                break;
        }

    }




//VERSION ANTERIORES

    public function procesar_ERI3(ConsultoriasCompradas $consultoria){
        //$destinationPath = 'uploads';
        $inputFileType = 'Xlsx';
        $inputFileName = 'uploads/'.$consultoria->archivo;


        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setIncludeCharts(true); 
        $spreadsheet = $reader->load($inputFileName);
        $writer = new Xlsx($spreadsheet);

        $usuario = Cuentas::where('id_estado_financiero',1)->get();

        if(empty($usuario)){
            Flash::error('mensaje error');
            return redirect()->back();
        }

        $consultoriacomp = ConsultoriasCompradas::find($consultoria->id);

        $datos_compra_comprada= ConsultoriasCompradas::cliente_ById($consultoriacomp->datos_compra);

        //ESTILOS


        //DATOS EMPRESA
        $spreadsheet->getSheetByName($sheet)->setCellValue('A'.$this->findletter($id_estado_financiero,4)-3, $datos_compra_comprada[0]->empresa);
        $spreadsheet->getSheetByName($sheet)->getStyle('A'.$this->findletter($id_estado_financiero,4)-3)->applyFromArray( $this->stylefont(1));

        //NOMBRE DEL ESTADO FINANCIERO
        $spreadsheet->getSheetByName($sheet)->setCellValue('A'.$this->findletter($id_estado_financiero,4)-2, $name_estado_financiero);
        $spreadsheet->getSheetByName($sheet)->getStyle('A'.$this->findletter($id_estado_financiero,4)-2)->applyFromArray($this->stylefont(1));

        /*//DATOS EMPRESA
        $spreadsheet->getSheetByName($sheet)->setCellValue('A2', $datos_compra_comprada[0]->empresa);
        $spreadsheet->getSheetByName($sheet)->getStyle('A2')->applyFromArray($this->stylefont(1));


        //NOMBRE DEL ESTADO FINANCIERO
        $spreadsheet->getSheetByName($sheet)->setCellValue('A3', 'ESTADOS DE RESULTADOS INTEGRALES');
        $spreadsheet->getSheetByName($sheet)->getStyle('A3')->applyFromArray($this->stylefont(1));
         */

        $consult_plantilla=ConsultoriasCompradas::where('consultorias',$consultoriacomp->consultorias)->first();
        $periodos=$consult_plantilla->num_periodos;
        $now = new \DateTime();
        $resta=$now->format('Y')-$periodos;
        $letra="B";
        $c=5;
        for ($contador=0; $contador < $periodos+1; $contador++) { //+1 por  el año presente
            $letra++;
            $spreadsheet->getSheetByName($sheet)->setCellValue($letra.$c, $resta+$contador); $spreadsheet->getSheetByName($sheet)->getStyle($letra.$c)->applyFromArray($this->stylefont(3));
        }
      
        $xal=array(
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, "$sheet!C5:".$letra."5", NULL, NULL),
        );


        $i=5;
        $inventario_inicial;
        $inventario_final;
        $variable_tmp="";


          foreach($usuario as $valor) {
              
            /**************************************************************************************************************************** */
            if(strpos($valor->name,'.')){
                //SI TIENE SUBCUENTA                             CUENTAS
                //CADENA ---> Ingresos.Ventas Nacionales
                $subcuenta = substr($valor->name, strpos($valor->name,'.')+1);//Ventas Nacionales
                $cuenta = substr($valor->name, 0, strpos($valor->name,'.')); // Ingresos
                
                //CAPTURAR LA CELDA ANTERIOR COMPARADA CON LA SUBCUENTA
                if( $variable_tmp==$cuenta ){
                    $spreadsheet->getSheetByName($sheet)->setCellValue('A'.($i+1), $subcuenta);
                                    
                } else{
                    $spreadsheet->getSheetByName($sheet)->setCellValue('A'.($i+1), $cuenta);
                    $variable_tmp=$cuenta;

                    $spreadsheet->getSheetByName($sheet)->getStyle('A'.($i+1))->applyFromArray($this->stylefont(3));

                    $i++;
                    $spreadsheet->getSheetByName($sheet)->setCellValue('A'.($i+1), $subcuenta);
                }
                    
            }else{
                //SI NO TIENE SUBCUENTA
                $i++;
                $spreadsheet->getSheetByName($sheet)->setCellValue('A'.($i+1), $valor->name);
                $spreadsheet->getSheetByName($sheet)->getStyle('A'.($i+1))->applyFromArray($this->stylefont(3));
            }
        /**************************************************************************************************************************** */

            //PERIODO
            $letra_Inicial="B"; $variable="periodo1";
            $formulinita=$valor->formula;

            $var="!K"; $variable_anterior="!K";  $variable2_anterior=":K"; $var2=":K";
            for ($contador=0; $contador < $periodos+1; $contador++) { //+1 por  el año presente
                $letra_Inicial++;
               
                $spreadsheet->getSheetByName($sheet)->setCellValue($letra_Inicial.($i+1), $formulinita);
                $variable++; $var++; $var2++;
                
                $formulinita = str_replace($variable_anterior, $var, $formulinita);
                $formulinita = str_replace($variable2_anterior, $var2, $formulinita);
                $variable_anterior++; $variable2_anterior++;

            }
            $i++;

          
        }  
  
        $spreadsheet->getSheetByName($sheet)->getColumnDimension('A')->setWidth(55);
            $writer->setPreCalculateFormulas(true);
            $writer->save($inputFileName);

      
    }

    public function procesar_ERI2(ConsultoriasCompradas $consultoria){
        //$destinationPath = 'uploads';
        $inputFileType = 'Xlsx';
        $inputFileName = 'uploads/'.$consultoria->archivo;


        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setIncludeCharts(true); 
        $spreadsheet = $reader->load($inputFileName);
        $writer = new Xlsx($spreadsheet);



        //VERSION 1.1 
        //$usuario = EstadosResultadosIntegrales::get();

        //VERSION 2.0
        $usuario = Cuentas::where('id_estado_financiero',1)->get();












        if(empty($usuario)){
            Flash::error('mensaje error');
            return redirect()->back();
        }

        $consultoriacomp = ConsultoriasCompradas::find($consultoria->id);
        /*$consultoriacomp->estado='procesando';
        $consultoriacomp->save(); */


        $datos_compra_comprada= ConsultoriasCompradas::cliente_ById($consultoriacomp->datos_compra);


    
        //ESTILOS



        //DATOS EMPRESA
        $spreadsheet->getSheetByName('ANALISIS')->setCellValue('A2', $datos_compra_comprada[0]->empresa);
        $spreadsheet->getSheetByName('ANALISIS')->getStyle('A2')->applyFromArray($this->stylefont(1));


        //NOMBRE DEL ESTADO FINANCIERO
        $spreadsheet->getSheetByName('ANALISIS')->setCellValue('A3', 'ESTADOS DE RESULTADOS INTEGRALES');
        $spreadsheet->getSheetByName('ANALISIS')->getStyle('A3')->applyFromArray($this->stylefont(1));
        

        //VERSION 1.1
        //DATOS PERIODO
        $consult_plantilla=ConsultoriasCompradas::where('consultorias',$consultoriacomp->consultorias)->first();
        //$periodos=ConsultoriasCompradas::plantilla_ById_static($consult_plantilla[0]->id_plantilla);
        
      //  dd($consult_plantilla);

        //VERSION 2.0
        $periodos=$consult_plantilla->num_periodos;



        $now = new \DateTime();
        $resta=$now->format('Y')-$periodos;
        $letra="B";
        $c=5;
        for ($contador=0; $contador < $periodos+1; $contador++) { //+1 por  el año presente
            $letra++;

            $spreadsheet->getSheetByName('ANALISIS')->setCellValue($letra.$c, $resta+$contador); $spreadsheet->getSheetByName('ANALISIS')->getStyle($letra.$c)->applyFromArray($this->stylefont(3));
            //$spreadsheet->getSheetByName('ANALISIS')->setCellValue($letra.$c, $now->format('Y')-$contador); $spreadsheet->getSheetByName('ANALISIS')->getStyle($letra.$c)->applyFromArray($styleArrayTitle);
           
        }
      
        $xal=array(
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, "'ANALISIS'!C5:".$letra."5", NULL, NULL),//letra->  D
        );


        $i=5;
        $inventario_inicial;
        $inventario_final;
        $variable_tmp="";


          foreach($usuario as $valor) {
              
            /**************************************************************************************************************************** */
            if(strpos($valor->name,'.')){
                //SI TIENE SUBCUENTA                             CUENTAS
                //CADENA ---> Ingresos.Ventas Nacionales
                $subcuenta = substr($valor->name, strpos($valor->name,'.')+1);//Ventas Nacionales
                $cuenta = substr($valor->name, 0, strpos($valor->name,'.')); // Ingresos
                
                //CAPTURAR LA CELDA ANTERIOR COMPARADA CON LA SUBCUENTA
                if( $variable_tmp==$cuenta ){
                    $spreadsheet->getSheetByName('ANALISIS')->setCellValue('A'.($i+1), $subcuenta);
                                    
                } else{
                    $spreadsheet->getSheetByName('ANALISIS')->setCellValue('A'.($i+1), $cuenta);
                    $variable_tmp=$cuenta;

                    $spreadsheet->getSheetByName('ANALISIS')->getStyle('A'.($i+1))->applyFromArray($this->stylefont(3));

                    $i++;
                    $spreadsheet->getSheetByName('ANALISIS')->setCellValue('A'.($i+1), $subcuenta);
                }
                    
            }else{
                //SI NO TIENE SUBCUENTA
                $i++;
                $spreadsheet->getSheetByName('ANALISIS')->setCellValue('A'.($i+1), $valor->name);
            }
        /**************************************************************************************************************************** */

            if($subcuenta=='Inventario Inicial')//LEGEND
            {
                array_push($dsl,new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, "'ANALISIS'!A".($i), NULL, 1, [], NULL, "2ce81b")); //Costo de Ventas
                $inventario_inicial=$i+1;
            }

            //PERIODO
            $letra_Inicial="B"; $variable="periodo1";
            $formulinita=$valor->formula;

            $var="!K"; $variable_anterior="!K";  $variable2_anterior=":K"; $var2=":K";
            for ($contador=0; $contador < $periodos+1; $contador++) { //+1 por  el año presente
                $letra_Inicial++;
               
                $spreadsheet->getSheetByName('ANALISIS')->setCellValue($letra_Inicial.($i+1), $formulinita);
                $variable++; $var++; $var2++;
                
                $formulinita = str_replace($variable_anterior, $var, $formulinita);
                $formulinita = str_replace($variable2_anterior, $var2, $formulinita);
                $variable_anterior++; $variable2_anterior++;

            }


            if($subcuenta==='Ventas Nacionales'){//LEGEND
                $dsl=array(
                    new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, "'ANALISIS'!A".($i+1), NULL, 1, [], NULL, "2ce81b"), //Ventas Nacionales
                 );

                 $dsv = array(
                    new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, "'ANALISIS'!C".($i+1).":".$letra."".($i+1), NULL,NULL),//el periodo 1 2015
                );
            }

           
            if($subcuenta=='Inventario Final'){
                //INSERTAR LAS SIGUIENTES FÓRMULAS
                $inventario_final=$i+1;
                $i++;
                $spreadsheet->getSheetByName('ANALISIS')->setCellValue('A'.($i+1), "Total Costo de Ventas");
                $spreadsheet->getSheetByName('ANALISIS')->getStyle('A'.($i+1))->applyFromArray($this->stylefont(3));


                $letra_Inicial="B";
                for ($contador=0; $contador < $periodos+1; $contador++) { //+1 por  el año presente
                    $letra_Inicial++;
                    //FORMULA DEL FORMULARIO
                    $spreadsheet->getSheetByName('ANALISIS')->setCellValue($letra_Inicial.($i+1), $valor->$variable);
                    //FORMULA INDEPENDIENTE
                    $spreadsheet->getSheetByName('ANALISIS')->setCellValue($letra_Inicial.($i+1), "=MAX(".$letra_Inicial."".$inventario_inicial.":".$letra_Inicial."".$inventario_final.")");
                    //ESTILO
                    $spreadsheet->getSheetByName('ANALISIS')->getStyle($letra_Inicial.($i+1))->applyFromArray($this->stylefont(3));

                }
                array_push($dsv,new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, "'ANALISIS'!C".($i+1).":".$letra."".($i+1), NULL,NULL)); //Costo de Ventas
            }

            $i++;

          
        }  
  
        $spreadsheet->getSheetByName('ANALISIS')->getColumnDimension('A')->setWidth(55);


        $ds = new DataSeries(
            DataSeries::TYPE_LINECHART,
            DataSeries::GROUPING_STANDARD,
            range(0, count($dsv)-1),
            $dsl,
            $xal,
            $dsv
        );

        $pa = new PlotArea(NULL, array($ds));
        $legend = new Legend(Legend::POSITION_RIGHT, NULL, false);
        $title = new Title('Evolución de ventas y costos');

        $chart = new Chart(
            'chart1',
            $title,
            $legend,
            $pa,
            0,
            0,
            NULL,
            NULL
        );

           /*  $chart->setTopLeftPosition('G1');
            $chart->setBottomRightPosition('O30');
            $spreadsheet->getSheetByName('ANALISIS')->addChart($chart);
            $writer->setIncludeCharts(true); */
            $writer->setPreCalculateFormulas(true);
          
            $writer->save($inputFileName);

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        /*
        $path = $destinationPath .'/'.$consultoria->archivo;

        // SI EXISTE -> ELIMINAR EL ARCHIVO 
        $url = 'http://localhost:4000/file/';
        $cliente = new Client();
        $response =   $cliente->request(  'DELETE', $url,[ 'headers' => ['x-forwarded-for'=>'__ffff_127.0.0.1'],  'query'   => ['filename'=>'procesado_'.$consultoria->archivo],]);
        // SI EXISTE -> ELIMINAR EL ARCHIVO     

        $client = new Client([
            'base_uri' => 'http://localhost:4000/',
            'timeout'  => 2.0,
        ]);
    
        $response = $client->request('POST', 'upload', [
            'multipart' => [
                [
                    'name'     => 'uploadedFile',
                    'FileContents'  => fopen($path, 'r'),
                    'contents'      => fopen($path, 'r'),
                    'filename' => 'procesado_'.$consultoria->archivo
                ],
                [
                    'name'     => 'userid',
                    'contents' => 'uid-1',
                ],
                [
                    'name'     => 'name',
                    'contents' => 'Jonn Smith',
                ]
            ]
        ]);*/
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //return redirect()->route('consultoria_comprada.index');
    }

    public function procesar_ESF2(ConsultoriasCompradas $consultoria){
        //$destinationPath = 'uploads';
        $inputFileType = 'Xlsx';
        $inputFileName = 'uploads/'.$consultoria->archivo;


        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setIncludeCharts(true); 
        $spreadsheet = $reader->load($inputFileName);
        $writer = new Xlsx($spreadsheet);


        $usuario = EstadosResultadosIntegrales::get();
        if(empty($usuario)){
            Flash::error('mensaje error');
            return redirect()->back();
        }

        $consultoriacomp = ConsultoriasCompradas::find($consultoria->id);
        /*$consultoriacomp->estado='procesando';
        $consultoriacomp->save(); */


        $datos_compra_comprada= ConsultoriasCompradas::cliente_ById($consultoriacomp->datos_compra);


    
        //ESTILOS



        //DATOS EMPRESA
        $spreadsheet->getSheetByName('ANALISIS')->setCellValue('A80', $datos_compra_comprada[0]->empresa);
        $spreadsheet->getSheetByName('ANALISIS')->getStyle('A80')->applyFromArray($this->stylefont(1));


        //NOMBRE DEL ESTADO FINANCIERO
        $spreadsheet->getSheetByName('ANALISIS')->setCellValue('A81', 'ESTADOS DE RESULTADOS INTEGRALES');
        $spreadsheet->getSheetByName('ANALISIS')->getStyle('A81')->applyFromArray($this->stylefont(1));
        

        //DATOS PERIODO
        $consult_plantilla=ConsultoriasCompradas::consultoriaplantilla_byId($consultoriacomp->consultorias);
        $periodos=ConsultoriasCompradas::plantilla_ById_static($consult_plantilla[0]->id_plantilla);
        
        
        $now = new \DateTime();
        $resta=$now->format('Y')-$periodos->anios;
        $letra="B";
        $c=85;
        for ($contador=0; $contador < $periodos->anios+1; $contador++) { //+1 por  el año presente
            $letra++;

            $spreadsheet->getSheetByName('ANALISIS')->setCellValue($letra.$c, $resta+$contador); $spreadsheet->getSheetByName('ANALISIS')->getStyle($letra.$c)->applyFromArray($this->stylefont(3));
            //$spreadsheet->getSheetByName('ANALISIS')->setCellValue($letra.$c, $now->format('Y')-$contador); $spreadsheet->getSheetByName('ANALISIS')->getStyle($letra.$c)->applyFromArray($styleArrayTitle);
           
        }
      
        $xal=array(
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, "'ANALISIS'!C".$c.":".$letra.$c, NULL, NULL),//letra->  D
        );


        $i=85;
        $inventario_inicial;
        $inventario_final;
        $variable_tmp="";


          foreach($usuario as $valor) {
              
            /**************************************************************************************************************************** */
            if(strpos($valor->name,'.')){
                //SI TIENE SUBCUENTA                             CUENTAS
                //CADENA ---> Ingresos.Ventas Nacionales
                $subcuenta = substr($valor->name, strpos($valor->name,'.')+1);//Ventas Nacionales
                $cuenta = substr($valor->name, 0, strpos($valor->name,'.')); // Ingresos
                
                //CAPTURAR LA CELDA ANTERIOR COMPARADA CON LA SUBCUENTA
                if( $variable_tmp==$cuenta ){
                    $spreadsheet->getSheetByName('ANALISIS')->setCellValue('A'.($i+1), $subcuenta);
                                    
                } else{
                    $spreadsheet->getSheetByName('ANALISIS')->setCellValue('A'.($i+1), $cuenta);
                    $variable_tmp=$cuenta;

                    $spreadsheet->getSheetByName('ANALISIS')->getStyle('A'.($i+1))->applyFromArray($this->stylefont(3));

                    $i++;
                    $spreadsheet->getSheetByName('ANALISIS')->setCellValue('A'.($i+1), $subcuenta);
                }
                    
            }else{
                //SI NO TIENE SUBCUENTA
                $i++;
                $spreadsheet->getSheetByName('ANALISIS')->setCellValue('A'.($i+1), $valor->name);
            }
        /**************************************************************************************************************************** */

            if($subcuenta=='Inventario Inicial')//LEGEND
            {
                array_push($dsl,new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, "'ANALISIS'!A".($i), NULL, 1, [], NULL, "2ce81b")); //Costo de Ventas
                $inventario_inicial=$i+1;
            }

            //PERIODO
            $letra_Inicial="B"; $variable="periodo1";
            $formulinita=$valor->periodo1;

            $var="!K"; $variable_anterior="!K";  $variable2_anterior=":K"; $var2=":K";
            for ($contador=0; $contador < $periodos->anios+1; $contador++) { //+1 por  el año presente
                $letra_Inicial++;
               
                $spreadsheet->getSheetByName('ANALISIS')->setCellValue($letra_Inicial.($i+1), $formulinita);
                $variable++; $var++; $var2++;
                
                $formulinita = str_replace($variable_anterior, $var, $formulinita);
                $formulinita = str_replace($variable2_anterior, $var2, $formulinita);
                $variable_anterior++; $variable2_anterior++;

            }


            if($subcuenta==='Ventas Nacionales'){//LEGEND
                $dsl=array(
                    new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, "'ANALISIS'!A".($i+1), NULL, 1, [], NULL, "2ce81b"), //Ventas Nacionales
                 );

                 $dsv = array(
                    new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, "'ANALISIS'!C".($i+1).":".$letra."".($i+1), NULL,NULL),//el periodo 1 2015
                );
            }

           
            if($subcuenta=='Inventario Final'){
                //INSERTAR LAS SIGUIENTES FÓRMULAS
                $inventario_final=$i+1;
                $i++;
                $spreadsheet->getSheetByName('ANALISIS')->setCellValue('A'.($i+1), "Total Costo de Ventas");
                $spreadsheet->getSheetByName('ANALISIS')->getStyle('A'.($i+1))->applyFromArray($this->stylefont(3));


                $letra_Inicial="B";
                for ($contador=0; $contador < $periodos->anios+1; $contador++) { //+1 por  el año presente
                    $letra_Inicial++;
                    //FORMULA DEL FORMULARIO
                    $spreadsheet->getSheetByName('ANALISIS')->setCellValue($letra_Inicial.($i+1), $valor->$variable);
                    //FORMULA INDEPENDIENTE
                    $spreadsheet->getSheetByName('ANALISIS')->setCellValue($letra_Inicial.($i+1), "=MAX(".$letra_Inicial."".$inventario_inicial.":".$letra_Inicial."".$inventario_final.")");
                    //ESTILO
                    $spreadsheet->getSheetByName('ANALISIS')->getStyle($letra_Inicial.($i+1))->applyFromArray($this->stylefont(3));

                }
                array_push($dsv,new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, "'ANALISIS'!C".($i+1).":".$letra."".($i+1), NULL,NULL)); //Costo de Ventas
            }

            $i++;

          
        }  
  
        $spreadsheet->getSheetByName('ANALISIS')->getColumnDimension('A')->setWidth(55);


        $ds = new DataSeries(
            DataSeries::TYPE_LINECHART,
            DataSeries::GROUPING_STANDARD,
            range(0, count($dsv)-1),
            $dsl,
            $xal,
            $dsv
        );

        $pa = new PlotArea(NULL, array($ds));
        $legend = new Legend(Legend::POSITION_RIGHT, NULL, false);
        $title = new Title('Evolución de ventas y costos');

        $chart = new Chart(
            'chart1',
            $title,
            $legend,
            $pa,
            0,
            0,
            NULL,
            NULL
        );

            $chart->setTopLeftPosition('G85');
            $chart->setBottomRightPosition('O115');
            $spreadsheet->getSheetByName('ANALISIS')->addChart($chart);
            $writer->setIncludeCharts(true);
            $writer->setPreCalculateFormulas(true);
          
            $writer->save($inputFileName);

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        /*
        $path = $destinationPath .'/'.$consultoria->archivo;

        // SI EXISTE -> ELIMINAR EL ARCHIVO 
        $url = 'http://localhost:4000/file/';
        $cliente = new Client();
        $response =   $cliente->request(  'DELETE', $url,[ 'headers' => ['x-forwarded-for'=>'__ffff_127.0.0.1'],  'query'   => ['filename'=>'procesado_'.$consultoria->archivo],]);
        // SI EXISTE -> ELIMINAR EL ARCHIVO     

        $client = new Client([
            'base_uri' => 'http://localhost:4000/',
            'timeout'  => 2.0,
        ]);
    
        $response = $client->request('POST', 'upload', [
            'multipart' => [
                [
                    'name'     => 'uploadedFile',
                    'FileContents'  => fopen($path, 'r'),
                    'contents'      => fopen($path, 'r'),
                    'filename' => 'procesado_'.$consultoria->archivo
                ],
                [
                    'name'     => 'userid',
                    'contents' => 'uid-1',
                ],
                [
                    'name'     => 'name',
                    'contents' => 'Jonn Smith',
                ]
            ]
        ]);*/
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //return redirect()->route('consultoria_comprada.index');
    }

    public function procesar_ESF1(ConsultoriasCompradas $consultoria){
        $inputFileType = 'Xlsx';
        $inputFileName = 'uploads/'.$consultoria->archivo;


        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setIncludeCharts(true); 
        $spreadsheet = $reader->load($inputFileName);
        $writer = new Xlsx($spreadsheet);


        $usuario = EstadosSituacionFinanciera::get();
        if(empty($usuario)){
            Flash::error('mensaje error');
            return redirect()->back();
        }

        $consultoriacomp = ConsultoriasCompradas::find($consultoria->id);

        $datos_compra_comprada= ConsultoriasCompradas::cliente_ById($consultoriacomp->datos_compra);

        //ESTILOS



        //DATOS EMPRESA
        $spreadsheet->getSheetByName('ANALISIS')->setCellValue('A80', $datos_compra_comprada[0]->empresa);
        $spreadsheet->getSheetByName('ANALISIS')->getStyle('A80')->applyFromArray($this->stylefont(1));


        //NOMBRE DEL ESTADO FINANCIERO
        $spreadsheet->getSheetByName('ANALISIS')->setCellValue('A81', 'ESTADOS DE SITUACIÓN FINANCIERA');
        $spreadsheet->getSheetByName('ANALISIS')->getStyle('A81')->applyFromArray($this->stylefont(1));


        //DATOS PERIODO
        $consult_plantilla=ConsultoriasCompradas::consultoriaplantilla_byId($consultoriacomp->consultorias);
        $periodos=ConsultoriasCompradas::plantilla_ById_static($consult_plantilla[0]->id_plantilla);
        
        
        $now = new \DateTime();
        $resta=$now->format('Y')-$periodos->anios;
        $letra="B";
        $c=85;
        for ($contador=0; $contador < $periodos->anios+1; $contador++) { //+1 por  el año presente
            $letra++;

            $spreadsheet->getSheetByName('ANALISIS')->setCellValue($letra.$c, $resta+$contador); $spreadsheet->getSheetByName('ANALISIS')->getStyle($letra.$c)->applyFromArray($this->stylefont(3));
            //$spreadsheet->getSheetByName('ANALISIS')->setCellValue($letra.$c, $now->format('Y')-$contador); $spreadsheet->getSheetByName('ANALISIS')->getStyle($letra.$c)->applyFromArray($styleArrayTitle);
           
        }
      
        $xal=array(
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, "'ANALISIS'!C".$c.":".$letra.$c, NULL, NULL),//letra->  D
        );


        $i=85;
        $inventario_inicial;
        $inventario_final;
        $variable_tmp="";


          foreach($usuario as $valor) {
            

            /**************************************************************************************************************************** */
            $valor1= strpos($valor->name,'.');
            $valor2=strrpos($valor->name,'.');

            if(strpos($valor->name,'.') && strrpos($valor->name,'.') && $valor1!=$valor2 ){
                    //SI TIENE DOS NIVELES
                    $posicion_padre=strpos($valor->name,'.')+1;
                    $cuenta_padre = substr($valor->name, 0, strpos($valor->name,'.')); // Activos Corrientes
                    $posicion_hija=strrpos($valor->name,'.')+1;
                    $cuenta_hija  = substr($valor->name, $posicion_padre, strpos($valor->name,'.')); // Inversiones Temporales
                    $cuenta_nieta = substr($valor->name, $posicion_hija,strpos($valor->name,'.')+1);//Ventas Nacionales
                    dd("tiene dos niveles ",$cuenta_padre, $cuenta_hija, $cuenta_nieta, $valor->name);//Activos Corrientes. Cuentas por Cobrar Clientes. Ventas Locales
                    
                    //CAPTURAR LA CELDA ANTERIOR COMPARADA CON LA SUBCUENTA
                    if( $variable_tmp==$cuenta ){
                        $spreadsheet->getSheetByName('ANALISIS')->setCellValue('A'.($i+1), $subcuenta);
                                        
                    } else{
                        $spreadsheet->getSheetByName('ANALISIS')->setCellValue('A'.($i+1), $cuenta);
                        $variable_tmp=$cuenta;

                        $spreadsheet->getSheetByName('ANALISIS')->getStyle('A'.($i+1))->applyFromArray($this->stylefont(3));

                        $i++;
                        $spreadsheet->getSheetByName('ANALISIS')->setCellValue('A'.($i+1), $subcuenta);
                    }

            }
            else if(strpos($valor->name,'.')){//Activos Corrientes. Efectivo
                //SI TIENE UN NIVEL
                $posicion_padre=strpos($valor->name,'.')+1;
                $cuenta_padre = substr($valor->name, 0, strpos($valor->name,'.')); // Activos Corrientes
                $cuenta_hija  = substr($valor->name, $posicion_padre, strpos($valor->name,'.')); // Efectivo
                dd("tiene un nivel ",$cuenta_padre, $cuenta_hija, $valor->name,$posicion_padre);//Activos Corrientes. Cuentas por Cobrar Clientes. Ventas Locales
            }
            else{
                
                //NO TIENE NIVELES
                dd("NO tiene niveles");
                $i++;
                $spreadsheet->getSheetByName('ANALISIS')->setCellValue('A'.($i+1), $valor->name);
            }
        /**************************************************************************************************************************** */

            if($subcuenta=='Inventario Inicial')//LEGEND
            {
                array_push($dsl,new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, "'ANALISIS'!A".($i), NULL, 1, [], NULL, "2ce81b")); //Costo de Ventas
                $inventario_inicial=$i+1;
            }

            //PERIODO
            $letra_Inicial="B"; $variable="periodo1";
            $formulinita=$valor->periodo1;

            $var="!K"; $variable_anterior="!K";  $variable2_anterior=":K"; $var2=":K";
            for ($contador=0; $contador < $periodos->anios+1; $contador++) { //+1 por  el año presente
                $letra_Inicial++;
               
                $spreadsheet->getSheetByName('ANALISIS')->setCellValue($letra_Inicial.($i+1), $formulinita);
                $variable++; $var++; $var2++;
                
                $formulinita = str_replace($variable_anterior, $var, $formulinita);
                $formulinita = str_replace($variable2_anterior, $var2, $formulinita);
                $variable_anterior++; $variable2_anterior++;

            }


            if($subcuenta==='Ventas Nacionales'){//LEGEND
                $dsl=array(
                    new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, "'ANALISIS'!A".($i+1), NULL, 1, [], NULL, "2ce81b"), //Ventas Nacionales
                 );

                 $dsv = array(
                    new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, "'ANALISIS'!C".($i+1).":".$letra."".($i+1), NULL,NULL),//el periodo 1 2015
                );
            }

           
            if($subcuenta=='Inventario Final'){
                //INSERTAR LAS SIGUIENTES FÓRMULAS
                $inventario_final=$i+1;
                $i++;
                $spreadsheet->getSheetByName('ANALISIS')->setCellValue('A'.($i+1), "Total Costo de Ventas");
                $spreadsheet->getSheetByName('ANALISIS')->getStyle('A'.($i+1))->applyFromArray($this->stylefont(3));


                $letra_Inicial="B";
                for ($contador=0; $contador < $periodos->anios+1; $contador++) { //+1 por  el año presente
                    $letra_Inicial++;
                    //FORMULA DEL FORMULARIO
                    $spreadsheet->getSheetByName('ANALISIS')->setCellValue($letra_Inicial.($i+1), $valor->$variable);
                    //FORMULA INDEPENDIENTE
                    $spreadsheet->getSheetByName('ANALISIS')->setCellValue($letra_Inicial.($i+1), "=MAX(".$letra_Inicial."".$inventario_inicial.":".$letra_Inicial."".$inventario_final.")");
                    //ESTILO
                    $spreadsheet->getSheetByName('ANALISIS')->getStyle($letra_Inicial.($i+1))->applyFromArray($this->stylefont(3));

                }
                array_push($dsv,new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, "'ANALISIS'!C".($i+1).":".$letra."".($i+1), NULL,NULL)); //Costo de Ventas
            }

            $i++;

          
        }  
  
        $spreadsheet->getSheetByName('ANALISIS')->getColumnDimension('A')->setWidth(55);


        $ds = new DataSeries(
            DataSeries::TYPE_LINECHART,
            DataSeries::GROUPING_STANDARD,
            range(0, count($dsv)-1),
            $dsl,
            $xal,
            $dsv
        );

        $pa = new PlotArea(NULL, array($ds));
        $legend = new Legend(Legend::POSITION_RIGHT, NULL, false);
        $title = new Title('Evolución de ventas y costos');

        $chart = new Chart(
            'chart1',
            $title,
            $legend,
            $pa,
            0,
            0,
            NULL,
            NULL
        );

            $chart->setTopLeftPosition('G85');//CAPTURAR LA ÚLTIMA LETRA USADA Y SUMARLE UNO
            $chart->setBottomRightPosition('O115');
            $spreadsheet->getSheetByName('ANALISIS')->addChart($chart);
            $writer->setIncludeCharts(true);
            $writer->setPreCalculateFormulas(true);
          
            $writer->save($inputFileName);

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        /*
        $path = $destinationPath .'/'.$consultoria->archivo;

        // SI EXISTE -> ELIMINAR EL ARCHIVO 
        $url = 'http://localhost:4000/file/';
        $cliente = new Client();
        $response =   $cliente->request(  'DELETE', $url,[ 'headers' => ['x-forwarded-for'=>'__ffff_127.0.0.1'],  'query'   => ['filename'=>'procesado_'.$consultoria->archivo],]);
        // SI EXISTE -> ELIMINAR EL ARCHIVO     

        $client = new Client([
            'base_uri' => 'http://localhost:4000/',
            'timeout'  => 2.0,
        ]);
    
        $response = $client->request('POST', 'upload', [
            'multipart' => [
                [
                    'name'     => 'uploadedFile',
                    'FileContents'  => fopen($path, 'r'),
                    'contents'      => fopen($path, 'r'),
                    'filename' => 'procesado_'.$consultoria->archivo
                ],
                [
                    'name'     => 'userid',
                    'contents' => 'uid-1',
                ],
                [
                    'name'     => 'name',
                    'contents' => 'Jonn Smith',
                ]
            ]
        ]);*/
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
      //  return redirect()->route('consultoria_comprada.index');
    }

    public function procesar_con_PHPEXCEL(ConsultoriasCompradas $consultoria){
        $destinationPath = 'uploads';
        $inputFileType = 'Xlsx';
        $inputFileName = 'uploads/'.$consultoria->archivo;

        //dd($inputFileName);

        $reader = IOFactory::createReader($inputFileType);
        $spreadsheet = $reader->load($inputFileName);


        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $reader->load($inputFileName);
        $writer = new Xlsx($spreadsheet);



        //consultar por medio de la consultoria la formula
        $usuario = EstadosResultadosIntegrales::get();
        //$usuario = EstadosResultadosIntegrales::get();
        if(empty($usuario)){
            Flash::error('mensaje error');
            return redirect()->back();
        }

        $consultoriacomp = ConsultoriasCompradas::find($consultoria->id);
        $consultoriacomp->estado='procesando';
        $consultoriacomp->save();
        $i=1;
       /*   foreach($usuario as $valor) {

            $spreadsheet->getSheetByName('ANALISIS')->setCellValue('A'.($i+1), $valor->name);
            $spreadsheet->getSheetByName('ANALISIS')->setCellValue('C'.($i+1), $valor->periodo1);
            $spreadsheet->getSheetByName('ANALISIS')->setCellValue('D'.($i+1), $valor->periodo2);
            $spreadsheet->getSheetByName('ANALISIS')->setCellValue('E'.($i+1), $valor->periodo3);
            $i++;
          
        }  */
       

        /*$r = 1;

        $spreadsheet->getSheetByName('ANALISIS')->setCellValue('F' . $r, "Date");
        $spreadsheet->getSheetByName('ANALISIS')->setCellValue('G' . $r, "Val  One");
        $spreadsheet->getSheetByName('ANALISIS')->setCellValue('H' . $r, "Val Two");

        $r++;

        while($r<=20)
        {
            $randNumOne =  rand(1,100);
            $randNumTwo =  rand(1,100);

            $spreadsheet->getSheetByName('ANALISIS')->setCellValue('F' . $r, "2018-04-".$r);
            $spreadsheet->getSheetByName('ANALISIS')->setCellValue('G' . $r, $randNumOne);
            $spreadsheet->getSheetByName('ANALISIS')->setCellValue('H' . $r, $randNumTwo);

            $r++;
        }

        $dsl=array(
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, "'ANALISIS'!G1", NULL, 1, [], NULL, "d914e0"), //Cause of the error
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, "'ANALISIS'!H1", NULL, 1, [], NULL, "2ce81b"), //Cause of the error
        );

        $x = $r - 1;

        $xal=array(
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, "'ANALISIS'!F2:F".$r, NULL, $x),
        );

        $dsv = array(
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, "'ANALISIS'!G2:G".$r, NULL, $x),
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, "'ANALISIS'!H2:H".$r, NULL, $x),
        );

        $ds = new DataSeries(
            DataSeries::STYLE_LINEMARKER,
            DataSeries::GROUPING_STANDARD,
            range(0, count($dsv)-1),
            $dsl,
            $xal,
            $dsv
        );

        $pa = new PlotArea(NULL, array($ds));
        $legend = new Legend(Legend::POSITION_RIGHT, NULL, false);
        $title = new Title('Sample Chart');

        $chart = new Chart(
            'chart1',
            $title,
            $legend,
            $pa,
            0,
            0,
            NULL,
            NULL
        );

            $chart->setTopLeftPosition('K1');
            $chart->setBottomRightPosition('Q30');
            $spreadsheet->getSheetByName('ANALISIS')->addChart($chart);
            $writer->setIncludeCharts(true);
         */




        $writer->setPreCalculateFormulas(true);
        $writer->save($inputFileName);




                            /*PHP EXCEL*/
       $objReader = new \PHPExcel_Reader_Excel2007();
        $sheet = $objReader->load($inputFileName);
        $objWriter = new \PHPExcel_Writer_Excel2007($sheet);
      
        $dsl=array(
            new \PHPExcel_Chart_DataSeriesValues('String', "'ANALISIS'!A1", NULL, 1),
            new \PHPExcel_Chart_DataSeriesValues('String', "'ANALISIS'!E1", NULL, 1),
            
        );

        $xal=array(
            new \PHPExcel_Chart_DataSeriesValues('String', "'ANALISIS'!F2:F91", NULL, 90),
        );


        $dsv=array(
            new \PHPExcel_Chart_DataSeriesValues('Number', "'ANALISIS'!D2:D91", NULL, 90),
            new \PHPExcel_Chart_DataSeriesValues('Number', "'ANALISIS'!E2:E91", NULL, 90),
        );


        $ds=new \PHPExcel_Chart_DataSeries(
            \PHPExcel_Chart_DataSeries::TYPE_LINECHART,
            \PHPExcel_Chart_DataSeries::GROUPING_STANDARD,
            range(0, count($dsv)-1),
            $dsl,
            $xal,
            $dsv
            );


            $pa=new \PHPExcel_Chart_PlotArea(NULL, array($ds));
            $legend=new \PHPExcel_Chart_Legend(\PHPExcel_Chart_Legend::POSITION_RIGHT, NULL, false);
            $title=new \PHPExcel_Chart_Title('Grafica de estados');

            $chart= new \PHPExcel_Chart(
                'chart1',
                $title,
                $legend,
                $pa,
                true,
                0,
                NULL, 
                NULL
                );

            $chart->setTopLeftPosition('K1');
            $chart->setBottomRightPosition('M5');
            $sheet->getSheetByName('ANALISIS')->addChart($chart);

            $objWriter->setIncludeCharts(true);
            $objWriter->setPreCalculateFormulas(true);
            $objWriter->save($inputFileName); 
                            /*PHP EXCEL*/


        $path = $destinationPath .'/'.$consultoria->archivo;
        

        $client = new Client([
            'base_uri' => 'http://159.89.183.216:4000/',
            'timeout'  => 2.0,
            'headers' => ['x-forwarded-for'=>'__ffff_127.0.0.1']
        ]);
    
        $response = $client->request('POST', 'upload', [
            'multipart' => [
                [
                    'name'     => 'uploadedFile',
                    'FileContents'  => fopen($path, 'r'),
                    'contents'      => fopen($path, 'r'),
                    'filename' => 'procesado_'.$consultoria->archivo
                ],
                [
                    'name'     => 'userid',
                    'contents' => 'uid-1',
                ],
                [
                    'name'     => 'name',
                    'contents' => 'Jonn Smith',
                ]
            ]
        ]);
        return redirect()->route('consultoria_comprada.index');
    }

    public function onlyoffice(ConsultoriasCompradas $consultoria){
        //$ip="__ffff_127.0.0.1";
        $ip='__ffff_127.0.0.1';
        return view('bandeja.showonlyoffice', compact('consultoria','ip'));
    }

    public function onlyoffice_procesado(ConsultoriasCompradas $consultoria){
        $ip='__ffff_127.0.0.1';
        $consultoria->archivo = 'procesado_'.$consultoria->archivo;
        return view('bandeja.showonlyoffice', compact('consultoria','ip'));
    }

    public function chart3(){
     
       $spreadsheet = new Spreadsheet();
        $worksheet = $spreadsheet->getActiveSheet();
        $worksheet->fromArray([
            ['', 2010, 2011, 2012],
            ['Q1', 12, 15, 21],
            ['Q2', 56, 73, 86],
            ['Q3', 52, 61, 69],
            ['Q4', 30, 32, 0],
        ]);

        $dataSeriesLabels = [
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$B$1', null, 1), //	2010
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$C$1', null, 1), //	2011
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$D$1', null, 1), //	2012
        ];

        $xAxisTickValues = [
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$A$2:$A$5', null, 4), //	Q1 to Q4
        ];

        $dataSeriesValues = [
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, '(Worksheet!$B$2,Worksheet!$B$5)', null, 4),
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'Worksheet!$C$2:$C$5', null, 4),
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'Worksheet!$D$2:$D$5', null, 4),
        ];

        //	Build the dataseries
        $series = new DataSeries(
            DataSeries::TYPE_BARCHART, // plotType
            DataSeries::GROUPING_CLUSTERED, // plotGrouping
            range(0, count($dataSeriesValues) - 1), // plotOrder
            $dataSeriesLabels, // plotLabel
            $xAxisTickValues, // plotCategory
            $dataSeriesValues        // plotValues
        );

        $plotArea = new PlotArea(null, [$series]);
        $legend = new Legend(Legend::POSITION_RIGHT, null, false);

        $title = new Title('Test Bar Chart');
        $yAxisLabel = new Title('Value ($k)');

        //	Create the chart
        $chart = new Chart(
            'chart1', // name
            $title, // title
            $legend, // legend
            $plotArea, // plotArea
            true, // plotVisibleOnly
            0, // displayBlanksAs
            null, // xAxisLabel
            $yAxisLabel  // yAxisLabel
        );

        $chart->setTopLeftPosition('A7');
        $chart->setBottomRightPosition('H20');

        $worksheet->addChart($chart);

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->setIncludeCharts(TRUE);
        $writer->save(public_path().'/test.xlsx');


    } 

    public function chart2(){
        
        $ea = new \PHPExcel(); // ea is short for Excel Application
        $ews = $ea->getSheet(0);
        $ews->setTitle('Data');


        
        $dsl=array(
            new \PHPExcel_Chart_DataSeriesValues('String', "'Data'!A1", NULL, 1),
            new \PHPExcel_Chart_DataSeriesValues('String', "'Data'!E1", NULL, 1),
            
        );

        $xal=array(
            new \PHPExcel_Chart_DataSeriesValues('String', 'Data!$F$2:$F$91', NULL, 90),
        );


        $dsv=array(
            new \PHPExcel_Chart_DataSeriesValues('Number', 'Data!$D$2:$D$91', NULL, 90),
            new \PHPExcel_Chart_DataSeriesValues('Number', 'Data!$E$2:$E$91', NULL, 90),
        );


        $ds=new \PHPExcel_Chart_DataSeries(
            \PHPExcel_Chart_DataSeries::TYPE_LINECHART,
            \PHPExcel_Chart_DataSeries::GROUPING_STANDARD,
            range(0, count($dsv)-1),
            $dsl,
            $xal,
            $dsv
            );


            $pa=new \PHPExcel_Chart_PlotArea(NULL, array($ds));
            $legend=new \PHPExcel_Chart_Legend(\PHPExcel_Chart_Legend::POSITION_RIGHT, NULL, false);
            $title=new \PHPExcel_Chart_Title('Grafica de estados');

            $chart= new \PHPExcel_Chart(
                'chart1',
                $title,
                $legend,
                $pa,
                true,
                0,
                NULL, 
                NULL
                );

            $chart->setTopLeftPosition('K1');
            $chart->setBottomRightPosition('M5');
            $ews->addChart($chart);

          


            $writer = \PHPExcel_IOFactory::createWriter($ea, 'Excel2007');
            
            $writer->setIncludeCharts(true);
            $writer->save(public_path().'/grafica.xlsx');

    } 

    public function procesarECP(ConsultoriasCompradas $consultoria,$sheet,$id_estado_financiero,$name_estado_financiero, $formulario,$compra_indice){
        $inputFileType = 'Xlsx';
        $inputFileName = 'uploads/'.$consultoria->archivo;

        if(!$compra_indice){/*($formulario->respuesta1 == 'Comercial')*/
            return;
        }
        

        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setIncludeCharts(true); 
        $spreadsheet = $reader->load($inputFileName);
        $writer = new Xlsx($spreadsheet);

        $usuario = Cuentas::where('id_estado_financiero',$id_estado_financiero)->get();

        if(empty($usuario)){
            Flash::error('mensaje error');
            return redirect()->back();
        }

        $consultoriacomp = ConsultoriasCompradas::find($consultoria->id);

        $datos_compra_comprada= ConsultoriasCompradas::cliente_ById($consultoriacomp->datos_compra);

        //ESTILOS

        //DATOS EMPRESA
        $spreadsheet->getSheetByName($sheet)->setCellValue('A'.($this->findletter($id_estado_financiero,4)-3), $datos_compra_comprada[0]->empresa);
        $spreadsheet->getSheetByName($sheet)->getStyle('A'.($this->findletter($id_estado_financiero,4)-3))->applyFromArray( $this->stylefont(1));

        //NOMBRE DEL ESTADO FINANCIERO
        $spreadsheet->getSheetByName($sheet)->setCellValue('A'.($this->findletter($id_estado_financiero,4)-2), $name_estado_financiero);
        $spreadsheet->getSheetByName($sheet)->getStyle('A'.($this->findletter($id_estado_financiero,4)-2))->applyFromArray($this->stylefont(1));

        
        //DATOS CONSULTORIA COMPRADA
        $consult_plantilla=ConsultoriasCompradas::where('consultorias',$consultoriacomp->consultorias)->first();
        $periodos=$consult_plantilla->num_periodos;
        $now = new \DateTime();
        $resta=$now->format('Y')-$periodos;


        /*
            1 LETRA FORMULA
            2 LETRA CUENTA
            3 NUMERO FORMULA
            4 NUMERO CUENTA
            3 RANGO INICIAL
            4 RANGO FINAL
        */
        $letra=$this->findletter($id_estado_financiero,1);
        //$letra="E";
        $c=$this->findletter($id_estado_financiero,4)-2;
        $i=$this->findletter($id_estado_financiero,4)-2;
        //$c=93;//$i=93;


        for ($contador=0; $contador < $periodos+1; $contador++) { //+1 por  el año presente
           
            $spreadsheet->getSheetByName($sheet)->setCellValue($letra.$c, $resta+$contador); $spreadsheet->getSheetByName($sheet)->getStyle($letra.$c)->applyFromArray($this->stylefont(4));
            $letra++;
        }


        //$i=93;
        $inventario_inicial;
        $inventario_final;
        $variable_tmp="";


          foreach($usuario as $valor) {
            if(strpos($valor->name,'.')){
                //SI TIENE SUBCUENTA                             CUENTAS
                //CADENA ---> Ingresos.Ventas Nacionales
                $subcuenta = substr($valor->name, strpos($valor->name,'.')+1);//Ventas Nacionales
                $cuenta = substr($valor->name, 0, strpos($valor->name,'.')); // Ingresos
                
                //CAPTURAR LA CELDA ANTERIOR COMPARADA CON LA SUBCUENTA
                if( $variable_tmp==$cuenta ){
                    $spreadsheet->getSheetByName($sheet)->setCellValue($valor->posicion_cuenta, $subcuenta);
                                    
                } else{
                 //   $spreadsheet->getSheetByName($sheet)->setCellValue($valor->posicion_cuenta, $cuenta);
                    $variable_tmp=$cuenta;

                   // $spreadsheet->getSheetByName($sheet)->getStyle($valor->posicion_cuenta)->applyFromArray($styleArrayTitle);

                //$i++;
                    $spreadsheet->getSheetByName($sheet)->setCellValue($valor->posicion_cuenta, $subcuenta);
                }
                    
            }else{
                //SI NO TIENE SUBCUENTA
                //$i++;
                $spreadsheet->getSheetByName($sheet)->setCellValue($valor->posicion_cuenta, $valor->name);
                $spreadsheet->getSheetByName($sheet)->getStyle($valor->posicion_cuenta)->applyFromArray($this->stylefont(3));
            }

            //PERIODO
            $letra_Inicial=  substr($valor->posicion_formula, 0, 1);
            $numero_Inicial=  substr($valor->posicion_formula, 1, strlen($valor->posicion_formula));
            $formulinita=$valor->formula;

            $var="!H"; $variable_anterior="!H";  $variable2_anterior=":H"; $var2=":H";
            $var3='('.$letra_Inicial;
            $temp_var3= $var3;
            $var4=':'.$letra_Inicial;
            $temp_var4= $var4;
            $var5='='.$letra_Inicial;
            $temp_var5= $var5;
            $var6='+'.$letra_Inicial;
            $temp_var6= $var6;
            $var7='/'.$letra_Inicial;
            $temp_var7= $var7;
            $var8='*'.$letra_Inicial;
            $temp_var8= $var8;
            for ($contador=0; $contador < $periodos+1; $contador++) { //+1 por  el año presente
               
               
                $spreadsheet->getSheetByName($sheet)->setCellValue( $letra_Inicial.$numero_Inicial, $formulinita);
                $var++; $var2++; $var3++;  $var4++; $var5++; $var6++;$var7++;$var8++;
                $letra_Inicial++;
                $formulinita = str_replace($variable_anterior, $var, $formulinita);
                $formulinita = str_replace($variable2_anterior, $var2, $formulinita);
                $formulinita = str_replace($temp_var3, $var3, $formulinita);
                $formulinita = str_replace($temp_var4, $var4, $formulinita);
                $formulinita = str_replace($temp_var5, $var5, $formulinita);
                $formulinita = str_replace($temp_var6, $var6, $formulinita);
                $formulinita = str_replace($temp_var7, $var7, $formulinita);
                $formulinita = str_replace($temp_var8, $var8, $formulinita);
                $variable_anterior++; $variable2_anterior++;
                $temp_var3++;
                $temp_var4++;
                $temp_var5++;
                $temp_var6++;
                $temp_var7++;
                $temp_var8++;

            }
            $i++;

          
        }  
        $spreadsheet->getSheetByName($sheet)->getColumnDimension('A')->setWidth(1);
        $spreadsheet->getSheetByName($sheet)->getColumnDimension('B')->setWidth(1);
        $spreadsheet->getSheetByName($sheet)->getColumnDimension('C')->setWidth(55);
         
        
        //INDICES
       //$Indices = Indice::where('estadosfinancieros_id',$id_estado_financiero)->get();

        $Indices = Indice::where('estadosfinancieros_id',$id_estado_financiero)
        ->whereIn('id', $compra_indice)->get();

       
        foreach($Indices as $indice){
            $spreadsheet->getSheetByName($sheet)->setCellValue($indice->posicion_cuenta, $indice->name);
           $letra_Inicial=  substr($indice->posicion_formula, 0, 1);
            $numero_Inicial=  substr($indice->posicion_formula, 1, strlen($valor->posicion_formula));
            $formulinita=$indice->formula;
           $var=$letra_Inicial; $variable_anterior=$letra_Inicial;  $variable2_anterior=$letra_Inicial; $var2=$letra_Inicial;
           for ($contador=0; $contador < $periodos+1; $contador++) { //+1 por  el año presente
           
               $spreadsheet->getSheetByName($sheet)->setCellValue( $letra_Inicial.$numero_Inicial, $formulinita);
               //$spreadsheet->getSheetByName($sheet)->getStyle( $letra_Inicial.$numero_Inicial)->applyFromArray($styleArrayTotales);
               $var++; $var2++;
               $letra_Inicial++;
               $formulinita = str_replace($variable_anterior, $var, $formulinita);
               $formulinita = str_replace($variable2_anterior, $var2, $formulinita);
               $variable_anterior++; $variable2_anterior++;

           }

           
        }

        

        //GUARDAR EXEL
        $writer->setPreCalculateFormulas(true);
        $writer->save($inputFileName);
    }

}
