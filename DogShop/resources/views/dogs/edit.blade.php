<x-app-layout>
    <x-slot name="title"> {{__('Edit ') . $dog->name. ' - ' . config('app.name', 'Laravel')}}</x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight dark:text-white">
            {{__('Update dog:')}} {{$dog->name}}
        </h2>
    </x-slot>
    <form method="POST" action="{{route('dogs.update',$dog)}}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="grid grid-cols-1 gap-6 max-w-xl">
            @include('form-components.input-field', ["type"=>"text", "name"=>"name", "value"=>$dog->name])
            @include('form-components.input-field', ["type"=>"text", "name"=>"description", "value"=>$dog->description])
            @include('form-components.number-input-field', ["type"=>"text", "name"=>"price", "value"=>$dog->price])
            @include('form-components.image-input')
            @include('form-components.checkbox', ["name"=>"available", "check"=>$dog->available])
        </div>
        <x-jet-button type="submit" class="mt-4">{{__('Submit')}}</x-jet-button>
    </form>
</x-app-layout>
