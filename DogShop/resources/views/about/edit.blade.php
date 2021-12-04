<x-app-layout>
    <x-slot name="title"> {{__('Edit About page') . ' - ' . config('app.name', 'Laravel')}}</x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight dark:text-white">
            {{__('Update the About us page:')}}
        </h2>
    </x-slot>
    <form method="POST" action="{{route('about.update', $about)}}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="grid grid-cols-1 gap-6 max-w-xl">
            @include('form-components.textarea', ["type"=>"text", "name"=>"section1", "value"=>$about->section1])
            @include('form-components.textarea', ["type"=>"text", "name"=>"section2", "value"=>$about->section2])
            @include('form-components.textarea', ["type"=>"text", "name"=>"section3", "value"=>$about->section3])
        </div>
        <x-jet-button type="submit" class="mt-4">{{__('Submit')}}</x-jet-button>
    </form>
</x-app-layout>
