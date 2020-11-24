<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\Contacto;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function setMensaje(ContactRequest $request){
        Mail::to('sebalovi12@gmail.com')->send(new Contacto($request->validated()));
    }
}
