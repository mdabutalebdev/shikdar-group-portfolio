<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Favicon -->
        <link rel="icon" href="{{ asset('images/LOGO.jpeg') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
        <div class="fixed inset-0 flex overflow-hidden bg-gray-100 dark:bg-gray-900" 
             x-data="{ sidebarOpen: window.innerWidth >= 768, isMobile: window.innerWidth < 768 }" 
             @resize.window="isMobile = window.innerWidth < 768; if(!isMobile) sidebarOpen = true">
             
            <!-- Mobile Backdrop -->
            <div x-show="isMobile && sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 bg-gray-900 bg-opacity-50 z-30" style="display: none;"></div>
            
            <!-- Sidebar -->
            <aside class="flex-shrink-0 w-64 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 h-full flex flex-col transition-all duration-300"
                   x-bind:style="isMobile ? 'position: absolute; z-index: 40;' : 'position: relative; z-index: 20;'"
                   x-show="sidebarOpen"
                   x-transition:enter="transition ease-out duration-300"
                   x-transition:enter-start="-translate-x-full"
                   x-transition:enter-end="translate-x-0"
                   x-transition:leave="transition ease-in duration-300"
                   x-transition:leave-start="translate-x-0"
                   x-transition:leave-end="-translate-x-full">
                
                <!-- Logo -->
                <div class="h-16 flex items-center px-6 border-b border-gray-200 dark:border-gray-700 flex-shrink-0">
                    <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold text-gray-800 dark:text-white">
                        Admin Panel
                    </a>
                </div>

                <!-- Navigation -->
                <nav class="flex-1 overflow-y-auto p-4 space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center px-3 py-2 text-sm font-medium rounded-md {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-50 text-indigo-700 dark:bg-indigo-900 dark:text-indigo-200' : 'text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700' }}">
                        <i class="fa-solid fa-gauge w-6"></i> Dashboard
                    </a>

                    <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider mt-6 mb-2 px-3">Home Page Settings</div>

                    <a href="{{ route('admin.home-page-settings.edit', ['section' => 'hero']) }}" class="flex items-center px-3 py-2 text-sm font-medium rounded-md {{ request('section') === 'hero' ? 'bg-indigo-50 text-indigo-700 dark:bg-indigo-900 dark:text-indigo-200' : 'text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700' }}">
                        <i class="fa-solid fa-image w-6"></i> Hero
                    </a>
                    
                    <a href="{{ route('admin.home-page-settings.edit', ['section' => 'about']) }}" class="flex items-center px-3 py-2 text-sm font-medium rounded-md {{ request('section') === 'about' ? 'bg-indigo-50 text-indigo-700 dark:bg-indigo-900 dark:text-indigo-200' : 'text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700' }}">
                        <i class="fa-solid fa-address-card w-6"></i> About Sections
                    </a>
                    
                    <a href="{{ route('admin.home-page-settings.edit', ['section' => 'counter']) }}" class="flex items-center px-3 py-2 text-sm font-medium rounded-md {{ request('section') === 'counter' ? 'bg-indigo-50 text-indigo-700 dark:bg-indigo-900 dark:text-indigo-200' : 'text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700' }}">
                        <i class="fa-solid fa-stopwatch w-6"></i> Counter
                    </a>
                    
                    <a href="{{ route('admin.home-page-settings.edit', ['section' => 'footer']) }}" class="flex items-center px-3 py-2 text-sm font-medium rounded-md {{ request('section') === 'footer' ? 'bg-indigo-50 text-indigo-700 dark:bg-indigo-900 dark:text-indigo-200' : 'text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700' }}">
                        <i class="fa-solid fa-shoe-prints w-6"></i> Footer Settings
                    </a>
                    
                    <a href="{{ route('admin.concerns.index') }}" class="flex items-center px-3 py-2 text-sm font-medium rounded-md {{ request()->routeIs('admin.concerns.*') ? 'bg-indigo-50 text-indigo-700 dark:bg-indigo-900 dark:text-indigo-200' : 'text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700' }}">
                        <i class="fa-solid fa-building w-6"></i> Our Concern
                    </a>
                    
                    <a href="{{ route('admin.messages.index') }}" class="flex items-center px-3 py-2 text-sm font-medium rounded-md {{ request()->routeIs('admin.messages.*') ? 'bg-indigo-50 text-indigo-700 dark:bg-indigo-900 dark:text-indigo-200' : 'text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700' }}">
                        <i class="fa-solid fa-envelope w-6"></i> Contact List
                    </a>
                </nav>
            </aside>

            <!-- Main Content Container -->
            <div class="flex-1 flex flex-col h-full overflow-hidden w-full relative">
                <!-- Topbar -->
                <header class="h-16 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between px-6 flex-shrink-0">
                    <div class="flex items-center">
                        <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 focus:outline-none hover:text-gray-700 dark:hover:text-gray-300">
                            <i class="fa-solid fa-bars text-xl"></i>
                        </button>
                    </div>
                    
                    <!-- Settings Dropdown -->
                    <div class="flex items-center">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </header>

                <!-- Page Heading -->
                @isset($header)
                    <div class="bg-white dark:bg-gray-800 shadow-sm border-b border-gray-100 dark:border-gray-700 flex-shrink-0">
                        <div class="px-6 py-4">
                            {{ $header }}
                        </div>
                    </div>
                @endisset

                <!-- Main Content Scrollable Area -->
                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 dark:bg-gray-900 p-4">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
