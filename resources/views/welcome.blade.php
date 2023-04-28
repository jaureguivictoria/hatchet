<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles

        @vite('resources/js/app.js')

    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">

            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="flex justify-center">
                    <h1>Food items</h1>
                </div>

                <div class="container mx-auto">
                    <div class="flex justify-center mt-6 px-0 sm:items-center sm:justify-between">

                        <livewire:search-office-locations />
                    </div>
                </div>
            </div>
        </div>

        @livewireScripts

    </body>
</html>
