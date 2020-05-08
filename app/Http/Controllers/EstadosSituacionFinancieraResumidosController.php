<?php

namespace App\Http\Controllers;

use App\EstadosSituacionFinancieraResumidos;
use Illuminate\Http\Request;
use App\Http\Requests\EstadoSituacionFinancieraResumidosUpdateRequest;
use App\Http\Requests\EstadoSituacionFinancieraResumidosStoreRequest;
class EstadosSituacionFinancieraResumidosController extends Controller
{
    /**
     * Display a listing of the resource.
     * Author: UEES_ANDY_ALVIA
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estadosSituacionFinancieraResumidos = EstadosSituacionFinancieraResumidos::/* paginate(5) */get();
        return view('estadossituacionfinancieraresumidos.index',compact('estadosSituacionFinancieraResumidos'));
    }

    /**
     * Show the form for creating a new resource.
     * Author: UEES_ANDY_ALVIA
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estadossituacionfinancieraresumidos.create');
    }

    /**
     * Store a newly created resource in storage.
     * Author: UEES_ANDY_ALVIA
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstadoSituacionFinancieraResumidosStoreRequest $request)
    {
        $estadosSituacionFinancieraResumidos = EstadosSituacionFinancieraResumidos::create($request->all());
        return redirect()->route('estadossituacionfinancieraresumidos.edit', $estadosSituacionFinancieraResumidos->id)
            ->with('info', 'Estado Situación Financiera Resumido guardado con éxito');
    }

    /**
     * Display the specified resource.
     * Author: UEES_ANDY_ALVIA
     * @param  \App\EstadosSituacionFinancieraResumidos  $estadosSituacionFinancieraResumidos
     * @return \Illuminate\Http\Response
     */
    public function show(EstadosSituacionFinancieraResumidos $situacionfinancieraresumido)
    {
        return view('estadossituacionfinancieraresumidos.show', compact('situacionfinancieraresumido'));
    }

    /**
     * Show the form for editing the specified resource.
     * Author: UEES_ANDY_ALVIA
     * @param  \App\EstadosSituacionFinancieraResumidos  $estadosSituacionFinancieraResumidos
     * @return \Illuminate\Http\Response
     */
    public function edit(EstadosSituacionFinancieraResumidos $situacionfinancieraresumido)
    {
        return view('estadossituacionfinancieraresumidos.edit', compact('situacionfinancieraresumido'));
    }

    /**
     * Update the specified resource in storage.
     * Author: UEES_ANDY_ALVIA
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EstadosSituacionFinancieraResumidos  $estadosSituacionFinancieraResumidos
     * @return \Illuminate\Http\Response
     */
    public function update(EstadoSituacionFinancieraResumidosUpdateRequest $request, EstadosSituacionFinancieraResumidos $situacionfinancieraresumido)
    {
        $situacionfinancieraresumido->update($request->all());
        return redirect()->route('estadossituacionfinancieraresumidos.edit', $situacionfinancieraresumido->id)
        ->with('info', 'Estado de Situación Financiera Resumido actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     * Author: UEES_ANDY_ALVIA
     * @param  \App\EstadosSituacionFinancieraResumidos  $estadosSituacionFinancieraResumidos
     * @return \Illuminate\Http\Response
     */
    public function destroy(EstadosSituacionFinancieraResumidos $situacionfinancieraresumido)
    {
        $situacionfinancieraresumido->delete();
        return back()->with('info', 'Estado de Situación Financiera Resumido eliminado correctamente');
    }
}
