<?php

namespace App\Http\Controllers;

use App\Galeria;
use App\ConsultoriasCompradas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\GaleriaStoreRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
class GaleriaController extends Controller
{
    /**
     * Display a listing of the resource.
     * Author: UEES_ANDY_ALVIA
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$consultoria)
    {
        //$subruta= $_SERVER["REMOTE_ADDR"];
       // $subruta="localhost";
       // $subruta= "http://".$subruta.":".$_SERVER["SERVER_PORT"];
        $subruta = env("urlsistema"); 
        Log::info("GaleriaController index",['subruta'=>$subruta] );   
        $Galeria = Galeria::where('idinforme',$consultoria)-> paginate(5)/* get()*/;
        return view('informe.galeria.index',compact('Galeria', 'consultoria','subruta'));
    }
    /**
     * Show the form for creating a new resource.
     * Author: UEES_ANDY_ALVIA
     * @return \Illuminate\Http\Response
     */
    public function create($consultoria)
    {
        $registro= ConsultoriasCompradas::find($consultoria);
        $cliente = $registro->cliente;
        return view('informe.galeria.create',compact('consultoria','cliente'));
    }

    /**
     * Store a newly created resource in storage.
     * Author: UEES_ANDY_ALVIA
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GaleriaStoreRequest $request)
    {
        $ruta=$request->idcliente;
        $consultoria=$request->idinforme;

        if($request->file('file')){
            $path = Storage::disk('local')->put($ruta, $request->file('file'));
        }
        Log::info("GaleriaController store",['path'=>$path] );   
        $Galeria = Galeria::create($request->all());
        $Galeria->fill(['file' => $path])->save();
        return redirect()->route('galeria.index',$consultoria);
    }

    /**
     * Display the specified resource.
     * Author: UEES_ANDY_ALVIA
     * @param  \App\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function show(Galeria $galeria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * Author: UEES_ANDY_ALVIA
     * @param  \App\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function edit(Galeria $galeria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * Author: UEES_ANDY_ALVIA
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Galeria $galeria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * Author: UEES_ANDY_ALVIA
     * @param  \App\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galeria $galeria)
    {
        $galeria->delete();
        return back();
    }
}
