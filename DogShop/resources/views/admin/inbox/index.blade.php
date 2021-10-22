<x-app-layout>
    <x-slot name="title"> {{__('Admin Inbox') . ' - ' . config('app.name', 'Laravel')}}</x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight dark:text-white">
            {{ __('Admin Inbox') }}
        </h2>
    </x-slot>
    @include('alerts.confirmation-alert')
    <div class="flex flex-col mb-4">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 dark:border-gray-800 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-800">
                        <thead class="bg-gray-50 dark:bg-gray-600">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                {{__('Sender')}}
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                {{__('Subject')}}
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                {{__('Status')}}
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                {{__('Send at')}}
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                {{__('Replied at')}}
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-800">
                        @foreach($messages as $message)
                            @if($message->replied)
                                <tr class="bg-gray-400 dark:bg-gray-500">
                            @else
                                <tr class="dark:bg-gray-400">
                                    @endif
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{route('admin.inbox.show', $message)}}">
                                            <div class="text-sm font-medium text-gray-900 dark:text-gray-700">
                                                {{$message->name}}
                                            </div>
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{route('admin.inbox.show', $message)}}">
                                            <div class="text-sm font-medium text-gray-900 dark:text-gray-700">
                                                {{$message->subject}}
                                            </div>
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @empty($message->replied)
                                            <a href="{{route('admin.inbox.show', $message)}}">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-500 dark:text-red-900">
                                                {{__('Not replied')}}
                                            </span>

                                            </a>
                                        @else
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-500 dark:text-green-900">
                                            {{__('Replied')}}
                                        </span>
                                        @endempty
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <p class="text-sm text-gray-900 dark:text-gray-700">{{date('d/m/Y H:h:s', strtotime($message->created_at))}}</p>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($message->created_at == $message->updated_at)
                                            <p class="text-sm text-gray-900 dark:text-gray-700">Not yet</p>
                                        @else
                                            <p class="text-sm text-gray-900 dark:text-gray-700">{{date('d/m/Y H:h:s', strtotime($message->updated_at))}}</p>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{$messages->links()}}
</x-app-layout>
