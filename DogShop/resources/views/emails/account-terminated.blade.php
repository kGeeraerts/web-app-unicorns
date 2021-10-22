@component('mail::message')
# Account terminated

Hello {{$user->name}}

Your account has been removed from {{ config('app.name') }}.

If you believe this to be a mistake please fill out the contact form:
@component('mail::button', ['url' => route('contact.create')])
Contact {{ config('app.name') }}
@endcomponent

Sincerely,<br>
{{ config('app.name') }}
@endcomponent
