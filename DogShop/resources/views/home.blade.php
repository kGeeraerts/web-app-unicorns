<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight dark:text-white">
            {{ __('Home') }}
        </h2>
    </x-slot>
    @include('alerts.confirmation-alert')

    <div class="relative overflow-hidden">
        <div class="max-w-7xl mx-auto">
            <div class="relative z-10 pb-8 sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                    <div class="sm:text-center lg:text-left">
                        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                            <span class="block xl:inline text-yellow-500">Welcome to <span
                                    class="font-black">DogShop</span></span>
                        </h1>
                        <p class="mt-3 text-base text-gray-500 dark:text-gray-200 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                            By adopting a dog, not only are you saving that dog,
                            you're also making room in the rescue so we can save another dog.
                            Dog adoption is truly a continuous cycle of saving lives! <br>
                            Thank you for considering adopting a dog!
                        </p>
                        <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                            <div class="rounded-md shadow">
                                <a href="{{route('dogs.index')}}"
                                   class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700 md:py-4 md:text-lg md:px-10">
                                    View the Dogs
                                </a>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full rounded-3xl"
                 src="{{Storage::url('dog.jpg')}}" alt="cute Havanese dog">
        </div>
    </div>
</x-app-layout>
