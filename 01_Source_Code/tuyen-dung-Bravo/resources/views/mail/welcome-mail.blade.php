@component("mail::message")

# {{ __('Verify register', ['name' => $name]) }}!!

@component('mail::button', ['url' => route('verification.verify', $id)])
Click here
@endcomponent

@component('mail::panel')
This is a verify mail from BRAVO
@endcomponent

@component('mail::subcopy')
If you have any questions or concerns, feel free to contact us.
@endcomponent

Thanks, <br>
{{ config('app.name') }}

@endcomponent