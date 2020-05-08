<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\SubConsultorias;
use GuzzleHttp\Client;
use App\Http\Requests\SubConsultoriasStoreRequest;
use App\Http\Requests\SubConsultoriasUpdateRequest;

class SubConsultoriasController extends Controller
{
    public function index()
    {
        $subConsultorias = SubConsultorias::/* paginate(5) */get();
     
        return view('subconsultorias.index',compact('subConsultorias'));
    }

    public function subconsultoriasindex($consultoria)
    {
       
        $subConsultorias = SubConsultorias::where('grupo',$consultoria)->/* paginate(5) */get();

        $client = new Client([
            'base_uri' => 'http://localhost:3988/api/',
            'timeout'  => 2.0,
        ]);

        $response = $client->request('GET', 'consultorias_id/'.$consultoria);
        $datosid=json_decode($response->getBody()->getContents());
        $consultoria = $datosid->consultorias[0]; 

     
        return view('subconsultorias.index',compact('subConsultorias','consultoria'));
    }

    
    
    public function create($subconsultoria)
    {
        //DD($subconsultorias);
        $subConsultorias = new SubConsultorias;
        $subConsultorias->id =0;
        $subConsultorias->grupo =$subconsultoria;
        


        $client = new Client([
            'base_uri' => 'http://localhost:3988/api/',
            'timeout'  => 2.0,
        ]);
        $response = $client->request('GET', 'consultorias');
        $datos=json_decode($response->getBody()->getContents());

        $datos2 = $datos->consultorias;

        $selectCategories = array();
        $elegirconsultoria = array();
        foreach($datos2 as $category) {
            $elegirconsultoria[$category->id_product] = $category->id_product ." - ". $category->name;
        }
        return view('subconsultorias.create', compact('subConsultorias','datos2','elegirconsultoria','subconsultoria'));
    }

 
    public function store(SubConsultoriasStoreRequest $request)
    {
        $subConsultorias = SubConsultorias::create($request->all());

        return redirect()->route('subconsultorias.show', $subConsultorias->id)
            ->with('info', 'Sub-Consultoria guardada con éxito');
    }

    public function show(SubConsultorias $subConsultorias)
    {
        return view('subconsultorias.show', compact('subConsultorias'));
    }


    public function edit(SubConsultorias $subConsultorias)
    {

        $client = new Client([
            'base_uri' => 'http://localhost:3988/api/',
            'timeout'  => 2.0,
        ]);
        $response = $client->request('GET', 'consultorias');
        $datos=json_decode($response->getBody()->getContents());
        $datos2 = $datos->consultorias;
        $selectCategories = array();
        $elegirconsultoria = array();
        foreach($datos2 as $category) {
            $elegirconsultoria[$category->id_product] = $category->id_product ." - ". $category->name;
        }
    
        return view('subconsultorias.edit', compact('subConsultorias','datos2','elegirconsultoria'));
    }

  
    public function update(SubConsultoriasUpdateRequest $request, SubConsultorias $subConsultorias)
    {
        $subConsultorias->update($request->all());

        return redirect()->route('subconsultorias.edit', $subConsultorias->id)
        ->with('info', 'Sub-Consultoria actualizada con éxito');
    }

    public function destroy(SubConsultorias $subConsultorias)
    {
     //   dd();
   //    $subConsultorias->delete();

        $deshabilitadConsultoria = SubConsultorias::find($subConsultorias->id);
        if(empty($deshabilitadConsultoria)){
            Flash::error('mensaje error');
            return redirect()->back();
        }
      
            $deshabilitadConsultoria->estado='I';
            $deshabilitadConsultoria->save();

        return back()->with('info', 'Sub-Consultoria deshabilitada correctamente');
    }

}
