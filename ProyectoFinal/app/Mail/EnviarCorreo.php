<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnviarCorreo extends Mailable
{
    use Queueable, SerializesModels;

    public $cedula;
    public $clave;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cedula,$clave)
    {
        $this->cedula = $cedula;
        $this->clave = $clave;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('Modulo_3_Egresados.P_EncuestaCorreo');
    }
}
