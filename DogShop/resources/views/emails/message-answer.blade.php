@component('mail::message')
# Your message has been answered

Hello {{$message->name}}

## Your question:
{{ $message->question }}
## The answer:
{{ $message->answer }}

We hope to see you back on
@component('mail::button', ['url' => route('home')])
    {{ config('app.name') }}
@endcomponent

Kind regards,<br>
{{ config('app.name') }}
@endcomponent
