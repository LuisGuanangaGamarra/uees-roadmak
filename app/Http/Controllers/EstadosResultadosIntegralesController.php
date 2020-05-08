<?php

namespace App\Http\Controllers;

use App\EstadosResultadosIntegrales;
use Illuminate\Http\Request;
use App\Http\Requests\EstadoResultadoIntegralUpdateRequest;
use App\Http\Requests\EstadoResultadoIntegralStoreRequest;


class EstadosResultadosIntegralesController extends Controller
{
    /**
     * Display a listing of the resource.
     * Author: UEES_ANDY_ALVIA
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estadosResultadosIntegrales = EstadosResultadosIntegrales::/* paginate(5) */get();
        return view('estadosresultadosintegrales.index',compact('estadosResultadosIntegrales'));
    }

    /**
     * Show the form for creating a new resource.
     * Author: UEES_ANDY_ALVIA
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estadosresultadosintegrales.create');
    }

    /**
     * Store a newly created resource in storage.
     * Author: UEES_ANDY_ALVIA
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstadoResultadoIntegralStoreRequest $request)
    {
        $estadosResultadosIntegrales = EstadosResultadosIntegrales::create($request->all());
        return redirect()->route('estadosresultadosintegrales.edit', $estadosResultadosIntegrales->id)
            ->with('info', 'Estado Resultado Integral guardado con éxito');
    }

    /**
     * Display the specified resource.
     * Author: UEES_ANDY_ALVIA
     * @param  \App\EstadosResultadosIntegrales  $estadosResultadosIntegrales
     * @return \Illuminate\Http\Response
     */
    public function show(EstadosResultadosIntegrales $estadosResultadosIntegrales)
    {
        return view('estadosresultadosintegrales.show', compact('estadosResultadosIntegrales'));
    }

    /**
     * Show the form for editing the specified resource.
     * Author: UEES_ANDY_ALVIA
     * @param  \App\EstadosResultadosIntegrales  $estadosResultadosIntegrales
     * @return \Illuminate\Http\Response
     */
    public function edit(EstadosResultadosIntegrales $estadosResultadosIntegrales)
    {
        return view('estadosresultadosintegrales.edit', compact('estadosResultadosIntegrales'));
    }

    /**
     * Update the specified resource in storage.
     * Author: UEES_ANDY_ALVIA
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EstadosResultadosIntegrales  $estadosResultadosIntegrales
     * @return \Illuminate\Http\Response
     */
    public function update(EstadoResultadoIntegralUpdateRequest $request, EstadosResultadosIntegrales $estadosResultadosIntegrales)
    {
        $estadosResultadosIntegrales->update($request->all());
        return redirect()->route('estadosresultadosintegrales.edit', $estadosResultadosIntegrales->id)
        ->with('info', 'Estado de Resultado Integral actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     * Author: UEES_ANDY_ALVIA
     * @param  \App\EstadosResultadosIntegrales  $estadosResultadosIntegrales
     * @return \Illuminate\Http\Response
     */
    public function destroy(EstadosResultadosIntegrales $estadosResultadosIntegrales)
    {
        $estadosResultadosIntegrales->delete();
        return back()->with('info', 'Estado de Resultado Integral Eliminado correctamente');
    }
}
