@component('mail::message')
    Hola {{$info['nombre']}} ! Hemos recibido tu mensaje. <br><br>
    A la brevedad nos pondremos en contacto contigo. <br>
    Saludos!
    @slot('subcopy')
        Gracias por confiar en nosotros.
    @endslot    
@endcomponent