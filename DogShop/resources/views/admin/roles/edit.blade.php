<x-app-layout>
    <x-slot name="title"> {{__('Edit ') . $role->title. ' - ' . config('app.name', 'Laravel')}}</x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight dark:text-white">
            {{__('Update role#:')}} {{$role->title}}
        </h2>
    </x-slot>
    <form method="POST" action="/role#/{{$role->id}}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="grid grid-cols-1 gap-6">
            @include('form-components.input-field', ["type"=>"text", "name"=>"title", "value"=>"$role->title"])
            @include('form-components.checkbox', ["name"=>"published", "message"=>"Publish", "check"=>"$role->published"])
        </div>
        <x-jet-button type="submit" class="mt-4">{{__('Submit')}}</x-jet-button>
    </form>
</x-app-layout>
