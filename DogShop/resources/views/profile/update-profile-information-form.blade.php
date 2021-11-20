<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                       wire:model="photo"
                       x-ref="photo"
                       x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            "/>

                <x-jet-label for="photo" value="{{ __('Photo') }}"/>

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                         class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2"/>
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Name') }}"/>
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name"
                         autocomplete="name"/>
            <x-jet-input-error for="name" class="mt-2"/>
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}"/>
            <x-jet-input id="email" type="email" class="my-1 block w-full" wire:model.defer="state.email"/>
            <x-jet-input-error for="email" class="mt-2"/>
            @include('form-components.checkbox', ['name'=>'show_email', 'message'=>'Do you want to show your email on your public page?', 'wire'=>'wire:model.defer=state.show_email'])
        </div>
        <!-- Birthday -->
        <div class="col-span-6 sm:col-span-4">
            <label for="birthday" class="block font-medium text-sm text-gray-700">{{ __('Birthday') }}</label>
            <input id="birthday" type="date" class="shadow-sm mt-1 block w-full sm:text-sm rounded-md"
                   wire:model.defer="state.birthday"/>
            <x-jet-input-error for="birthday" class="mt-2"/>
        </div>

        <!-- Biography -->
        <div class="col-span-6 sm:col-span-4">
            <label for="biography" class="block font-medium text-sm text-gray-700">{{ __('Biography') }}</label>
            <textarea id="biography" name="biography" rows="3"
                      class="shadow-sm mt-1 block w-full sm:text-sm rounded-md" wire:model.defer="state.biography">
            </textarea>
            <p class="mt-2 text-sm text-gray-500">
                Brief description for your profile. Max 255 characters. <br>
                Tell us about what life you want to give to your future dog, why you want a dog etc. <br>
            </p>
            <x-jet-input-error for="biography" class="mt-2"/>
        </div>
    </x-slot>

    <x-slot name="actions">
        <a href="{{route('member.show', auth()->user())}}">
            <x-jet-secondary-button class="mr-96">
                {{ __('View profile') }}
            </x-jet-secondary-button>
        </a>
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
