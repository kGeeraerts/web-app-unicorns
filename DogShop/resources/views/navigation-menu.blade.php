<nav x-data="{ open: false }" class="bg-white dark:bg-gray-900 border-b border-gray-100 dark:border-black">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    @include('logo9x9')
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('dogs.index') }}" :active="request()->routeIs('dogs.index')">
                        {{ __('Dogs') }}
                    </x-jet-nav-link>
                    @hasanyrole('vendor|admin|owner')
                    <div class="hidden md:flex md:items-center md:ml-6">
                        <x-jet-dropdown>
                            <x-slot name="trigger">
                                <button class="flex items-center dark:text-white">{{ __('Admin') }}
                                <!-- chevron-down -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Accounts') }}
                                </div>

                                <x-jet-dropdown-link href="{{ route('admin.console') }}">
                                    {{ __('Console') }}
                                </x-jet-dropdown-link>

                                @hasanyrole('vendor|admin|owner')
                                <x-jet-dropdown-link href="{{ route('admin.members.index') }}">
                                    {{ __('Members') }}
                                </x-jet-dropdown-link>
                                @endhasanyrole

                                @can('answer-messages')
                                    <x-jet-dropdown-link href="{{ route('admin.inbox.index') }}">
                                        {{ __('Inbox') }}
                                    </x-jet-dropdown-link>
                                @endcan
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                    @endhasanyrole
                </div>
            </div>
            @php $cartRoute = route('cart.show', get_cart_id()) @endphp
            <!-- Settings Dropdown -->
            <div class="hidden md:flex md:items-center md:ml-6 dark:text-white">
                <a href="{{$cartRoute}}">
                    <!-- Shopping cart -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-6" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </a>
                @auth
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button
                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                    <img class="h-8 w-8 rounded-full object-cover"
                                         src="{{ Auth::user()->profile_photo_url}}" alt="{{ Auth::user()->name }}">
                                </button>
                            @else
                                <button
                                    class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ml-1">

                                    </div>
                                </button>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-jet-dropdown-link>

                            <div class="border-t border-gray-100"></div>


                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                                     onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                    {{ __('Logout') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                @else
                    <x-jet-nav-link href="{{ route('login') }}" class="mr-4">
                        {{__('Login')}}
                    </x-jet-nav-link>

                    <x-jet-nav-link href="{{ route('register') }}">
                        {{__('Register')}}
                    </x-jet-nav-link>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                {{ __('Home') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{ route('dogs.index') }}" :active="request()->routeIs('dogs.index')">
                {{ __('Dogs') }}
            </x-jet-responsive-nav-link>
            @hasanyrole('vendor|editor|moderator|admin|owner')
            <div class="pt-4 pb-1 border-t border-gray-200"></div>
            <div class="ml-4 dark:text-white">{{ __('Admin') }}</div>
            <x-jet-responsive-nav-link href="{{ route('admin.console') }}"
                                       :active="request()->routeIs('admin.console')">
                {{ __('Console') }}
            </x-jet-responsive-nav-link>

            @hasanyrole('vendor|admin|owner')
            <x-jet-responsive-nav-link href="{{ route('admin.members.index') }}"
                                       :active="request()->routeIs('admin.members.index')">
                {{ __('Members') }}
            </x-jet-responsive-nav-link>
            @endhasanyrole

            @can('answer-messages')
                <x-jet-responsive-nav-link href="{{ route('admin.inbox.index') }}"
                                           :active="request()->routeIs('admin.inbox.index')">
                    {{ __('Inbox') }}
                </x-jet-responsive-nav-link>
            @endcan
            @endhasanyrole
        </div>

        <!-- Responsive Settings Options -->
        @guest
            <div class="py-4 border-t border-gray-200">
                <x-jet-responsive-nav-link href="{{$cartRoute}}" :active="request()->routeIs('cart.show')">Shopping cart</x-jet-responsive-nav-link>
            </div>
        @endguest
        <div class="pt-4 pb-1 border-t border-gray-200">
            @auth
                <div class="flex items-center px-4">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}"
                             alt="{{ Auth::user()->name }}">
                    </div>

                    <div class="ml-3">
                        <div class="font-medium text-base text-gray-800 dark:text-white">{{ Auth::user()->name }}</div>
                        <div
                            class="font-medium text-sm text-gray-500 dark:text-gray-200">{{ Auth::user()->email }}</div>
                    </div>
                    <a href="{{$cartRoute}}" class="ml-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-6 rounded bg-gray-800 text-white"
                             fill="none"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </a>
                </div>

                <div class="mt-3 space-y-1">
                    <!-- Account Management -->
                    <x-jet-responsive-nav-link href="{{ route('profile.show') }}"
                                               :active="request()->routeIs('profile.show')">
                        {{ __('Profile') }}
                    </x-jet-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-jet-responsive-nav-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Logout') }}
                        </x-jet-responsive-nav-link>
                    </form>
                    @else
                        <x-jet-responsive-nav-link href="{{ route('login') }}">
                            {{__('Login')}}
                        </x-jet-responsive-nav-link>

                        <x-jet-responsive-nav-link href="{{ route('register') }}">
                            {{__('Register')}}
                        </x-jet-responsive-nav-link>
                    @endauth
                </div>
        </div>
    </div>
</nav>
