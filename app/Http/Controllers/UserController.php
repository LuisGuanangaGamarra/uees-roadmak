<?php

namespace App\Http\Controllers;

use App\User;
use App\role_user;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::/* paginate(5) */get();

        return view('users.index',compact('users'));
    }

   

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $descripcion_rol=null;

        $roles = Role::where('slug','cliente')->orWhere('slug','consultor')->get();
        $rol_user = role_user::where('user_id',$user->id)->first();
        if(isset($rol_user)){
            $descripcion_rol = Role::find($rol_user->role_id);
        }
        
       
        return view('users.edit', compact('user', 'roles','descripcion_rol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {

        //CONSUME EL API PARA EDITAR EL PERFIL DEL USUARIO EN PRESTASHOP    JNI 29/04/2019
        $client = new Client([
            'base_uri' => 'http://localhost:3988/api/',
            'timeout'  => 2.0,
        ]);

        $email_user=$user->email;

        $rol_user = role_user::where('user_id',$user->id)->first();//SI NO TIENE ROLL ESPECÍFICO 
        if(empty($rol_user)){
           $roll_default='default';
         }else{

            $roles = Role::find($rol_user->role_id);
            if($roles->slug=='cliente' ||$roles->slug=='consultor' ){//SOLO SI SON ÉSTOS ROLES
                $roll_default='default';
            }else{
                $roll_default='rol_administrativo';
            }
        }

        if(!isset($request->roles) && $roll_default!='rol_administrativo'){//false <- si no está marcado
            //saber si tiene un rol de administrador |operador
            return redirect()->route('users.edit', $user->id)
            ->with('info', 'Es obligatorio la asignación del rol');
        }


        if( $roll_default=='default' ){//SOLO SI SON ÉSTOS ROLES

            $user->update($request->all());//LARAVEL   --actualiza todo
            $user->roles()->sync($request->get('roles'));//     --actualiza roles

            $response = $client->request('PUT', 'update_user_laravel/'.$email_user, [//PRESTASHOP
                'form_params'   => [
                    'name'      =>      $request->name,
                    'lastname'  =>      $request->lastname,
                    'email'     =>      $email_user,
                    'table'     =>      'ps_customer',
                ]
            ]);                



        }else{//SI ES OPERADOR, ADMINISTRADOR Y SÚPERADMINISTRADOR

            $user->update($request->all());//LARAVEL   --actualiza todo

            $response = $client->request('PUT', 'update_user_laravel/'.$email_user, [//PRESTASHOP
                'form_params'   => [
                    'name'      =>      $request->name,
                    'lastname'  =>      $request->lastname,
                    'email'     =>      $email_user,
                    'table'     =>     'ps_employee',
                ]
            ]);  



        }

        return redirect()->route('users.edit', $user->id)
        ->with('info', 'Usuario actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('info', 'Eliminado correctamente');
    }
}
