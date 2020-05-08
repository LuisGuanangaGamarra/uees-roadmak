<?php

namespace App\Http\Controllers;

use App\Articulos;
use Illuminate\Http\Request;
use App\Http\Requests\ArticulosStoreRequest;
use App\Http\Requests\ArticulosUpdateRequest;
use GuzzleHttp\Client;

class ArticulosController extends Controller
{
    /**
     * Display a listing of the resource.
     * Author: UEES_ANDY_ALVIA
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $articulos = Articulos::/* paginate(5) */get();
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost:3988/api/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        $response = $client->request('GET', 'articulos');
        $datos=json_decode($response->getBody()->getContents());
        $datos2 = $datos->articulos;  
        return view('articulos.index',compact('articulos','datos2'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.store
     * Author: UEES_ANDY_ALVIA
     * @param  \App\Articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function show($id_product)
    {
        $client2 = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost:3988/api/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        $response2 = $client2->request('GET', 'articulos_id/'.$id_product);
        $datosid=json_decode($response2->getBody()->getContents());
        $datos2id = $datosid->articulos[0];  
        return view('articulos.show', compact('datos2id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function edit(Articulos $articulos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articulos $articulos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articulos $articulos)
    {
        //
    }
}
