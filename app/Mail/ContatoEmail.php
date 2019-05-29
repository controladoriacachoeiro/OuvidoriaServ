<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContatoEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $dados;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dados)
    {
        $this->dados = $dados;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->dados->tipoFormulario == "Solicitação"){
            
            if(!empty($this->dados->file)){
                $x = $this->from($this->dados->email, "Formulário do Site")->subject("Formulário de " . $this->dados->tipoFormulario)->view('email.emailSolicitacao');
                
                foreach ($this->dados->file as $file2){
                    
                    $x->attach($file2->getRealPath(), array ('as' => $file2->getClientOriginalName(), 'mime' => $file2->getClientMimeType()));
                }

                return $x;
            }

            return $this->from($this->dados->email, "Formulário do Site")->subject("Formulário de " . $this->dados->tipoFormulario)->view('email.emailSolicitacao');
            
        } else if($this->dados->tipoFormulario == "Reclamação"){

            if(!empty($this->dados->file)){
                $x = $this->from($this->dados->email, "Formulário do Site")->subject("Formulário de " . $this->dados->tipoFormulario)->view('email.emailReclamacao');
                
                foreach ($this->dados->file as $file2){
                    
                    $x->attach($file2->getRealPath(), array ('as' => $file2->getClientOriginalName(), 'mime' => $file2->getClientMimeType()));
                }

                return $x;
            }

            return $this->from($this->dados->email, "Formulário do Site")->subject("Formulário de " . $this->dados->tipoFormulario)->view('email.emailReclamacao');

        } else if($this->dados->tipoFormulario == "Elogio/Sugestão"){

            return $this->from($this->dados->email, "Formulário do Site")->subject("Formulário de " . $this->dados->tipoFormulario)->view('email.emailElogioSugestao');

        } else if($this->dados->tipoFormulario == "Denúncia"){

            if(!empty($this->dados->file)){
                $x = $this->from($this->dados->email, "Formulário do Site")->subject("Formulário de " . $this->dados->tipoFormulario)->view('email.emailDenuncia');
                
                foreach ($this->dados->file as $file2){
                    
                    $x->attach($file2->getRealPath(), array ('as' => $file2->getClientOriginalName(), 'mime' => $file2->getClientMimeType()));
                }

                return $x;
            }

            return $this->from($this->dados->email, "Formulário do Site")->subject("Formulário de " . $this->dados->tipoFormulario)->view('email.emailDenuncia');

        } else if($this->dados->tipoFormulario == "LAI"){

            return $this->from($this->dados->email, "Formulário do Site")->subject("Formulário de " . $this->dados->tipoFormulario)->view('email.emailLAI');
        } else if($this->dados->tipoFormulario == "Recurso"){

            return $this->from($this->dados->email, "Formulário do Site")->subject("Formulário de " . $this->dados->tipoFormulario)->view('email.emailRecurso');
        }
        
    }
}
