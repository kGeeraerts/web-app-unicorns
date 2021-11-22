<x-jet-action-section>
    <x-slot name="title">
        {{ __('Download user data') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Download all the user data.') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            {{ __('Download all the user data associated with your account.') }}
        </div>

        <div class="mt-5">
            <x-jet-confirms-password wire:then="downloadUserData({{auth()->user()}})">
                <x-jet-button type="button" wire:loading.attr="disabled">
                    {{ __('Download user data') }}
                </x-jet-button>
            </x-jet-confirms-password>
        </div>
    </x-slot>
</x-jet-action-section>
