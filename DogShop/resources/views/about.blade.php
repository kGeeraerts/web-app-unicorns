<x-app-layout>
    <x-slot name="title">{{__('About us') . ' - ' . config('app.name', 'Laravel')}}</x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight dark:text-white">
            {{ __('About us') }}
        </h2>
    </x-slot>

    <div class="flex flex-col items-center pt-6 sm:pt-0">

        <div
            class="w-full sm:max-w-2xl mt-6 p-6 overflow-hidden sm:rounded-lg prose">

            <p class="text-base dark:text-gray-100 mb-2">
                The Dogshop is a non-profit organisation with as goal to end the suffering of street dogs worldwide.
                We're engaging ourselfs to decrease the amount of stray dogs by 60% by 2030.
                This through projects of education and adoption to save the lives of the wonderful animals.
            </p>
            <p class="text-base dark:text-gray-100 mb-2">
                We believe that every dog has the same rights and responsibilities as everyone else in the world.
                We promote compassion, empathy and cooperation. We aim to make the world a better, happier and
                friendlier place.
                With your help we can save the lives of dogs in need.
            </p>
            <p class="text-base dark:text-gray-100">
                Dogshop was started by Octaaf aan de Bolle in 2020 when he went to feed Fiffi. That evening Fiffi came
                back with some friends from the street.
                Wanting to help them Octaaf let them into his home and gave them food and shelter.
                Realizing he couldn't keep them all he started to look for a good home with friends and family.
                Soon this commitment became an organization continuing the good work Fiffi started.
            </p>
        </div>
    </div>

</x-app-layout>
