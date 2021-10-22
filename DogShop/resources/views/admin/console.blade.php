<x-app-layout>
    <x-slot name="title"> {{__('Admin Console') . ' - ' . config('app.name', 'Laravel')}}</x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight dark:text-white">
            {{ __('Welcome to the Admin Console') }}
        </h2>
    </x-slot>
    <div class="flex justify-center items-center content-center h-96 space-x-20">
        {{--    <p><a href="{{route('admin.role.index')}}">index</a></p>--}}
        {{--    <p><a href="{{route('admin.role.show','')}}">show</a></p>--}}
        {{--    <p><a href="{{route('admin.role.create')}}">create</a></p>--}}
        {{--    <p><a href="{{route('admin.role.edit','')}}">edit</a></p>--}}
        @can('answer-messages')
            <x-jet-secondary-button>
                <a href="{{route('admin.inbox.index','')}}" class="p-10 text-3xl">Inbox</a>
            </x-jet-secondary-button>
        @endcan
        @hasanyrole('vendor|admin|owner')
            <x-jet-secondary-button>
                <a href="{{route('admin.members.index','')}}" class="p-10 text-3xl">Members</a>
            </x-jet-secondary-button>
        @endhasanyrole
    </div>
    <div class="ml-4 text-center text-sm text-gray-500 sm:text-center sm:ml-0">
        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    </div>
</x-app-layout>
