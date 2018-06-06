    @component('mail::message')
        An account has been made for you!
    @endcomponent
    @component('mail::button', ['url' => env('APP_URL')."/password/reset/".$token])
        Set password
    @endcomponent
