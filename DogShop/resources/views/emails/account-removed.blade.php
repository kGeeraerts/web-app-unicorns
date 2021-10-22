@component('mail::message')
# Account removed

Hello {{$user->name}}

Your account has been removed from {{ config('app.name') }}.

We're sad to see you leaving.

Sincerely,<br>
{{ config('app.name') }}
@endcomponent
