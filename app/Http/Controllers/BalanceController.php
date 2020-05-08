<?php

namespace App\Http\Controllers;

use App\Balance;
use Illuminate\Http\Request;
use App\Http\Requests\BalanceStoreRequest;
use App\Http\Requests\BalanceUpdateRequest;


class BalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuentas_balance = Balance::/* paginate(5) */get();

        return view('balance.index',compact('cuentas_balance'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('balance.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BalanceStoreRequest $request)
    {
        $cuentas_balance = Balance::create($request->all());
        return redirect()->route('balance.edit', $cuentas_balance->id)
            ->with('info', 'Cuenta guardada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function show(Balance $balance)
    {
        return view('balance.show', compact('balance'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function edit(Balance $balance)
    {
        return view('balance.edit', compact('balance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function update(BalanceUpdateRequest $request, Balance $balance)
    {
        $balance->update($request->all());

        return redirect()->route('balance.edit', $balance->id)
        ->with('info', 'Balance actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Balance $balance)
    {
        $balance->delete();

        return back()->with('info', 'Eliminado correctamente');
    }
}
