<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;


use App\Events\AfterConsultoriaSubConsultoria as SubConsultoriasSavingEvent;


class AfterConsultoriaSubConsultoria_listener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function handle(SubConsultoriasSavingEvent $event)
    {
       // app('log')->info($event->Consultoria);
        //insertar el registro aqui
        //CONSULTAR EN LAS OTRAS TABLAS
        dd($event->Consultoria);
        $subConsultorias = SubConsultorias::create(
            [
                'name'  => $event->Consultoria->name,
                'precio'=> $event->Consultoria->precio,
                'grupo'=> $event->Consultoria->id_product,
                'req_indice'=> 1,
                'estado'=>'S'
            
            ]
        );

    }
}
