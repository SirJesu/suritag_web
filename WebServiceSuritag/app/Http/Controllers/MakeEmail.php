<?php

namespace App\Http\Controllers;
use App\EmailModel;
use Illuminate\Mail\Mailable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;


class MakeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $EmailModel;

    public function __construct(EmailModel $EmailModel)
    {
        $this->EmailModel = $EmailModel;
    }

    public function build()
    {
        return $this->view('sendemail');
    }
}