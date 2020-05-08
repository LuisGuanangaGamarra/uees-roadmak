<?php

namespace App\Http\Controllers;

use App\ConsultoriaPlantilla;
use App\SubPlantilla;
use App\PlantillaSubPlantilla;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Requests\ConsultoriaPlantillaStoreRequest;
use App\Http\Requests\ConsultoriaPlantillaUpdateRequest;

class ConsultoriaPlantillaController extends Controller
{
    /**
     * Display a listing of the resource.
     * Author: UEES_ANDY_ALVIA
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultoriaPlantilla = ConsultoriaPlantilla::orderBy('id_consultoria', 'asc')->/* paginate(5) */get();
     
        return view('consultoriasplantilla.index',compact('consultoriaPlantilla'));
    }

    /**
     * Show the form for creating a new resource.
     * Author: UEES_ANDY_ALVIA
     * @return \Illuminate\Http\Response
     */ 
    public function create()
    {
        //$plantilla = SubPlantilla::get(); --JNI 25/04/2019
        $consultoriaPlantilla = new ConsultoriaPlantilla;
        $consultoriaPlantilla->id = 0;

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost:3988/api/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        $response = $client->request('GET', 'consultorias');
        $datos=json_decode($response->getBody()->getContents());
        $datos2 = $datos->consultorias;
        $selectCategories = array();
        $elegirconsultoria = array();
        foreach($datos2 as $category) {
            $elegirconsultoria[$category->id_product] = $category->id_product ." - ". $category->name;
        }
        $clientplantilla  = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost:3988/api/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        $responseplantilla = $clientplantilla->request('GET', 'plantilla');
        $datosplantilla=json_decode($responseplantilla->getBody()->getContents());
        $datosplantilla = $datosplantilla->plantilla;
        $elegirplantilla = array();
        foreach($datosplantilla as $selecplantilla) {
            $elegirplantilla[$selecplantilla->id] = $selecplantilla->id ." - ". $selecplantilla->name;
        }
        //return view('consultoriasplantilla.create', compact('consultoriaPlantilla','datos2','elegirconsultoria','elegirplantilla', 'plantilla')); --JNI 25/04/2019
        return view('consultoriasplantilla.create', compact('consultoriaPlantilla','datos2','elegirconsultoria','elegirplantilla'));
    }

    /**
     * Store a newly created resource in storage.
     * Author: UEES_ANDY_ALVIA
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConsultoriaPlantillaStoreRequest $request)
    {
        $consultoriaPlantilla = ConsultoriaPlantilla::create($request->all());

        //subplantilla 
        //$subplantilla = $request->get('subplantilla'); JNI 25/04/2019
        
        //$consultoriaPlantilla->subplantilla()->attach($subplantilla);

       /*  foreach($subplantilla as $subplantilla){
            $plantilla_sub_plantilla = new PlantillaSubPlantilla;
            $plantilla_sub_plantilla->consult_plantilla_id = $consultoriaPlantilla->id;
            $plantilla_sub_plantilla->subplantilla_id = $subplantilla;
            $plantilla_sub_plantilla->save();
        } */  // JNI 25/04/2019
        

        return redirect()->route('consultoriasplantilla.show', $consultoriaPlantilla->id)
            ->with('info', 'Consultoría-Plantilla guardada con éxito');
    }

    /**
     * Display the specified resource.
     * Author: UEES_ANDY_ALVIA
     * @param  \App\ConsultoriaPlantilla  $consultoriaPlantilla
     * @return \Illuminate\Http\Response
     */
    public function show(ConsultoriaPlantilla $consultoriaPlantilla)
    {
        return view('consultoriasplantilla.show', compact('consultoriaPlantilla'));
    }

    /**
     * Show the form for editing the specified resource.
     * Author: UEES_ANDY_ALVIA
     * @param  \App\ConsultoriaPlantilla  $consultoriaPlantilla
     * @return \Illuminate\Http\Response
     */
    public function edit(ConsultoriaPlantilla $consultoriaPlantilla)
    {
       // $plantilla = SubPlantilla::get();        -- JNI 25/04/2019 
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost:3988/api/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        $response = $client->request('GET', 'consultorias');
        $datos=json_decode($response->getBody()->getContents());
        $datos2 = $datos->consultorias;
        $selectCategories = array();
        $elegirconsultoria = array();
        foreach($datos2 as $category) {
            $elegirconsultoria[$category->id_product] = $category->id_product ." - ". $category->name;
        }
        $clientplantilla  = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost:3988/api/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        $responseplantilla = $clientplantilla->request('GET', 'plantilla');
        $datosplantilla=json_decode($responseplantilla->getBody()->getContents());
        $datosplantilla = $datosplantilla->plantilla;
        $elegirplantilla = array();
        foreach($datosplantilla as $selecplantilla) {
            $elegirplantilla[$selecplantilla->id] = $selecplantilla->id ." - ". $selecplantilla->name;
        }
        //return view('consultoriasplantilla.edit', compact('consultoriaPlantilla','plantilla','datos2','elegirconsultoria','elegirplantilla', 'plantilla')); --JNI 25/04/2019
        return view('consultoriasplantilla.edit', compact('consultoriaPlantilla','plantilla','datos2','elegirconsultoria','elegirplantilla'));
    }

    /**
     * Update the specified resource in storage.
     * Author: UEES_ANDY_ALVIA
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ConsultoriaPlantilla  $consultoriaPlantilla
     * @return \Illuminate\Http\Response
     */
    public function update(ConsultoriaPlantillaUpdateRequest $request, ConsultoriaPlantilla $consultoriaPlantilla)
    {
        $consultoriaPlantilla->update($request->all());

        //dd($request);
        // $flights = PlantillaSubPlantilla::withTrashed()
        //         ->where('consult_plantilla_id', $consultoriaPlantilla->id)
        //         ->get();
        //subplantilla 



        //$res=PlantillaSubPlantilla::where('consult_plantilla_id',$consultoriaPlantilla->id)->delete();  --JNI 25/04/2019

        // $subplantilla = $request->get('subplantilla'); --JNI 25/04/2019
        
        //$consultoriaPlantilla->subplantilla()->attach($subplantilla);

        /*
        foreach($subplantilla as $subplantilla){
            $plantilla_sub_plantilla = new PlantillaSubPlantilla;
            $plantilla_sub_plantilla->consult_plantilla_id = $consultoriaPlantilla->id;
            $plantilla_sub_plantilla->subplantilla_id = $subplantilla;
            $plantilla_sub_plantilla->save();
        }*/  // JNI 25/04/2019

        return redirect()->route('consultoriasplantilla.edit', $consultoriaPlantilla->id)
        ->with('info', 'Consultoría-Plantilla actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     * Author: UEES_ANDY_ALVIA
     * @param  \App\ConsultoriaPlantilla  $consultoriaPlantilla
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConsultoriaPlantilla $consultoriaPlantilla)
    {
        //$res=PlantillaSubPlantilla::where('consult_plantilla_id',$consultoriaPlantilla->id)->delete(); --JNI 25/04/2019
        $consultoriaPlantilla->delete();
        return back()->with('info', 'Consultoría-Plantilla eliminado correctamente');
    }

    /**
     * Author: UEES_ANDY_ALVIA
     */
    public function CambiarEstado(Request $request, ConsultoriaPlantilla $consultoriaPlantilla) {
        $idconsultoriaplantilla = $consultoriaPlantilla->id;
        $idconsultoriaconsultoria = $consultoriaPlantilla->id_consultoria;
        $resultado = ConsultoriaPlantilla::where('id_consultoria', '=', $idconsultoriaconsultoria)
               ->update(['default' => 'False']);
        $resultadoselec = ConsultoriaPlantilla::find($idconsultoriaplantilla);
        if(empty($resultadoselec)){
            Flash::error('mensaje error');
            return redirect()->back();
        }
        $resultadoselec->default="True"; 
        $resultadoselec->save(); 
        return redirect()->route('consultoriasplantilla.index', $consultoriaPlantilla->id)
        ->with('info', 'Consultoría-Plantilla guardada con éxito');
    }
}
