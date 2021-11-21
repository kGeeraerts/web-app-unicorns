<x-app-layout>
    <x-slot name="title"> {{$dog->name . ' - ' . config('app.name', 'Laravel')}}</x-slot>
    <x-slot name="header">
        <div class="justify-between flex">
            <h2 class="font-semibold text-2xl text-gray-900 leading-tight  dark:text-white">
                {{$dog->name}}
            </h2>
            @can('add-dog')
                @include('button-components.create-button', ['name'=>'Add a new dog', 'route' => 'dogs.create'])
            @endcan
        </div>
    </x-slot>
    @include('alerts.confirmation-alert')
    <img src="{{url(Storage::url($dog->image))}}" alt="image" class="w-2/5 float-right ml-4 mb-4">
    <p class="dark:text-white">{{$dog->description}}</p>
    <div class="mt-4 flex items-center space-x-2">
        @include('button-components.add-to-cart-button', ['route'=>'cart.store','item'=>$dog, 'model'=>'dog'])
        @can('update', $dog)
            @include('button-components.edit-button', ['route'=>'dogs.edit', 'item'=>$dog])
        @endcan
        @can('delete', $dog)
            @include('button-components.delete-button', ['route'=>'dogs.destroy', 'item'=>$dog])
        @endcan
    </div>
</x-app-layout>
