<?php 
namespace App\Http\Controllers; 

use App\Http\Requests; 

use App\Http\Controllers\Controller; 

use Illuminate\Http\Request; 
use App\Http\Middleware\CheckRole;
use Auth; 
use App\role_user;


class ImageController extends Controller { 
/*
    public function __construct() 
    { 
     $this->middleware('auth'); 
    } */

    public function getImage($idempresa, $filename) { 
        //1. VER QUIEN ESTÁ LOGEADO
        try{
            $idlog = Auth::user()->id;
        }
        catch(\Exception $e)
        {
            $path = storage_path('images/'.$idempresa.'/'.$filename); 
            if(file_exists ($path )){
                $type = "image/jpeg"; 
                header('Content-Type:'.$type); 
                header('Content-Length: ' . filesize($path)); 
                readfile($path); 
                exit();
            }else{ 
                return "La ruta no existe..";
            }
        }
       
        // dd("$idlog");
        $role_tipo = role_user::where('user_id',$idlog)->get();
        //dd($role_tipo[0]->role_id);
        switch( $role_tipo[0]->role_id ){
            case 2:
            case 1:
            case 3:
                $path = storage_path('images/'.$idempresa.'/'.$filename);
                if(file_exists ($path )){
                    $type = "image/jpeg"; 
                    header('Content-Type:'.$type); 
                    header('Content-Length: ' . filesize($path)); 
                    readfile($path); 
                }else{ 
                    return "La ruta no existe..";
                        }
            case 4 :
                if ($idlog == $idempresa){
                    $path = storage_path('images/'.$idempresa.'/'.$filename);
                    if(file_exists ($path )){
                        $type = "image/jpeg"; 
                        header('Content-Type:'.$type); 
                        header('Content-Length: ' . filesize($path)); 
                        readfile($path); 
                    }else{ 
                        return "La ruta no existe..";
                            }}
                else{
                return "cliente falso";
                }
            default:  return "retornar a index";
  }
 
        //2. CONSULTA SU ROLL
        /* 
        sacamos el roll
        case consultor
        $path = '/var/www/html/uees-roadmak/storage/images/'.$idempresa.'/'.$filename; 
        $type = "image/jpeg"; 
        header('Content-Type:'.$type); 
        header('Content-Length: ' . filesize($path)); 
        readfile($path); 
        case cliente
        obtener id del usuario logieado
        compara mi id con el id de la idcarpeta
            si no es igual haver un abort
            redireccionar al home
        $path = '/var/www/html/uees-roadmak/storage/images/'.$idempresa.'/'.$filename; 
        $type = "image/jpeg"; 
        header('Content-Type:'.$type); 
        header('Content-Length: ' . filesize($path)); 
        readfile($path); */  
        
        /* 
        default
        redirect al home
        */ 
    } 

} 