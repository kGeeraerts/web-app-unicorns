<x-app-layout>
    <x-slot name="title"> {{__('New ####') . ' - ' . config('app.name', 'Laravel')}}</x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight dark:text-white">
            {{__('New ####')}}
        </h2>
    </x-slot>
    <form method="POST" action="{{route('####.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 gap-6 max-w-xl">
            @include('form-components.input-field', ["type"=>"text", "name"=>"title"])
            @include('form-components.checkbox', ["name"=>"published", "message"=>"Publish"])
        </div>
        <x-jet-button type="submit" class="mt-4">{{__('Submit')}}</x-jet-button>
    </form>
</x-app-layout>
