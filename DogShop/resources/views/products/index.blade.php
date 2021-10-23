<x-app-layout>
    <x-slot name="header">
        <div class="justify-between flex">
            <x-slot name="title"> {{__('Products') . ' - ' . config('app.name', 'Laravel')}}</x-slot>
            <h2 class="font-semibold text-2xl text-gray-900 leading-tight dark:text-white">
                {{ __('Products') }}
            </h2>
            @can('add-product')
                @include('button-components.create-button', ['name'=>'Add a new product', 'route' => 'products.create'])
            @endcan
        </div>
    </x-slot>
    @include('alerts.confirmation-alert')
    <div class="flex flex-wrap"> @php $counter = 0 @endphp
    @foreach($products as $product)
        <!-- component -->
            <div class="p-4 max-w-xs mx-auto">
                <div
                    class="shadow-lg group container rounded-md bg-white  max-w-sm flex justify-center items-center  mx-auto bg-gradient-to-r from-yellow-300 to-red-600">
                    <div>
                        <div
                            class="w-full h-72 rounded-t-md relative bg-no-repeat bg-cover bg-center group-hover:opacity-25"
                            style="background-image: url({{Storage::url($product->image)}})">
                            <div
                                class="m-2 float-right group-hover:opacity-25">
                                @include('button-components.add-to-cart-button', ['route'=>'cart.store','item'=>$product, 'model'=>'product'])
                            </div>
                            <div class="absolute grid grid-cols-1 gap-2 bottom-0 right-0  m-2">
                                @can('update', $product)
                                    @include('button-components.edit-button', ['route'=>'products.edit', 'item'=>$product])
                                @endcan
                                @can('delete', $product)
                                    @include('button-components.delete-button', ['route'=>'products.destroy', 'loop' => $loop, 'item'=>$product]) @php $counter++ @endphp
                                @endcan
                            </div>
                        </div>
                        <div class="py-8 px-4 bg-white  rounded-b-md group-hover:opacity-25">
                            <span class="block text-lg text-gray-800 font-bold tracking-wide">{{$product->name}}</span>
                            <span class="block text-gray-600 text-sm">{{$product->description}}</span>
                        </div>
                    </div>
                    <div class="absolute opacity-0 group-hover:opacity-100">
                <span
                    class="text-3xl font-bold text-white tracking-wider leading-relaxed font-sans flex-wrap">{{$product->name}}</span>
                        <div class="pt-8 text-center">
                            <a href="{{route('products.show',$product)}}">
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
    {{$products->links()}}
</x-app-layout>
