<?php

namespace App\Services\ContactoForm;

use App\Mail\AutomaticFormResponse;
use Illuminate\Mail\Mailer;

class ServiceContacto
{
    public function __construct(Mailer $mailer , AutomaticFormResponse $email)
    {
        $this->mailer = $mailer;
        $this->email = $email;
    }

    public function automaticFormResponse($validated)
    {
        $this->email->info = $validated;
        $this->mailer->to($validated['email'])->send($this->email);
    }
}