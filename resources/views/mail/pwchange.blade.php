@component('mail::message')
    Your password has been changed!
@endcomponent
@component('mail::button', ['url' => env('APP_URL')])
    Go to the HZ-Skills-Monitor
@endcomponent