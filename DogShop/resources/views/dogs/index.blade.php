<x-app-layout>
    <x-slot name="title"> {{__('Dogs') . ' - ' . config('app.name', 'Laravel')}}</x-slot>
    <x-slot name="header">
        <div class="justify-between flex">
            <h2 class="font-semibold text-2xl text-gray-900 leading-tight dark:text-white">
                {{ __('Dogs') }}
            </h2>
            @can('add-dog')
                <div class="space-x-2">
                    @include('button-components.create-button', ['name'=>'Add a new dog', 'route' => 'dogs.create'])
                </div>
            @endcan
        </div>
    </x-slot>
    @include('alerts.confirmation-alert')
    <div class="flex flex-wrap"> @php $counter = 0 @endphp
    @foreach($dogs as $dog)
        <!-- component -->
            <div class="p-4 max-w-xs mx-auto">
                <div
                    class="shadow-lg group container rounded-md bg-white  max-w-sm flex justify-center items-center mx-auto bg-gradient-to-r from-yellow-300 to-red-600">
                    <div>
                            <div
                                class="m-2 float-right group-hover:opacity-25">
                                @include('button-components.add-to-cart-button', ['route'=>'cart.store','item'=>$dog, 'model'=>'dog'])
                            </div>
                            <div class="absolute grid grid-cols-1 gap-2 bottom-0 right-0  m-2">
                                @can('update', $dog)
                                    @include('button-components.edit-button', ['route'=>'dogs.edit', 'item'=>$dog])
                                @endcan
                                @can('delete', $dog)
                                    @include('button-components.delete-button', ['route'=>'dogs.destroy', 'loop' => $loop, 'item'=>$dog]) @php $counter++ @endphp
                                @endcan
                            </div>
                        </div>
                        <div class="py-8 px-4 bg-white  rounded-b-md group-hover:opacity-25">
                            <span class="block text-lg text-gray-800 font-bold tracking-wide">{{$dog->name}}</span>
                            <span class="block text-gray-600 text-sm">{{$dog->description}}</span>
                        </div>
                    </div>
                    <div class="absolute opacity-0 group-hover:opacity-100">
                <span
                    class="text-3xl font-bold text-white tracking-wider leading-relaxed font-sans flex-wrap">{{$dog->name}}</span>
                        <div class="pt-8 text-center">
                            <a href="{{route('dogs.show',$dog)}}">
                                <button class="text-center rounded-lg p-4 bg-white text-gray-700 font-bold text-lg">
                                    Learn more
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{$dogs->links()}}
</x-app-layout>
