<header class="bg-white shadow-sm">
    <nav class="container mx-auto px-4 py-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <a href="{{ url('/') }}" class="text-2xl font-bold text-gray-800">
                    {{ config('app.name', 'BrightLegal') }}
                </a>
            </div>

            <div class="hidden md:flex items-center space-x-6">
                <a href="{{ url('/') }}" class="text-gray-600 hover:text-gray-900 transition">Home</a>
                @auth
                    <a href="{{ url('/cms') }}" class="text-gray-600 hover:text-gray-900 transition">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-600 hover:text-gray-900 transition">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900 transition">Login</a>
                @endauth
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden" x-data="{ open: false }">
                <button @click="open = !open" class="text-gray-600 hover:text-gray-900 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

                <!-- Mobile menu -->
                <div x-show="open" @click.away="open = false" class="absolute top-16 right-4 bg-white rounded-lg shadow-lg py-2 w-48 z-50">
                    <a href="{{ url('/') }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">Home</a>
                    @auth
                        <a href="{{ url('/cms') }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-gray-600 hover:bg-gray-100">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
</header>
