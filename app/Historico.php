<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    
    protected $table = 'historico';//sub_indices

    protected $fillable = [ 
                            //CONSULTORIAS
                            'name_consultoria',
                            'precio_consultoria',
                            'descripcion_consultoria',
                            //SUB-CONSULTORIAS
                            'name_subconsultoria',
                            'precio_subconsultoria',
                            //DATOS CLIENTE
                            'cedula_ruc_cliente',
                            'nombre_cliente',
                            'apellidos_cliente',
                            'empresa_cliente',
                            'direccion_cliente',
                            'ciudad_cliente',
                            'telefono_cliente',
                            'pais_cliente',

                            'id_consultoria_comprada',
                            'num_periodos',

                            'estado',

                            'archivo',
                            //USUARIO COMPRADOR
                            'name_usercomprador',
                            'lastname_usercomprador',
                            'email_usercomprador',
                            //USUARIO CONSULTOR
                            'name_userconsultor',
                            'lastname_userconsultor',
                            'email_userconsultor'

                          ];


}
