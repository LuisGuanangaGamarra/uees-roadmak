<?php

namespace App\Http\Controllers;

use App\EstadosFlujosEfectivo;
use Illuminate\Http\Request;
use App\Http\Requests\EstadoFlujosEfectivoStoreRequest;
use App\Http\Requests\EstadoFlujosEfectivoUpdateRequest;
class EstadosFlujosEfectivoController extends Controller
{
    /**
     * Display a listing of the resource.
     * Author: UEES_ANDY_ALVIA
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estadosFlujosEfectivo = EstadosFlujosEfectivo::/* paginate(5) */get();
        return view('estadosflujosefectivos.index',compact('estadosFlujosEfectivo'));
    }

    /**
     * Show the form for creating a new resource.
     * Author: UEES_ANDY_ALVIA
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estadosflujosefectivos.create');
    }

    /**
     * Store a newly created resource in storage.
     * Author: UEES_ANDY_ALVIA
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstadoFlujosEfectivoStoreRequest $request)
    {
        $estadosFlujosEfectivo = EstadosFlujosEfectivo::create($request->all());
        return redirect()->route('estadosflujosefectivos.edit', $estadosFlujosEfectivo->id)
            ->with('info', 'Estado Flujos Efectivo guardado con éxito');
    }

    /**
     * Display the specified resource.
     * Author: UEES_ANDY_ALVIA
     * @param  \App\EstadosFlujosEfectivo  $estadosFlujosEfectivo
     * @return \Illuminate\Http\Response
     */
    public function show(EstadosFlujosEfectivo $estadosFlujosEfectivo)
    {
        return view('estadosflujosefectivos.show', compact('estadosFlujosEfectivo'));
    }

    /**
     * Show the form for editing the specified resource.
     * Author: UEES_ANDY_ALVIA
     * @param  \App\EstadosFlujosEfectivo  $estadosFlujosEfectivo
     * @return \Illuminate\Http\Response
     */
    public function edit(EstadosFlujosEfectivo $estadosFlujosEfectivo)
    {
        return view('estadosflujosefectivos.edit', compact('estadosFlujosEfectivo'));
    }

    /**
     * Update the specified resource in storage.
     * Author: UEES_ANDY_ALVIA
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EstadosFlujosEfectivo  $estadosFlujosEfectivo
     * @return \Illuminate\Http\Response
     */
    public function update(EstadoFlujosEfectivoUpdateRequest $request, EstadosFlujosEfectivo $estadosFlujosEfectivo)
    {
        $estadosFlujosEfectivo ->update($request->all());
        return redirect()->route('estadosflujosefectivos.edit', $estadosFlujosEfectivo->id)
        ->with('info','Estado de Flujos de Efectivo actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     * Author: UEES_ANDY_ALVIA
     * @param  \App\EstadosFlujosEfectivo  $estadosFlujosEfectivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(EstadosFlujosEfectivo $estadosFlujosEfectivo)
    {
        $estadosFlujosEfectivo->delete();
        return back()->with('info','Estado de Flujo de Efectivo eliminado correctamente');
    }
}
