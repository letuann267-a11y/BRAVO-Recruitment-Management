@component("mail::message")

# Congratulation!!!
# Your application has been approved, {{ $name }} {{ $surname }}!!

@component('mail::panel')
Thank you for your application for the job: {{$jobTitle}} at {{$address}}. 
@endcomponent

@component('mail::button', ['url' => route('home')])
View the Company
@endcomponent

@component('mail::subcopy')
If you have any questions or concerns, feel free to contact us. We wish you the best in your new role!
@endcomponent

Thanks, <br>
{{ $company }}

@endcomponent


