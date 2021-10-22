<x-app-layout>
    <x-slot name="title"> {{__('Edit ') . $user->name. ' - ' . config('app.name', 'Laravel')}}</x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight dark:text-white">
            {{__('Update roles of ')}} {{$user->name}}
        </h2>
    </x-slot>
    <form method="POST" action="{{route('admin.member.update',$user)}}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="grid grid-cols-2 gap-6 max-w-xl">
            @foreach(get_all_roles_names() as $roleName)
                @include('form-components.checkbox', ["name"=> $roleName, "check"=> $user->hasrole($roleName)])
            @endforeach
        </div>
        <x-jet-button type="submit" class="mt-4">{{__('Save')}}</x-jet-button>
    </form>
</x-app-layout>
