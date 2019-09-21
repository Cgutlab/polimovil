<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Contacto extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->nombre = $data["nombre"];
        $this->correo = $data["email"];
        $this->empresa = $data["empresa"];
        $this->telefono = $data["telefono"];
        $this->mensaje = $data["mensaje"];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->replyTo($this->correo,"{$this->nombre}, {$this->empresa}")->subject('Contacto')->view('pages.form.contacto')->with([
            'nombre' => $this->nombre,
            'telefono' => $this->telefono,
            'correo' => $this->correo,
            'empresa' => $this->empresa,
            'mensaje' => $this->mensaje
        ]);
    }
}
