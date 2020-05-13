<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Compra extends Mailable
{
    use Queueable, SerializesModels;
    public $consultoria;

    /**
     * Create a new message instance.
     *
     * @return void
     */
   /*  $consultoria;
    $usuario;
     */
/*     public function __construct($v_consultoria, $v_usuario)
    {
        $consultoria=$v_consultoria;
        $usuario=$v_usuario;
        //
    }
 */

/* 
    public function __construct()
    {

        //
    } */

    public function __construct($consultoria)
    {
       
    $this->consultoria= $consultoria;
       
    }

 

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       //$consultoria = 'prueba consultoria';
     //  dd($this->consultoria);
       $consultoria=$this->consultoria;


        return $this->view('emails.consultoria_comprada',compact('consultoria'))
        ->with('name','Roadmak')
        ->from('approadmak@gmail.com', 'Roadmak')
        ->subject('Consultoría comprada');

        
    }
}
