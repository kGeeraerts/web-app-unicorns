<x-app-layout>
    <x-slot name="title">{{__('Terms and Conditions') . ' - ' . config('app.name', 'Laravel')}}</x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight dark:text-white">
            {{ __('Terms and Conditions') }}
        </h2>
    </x-slot>
    <div class="pt-4 bg-gray-100 dark:bg-gray-700">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
            <div class="w-full sm:max-w-2xl mt-6 p-6 bg-white dark:bg-gray-400 shadow-md overflow-hidden sm:rounded-lg prose">
                {!! $terms !!}
            </div>
        </div>
    </div>
</x-app-layout>
