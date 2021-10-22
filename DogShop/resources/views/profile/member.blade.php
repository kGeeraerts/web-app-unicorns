<x-app-layout>
    <x-slot name="title">{{$user->name . ' - ' . config('app.name', 'Laravel')}}</x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 dark:text-white leading-tight">
            {{$user->name}}
        </h2>
    </x-slot>
    <div class="flex flex-wrap justify-center ">
        <img src="{{$user->profile_photo_url}}" alt="Profile photo" class="w-64 h-64 rounded-full object-cover m-8">
        <div class="dark:text-white w-96 text-lg flex flex-wrap content-center grid grid-cols-1">
            <p class="text-2xl mb-2">{{$user->name}}</p>
            @if($user->show_email)
                <p>Contact me at <a href="mailto:{{$user->email}}">{{$user->email}}</a></p>
            @endif
            @empty($user->birthday)
                <p>This user has not yet entered his/her date of birth</p>
            @else
                <p>Born {{date('d F Y', strtotime($user->birthday))}}
                    ({{Carbon\Carbon::parse($user->birthday)->age}} years)</p>
            @endempty
            <div class="mt-4">
                <p class="text-xl mb-2">Biography</p>
                @empty($user->biography)
                    <p>At the moment there isn't a biography available</p>
                @else
                    <p>{{$user->biography}}</p>
                @endempty
            </div>
        </div>
    </div>
</x-app-layout>
