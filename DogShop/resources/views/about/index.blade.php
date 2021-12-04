<x-app-layout>
    <x-slot name="title">{{__('About us') . ' - ' . config('app.name', 'Laravel')}}</x-slot>
    <x-slot name="header">
        <div class="justify-between flex">
            <h2 class="font-semibold text-2xl text-gray-900 leading-tight dark:text-white">
                {{ __('About us') }}
            </h2>
            @can('edit-about')
                <div class="space-x-2">
                    @include('button-components.edit-button', ['name'=>'Edit this page', 'route' => 'about.edit', 'item' => 1])
                </div>
            @endcan
        </div>
    </x-slot>
    @include('alerts.confirmation-alert')
    <div class="flex flex-col items-center pt-6 sm:pt-0">
        <div class="w-full sm:max-w-2xl mt-6 p-6 overflow-hidden sm:rounded-lg prose">
            <p class="text-base dark:text-gray-100 mb-2">{{$about->section1}}</p>
            <p class="text-base dark:text-gray-100 mb-2">{{$about->section2}}</p>
            <p class="text-base dark:text-gray-100">{{$about->section3}}</p>
        </div>
    </div>

</x-app-layout>
