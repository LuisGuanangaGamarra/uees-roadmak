<?php

namespace App\Http\Controllers;

use App\Indice;
use App\EstadosFinancieros;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class IndiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indices = Indice::/* paginate(10) */get();
        return view('indices.index', compact('indices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Indice  $indice
     * @return \Illuminate\Http\Response
     */
    public function show(Indice $indice)
    {
        //dd($indice);
        $indice =DB::table('indices')
        ->join('EstadosFinancieros', 'EstadosFinancieros.id', '=', 'indices.estadosfinancieros_id')
        ->select('*')
        ->get();

        //dd($indice[0]);

        $indice=$indice[0];
        return view('indices.show', compact('indice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Indice  $indice
     * @return \Illuminate\Http\Response
     */
    public function edit(Indice $indice)
    {
        $estados = EstadosFinancieros::get(['id', 'name_estado'])->pluck('name_estado', 'id')->toArray();
        return view('indices.edit', compact('indice', 'estados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Indice  $indice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Indice $indice)
    {
        $indice->update($request->all());

        return redirect()->route('indice.edit', $indice->id)
        ->with('info', 'Índice actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Indice  $indice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Indice $indice)
    {
        //
    }
}
