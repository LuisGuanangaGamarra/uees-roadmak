<?php

namespace App\Http\Controllers;

use App\Plantilla;
use Illuminate\Http\Request;
use App\Http\Requests\PlantillaStoreRequest;
use App\Http\Requests\PlantillaUpdateRequest;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Input;

class PlantillaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plantilla = Plantilla::/* paginate(5) */get();

        return view('plantilla.index',compact('plantilla'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plantilla.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlantillaStoreRequest $request)
    {
     // dd($request);
        $destinationPath = 'plantillas/';
        $plantillas = Plantilla::create($request->all());

        $ind = Plantilla::find($plantillas->id);
        if(empty($ind)){
            Flash::error('mensaje error');
            return redirect()->back();
        }
     
        
        
        $file = $request->file('plantilla');
        //$nombre_plantilla='planti_'.$request->name.'_'.$file->getClientOriginalName();
        $nombre_plantilla='planti_'.$plantillas->id.'_'.$file->getClientOriginalName();
        $file->move($destinationPath,$nombre_plantilla);

        $ind->plantilla=$nombre_plantilla;
        $ind->save();



        //VERSION 1.1  JNIEVES
        /*return redirect()->route('plantilla.asignar', $plantilla->id)
            ->with('info', 'Plantilla guardado con exito');*/


        //VERSION 2.1  JNIEVES 
        return redirect()->route('plantilla.edit',  $plantillas->id)
        ->with('info', 'Plantilla guardada con éxito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plantilla  $plantilla
     * @return \Illuminate\Http\Response
     */
    public function show(Plantilla $plantilla)
    {


        return view('plantilla.show', compact('plantilla'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plantilla  $plantilla
     * @return \Illuminate\Http\Response
     */
    public function downloadPlantilla( $plantilla){
       // var_dump($plantilla);
      // dd($plantilla);
        $pathtoFile = public_path().'//plantillas/'.$plantilla;
      //  var_dump($pathtoFile);
        return response()->download($pathtoFile);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plantilla  $plantilla
     * @return \Illuminate\Http\Response
     */
    public function edit(Plantilla $plantilla)
    {
        return view('plantilla.edit', compact('plantilla'));
    }

    public function asignar(Plantilla $plantilla)
    {

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
       
        //dd($datos2);
        //dd($datos->articulos);
        //inicio paginacion 
        //$page = Input::get('page');
        //$paginate = 5;
        //$offSet = ($page * $paginate) - $paginate;  
        //$itemsForCurrentPage = array_slice($datos2, $offSet, $paginate, true);  
        //$datos2 = new LengthAwarePaginator($itemsForCurrentPage, count($datos2), $paginate, $page);
       //fin paginacion
       
        // $datos2 = new Paginator($datos2, 10, $page);
       // var_dump($datos2);
        //$datos2->setPath('consultorias');
        //return view('consultorias.index')->withDatos2($datos2);



        //dd($datos2);
        $selectCategories = array();
        $elegirconsultoria = array();
        //$categorita2 = array();
        
        //$usuario = ConsultoriasCompradas::find($consultoria->id);
        foreach($datos2 as $category) {
            //$selectedCategories[$category->id_product] = $category->name;
            $elegirconsultoria[$category->id_product] = $category->id_product ." - ". $category->name;
        }
        
        return view('plantilla.asignar', compact('plantilla','datos2','elegirconsultoria'));
    }

    public function createasig()
    {
        return view('consultoriasplantilla.index');
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plantilla  $plantilla
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plantilla $plantilla)
    {   
        $plantilla->update($request->all());

        $file = Input::file('plantilla'); 
        if(!empty($file)){//true porque es null

            $destinationPath = 'plantillas/';
            $ind = Plantilla::find($plantilla->id);
            if(empty($ind)){
                Flash::error('mensaje error');
                return redirect()->back();
            }
            $name = $file->getClientOriginalName();
            $nombre_plantilla='planti_'.$plantilla->id.'_'.$file->getClientOriginalName();
            $file->move($destinationPath,$nombre_plantilla);
            $ind->plantilla=$nombre_plantilla;
            $ind->save();
        }
       

        return redirect()->route('plantilla.edit', $plantilla->id)
        ->with('info', 'Plantilla actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plantilla  $plantilla
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plantilla $plantilla)
    {
        $plantilla->delete();

        return back()->with('info', 'Eliminado correctamente');
    }
}
