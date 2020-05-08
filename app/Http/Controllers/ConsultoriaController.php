<?php

namespace App\Http\Controllers;

use App\Consultoria;
use App\SubConsultorias;

use Illuminate\Http\Request;
use App\Http\Requests\ConsultoriaStoreRequest;
use App\Http\Requests\ConsultoriaUpdateRequest;
use App\Http\Requests\SubConsultoriasUpdateRequest;
use GuzzleHttp\Client;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;

class ConsultoriaController extends Controller
{
    public function index()
    {   
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost:3988/api/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        $response = $client->request('GET', 'consultorias');
        $datos=json_decode($response->getBody()->getContents());
        $datos2 = $datos->consultorias;  
      /*   $page = Input::get('page');
        $paginate = 5;
        $offSet = ($page * $paginate) - $paginate;  
        $itemsForCurrentPage = array_slice($datos2, $offSet, $paginate, true);  
        $datos2 = new LengthAwarePaginator($itemsForCurrentPage, count($datos2), $paginate, $page);
        $datos2->setPath('consultorias'); */
        return view('consultorias.index')->withDatos2($datos2);
    }

    /**
     * Por definir el metodo indeximagen aun no se usa
     * en caso de eliminar, tambien eliminar la ruta
     */

    public function indeximagen()
    {   
        $ima="miavatar.png";
        return view('images.index',compact('ima'));
    }


    public function create()
    {
        return view('consultorias.create');
    }

    public function c_s_edit(subConsultorias $subconsultorias)
    {
        //dd($subconsultorias);
        return view('subconsultorias.edit_consultoria_subconsultoria',compact('subconsultorias'));
    }


    public function c_s_update(SubConsultoriasUpdateRequest $request,SubConsultorias $subconsultorias)
    {
        $subconsultorias ->update($request->all());
        return redirect()->route('consultorias.index')->with('info','Por favor acepte la consultoría en ROADMAKSHOP');
      //  return redirect()->route('subconsultorias.index',$subconsultorias->grupo)->with('info','Cuenta actualizada con exito');
    }


    public function store(ConsultoriaStoreRequest $request)
    {   

       
        $client= new Client();
        $valor_precio=0.0;

        if($request->price){
            $valor_precio=$request->price;
        }

      //  dd($valor_precio);

        $response =$client->request('POST', 'http://localhost:3988/api/insertconsultorias', [
            'form_params' => [
                'name' =>       $request->name,
                'price' =>      $valor_precio,
                'description' => $request->description,
            
            ]
        ]);

       

        $datosid=json_decode($response->getBody()->getContents());
        $consultoria = $datosid->consultorias;  
        
        $subConsultorias = SubConsultorias::create( [
            'name'  => $request->name,
            'precio'=> $valor_precio,
            'grupo'=> $consultoria->insertId,
            'req_indice'=> 1,
            'estado'=>'A'
        
        ]);


        return redirect()->route('c_s.edit',$subConsultorias->id);

        /*     return redirect()->route('consultorias.index')
            ->with('info', 'Consultoria guardada con exito'); */


    }

 
    public function show($id_product)
    {
        $client2 = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost:3988/api/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        $response2 = $client2->request('GET', 'consultorias_id/'.$id_product);
        $datosid=json_decode($response2->getBody()->getContents());
        $datos2id = $datosid->consultorias[0];  
        


        
        return view('consultorias.show', compact('datos2id'));
    }

 
    public function edit($id_product)
    {
        $client2 = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost:3988/api/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        $response2 = $client2->request('GET', 'consultorias_id/'.$id_product);
        $datosid=json_decode($response2->getBody()->getContents());
        $consultoria = $datosid->consultorias[0];  
        return view('consultorias.edit', compact('consultoria'));
    }

    public function update(ConsultoriaUpdateRequest $request,$id_product)
    {
        $client = new Client([
            'base_uri' => 'http://localhost:3988/api/',
            'timeout'  => 2.0,
        ]);
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

    public function destroy( $id_product)
    {
        
        /*CONSUMO API INACTIVAR CONSULTORIA*/

        $client2 = new Client([
            'base_uri' => 'http://localhost:3988/api/',
            'timeout'  => 2.0,
        ]);
        $response2 = $client2->request('GET', 'activarConsultorias_id/'.$id_product);
       
        /*FIN DE CONSUMO API*/
       /*  $client7= new Client();
        $request7 =$client7->delete('http://localhost:3988/api/deleteConsultorias_id/'.$id_product);
       */

        //DESHABILITAR TODOS SUS HIJOS
        $subConsultorias = SubConsultorias::where('grupo',$id_product)->get();
        if(empty($subConsultorias)){
            Flash::error('mensaje error');
            return redirect()->back();
        }

        foreach($subConsultorias as $childConsultorias){
            $childConsultorias->estado='I';
            $childConsultorias->save();
        }
        return redirect()->route('consultorias.index')
        ->with('info', 'Consultoría Y subconsultorias eliminado con éxito');
    }
}
