<x-app-layout>
    <x-slot name="header">
        <x-slot name="title"> {{__('Contact') . ' - ' . config('app.name', 'Laravel')}}</x-slot>
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight dark:text-white">
            {{ __('Contact') }}
        </h2>
    </x-slot>
    @include('alerts.confirmation-alert')
    <p class="dark:text-white mb-4">If you have any questions please fill out the form beneath.</p>
    <form method="POST" action="{{route('contact.store')}}">
        @csrf
        <div class="grid grid-cols-1 gap-6 max-w-xl">
            @include('form-components.input-field', ["type"=>"text", "name"=>"name"])
            @include('form-components.input-field', ["type"=>"email", "name"=>"email"])
            @include('form-components.input-field', ["type"=>"text", "name"=>"subject"])
            @include('form-components.textarea', ["name"=>"question"])
            @include('form-components.checkbox', ["name"=>"consent", "required"=>"required", "message"=>"By checking this checkbox you agree that your personal data will be stored in the database of DogShop. DogShop handles your data as described in the <a href=".route('terms.show')." target=\"_blank\" class=\"underline text-gray-600 hover:text-gray-900 dark:text-gray-50 dark:hover:text-gray-200\">Terms of Service</a>. You are responsible for the correctness of this information. This information will not shared with any third parties (<a target=\"_blank\" href=".route('policy.show')." target=\"_blank\" class=\"underline text-gray-600 hover:text-gray-900 dark:text-gray-50 dark:hover:text-gray-200\">Privacy Policy</a>)"])
        </div>
        <x-jet-button type="submit" class="mt-4">Submit</x-jet-button>
    </form>
</x-app-layout>
