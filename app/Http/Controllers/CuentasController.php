<?php

namespace App\Http\Controllers;
use App\Cuentas;
use Illuminate\Http\Request;
use App\EstadosFinancieros;
use App\Http\Requests\CuentasStoreRequest;
use App\Http\Requests\CuentasUpdateRequest;

class CuentasController extends Controller
{
    public function index()
    {
        $cuentas = Cuentas::/* paginate(5) */get();
        return view('cuentas.index',compact('cuentas'));
    }

    //////////////////////////jnieves//////////////////////////////////////
    public function estadofinanciero( $estadofinanciero)
    {
        $cuentas = Cuentas::where('id_estado_financiero',$estadofinanciero)->/* paginate(5) */get();
        $estado_financiero=EstadosFinancieros::find($estadofinanciero);
        
        return view('cuentas.index_estadofinanciero',compact('cuentas','estado_financiero'));


    }
    public function estadofinancierocreate()
    {
        return view('cuentas.create');
    }


    public function estadofinancierostore(CuentasStoreRequest $request)
    {
        $cuentas = Cuentas::create($request->all());
        return redirect()->route('cuentas.edit', $cuentas->id)
            ->with('info', 'Cuenta guardado con éxito');
    }

    public function estadofinancieroshow(Cuentas $cuentas)
    {
        return view('cuentas.show', compact('cuentas'));
    }

    public function estadofinancieroedit(Cuentas $cuentas)
    {
        //EstadosFinancieros
      
        $list_estados_financieros = EstadosFinancieros::get();
        $estadofinanciero_cuenta= EstadosFinancieros::find($cuentas->id_estado_financiero);
        $estados_financieros = array();
     
        foreach($list_estados_financieros as $selectestadosfinancieros) {
                $estados_financieros[$selectestadosfinancieros->id] = $selectestadosfinancieros->id ." - ". $selectestadosfinancieros->name;
        }

        return view('cuentas.edit', compact('cuentas','estados_financieros','estadofinanciero_cuenta'));
    }


    public function estadofinancieroupdate(CuentasUpdateRequest $request, Cuentas $cuentas)
    {
        $cuentas ->update($request->all());
        return redirect()->route('cuentas.edit', $cuentas->id)
        ->with('info','Cuenta actualizada con éxito');
    }


    public function estadofinancierodestroy(Cuentas $cuentas)
    {
        $cuentas->delete();
        return back()->with('info','Cuenta eliminada correctamente');
    }
//////////////////////////jnieves//////////////////////////////////////













    public function create()
    {
        return view('cuentas.create');
    }


    public function store(CuentasStoreRequest $request)
    {
        $cuentas = Cuentas::create($request->all());
        return redirect()->route('cuentas.edit', $cuentas->id)
            ->with('info', 'Cuenta guardado con éxito');
    }

    public function show(Cuentas $cuentas)
    {
        return view('cuentas.show', compact('cuentas'));
    }

    public function edit(Cuentas $cuentas)
    {
        //EstadosFinancieros


        $list_estados_financieros = EstadosFinancieros::get();
        $estados_financieros = array();
        
        foreach($list_estados_financieros as $selectestadosfinancieros) {
                $estados_financieros[$selectestadosfinancieros->id] = $selectestadosfinancieros->id ." - ". $selectestadosfinancieros->name;
        }





        return view('cuentas.edit', compact('cuentas','estados_financieros'));
    }


    public function update(CuentasUpdateRequest $request, Cuentas $cuentas)
    {
        $cuentas ->update($request->all());
        return redirect()->route('cuentas.edit', $cuentas->id)
        ->with('info','Cuenta actualizada con éxito');
    }


    public function destroy(Cuentas $cuentas)
    {
        $cuentas->delete();
        return back()->with('info','Cuenta eliminada correctamente');
    }
}
