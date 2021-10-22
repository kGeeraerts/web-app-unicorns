<x-app-layout>
    <x-slot name="title"> {{$product->name . ' - ' . config('app.name', 'Laravel')}}</x-slot>
    <x-slot name="header">
        <div class="justify-between flex">
            <h2 class="font-semibold text-2xl text-gray-900 leading-tight  dark:text-white">
                {{$product->name}}
            </h2>
            @can('add-product')
                @include('button-components.create-button', ['name'=>'Add a new product', 'route' => 'products.create'])
            @endcan
        </div>
    </x-slot>
    @include('alerts.confirmation-alert')
    <img src="{{url(Storage::url($product->image))}}" alt="image" class="w-2/5 float-right ml-4 mb-4">
    <p class="dark:text-white">{{$product->description}}</p>
    <p class="my-4 dark:text-white">€ {{$product->price}}</p>
    <div class="mt-4 flex items-center space-x-2">
        @include('button-components.add-to-cart-button', ['route'=>'cart.store','item'=>$product, 'model'=>'product'])
        @can('update', $product)
            @include('button-components.edit-button', ['route'=>'products.edit', 'item'=>$product])
        @endcan
        @can('delete', $product)
            @include('button-components.delete-button', ['route'=>'products.destroy', 'item'=>$product])
        @endcan
    </div>
</x-app-layout>
