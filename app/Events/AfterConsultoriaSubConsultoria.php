<?php

namespace App\Events;
use App\SubConsultorias;
use App\Consultoria;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class AfterConsultoriaSubConsultoria
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public $SubConsultorias;
    public $Consultoria;


    public function __construct( Consultoria $Consultoria)
    {
        $this->Consultoria = $Consultoria;
    }



    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
