<div x-data="{ 
    scrolled: false,
    mobileMenuOpen: false,
    init() {
        window.addEventListener('scroll', () => {
            this.scrolled = window.scrollY > 20;
        });
    }
}">
    <!-- Header -->
    <header 
        class="fixed top-0 left-0 right-0 z-50 header-transition bg-transparent py-[24px]"
    >
        <nav class="mx-auto px-6 lg:px-20">
            <div class="flex items-center justify-between">
                <div class="flex">
                    <!-- Logo -->
                    <a href="{{ route('home') }}" class="flex items-center space-x-2 flex-shrink-0">
                        <div class="flex items-center">
                            <img src="{{ asset('assets/images/Logo.png') }}" class="h-[44px]" alt="">
                        </div>
                    </a>

                    <!-- Desktop Navigation -->
                    <div class="hidden relative lg:flex items-center space-x-1 ml-[70px] px-6 py-4">
                        <div class="absolute left-0 top-0 bottom-0 right-0 rounded-full bg-white/10 transition-all duration-200"></div>
                        <div class="relative z-[4]">
                            <a href="{{ route('our-services') }}" class="text-white/90 hover:text-white px-4 py-2 font-medium cursor-pointer">
                                Our services
                            </a>
                            <a href="{{ route('about-us') }}" class="text-white/90 hover:text-white px-4 py-2 font-medium cursor-pointer">
                                Who we are
                            </a>
                            <a href="{{ route('client-journey') }}" class="text-white/90 hover:text-white px-4 py-2 font-medium cursor-pointer">
                                Client journey
                            </a>
                            <a href="{{ route('legal-guide') }}" class="text-white/90 hover:text-white px-4 py-2 font-medium cursor-pointer">
                                Legal guide
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Contact Button - Desktop -->
                <div class="hidden lg:block">
                    <a href="https://api.whatsapp.com/send/?phone=%2B6282298892643&text&type=phone_number&app_absent=0" class="bg-[#B8C1F8] text-[#4a1c2e] px-6 py-2.5 rounded-full font-semibold transition-all duration-200 inline-block">
                        Contact us
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button 
                    @click="mobileMenuOpen = !mobileMenuOpen"
                    class="lg:hidden text-white p-2 rounded-lg hover:bg-white/10 transition-colors"
                    :aria-label="mobileMenuOpen ? 'Close menu' : 'Open menu'"
                >
                    <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-cloak>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </nav>
    </header>

    <!-- Mobile Menu Overlay -->
    <div 
        x-show="mobileMenuOpen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click="mobileMenuOpen = false"
        class="fixed inset-0 bg-black/50 z-40 lg:hidden"
        x-cloak
    ></div>

    <!-- Mobile Slide Menu -->
    <div 
        x-show="mobileMenuOpen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        class="fixed top-0 left-0 bottom-0 w-full bg-[#4a1c2e] z-50 shadow-2xl lg:hidden overflow-y-auto"
        x-cloak
    >
        <div class="flex flex-col h-full">
            <!-- Mobile Menu Header -->
            <div class="flex items-center justify-between p-6 border-b border-white/10">
                <a href="#" class="flex items-center space-x-2">
                    <img src="{{ asset('assets/images/Logo.png') }}" class="h-[44px]" alt="">
                </a>
                <button 
                    @click="mobileMenuOpen = false"
                    class="text-white p-2 rounded-lg hover:bg-white/10 transition-colors"
                >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu Links -->
            <nav class="flex-1 px-6 py-8">
                <div class="space-y-2">
                    <a 
                        href="{{ route('our-services') }}" 
                        @click="mobileMenuOpen = false"
                        class="block text-white/90 hover:text-white hover:bg-white/10 px-4 py-3 rounded-lg transition-all duration-200 font-medium"
                    >
                        Our services
                    </a>
                    <a 
                        href="{{ route('about-us') }}" 
                        @click="mobileMenuOpen = false"
                        class="block text-white/90 hover:text-white hover:bg-white/10 px-4 py-3 rounded-lg transition-all duration-200 font-medium"
                    >
                        Who we are
                    </a>
                    <a 
                        href="{{ route('client-journey') }}" 
                        @click="mobileMenuOpen = false"
                        class="block text-white/90 hover:text-white hover:bg-white/10 px-4 py-3 rounded-lg transition-all duration-200 font-medium"
                    >
                        Client journey
                    </a>
                    <a 
                        href="{{ route('legal-guide') }}" 
                        @click="mobileMenuOpen = false"
                        class="block text-white/90 hover:text-white hover:bg-white/10 px-4 py-3 rounded-lg transition-all duration-200 font-medium"
                    >
                        Legal guide
                    </a>
                </div>
            </nav>

            <!-- Mobile Menu Footer with Contact Button -->
            <div class="p-6 border-t border-white/10">
                <a 
                    href="https://api.whatsapp.com/send/?phone=%2B6282298892643&text&type=phone_number&app_absent=0" 
                    class="block w-full bg-[#c4b5d8] hover:bg-[#b5a3cc] text-[#4a1c2e] px-6 py-3 rounded-full font-semibold transition-all duration-200 text-center"
                >
                    Contact us
                </a>
            </div>
        </div>
    </div>
</div>