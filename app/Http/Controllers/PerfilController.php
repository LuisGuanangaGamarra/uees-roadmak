<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PerfilUpdateRequest;
use GuzzleHttp\Client;
use App\User;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = User::find(Auth::User()->id);

        if(empty($usuario)){
           Flash::error('mensaje error');
           return redirect()->back();
        }

        return view('perfil.index',compact('usuario'));
    }

   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $usuario = User::find(Auth::User()->id);

        if(empty($usuario)){
           Flash::error('mensaje error');
           return redirect()->back();
        }

        return view('perfil.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PerfilUpdateRequest $request)
    {

        //CONSUME EL API PARA EDITAR EL PERFIL DEL USUARIO EN PRESTASHOP    JNI 26/04/2019
        $client = new Client([
            'base_uri' => 'http://localhost:3988/api/',
            'timeout'  => 2.0,
        ]);

        
        $usuario = User::find(Auth::User()->id);
        if(empty($usuario)){
            Flash::error('mensaje error');
            return redirect()->back();
        }
        $email_user=$usuario->email;//JNI       26/04/2019

        if($email_user==$request->email){//SI ES IGUAL SE GUARDA   JNI 26/04/2019

            $usuario->update($request->all());//LARAVEL
            if($request->file('file')){
                $path = Storage::disk('public')->put('images/users', $request->file('file'));
                $usuario->fill(['file' => $path])->save();
            }

            if(Auth::user()->isRole('cliente') || Auth::user()->isRole('consultor')){//SI ES cliente Ó consultor
                $response = $client->request('PUT', 'update_user_laravel/'.$email_user, [//PRESTASHOP
                    'form_params'   => [
                        'name'      =>      $request->name,
                        'lastname'  =>      $request->lastname,
                        'email'     =>      $request->email,
                        'table'     =>      'ps_customer',
                    ]
                ]);                
                 
            }else{//SI ES OPERADOR, ADMINISTRADOR Y SÚPERADMINISTRADOR

                $usuario->update($request->all());//LARAVEL
                if($request->file('file')){
                    $path = Storage::disk('public')->put('images/users', $request->file('file'));
                    $usuario->fill(['file' => $path])->save();
                }

                $response = $client->request('PUT', 'update_user_laravel/'.$email_user, [//PRESTASHOP
                    'form_params'   => [
                        'name'      =>      $request->name,
                        'lastname'  =>      $request->lastname,
                        'email'     =>      $email_user,
                        'table'     =>     'ps_employee',
                    ]
                ]);

            }

            return redirect()->route('perfil.edit')
            ->with('info', 'Perfil actualizado con éxito');



        }else{//ES DIFERENTE 

            if(Auth::user()->isRole('cliente') || Auth::user()->isRole('consultor')){//SI ES cliente Ó consultor

                //ANTES DE ACTUALIZARLO HAY QUE PREGUNTAR SI EXISTE EL CORREO EN LA BASE
                $response_get_usuario = $client->request('GET', 'get_user_byEmail_laravel_customer/'.$request->email);
                $datos=json_decode($response_get_usuario->getBody()->getContents());
                

                
                if (empty($datos)){//TRUE -> []

                    $usuario_logeado = User::where('email',$email_user);
                    if(empty($usuario_logeado)){//TRUE -> []


                        $usuario->update($request->all());//LARAVEL
                        if($request->file('file')){
                            $path = Storage::disk('public')->put('images/users', $request->file('file'));
                            $usuario->fill(['file' => $path])->save();
                        }
    
    
                        $response = $client->request('PUT', 'update_user_laravel/'.$email_user, [//PRESTASHOP
                            'form_params'   => [
                                'name'      =>   $request->name,
                                'lastname'  =>   $request->lastname,
                                'email'     =>   $request->email,
                                'table'     =>   'ps_customer',
                            ]
                        ]);  
    
                        return redirect()->route('perfil.edit')
                        ->with('info', 'Perfil actualizado con éxito');


                    }else{
                        return redirect()->route('perfil.edit')
                        ->with('message','El correo ya existe, por favor ingrese otro');
                    }
                    
                }else{
                    return redirect()->route('perfil.edit')
                    ->with('message','El correo ya existe, por favor ingrese otro');
                }

            }else{//SI ES OTRO ROL DEBE ACTUALIZAR LA OTRA TABLA

                //  PREGUNTAR SI EL CORREO EXISTE EN LA OTRA TABLA
                $response_get_usuario = $client->request('GET', 'get_user_byEmail_laravel_employee/'.$request->email);
                $datos=json_decode($response_get_usuario->getBody()->getContents());

                if (empty($datos)){//TRUE -> []

                    $usuario_logeado = User::where('email',$email_user);
                    if(empty($usuario_logeado)){//TRUE -> []

                        $usuario->update($request->all());//LARAVEL
                        if($request->file('file')){
                            $path = Storage::disk('public')->put('images/users', $request->file('file'));
                            $usuario->fill(['file' => $path])->save();
                        }

    
                        $response = $client->request('PUT', 'update_user_laravel/'.$email_user, [//PRESTASHOP
                            'form_params'   => [
                                'name'      =>      $request->name,
                                'lastname'  =>      $request->lastname,
                                'email'     =>      $email_user,
                                'table'     =>     'ps_employee',
                            ]
                        ]); 
    
                        return redirect()->route('perfil.edit')
                        ->with('info', 'Perfil actualizado con éxito');


                    }else{
                        return redirect()->route('perfil.edit')
                        ->with('message','El correo ya existe, por favor ingrese otro');
                    }
                    
                }else{
                    return redirect()->route('perfil.edit')
                    ->with('message','El correo ya existe, por favor ingrese otro');
                }





            }


 


        }


    }

   
}
