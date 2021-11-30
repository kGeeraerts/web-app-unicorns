<x-app-layout>
    <x-slot name="title"> {{__('Book appointment') . ' - ' . config('app.name', 'Laravel')}}</x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight dark:text-white">
            {{ __('Book appointment') }}
        </h2>
    </x-slot>
    @include('alerts.confirmation-alert')
    <div class="flex flex-col mb-4">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 dark:border-gray-800 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-800" aria-label="Cart">
                        <thead class="bg-gray-50 dark:bg-gray-600">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                {{__('Number')}}
                            </th>
                            <th scope="col"
                                class="pl-20 pr-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                {{__('Name')}}
                            </th>
                            <th scope="col"
                                class="hidden md:flex px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                {{__('description')}}
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                {{__('Action')}}
                            </th>
                        </tr>
                        </thead> @php $counter = 0;  $total = 0 @endphp
                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-800">
                        @foreach($cart->dogs as $dog)
                            <tr class="dark:bg-gray-500">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <p class="text-sm text-gray-900 dark:text-gray-100">
                                        {{$counter + 1}}
                                    </p>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full object-cover"
                                                 src="{{ Storage::url($dog->image) }}" alt="Your future dog">
                                        </div>
                                        <a href="{{route('dogs.show', $dog)}}">
                                            <p class="text-sm text-gray-900 dark:text-gray-100">
                                                {{$dog->name}}
                                            </p>
                                        </a>
                                    </div>
                                </td>
                                <td class="px-6 py-4 max-w-xl hidden md:flex">
                                    <p class="text-sm text-gray-900 dark:text-gray-100">
                                        {{$dog->description}}
                                    </p>
                                </td>
                                <td class="pl-6 py-4 whitespace-nowrap space-x-2 mr-4">
                                    {{--                                    @include('button-components.edit-button', ['route'=>'cart.edit', 'item'=>$dog])--}}
                                    @include('button-components.delete-button', ['route'=>'cart.destroy', 'counter'=>$counter, 'item'=>$dog, 'model'=>'dog']) @php $counter++ @endphp
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="relative p-4 h-20 ">
            <form action="{{route('cart.order', $cart)}}" method="post">
                @csrf
                <div class="absolute bottom right-0 inline-block flex flex-row justify-end items-end space-x-4">
                    @guest
                        @include('form-components.input-field', ['type'=>'email', 'name'=>'email' ])
                    @endguest
                    <x-jet-button>{{__('Book')}}</x-jet-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
