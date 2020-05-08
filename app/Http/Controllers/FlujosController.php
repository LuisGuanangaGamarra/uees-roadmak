<?php

namespace App\Http\Controllers;

use App\Flujos;
use Illuminate\Http\Request;

class FlujosController extends Controller
{
    /**
     * Display a listing of the resource.
     * Author: UEES_ANDY_ALVIA
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flujos = Flujos::/* paginate(5) */get();
        return view('flujos.index',compact('flujos'));
    }

    /**
     * Show the form for creating a new resource.
     * Author: UEES_ANDY_ALVIA
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('flujos.create');
    }

    /**
     * Store a newly created resource in storage.
     * Author: UEES_ANDY_ALVIA
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $flujo = Flujos::create($request->all());
        return redirect()->route('flujos.edit', $flujo->id)
            ->with('info', 'Flujo guardado con éxito');
    }

    /**
     * Display the specified resource.
     * Author: UEES_ANDY_ALVIA
     * @param  \App\Flujos  $flujos
     * @return \Illuminate\Http\Response
     */
    public function show(Flujos $flujos)
    {
        return view('flujos.show', compact('flujos'));
    }

    /**
     * Show the form for editing the specified resource.
     * Author: UEES_ANDY_ALVIA
     * @param  \App\Flujos  $flujos
     * @return \Illuminate\Http\Response
     */
    public function edit(Flujos $flujos)
    {
        return view('flujos.edit', compact('flujos'));
    }

    /**
     * Update the specified resource in storage.
     * Author: UEES_ANDY_ALVIA
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Flujos  $flujos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flujos $flujos)
    {
        $flujos->update($request->all());
        return redirect()->route('flujos.edit', $flujos->id)
        ->with('info', 'Flujo actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     * Author: UEES_ANDY_ALVIA
     * @param  \App\Flujos  $flujos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flujos $flujos)
    {
        $flujos->delete();
        return back()->with('info', 'Flujo eliminado correctamente');
    }
}
