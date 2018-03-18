@component('mail::message')
Please activate your account

@component('mail::button', ['url' => ''])
Activate
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
