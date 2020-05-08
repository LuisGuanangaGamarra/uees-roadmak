<?php

namespace App\Http\Controllers;

use App\EstadosSituacionFinanciera;


use Illuminate\Http\Request;
use App\Http\Requests\EstadoSituacionFinancieraStoreRequest;
use App\Http\Requests\EstadoSituacionFinancieraUpdateRequest;


class EstadosSituacionFinancieraController extends Controller
{
    /**
     * Display a listing of the resource.
     * Author: UEES_ANDY_ALVIA
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estadosSituacionFinanciera = EstadosSituacionFinanciera::/* paginate(5) */get();
        return view('estadossituacionfinanciera.index',compact('estadosSituacionFinanciera'));
    }

    /**
     * Show the form for creating a new resource.
     * Author: UEES_ANDY_ALVIA
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estadossituacionfinanciera.create');
    }

    /**
     * Store a newly created resource in storage.
     * Author: UEES_ANDY_ALVIA
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstadoSituacionFinancieraStoreRequest $request)
    {
        $estadosSituacionFinanciera = EstadosSituacionFinanciera::create($request->all());
        return redirect()->route('estadossituacionfinanciera.edit', $estadosSituacionFinanciera->id)
            ->with('info', 'Estado Situación Financiera guardado con éxito');
    }

    /**
     * Display the specified resource.
     * Author: UEES_ANDY_ALVIA
     * @param  \App\EstadosSituacionFinanciera  $estadosSituacionFinanciera
     * @return \Illuminate\Http\Response
     */
    public function show(EstadosSituacionFinanciera $estadosSituacionFinanciera)
    {
        return view('estadossituacionfinanciera.show', compact('estadosSituacionFinanciera'));
    }

    /**
     * Show the form for editing the specified resource.
     * Author: UEES_ANDY_ALVIA
     * @param  \App\EstadosSituacionFinanciera  $estadosSituacionFinanciera
     * @return \Illuminate\Http\Response
     */
    public function edit(EstadosSituacionFinanciera $estadosSituacionFinanciera)
    {
        return view('estadossituacionfinanciera.edit', compact('estadosSituacionFinanciera'));
    }

    /**
     * Update the specified resource in storage.
     * Author: UEES_ANDY_ALVIA
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EstadosSituacionFinanciera  $estadosSituacionFinanciera
     * @return \Illuminate\Http\Response
     */
    public function update(EstadoSituacionFinancieraUpdateRequest $request, EstadosSituacionFinanciera $estadosSituacionFinanciera)
    {
        $estadosSituacionFinanciera->update($request->all());
        return redirect()->route('estadossituacionfinanciera.edit', $estadosSituacionFinanciera->id)
        ->with('info', 'Estado de Situación Financiera actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     * Author: UEES_ANDY_ALVIA
     * @param  \App\EstadosSituacionFinanciera  $estadosSituacionFinanciera
     * @return \Illuminate\Http\Response
     */
    public function destroy(EstadosSituacionFinanciera $estadosSituacionFinanciera)
    {
        $estadosSituacionFinanciera->delete();
        return back()->with('info', 'Estado de Situación Financiera Eliminado correctamente');
    }
}
