<x-guest-layout>
    <x-slot name="title"> {{__('Login') . ' - ' . config('app.name', 'Laravel')}}</x-slot>
    <x-jet-authentication-card>
        <x-slot name="logo">
            @include('auth.logo16x16')
        </x-slot>

        <x-jet-validation-errors class="mb-4"/>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}"/>
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                             required autofocus/>
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}"/>
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                             autocomplete="current-password"/>
            </div>

            <div class="flex mt-4 justify-between">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded " name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                       href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <div class="flex items-center justify-end mt-5">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                    {{ __('Register') }}
                </a>
                <x-jet-button class="ml-4">
                    {{ __('Login') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
