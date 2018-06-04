@component('mail::message')
    @component('mail::button', ['url' => env('APP_URL')."/".$token])
        reset
    @endcomponent
@endcomponent