<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

        <!--Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#ff8000">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 relative dark:bg-gray-700">
        <div class="pb-28">
            <!-- Navigation -->
            <div>{{-- Solution to a very wierd display bug (only on @guest)--}}
                <livewire:navigation-menu/>

                <!-- Page Heading -->
                <header class="bg-white shadow dark:bg-gray-900">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>

                <!-- Page Content -->
                <main class="max-w-7xl mx-auto py-8 sm:px-6 lg:px-8 relative">
                    {{ $slot }}
                </main>

                <footer
                    class="bg-white dark:bg-gray-900 shadow-xl absolute bottom-0 h-28 m-0 w-screen flex-wrap content-around flex">
                    <livewire:footer/>
                </footer>
            </div>
        </div>
    </div>
    @include('cookie-consent::index')

    @stack('modals')
    @stack('scripts')

    @livewireScripts
    </body>
</html>
