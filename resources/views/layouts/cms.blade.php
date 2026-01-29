<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | CMS BrightLegal</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- TinyMCE WYSIWYG Editor -->
    <script src="https://cdn.tiny.cloud/1/ai0a1dlndqsihck7zi8qnjmkbs77fr975uotojn0xoio5lr0/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    
    <style>
        .sidebar-link.active {
            background-color: rgba(184, 193, 248, 0.2);
            border-left: 3px solid #B8C1F8;
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="flex min-h-screen" x-data="{ sidebarOpen: true }">
        <!-- Sidebar -->
        <aside :class="sidebarOpen ? 'w-64' : 'w-20'" class="bg-[#3B0014] text-white transition-all duration-300 flex flex-col">
            <!-- Logo -->
            <div class="p-4 border-b border-[#6C342C]">
                <a href="{{ route('cms.index') }}" class="flex items-center">
                    <img src="{{ asset('assets/images/logo-footer.png') }}" alt="Logo" class="h-8">
                    <span x-show="sidebarOpen" class="ml-3 font-semibold text-lg">CMS</span>
                </a>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 py-4 overflow-y-auto">
                <ul class="space-y-1">
                    <li>
                        <a href="{{ route('cms.index') }}" class="sidebar-link flex items-center px-4 py-3 hover:bg-[#6C342C] transition {{ request()->routeIs('cms.index') ? 'active' : '' }}">
                            <i class="fas fa-home w-6"></i>
                            <span x-show="sidebarOpen" class="ml-3">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('cms.banners.index') }}" class="sidebar-link flex items-center px-4 py-3 hover:bg-[#6C342C] transition {{ request()->routeIs('cms.banners.*') ? 'active' : '' }}">
                            <i class="fas fa-image w-6"></i>
                            <span x-show="sidebarOpen" class="ml-3">Banner</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('cms.statistics.index') }}" class="sidebar-link flex items-center px-4 py-3 hover:bg-[#6C342C] transition {{ request()->routeIs('cms.statistics.*') ? 'active' : '' }}">
                            <i class="fas fa-chart-bar w-6"></i>
                            <span x-show="sidebarOpen" class="ml-3">Statistik</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('cms.why-work-with-us.index') }}" class="sidebar-link flex items-center px-4 py-3 hover:bg-[#6C342C] transition {{ request()->routeIs('cms.why-work-with-us.*') ? 'active' : '' }}">
                            <i class="fas fa-handshake w-6"></i>
                            <span x-show="sidebarOpen" class="ml-3">Why Work With Us</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('cms.services.index') }}" class="sidebar-link flex items-center px-4 py-3 hover:bg-[#6C342C] transition {{ request()->routeIs('cms.services.*') ? 'active' : '' }}">
                            <i class="fas fa-briefcase w-6"></i>
                            <span x-show="sidebarOpen" class="ml-3">Services</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('cms.testimonials.index') }}" class="sidebar-link flex items-center px-4 py-3 hover:bg-[#6C342C] transition {{ request()->routeIs('cms.testimonials.*') ? 'active' : '' }}">
                            <i class="fas fa-quote-right w-6"></i>
                            <span x-show="sidebarOpen" class="ml-3">Testimonials</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('cms.faqs.index') }}" class="sidebar-link flex items-center px-4 py-3 hover:bg-[#6C342C] transition {{ request()->routeIs('cms.faqs.*') ? 'active' : '' }}">
                            <i class="fas fa-question-circle w-6"></i>
                            <span x-show="sidebarOpen" class="ml-3">FAQ</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('cms.ready-to-talk.index') }}" class="sidebar-link flex items-center px-4 py-3 hover:bg-[#6C342C] transition {{ request()->routeIs('cms.ready-to-talk.*') ? 'active' : '' }}">
                            <i class="fas fa-phone w-6"></i>
                            <span x-show="sidebarOpen" class="ml-3">Ready to Talk</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- User Info -->
            <div class="p-4 border-t border-[#6C342C]">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-[#B8C1F8] rounded-full flex items-center justify-center text-[#3B0014] font-semibold">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div x-show="sidebarOpen" class="ml-3">
                        <p class="text-sm font-medium">{{ Auth::user()->name }}</p>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-xs text-gray-400 hover:text-white">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Top Bar -->
            <header class="bg-white shadow-sm border-b px-6 py-4 flex items-center justify-between">
                <button @click="sidebarOpen = !sidebarOpen" class="text-gray-600 hover:text-gray-900">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('home') }}" target="_blank" class="text-gray-600 hover:text-[#3B0014]">
                        <i class="fas fa-external-link-alt mr-1"></i> View Site
                    </a>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 p-6 overflow-y-auto">
                <!-- Flash Messages -->
                @if(session('success'))
                    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" 
                         class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                        <button @click="show = false" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif

                @if(session('error'))
                    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
                         class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
                        <button @click="show = false" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
    
    <script>
        // Initialize TinyMCE for all textareas with class 'wysiwyg'
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof tinymce !== 'undefined') {
                tinymce.init({
                    selector: 'textarea.wysiwyg',
                    height: 300,
                    menubar: false,
                    plugins: [
                        'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                        'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                        'insertdatetime', 'media', 'table', 'help', 'wordcount'
                    ],
                    toolbar: 'undo redo | blocks | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
                    content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; }'
                });
            }
        });
    </script>
</body>
</html>
