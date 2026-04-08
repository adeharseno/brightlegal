@extends('layouts.app')

@section('title', 'Client Journey')

@section('content')

    <div class="relative pt-[120px] md:pt-[240px] pb-[80px] md:pb-[160px]">
        <div class="absolute top-0 left-0 bottom-0 right-0 transform z-[1]"
            style="background: linear-gradient(180deg, #6C342C 0%, #3B0014 100%);"></div>

        <!-- Hero -->
        <section class="relative z-[2] w-full px-6 lg:px-20 mb-[30px] md:mb-[60px]">
            <h1 class="text-[32px] md:text-[84px] font-medium leading-[110%] text-white">See how people navigate</h1>
            <h2 class="text-[32px] md:text-[84px] font-medium leading-[110%] text-[#B8C1F8]">legal matters in Bali with us</h2>
        </section>

        <!-- Tab Navigation + Content -->
        <section class="relative z-[2] w-full px-6 lg:px-20" x-data="{ activeTab: '{{ $categories->first()->slug ?? 'visa-support' }}' }">

            <!-- Tabs -->
            <div class="flex md:flex-wrap overflow-y-hidden overflow-x-auto md:overflow-visible flex-nowrap gap-4 md:gap-8 mb-[24px] md:mb-[60px] border-b border-white/10 pb-4">
                @foreach($categories as $index => $category)
                    <button
                        @click="activeTab = '{{ $category->slug }}'"
                        :class="activeTab === '{{ $category->slug }}'
                            ? 'text-white font-medium'
                            : 'text-white/50 hover:text-white/80'"
                        class="relative text-sm md:text-base transition-colors duration-200 whitespace-nowrap pb-2 cursor-pointer shrink-0">
                        
                        <span class="flex items-center gap-2">
                            <span x-show="activeTab === '{{ $category->slug }}'" class="w-2 h-2 rounded-full bg-[#F1AE43] inline-block"></span>
                            {{ $category->name }}
                        </span>

                        <span
                            x-show="activeTab === '{{ $category->slug }}'"
                            class="absolute bottom-[-17px] left-0 right-0 h-[2px] bg-[#F1AE43]"
                            x-transition>
                        </span>
                    </button>
                @endforeach
            </div>

            <!-- Tab Content -->
            @forelse($categories as $category)
                <div x-show="activeTab === '{{ $category->slug }}'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-[40px]">
                    @forelse($category->items as $item)
                        <!-- Case Study Card -->
                        <div class="bg-[#73302A] rounded-[20px] overflow-hidden">
                            <div class="p-5 md:p-10">
                                <!-- Header: Number + Tags -->
                                <div class="flex items-center gap-4 mb-2 md:mb-4">
                                    <span class="text-[#F1ECEC] text-lg font-medium">{{ $item->number }}</span>
                                    <div class="flex items-center gap-2 text-[#F1ECEC] font-medium text-sm md:text-lg ml-6">
                                        @if($item->client_type)
                                            <span>{{ $item->client_type }}</span>
                                        @endif
                                        @if($item->client_type && $item->topic)
                                            <span class="text-white/30">·</span>
                                        @endif
                                        @if($item->topic)
                                            <span>{{ $item->topic }}</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Title -->
                                <h3 class="text-white text-[20px] md:text-[44px] font-medium leading-[120%] ml-11">{{ $item->title }}</h3>
                            </div>

                            <!-- Content: Image left, text sections right -->
                            <div class="flex flex-col md:flex-row gap-0">
                                <!-- Client Image (tall, spans full height) -->
                                <div class="p-5 md:p-10 md:w-[460px] md:flex-shrink-0 overflow-hidden border border-b-0 border-l-0 border-white/10" style="min-height: 420px;">
                                    @if($item->image)
                                        <img src="{{ Storage::url($item->image) }}" alt="{{ $item->title }}"
                                            class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full bg-gradient-to-br from-[#6C342C] to-[#3B0014] flex items-center justify-center">
                                            <i class="fas fa-user text-white/10 text-[80px]"></i>
                                        </div>
                                    @endif
                                </div>

                                <!-- Right side: Challenge + How We Helped + Outcome -->
                                <div class="flex-1 flex flex-col">
                                    <!-- Top row: Challenge + How We Helped -->
                                    <div class="flex flex-col md:flex-row">
                                        <!-- The Challenge -->
                                        <div class="flex-1 p-6 md:p-8 border border-b-0 border-white/10">
                                            <h4 class="text-[#B8C1F8] text-base font-medium mb-4 tracking-wide">The challenge</h4>
                                            <p class="text-white/60 text-sm leading-[180%]">
                                                {{ $item->challenge ?? 'The client was planning to relocate to Bali but felt overwhelmed by conflicting information online.' }}
                                            </p>
                                        </div>

                                        <!-- How We Helped -->
                                        <div class="flex-1 p-6 md:p-8 border border-b-0 border-white/10">
                                            <h4 class="text-[#B8C1F8] text-base font-medium mb-4 tracking-wide">How we helped</h4>
                                            <p class="text-white/60 text-sm leading-[180%]">
                                                {{ $item->how_we_helped ?? 'We started by understanding their plans, timeline, and personal situation. From there, we explained the relevant visa options in plain language.' }}
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Outcome (below challenge + how we helped) -->
                                    <div class="p-6 md:p-8 border border-b-0 border-white/10">
                                        <h4 class="text-[#F1AE43] text-base font-medium mb-4 tracking-wide">Outcome</h4>
                                        <p class="text-white/60 text-sm leading-[180%]">
                                            {{ $item->outcome ?? 'The client was planning to relocate to Bali but felt overwhelmed by conflicting information online. They weren\'t sure which visa suited their situation, how long they could legally stay, or what risks they might be taking by choosing the wrong option.' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-20 text-white/40">
                            <i class="fas fa-folder-open text-4xl mb-4"></i>
                            <p>Belum ada case study di kategori ini.</p>
                        </div>
                    @endforelse
                </div>
            @empty
                <!-- Fallback static content when no CMS data -->
                <div x-show="activeTab === 'visa-support'" class="space-y-[40px]">
                    <div class="bg-[#73302A] rounded-[20px] p-8 md:p-10 overflow-hidden">
                        <div class="flex items-center gap-4 mb-4">
                            <span class="text-[#F1ECEC] text-lg font-medium">1</span>
                            <div class="flex items-center gap-2 text-[#F1ECEC] font-medium text-lg ml-6">
                                <span>Individual</span>
                                <span class="text-white/30">·</span>
                                <span>Relocation</span>
                            </div>
                        </div>
                        <h3 class="text-white text-[28px] md:text-[44px] font-medium leading-[120%] ml-11 mb-8">Moving to Bali without visa confusion</h3>
                        
                        <!-- Content: Image left, text sections right -->
                        <div class="flex flex-col md:flex-row gap-0">
                            <!-- Client Image (tall, spans full height) -->
                            <div class="p-10 md:w-[280px] md:flex-shrink-0 rounded-[14px] overflow-hidden border border-white/10" style="min-height: 420px;">
                                <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=400&q=80" alt="Client"
                                    class="w-full h-full object-cover">
                            </div>

                            <!-- Right side: Challenge + How We Helped + Outcome -->
                            <div class="flex-1 flex flex-col">
                                <!-- Top row: Challenge + How We Helped -->
                                <div class="flex flex-col md:flex-row">
                                    <div class="flex-1 p-6 md:p-8 border border-white/10">
                                        <h4 class="text-[#F1AE43] text-sm font-medium mb-4 tracking-wide">The challenge</h4>
                                        <p class="text-white/60 text-sm leading-[180%]">The client was planning to relocate to Bali but felt overwhelmed by conflicting information online.<br><br>They weren't sure which visa suited their situation, how long they could legally stay, or what risks they might be taking by choosing the wrong option.</p>
                                    </div>
                                    <div class="flex-1 p-6 md:p-8 border border-white/10">
                                        <h4 class="text-[#F1AE43] text-sm font-medium mb-4 tracking-wide">How we helped</h4>
                                        <p class="text-white/60 text-sm leading-[180%]">We started by understanding their plans, timeline, and personal situation. From there, we explained the relevant visa options in plain language, outlining the pros, limitations, and requirements of each. Once the right path was clear, we handled the paperwork, submissions, and coordination with the relevant authorities, guiding them step by step through the process.</p>
                                    </div>
                                </div>

                                <!-- Outcome (below challenge + how we helped) -->
                                <div class="p-6 md:p-8 border border-white/10">
                                    <h4 class="text-[#F1AE43] text-sm font-medium mb-4 tracking-wide">Outcome</h4>
                                    <p class="text-white/60 text-sm leading-[180%]">The client was planning to relocate to Bali but felt overwhelmed by conflicting information online. They weren't sure which visa suited their situation, how long they could legally stay, or what risks they might be taking by choosing the wrong option.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Empty states for other fallback tabs -->
                @foreach(['digital-nomad', 'business-setup', 'property-investment'] as $tabSlug)
                    <div x-show="activeTab === '{{ $tabSlug }}'" class="space-y-[40px]">
                        <div class="text-center py-20 text-white/40">
                            <i class="fas fa-folder-open text-4xl mb-4 block"></i>
                            <p>Case studies coming soon.</p>
                        </div>
                    </div>
                @endforeach
            @endforelse

            <!-- Bottom CTA Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-[40px] md:mt-[80px]">
                <!-- CTA 1: Not seeing your exact case? -->
                <div class="rounded-[20px] p-5 md:p-10 relative overflow-hidden !bg-cover !bg-center !bg-no-repeat" style="background-image: url({{ asset('assets/images/bgs.png') }}); border-radius: 8px;">
                    <div class="relative z-10 flex flex-col md:flex-row md:items-start gap-6">
                        <div class="flex-shrink-0 max-w-[250px]">
                            <h4 class="text-white text-[28px] md:text-[32px] font-medium leading-[120%]">{!! nl2br(e($ctaSettings->cta1_title ?? 'Not seeing your exact case?')) !!}</h4>
                        </div>
                        <div class="flex-1">
                            <p class="text-white/60 text-sm leading-[180%] mb-6">{{ $ctaSettings->cta1_description ?? 'Every situation is different. If you have questions or want guidance specific to your case, we\'re here to help you understand your options.' }}</p>
                            <a href="{{ $ctaSettings->cta1_button_link ?? '#' }}" class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white px-6 py-3 rounded-full text-sm font-medium transition-all duration-300">
                                {{ $ctaSettings->cta1_button_text ?? 'Talk to a legal advisor' }} <i class="fa-solid fa-arrow-right text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- CTA 2: Just starting your research? -->
                <div class="rounded-[20px] p-5 md:p-10 relative overflow-hidden !bg-cover !bg-center !bg-no-repeat" style="background-image: url({{ asset('assets/images/bg.png') }}); border-radius: 8px;">
                    <div class="relative z-10 flex flex-col md:flex-row md:items-start gap-6">
                        <div class="flex-shrink-0 max-w-[250px]">
                            <h4 class="text-white text-[28px] md:text-[32px] font-medium leading-[120%]">{!! nl2br(e($ctaSettings->cta2_title ?? 'Just starting your research?')) !!}</h4>
                        </div>
                        <div class="flex-1">
                            <p class="text-white/60 text-sm leading-[180%] mb-6">{{ $ctaSettings->cta2_description ?? 'Download our free guide for expats on land ownership, visas and business structures in Indonesia.' }}</p>
                            <a href="{{ $ctaSettings->cta2_button_link ?? '#' }}" class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white px-6 py-3 rounded-full text-sm font-medium transition-all duration-300">
                                {{ $ctaSettings->cta2_button_text ?? 'Get free legal guide' }} <i class="fa-solid fa-arrow-right text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>

    <div class="relative z-[2]">
        <img src="{{ asset('assets/images/brightlegal-artwork.png') }}" class="w-full" alt="Bright Legal Artwork">
    </div>

    <div class="relative mt-[-60px] pt-[180px] md:pt-[254px] pb-[140px] md:pb-[166px] bg-[#CBD4FF] rounded-b-[60px]">
        <div class="absolute left-0 top-0 right-0 bottom-0 bg-left bg-no-repeat bg-contain" style="background-image: url('{{ asset('assets/images/Bright Legal_Icon-06 1.png') }}');"></div>
        <div class="relative z-10 container mx-auto text-center">
            <h4 class="text-[44px] md:text-[84px] font-medium leading-[110%] text-[#3B0014] mb-[32px]">{{ $readyToTalk->title ?? 'Ready to talk?' }}</h4>
            <a href="{{ $readyToTalk->button_link ?? '#' }}" class="bg-[#3B0014] bg-opacity-30 hover:bg-opacity-40 text-[#B8C1F8] px-6 py-3 rounded-full items-center gap-2 transition inline-block">{{ $readyToTalk->button_text ?? 'Book free consultation' }} <i class="fa-solid fa-arrow-right text-sm"></i></a>
        </div>
    </div>

@endsection