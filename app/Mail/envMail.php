<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class envMail extends Mailable
{
    public $message = "";
    public $id;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
       
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $TimeSheets = \App\TimeSheet::find($this->id);
        $cliente = \App\Cliente::find($TimeSheets['cliente_id']);
        
        $address = $cliente['email'];
        $name = $cliente['nome'];
        $subject = "Apontamento do dia " . $TimeSheets['data'].". Cliente: ". $cliente['nome'];        
        return $this->view('emails.apontamento', compact('TimeSheets', 'cliente'))
                ->from($address, $name)
                ->subject($subject);
    }
}
