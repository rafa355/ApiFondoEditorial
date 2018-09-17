<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Notificaciones extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $notificacion;

    public function __construct($notificacion)
    {
        $this->notificacion = $notificacion;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.notificaciones')
        ->from('uneg@fondoeditorial.com','Fondo Editorial Uneg')
        ->subject('Nueva Notificación');
    }
}
