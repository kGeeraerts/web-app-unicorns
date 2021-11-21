<x-app-layout>
    <x-slot name="title"> {{__('New dog') . ' - ' . config('app.name', 'Laravel')}}</x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight dark:text-white">
            {{__('New dog')}}
        </h2>
    </x-slot>
    <form method="POST" action="{{route('dogs.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 gap-6 max-w-xl">
            @include('form-components.input-field', ["type"=>"text", "name"=>"name"])
            @include('form-components.input-field', ["type"=>"text", "name"=>"description"])
            @include('form-components.image-input', ["type"=>"text", "name"=>"description", "required"=>"required",])
            @include('form-components.checkbox', ["name"=>"available"])
        </div>
        <x-jet-button type="submit" class="mt-4">{{__('Submit')}}</x-jet-button>
    </form>
</x-app-layout>
