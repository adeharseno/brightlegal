@extends('layouts.app')

@section('title', 'Home')

@section('content')



    <div class="mx-auto bg-[#73302A] rounded-[12px] pt-[140px] pb-[200px] relative z-[2]" x-data="{ activeCard: 6 }">
        <!-- Header -->
        <div class="max-w-[1240px] mx-auto">
            <div class="flex justify-between items-center mb-[60px]">
                <div>
                    <p class="text-[#F1ECEC] text-base font-medium mb-2">What they say</p>
                    <h2 class="text-[#D9D9D9] text-[52px] font-medium">Our clients say it best...</h2>
                </div>
                <button class="bg-[rgba(245,245,245,0.3)] bg-opacity-30 hover:bg-opacity-40 text-[#F5F5F5] px-6 py-3 rounded-full flex items-center gap-2 transition">
                    View more testimonials →
                </button>
            </div>
        </div>

        <!-- Testimonial Cards -->
        <div class="flex gap-0 h-[482px] max-w-[1240px] mx-auto">

            <!-- Card 1 -->
            <div @click="activeCard = 1" 
                    :class="activeCard === 1 ? 'flex-[2] min-w-[400px]' : 'flex-[0_0_80px] min-w-[120px]'"
                    class="testimonial-card bg-[#410014] cursor-pointer rounded-l-[20px] transition-all duration-500 overflow-hidden relative mr-[-20px]">
                <div x-show="activeCard === 1" class="content h-full flex py-[52px] px-[48px]">
                    <div class="flex flex-col items-center opacity-40">
                        <span class="number text-white text-[28px] font-light mb-6">1</span>
                        <div class="flex-1 w-px bg-white bg-opacity-20"></div>
                        <span class="label text-white text-[14px] mt-6 writing-mode-vertical transform rotate-180">Property Agreements</span>
                    </div>
                    <div class="pl-[53px] flex flex-col justify-between">
                        <p class="text-white text-[32px] pt-10">"Working with this team transformed our business completely. Their expertise and dedication are unmatched in the industry."</p>
                        <div class="flex items-center gap-4">
                            <img src="https://ui-avatars.com/api/?name=John+Smith&background=random" alt="John Smith" class="w-14 h-14 rounded-full">
                            <div>
                                <p class="text-white font-semibold text-lg">John Smith</p>
                                <p class="text-red-300 text-sm">CEO of Tech Corp. | United States 🇺🇸</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div x-show="activeCard !== 1" class="collapsed-view py-[52px] pl-[52px] pr-[72px] h-full flex flex-col items-center opacity-40">
                    <span class="number text-white text-[28px] font-light mb-6">1</span>
                    <div class="flex-1 w-px bg-white bg-opacity-20"></div>
                    <span class="label text-white text-[14px] mt-6 writing-mode-vertical transform rotate-180">Property Agreements</span>
                </div>
            </div>

            <!-- Card 2 -->
            <div @click="activeCard = 2" 
                    :class="activeCard === 2 ? 'flex-[2] min-w-[400px]' : 'flex-[0_0_80px] min-w-[120px]'"
                    class="testimonial-card bg-[#D9D9D9] cursor-pointer rounded-l-[20px] transition-all duration-500 overflow-hidden relative mr-[-20px]">
                <div x-show="activeCard === 2" class="content h-full flex py-[52px] px-[48px]">
                    <div class="flex flex-col items-center opacity-40">
                        <span class="number text-gray-600 text-[28px] font-light mb-6">2</span>
                        <div class="flex-1 w-px bg-gray-600 bg-opacity-20"></div>
                        <span class="label text-gray-600 text-[14px] mt-6 writing-mode-vertical transform rotate-180">Ownership & Land Status</span>
                    </div>
                    <div class="pl-[53px] flex flex-col justify-between">
                        <p class="text-gray-800 text-[32px] pt-10">"Exceptional service from start to finish. They understood our needs perfectly and delivered beyond expectations."</p>
                        <div class="flex items-center gap-4">
                            <img src="https://ui-avatars.com/api/?name=Sarah+Johnson&background=random" alt="Sarah Johnson" class="w-14 h-14 rounded-full">
                            <div>
                                <p class="text-gray-800 font-semibold text-lg">Sarah Johnson</p>
                                <p class="text-gray-600 text-sm">Director of Operations | Canada 🇨🇦</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div x-show="activeCard !== 2" class="collapsed-view py-[52px] pl-[52px] pr-[72px] h-full flex flex-col items-center opacity-40">
                    <span class="number text-gray-600 text-[28px] font-light mb-6">2</span>
                    <div class="flex-1 w-px bg-gray-600 bg-opacity-20"></div>
                    <span class="label text-gray-600 text-[14px] mt-6 writing-mode-vertical transform rotate-180">Ownership & Land Status</span>
                </div>
            </div>

            <!-- Card 3 -->
            <div @click="activeCard = 3" 
                    :class="activeCard === 3 ? 'flex-[2] min-w-[400px]' : 'flex-[0_0_80px] min-w-[120px]'"
                    class="testimonial-card bg-[#F1AE43] cursor-pointer rounded-l-[20px] transition-all duration-500 overflow-hidden relative mr-[-20px]">
                <div x-show="activeCard === 3" class="content h-full flex py-[52px] px-[48px]">
                    <div class="flex flex-col items-center opacity-40">
                        <span class="number text-yellow-900 text-[28px] font-light mb-6">3</span>
                        <div class="flex-1 w-px bg-yellow-900 bg-opacity-20"></div>
                        <span class="label text-yellow-900 text-[14px] mt-6 writing-mode-vertical transform rotate-180">Company set-up</span>
                    </div>
                    <div class="pl-[53px] flex flex-col justify-between">
                        <p class="text-gray-900 text-[32px] pt-10">"Their innovative approach helped us achieve results we never thought possible. Truly a game-changer for our company."</p>
                        <div class="flex items-center gap-4">
                            <img src="https://ui-avatars.com/api/?name=Michael+Brown&background=random" alt="Michael Brown" class="w-14 h-14 rounded-full">
                            <div>
                                <p class="text-gray-900 font-semibold text-lg">Michael Brown</p>
                                <p class="text-gray-700 text-sm">Founder of StartupX | Australia 🇦🇺</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div x-show="activeCard !== 3" class="collapsed-view py-[52px] pl-[52px] pr-[72px] h-full flex flex-col items-center opacity-40">
                    <span class="number text-yellow-900 text-[28px] font-light mb-6">3</span>
                    <div class="flex-1 w-px bg-yellow-900 bg-opacity-20"></div>
                    <span class="label text-yellow-900 text-[14px] mt-6 writing-mode-vertical transform rotate-180">Company set-up</span>
                </div>
            </div>

            <!-- Card 4 -->
            <div @click="activeCard = 4" 
                    :class="activeCard === 4 ? 'flex-[2] min-w-[400px]' : 'flex-[0_0_80px] min-w-[120px]'"
                    class="testimonial-card bg-[#974126] cursor-pointer rounded-l-[20px] transition-all duration-500 overflow-hidden relative mr-[-20px]">
                <div x-show="activeCard === 4" class="content h-full flex py-[52px] px-[48px]">
                    <div class="flex flex-col items-center opacity-40">
                        <span class="number text-white text-[28px] font-light mb-6">4</span>
                        <div class="flex-1 w-px bg-white bg-opacity-20"></div>
                        <span class="label text-white text-[14px] mt-6 writing-mode-vertical transform rotate-180">Property Agreements</span>
                    </div>
                    <div class="pl-[53px] flex flex-col justify-between">
                        <p class="text-white text-[32px] pt-10">"Professional, reliable, and results-driven. They've been instrumental in our growth and success over the past year."</p>
                        <div class="flex items-center gap-4">
                            <img src="https://ui-avatars.com/api/?name=Emma+Wilson&background=random" alt="Emma Wilson" class="w-14 h-14 rounded-full">
                            <div>
                                <p class="text-white font-semibold text-lg">Emma Wilson</p>
                                <p class="text-red-300 text-sm">Managing Partner | Germany 🇩🇪</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div x-show="activeCard !== 4" class="collapsed-view py-[52px] pl-[52px] pr-[72px] h-full flex flex-col items-center opacity-40">
                    <span class="number text-white text-[28px] font-light mb-6">4</span>
                    <div class="flex-1 w-px bg-white bg-opacity-20"></div>
                    <span class="label text-white text-[14px] mt-6 writing-mode-vertical transform rotate-180">Property Agreements</span>
                </div>
            </div>

            <!-- Card 5 -->
            <div @click="activeCard = 5" 
                    :class="activeCard === 5 ? 'flex-[2] min-w-[400px]' : 'flex-[0_0_80px] min-w-[120px]'"
                    class="testimonial-card bg-white cursor-pointer rounded-l-[20px] transition-all duration-500 overflow-hidden relative mr-[-20px]">
                <div x-show="activeCard === 5" class="content h-full flex py-[52px] px-[48px]">
                    <div class="flex flex-col items-center opacity-40">
                        <span class="number text-gray-500 text-[28px] font-light mb-6">5</span>
                        <div class="flex-1 w-px bg-gray-500 bg-opacity-20"></div>
                        <span class="label text-gray-500 text-[14px] mt-6 writing-mode-vertical transform rotate-180">Land Use & Zoning</span>
                    </div>
                    <div class="pl-[53px] flex flex-col justify-between">
                        <p class="text-gray-800 text-[32px] pt-10">"The level of attention to detail and customer care is outstanding. They make everything easy and stress-free."</p>
                        <div class="flex items-center gap-4">
                            <img src="https://ui-avatars.com/api/?name=David+Lee&background=random" alt="David Lee" class="w-14 h-14 rounded-full">
                            <div>
                                <p class="text-gray-800 font-semibold text-lg">David Lee</p>
                                <p class="text-gray-600 text-sm">VP of Sales | Singapore 🇸🇬</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div x-show="activeCard !== 5" class="collapsed-view py-[52px] pl-[52px] pr-[72px] h-full flex flex-col items-center opacity-40">
                    <span class="number text-gray-500 text-[28px] font-light mb-6">5</span>
                    <div class="flex-1 w-px bg-gray-500 bg-opacity-20"></div>
                    <span class="label text-gray-500 text-[14px] mt-6 writing-mode-vertical transform rotate-180">Land Use & Zoning</span>
                </div>
            </div>

            <!-- Card 6 - Active by default -->
            <div @click="activeCard = 6" 
                    :class="activeCard === 6 ? 'flex-[2] min-w-[400px]' : 'flex-[0_0_80px] min-w-[120px]'"
                    class="testimonial-card bg-[#B8C1F8] cursor-pointer rounded-[20px] transition-all duration-500 overflow-hidden relative">
                <div x-show="activeCard === 6" class="content h-full flex py-[52px] px-[48px]">
                    <div class="flex flex-col items-center opacity-40">
                        <span class="number text-indigo-800 text-[28px] font-light mb-6">6</span>
                        <div class="flex-1 w-px bg-indigo-800 bg-opacity-20"></div>
                        <span class="label text-indigo-800 text-[14px] mt-6 writing-mode-vertical transform rotate-180">Visa service</span>
                    </div>
                    <div class="pl-[53px] flex flex-col justify-between">
                        <p class="text-gray-900 text-[32px] pt-10">"Ullamcorper ultrices at felis suspendisse. Scelerisque eget augue dolor est. Aenean habitant placerat fringilla sed tellus viverra".</p>
                        <div class="flex items-center gap-4">
                            <img src="https://ui-avatars.com/api/?name=Jane+Doe&background=random" alt="Jane Doe" class="w-14 h-14 rounded-full">
                            <div>
                                <p class="text-gray-900 font-semibold text-lg">Jane Doe</p>
                                <p class="text-gray-700 text-sm">CEO of Acme inc. | United Kingdom 🇬🇧</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div x-show="activeCard !== 6" class="collapsed-view py-[52px] px-6 h-full flex flex-col items-center opacity-40">
                    <span class="number text-indigo-800 text-[28px] font-light mb-6">6</span>
                    <div class="flex-1 w-px bg-indigo-800 bg-opacity-20"></div>
                    <span class="label text-indigo-800 text-[14px] mt-6 writing-mode-vertical transform rotate-180">Visa service</span>
                </div>
            </div>

        </div>
    </div>

    <div class="pt-[180px] pb-[130px] mt-[-12px] bg-[linear-gradient(180deg,#944229_13.02%,rgba(108,52,44,0)_100%)]">
        <div class="relative z-10 container max-w-[1240px] mx-auto">
            <div class="grid lg:grid-cols-2 gap-12 items-start">
                <!-- Left Side - Title -->
                <div class="mt-[-50px]">
                    <p class="text-[#F1ECEC] text-base font-medium mb-2">Got questions?</p>
                    <h3 class="text-[#D9D9D9] text-[52px] leading-[120%] font-medium">Your questions,</h3>
                    <h4 class="text-[#F1AE43] text-[52px] leading-[120%] font-medium">answered</h4>
                </div>
                <!-- Right Side - Accordion -->
                <div class="space-y-2" x-data="{ active: null }">
                    <!-- Question 1 -->
                    <div class="bg-white/10 backdrop-blur-sm rounded-lg overflow-hidden transition-all duration-300">
                        <button 
                            @click="active = active === 1 ? null : 1"
                            class="w-full px-6 py-5 flex items-center justify-between text-left text-white hover:bg-white/5 transition-colors"
                        >
                            <span class="text-base lg:text-lg font-light">How much does legal support cost?</span>
                            <span class="text-2xl font-light transition-transform duration-300" :class="active === 1 ? 'rotate-45' : ''">+</span>
                        </button>
                        <div 
                            x-show="active === 1"
                            x-transition:enter="transition-all ease-out duration-500"
                            x-transition:enter-start="opacity-0 max-h-0"
                            x-transition:enter-end="opacity-100 max-h-96"
                            x-transition:leave="transition-all ease-in duration-300"
                            x-transition:leave-start="opacity-100 max-h-96"
                            x-transition:leave-end="opacity-0 max-h-0"
                            class="overflow-hidden"
                            style="display: none;"
                        >
                            <div class="px-6 py-5 text-white/90 text-sm lg:text-base leading-relaxed">
                                Legal support costs vary depending on the complexity of your needs. We offer transparent pricing with packages starting from competitive rates. Contact us for a detailed quote tailored to your specific requirements.
                            </div>
                        </div>
                    </div>

                    <!-- Question 2 -->
                    <div class="bg-white/10 backdrop-blur-sm rounded-lg overflow-hidden transition-all duration-300">
                        <button 
                            @click="active = active === 2 ? null : 2"
                            class="w-full px-6 py-5 flex items-center justify-between text-left text-white hover:bg-white/5 transition-colors"
                        >
                            <span class="text-base lg:text-lg font-light">Can I legally own a business in Bali as a foreigner?</span>
                            <span class="text-2xl font-light transition-transform duration-300" :class="active === 2 ? 'rotate-45' : ''">+</span>
                        </button>
                        <div 
                            x-show="active === 2"
                            x-transition:enter="transition-all ease-out duration-500"
                            x-transition:enter-start="opacity-0 max-h-0"
                            x-transition:enter-end="opacity-100 max-h-96"
                            x-transition:leave="transition-all ease-in duration-300"
                            x-transition:leave-start="opacity-100 max-h-96"
                            x-transition:leave-end="opacity-0 max-h-0"
                            class="overflow-hidden"
                            style="display: none;"
                        >
                            <div class="px-6 py-5 text-white/90 text-sm lg:text-base leading-relaxed">
                                Yes, foreigners can own businesses in Bali through specific legal structures such as PT PMA (foreign investment company). We can guide you through the requirements, including minimum capital investment and ownership structures that comply with Indonesian law.
                            </div>
                        </div>
                    </div>

                    <!-- Question 3 -->
                    <div class="bg-white/10 backdrop-blur-sm rounded-lg overflow-hidden transition-all duration-300">
                        <button 
                            @click="active = active === 3 ? null : 3"
                            class="w-full px-6 py-5 flex items-center justify-between text-left text-white hover:bg-white/5 transition-colors"
                        >
                            <span class="text-base lg:text-lg font-light">What's the difference between a PT and a PT PMA?</span>
                            <span class="text-2xl font-light transition-transform duration-300" :class="active === 3 ? 'rotate-45' : ''">+</span>
                        </button>
                        <div 
                            x-show="active === 3"
                            x-transition:enter="transition-all ease-out duration-500"
                            x-transition:enter-start="opacity-0 max-h-0"
                            x-transition:enter-end="opacity-100 max-h-96"
                            x-transition:leave="transition-all ease-in duration-300"
                            x-transition:leave-start="opacity-100 max-h-96"
                            x-transition:leave-end="opacity-0 max-h-0"
                            class="overflow-hidden"
                            style="display: none;"
                        >
                            <div class="px-6 py-5 text-white/90 text-sm lg:text-base leading-relaxed">
                                A PT (Perseroan Terbatas) is a local Indonesian company owned by Indonesian nationals, while a PT PMA (Penanaman Modal Asing) is a foreign investment company that allows foreign ownership. PT PMA typically requires higher minimum capital and has different licensing requirements.
                            </div>
                        </div>
                    </div>

                    <!-- Question 4 -->
                    <div class="bg-white/10 backdrop-blur-sm rounded-lg overflow-hidden transition-all duration-300">
                        <button 
                            @click="active = active === 4 ? null : 4"
                            class="w-full px-6 py-5 flex items-center justify-between text-left text-white hover:bg-white/5 transition-colors"
                        >
                            <span class="text-base lg:text-lg font-light">How long does it take to set up a company in Indonesia?</span>
                            <span class="text-2xl font-light transition-transform duration-300" :class="active === 4 ? 'rotate-45' : ''">+</span>
                        </button>
                        <div 
                            x-show="active === 4"
                            x-collapse
                            x-cloak
                        >
                            <div class="px-6 py-5 text-white/90 text-sm lg:text-base leading-relaxed">
                                The timeline varies based on company type and completeness of documentation. Generally, a PT can be established in 2-4 weeks, while a PT PMA may take 4-8 weeks due to additional approvals required. We streamline the process to ensure efficient setup.
                            </div>
                        </div>
                    </div>

                    <!-- Question 5 -->
                    <div class="bg-white/10 backdrop-blur-sm rounded-lg overflow-hidden transition-all duration-300">
                        <button 
                            @click="active = active === 5 ? null : 5"
                            class="w-full px-6 py-5 flex items-center justify-between text-left text-white hover:bg-white/5 transition-colors"
                        >
                            <span class="text-base lg:text-lg font-light">Do I need a local partner to open a business?</span>
                            <span class="text-2xl font-light transition-transform duration-300" :class="active === 5 ? 'rotate-45' : ''">+</span>
                        </button>
                        <div 
                            x-show="active === 5"
                            x-collapse
                            x-cloak
                        >
                            <div class="px-6 py-5 text-white/90 text-sm lg:text-base leading-relaxed">
                                It depends on your business sector and chosen structure. Some business activities allow 100% foreign ownership through PT PMA, while others require Indonesian partnership. We can advise on the best structure for your specific business type and goals.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<style>
    .writing-mode-vertical {
        writing-mode: vertical-rl;
    }
</style>

@endsection
