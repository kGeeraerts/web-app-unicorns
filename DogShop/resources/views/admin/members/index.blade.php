<x-app-layout>
    <x-slot name="title"> {{__('Members dashboard') . ' - ' . config('app.name', 'Laravel')}}</x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight dark:text-white">
            {{ __('Members dashboard') }}
        </h2>
    </x-slot>
    @include('alerts.confirmation-alert')
    <div class="flex flex-col mb-4">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 dark:border-gray-800 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-800" aria-label="Members">
                        <thead class="bg-gray-50 dark:bg-gray-600">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                {{__('Name')}}
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                {{__('Date of Birth')}}
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                {{__('Status')}}
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                {{__('Role')}}
                            </th>
                            @hasrole('admin|owner')
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                {{__('Actions')}}
                            </th>
                            @endhasrole
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-800">
                        @foreach($users as $user)
                            <tr class="dark:bg-gray-500">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <a href="{{route('member.show', $user)}}">
                                                <img class="h-10 w-10 rounded-full object-cover"
                                                     src="{{ $user->profile_photo_url }}"
                                                     alt="Profile photo">
                                            </a>
                                        </div>
                                        <div class="ml-4">
                                            <a href="{{route('member.show', $user)}}">
                                                <div class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                                    {{$user->name}} ({{$user->id}})
                                                </div>
                                            </a>
                                            <a href="mailto:{{$user->email}}">
                                                <div class="text-sm text-gray-500 dark:text-gray-300">
                                                    {{$user->email}}
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @empty($user->birthday)
                                        <p class="text-sm text-gray-900 dark:text-gray-100">The user has not yet entered
                                            his date of
                                            birth</p>
                                    @else
                                        <p class="text-sm text-gray-900 dark:text-gray-100">
                                            {{date('d F Y', strtotime($user->birthday))}}
                                            ({{Carbon\Carbon::parse($user->birthday)->age}} years)</p>
                                    @endempty
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($user->session())
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-400 dark:text-green-900">
                                            {{__('Active')}}
                                        </span>
                                    @else
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800 dark:bg-gray-400 dark:text-gray-900">
                                            {{__('Not Active')}}
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                    @foreach($user->getRoleNames() as $role)
                                        @if($loop->index > 0)
                                            | {{ucfirst($role)}}
                                        @else
                                            {{ucfirst($role)}}
                                        @endif
                                    @endforeach
                                </td>
                                @hasrole('admin|owner')
                                <td class="pl-6 py-4 whitespace-nowrap space-x-2">
                                    @include('button-components.edit-button', ['route'=>'admin.member.edit', 'item'=>$user])
                                    @include('button-components.delete-button', ['route'=>'admin.member.destroy', 'item'=>$user])
                                </td>
                                @endhasrole
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{$users->links()}}
</x-app-layout>
