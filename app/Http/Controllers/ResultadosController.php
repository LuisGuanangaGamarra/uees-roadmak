<?php

namespace App\Http\Controllers;

use App\Resultados;
use Illuminate\Http\Request;
use App\Http\Requests\ResultadosStoreRequest;
use App\Http\Requests\ResultadosUpdateRequest;
class ResultadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultado = Resultados::/* paginate(5) */get();

        return view('resultado.index',compact('resultado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('resultado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResultadosStoreRequest $request)
    {
        $resultado = Resultados::create($request->all());
        return redirect()->route('resultado.edit', $resultado->id)
            ->with('info', 'resultado creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Resultados  $resultados
     * @return \Illuminate\Http\Response
     */
    public function show(Resultados $resultados)
    {
        return view('resultado.show', compact('resultados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Resultados  $resultados
     * @return \Illuminate\Http\Response
     */
    public function edit(Resultados $resultados)
    {
        return view('resultado.edit', compact('resultados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Resultados  $resultados
     * @return \Illuminate\Http\Response
     */
    public function update(ResultadosUpdateRequest $request, Resultados $resultados)
    {
        $resultados->update($request->all());

        return redirect()->route('resultado.edit', $resultados->id)
        ->with('info', 'resultado actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Resultados  $resultados
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resultados $resultados)
    {
        $resultados->delete();

        return back()->with('info', 'Resultado eliminado correctamente');
    }
}
