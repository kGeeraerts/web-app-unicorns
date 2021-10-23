<x-app-layout>
    <x-slot name="title"> {{$role->title . ' - ' . config('app.name', 'Laravel')}}</x-slot>
    <x-slot name="header">
        <div class="justify-between flex">
            <h2 class="font-semibold text-2xl text-gray-900 leading-tight  dark:text-white">
                {{$role->title}}
            </h2>
            @can('create-role')
                <a href="{{route('roles.create')}}">
                    <x-jet-button>Create new item</x-jet-button>
                </a>
            @endcan
        </div>
    </x-slot>
    <div class="mb-4">
        @include('news.published')
    </div>
    <img src="{{$role->image}}" alt="image" class="w-2/5 float-right ml-4 mb-4">
    <p class="dark:text-white">{{$role->body}}</p>
    <div class="mt-4 flex items-center space-x-2">
        @can('update', $role)
            @include('button-components.edit-button')
        @endcan
        @can('delete', $role)
            @include('button-components.delete-button')
        @endcan
    </div>
    <script src="{{ mix('js/delete.js') }}"></script>
</x-app-layout>
