@component('mail::message')
# One new message

There is one new message waiting for you to be answered.

From **{{ $message->name }}** with "**{{ $message->subject }}**" as subject.

@component('mail::button', ['url' => route('admin.inbox.show', $message->id)])
    Read the message
@endcomponent

Or view all of your messages:

@component('mail::button', ['url' => route('admin.inbox.index')])
    Inbox
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
