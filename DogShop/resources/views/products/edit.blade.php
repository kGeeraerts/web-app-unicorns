<x-app-layout>
    <x-slot name="title"> {{__('Edit ') . $product->name. ' - ' . config('app.name', 'Laravel')}}</x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight dark:text-white">
            {{__('Update product:')}} {{$product->name}}
        </h2>
    </x-slot>
    <form method="POST" action="{{route('products.update', $product)}}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="grid grid-cols-1 gap-6 max-w-xl">
            @include('form-components.input-field', ["type"=>"text", "name"=>"name", "value"=>$product->name])
            @include('form-components.input-field', ["type"=>"text", "name"=>"description", "value"=>$product->description])
            @include('form-components.number-input-field', ["type"=>"text", "name"=>"price", "value"=>$product->price])
            @include('form-components.image-input')
            @include('form-components.checkbox', ["name"=>"available", "check"=>$product->available])
        </div>
        <x-jet-button type="submit" class="mt-4">{{__('Submit')}}</x-jet-button>
    </form>
</x-app-layout>
