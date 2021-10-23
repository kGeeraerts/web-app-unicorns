<x-app-layout>
    <x-slot name="title"> {{__('Message ') . $message->id . ' - ' . config('app.name', 'Laravel')}}</x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight dark:text-white">
            {{ __('Message ') . $message->id}}
        </h2>
    </x-slot>

    <p class="text-lg dark:text-white">From: <span class="font-bold">{{$message->name}}</span> <span class="text-base text-gray-700 dark:text-gray-300">({{$message->email}})</span></p>
    <p class="text-lg dark:text-white">Subject: {{$message->subject}}</p>
    <p class="text-sm text-gray-700 dark:text-gray-300">Received at {{date('d/m/Y H:i:s', strtotime($message->created_at))}}</p>
    <p class="mt-2 dark:text-white">{{$message->question}}</p>

    @can('answer-messages')
        <div class="mt-4">
            <a href="{{route('admin.inbox.edit', $message)}}">
                <x-jet-button>Answer message</x-jet-button>
            </a>
        </div>
    @endcan
</x-app-layout>
