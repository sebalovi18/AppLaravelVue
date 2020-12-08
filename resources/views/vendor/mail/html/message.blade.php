@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header')
        @endcomponent
    @endslot
    {{-- Body --}}
    {{ $slot }}

    {{-- Panel --}}
    @slot('panel')
        @component('mail::panel')
            {{ $panel ?? ''}}
        @endcomponent
    @endslot
    {{-- Footer --}}
    @slot('subcopy')
        @component('mail::subcopy')
            {{ $subcopy ?? ''}}
        @endcomponent
    @endslot
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} . Restaurante el muelle San nicolás de los arroyos- @lang('All rights reserved.')
        @endcomponent
    @endslot
@endcomponent
