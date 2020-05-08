<?php

namespace App\Http\Controllers;

use App\Consultoria;
use Illuminate\Http\Request;
use App\Http\Requests\ConsultoriaStoreRequest;
use App\Http\Requests\ConsultoriaUpdateRequest;
use GuzzleHttp\Client;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;

class ConsultoriaaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_ima()
    {    
        return view('images.index');
   
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('consultorias.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConsultoriaStoreRequest $request)
    {   


      //  $consultoria = Consultoria::create($request->all());
       // return redirect()->route('consultorias.edit', $consultoria->id)
        //    ->with('info', 'Consultoria guardada con exito');



            
    
            //aqui hacer el consumo de post
            //$client2 = new Client();

          

            $client77= new Client();
$request77 =$client77->request('POST', 'http://localhost:3988/api/insertconsultorias', [
    'form_params' => [
        'name' =>       $request->name,
        'price' =>   $request->price,
        'description' =>      $request->description,
      
    ]
]);
            return redirect()->route('consultorias.edit', $consultoriainsert->id)
            ->with('info', 'Consultoría guardada con éxito');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Consultoria  $consultoria
     * @return \Illuminate\Http\Response
     */
    public function show($id_product)
    {
        //var_dump($id_product);
        $client2 = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost:3988/api/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        $response2 = $client2->request('GET', 'consultorias_id/'.$id_product);
        //  dd($response2);
        $datosid=json_decode($response2->getBody()->getContents());
        //dd($datosid->consultorias[0]);
        $datos2id = $datosid->consultorias[0];  
        return view('consultorias.show', compact('datos2id'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consultoria  $consultoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id_product)
    {
        $client2 = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost:3988/api/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        $response2 = $client2->request('GET', 'consultorias_id/'.$id_product);
       //  dd($response2);
         $datosid=json_decode($response2->getBody()->getContents());
       //dd($datosid->consultorias[0]);
        $consultoria = $datosid->consultorias[0];  
        return view('consultorias.edit', compact('consultoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consultoria  $consultoria
     * @return \Illuminate\Http\Response
     */
    public function update(ConsultoriaUpdateRequest $request,$id_product)
    {
        //var_dump($id_product);
        //dd($request->name,$request->price,$request->description,$request->plantilla);
        //dd($request->plantilla);
        //$consultoria->update($request->all());
        //aqui hacer el consumo de post
        $client = new Client([
            'base_uri' => 'http://localhost:3988/api/',
            'timeout'  => 2.0,
        ]);
        //dd($client);
        //crear cliente post  updateconsultorias_id/15
        $response = $client->request('PUT', 'updateconsultorias_id/'.$id_product, [
            'form_params' => [
                'name' =>       $request->name,
                'price' =>   $request->price,
                'description' =>      $request->description,
                /* 'plantilla' =>   $request->plantilla , */
            ]
        ]);
        return redirect()->route('consultorias.edit', $id_product)
         ->with('info', 'Consultoría actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consultoria  $consultoria
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id_product)
    {
 
        //$client7 = new Client([
         //   'base_uri' => 'http://localhost:3988/api/',
          //  'timeout'  => 2.0,
        //]);
       // deleteConsultorias_id/42;
       // $consultoria->delete();
      
        
$client7= new Client();
$request7 =$client7->request('GET', 'http://localhost:3988/api/deleteConsultorias_id/'.$id_product);
       // $client7->delete('GET', 'deleteConsultorias_id/'.$id_product);
     //   $request = new Request('delete', 'http://localhost:3988/api/deleteConsultorias_id/'.$id_product);
      //  $response = $client->delete($request, ['timeout' => 2]);
        //  dd($response2);
          //$datosid=json_decode($response2->getBody()->getContents());
        //dd($datosid->consultorias[0]);
        // $consultoria = $datosid->consultorias[0];  
        // return back()->with('info', 'Eliminado correctamente');
        return redirect()->route('consultorias.index')
        ->with('info', 'Consultoría eliminada con éxito');
    }
}
