@extends('layouts.app')

@section('title', 'About Us')

@section('content')

    <div class="relative pt-[120px] md:pt-[240px] pb-[0] md:pb-[160px]">
        <div class="absolute top-0 left-0 bottom-0 right-0 transform z-[1]"
            style="background: linear-gradient(180deg, #6C342C 0%, #3B0014 100%);"></div>
        <div class="absolute z-[2] top-0 pointer-events-none hidden md:block opacity-30">
            <img src="{{ asset('assets/images/Bright Legal_Icon-07 1.png') }}" class="object-contain" alt="">
        </div>

        <section class="w-full px-6 lg:px-20 pb-[160px] md:pb-[240px] text-center relative z-[2]">
            <div class="mb-[50px] md:mb-[100px]">
                <h1 class="text-[44px] md:text-[84px] font-medium leading-[110%] text-white">{{ $aboutUsSettings->hero_title ?? 'Born in Bali.' }}</h1>
                <h2 class="text-[44px] md:text-[84px] font-medium leading-[110%] text-[#B8C1F8]">{{ $aboutUsSettings->hero_subtitle ?? 'Built for real people.' }}</h2>
            </div>

            <!-- Image layout -->
            <div class="relative flex justify-center items-start">
                <!-- Left small -->
                <div class="absolute z-[2] left-0 top-6 w-[120px] md:w-[230px] h-[120px] md:h-[260px] rounded-[14px] overflow-hidden">
                    @if($aboutUsSettings && $aboutUsSettings->hero_image_left)
                        <img src="{{ Storage::url($aboutUsSettings->hero_image_left) }}" alt="Hero Left"
                            style="width:100%;height:100%;object-fit:cover;" />
                    @endif
                </div>

                <!-- Center tall -->
                <div class="w-[280px] z-[1] md:w-[680px] h-[320px] md:h-[630px] top-20 relative rounded-[18px] overflow-hidden">
                    @if($aboutUsSettings && $aboutUsSettings->hero_image_center)
                        <img src="{{ Storage::url($aboutUsSettings->hero_image_center) }}" alt="Hero Center"
                            style="width:100%;height:100%;object-fit:cover;" />
                    @endif
                </div>

                <!-- Right small -->
                <div class="absolute z-[2] right-0 top-[340px] w-[120px] md:w-[230px] h-[120px] md:h-[230px] rounded-[14px] overflow-hidden">
                    @if($aboutUsSettings && $aboutUsSettings->hero_image_right)
                        <img src="{{ Storage::url($aboutUsSettings->hero_image_right) }}" alt="Hero Right"
                            style="width:100%;height:100%;object-fit:cover;" />
                    @endif
                </div>
            </div>
        </section>

        <!-- ===== MISSION SECTION ===== -->
        <section class="w-full px-6 lg:px-20 pt-8 pb-16 relative z-[2]">
            <div class="block md:flex gap-6 items-start">

                <!-- Left 20% — horizontal text, not vertical -->
                <div class="w-full md:w-1/5 shrink-0 pt-[6px]">
                    <p style="font-size:16px; letter-spacing:0.12em; font-weight: medium; color: #F1ECEC;">
                        {{ $aboutUsSettings->mission_label ?? 'Our mission' }}
                    </p>
                </div>

                <!-- Right 80% -->
                <div class="w-full md:w-4/5">
                    <h2 class="text-[36px] md:text-[52px] font-medium leading-[120%] text-[#D9D9D9] mb-1">
                        {{ $aboutUsSettings->mission_title_line1 ?? 'Bright Legal started with one simple belief;' }}
                    </h2>
                    <h2 class="text-[36px] md:text-[52px] font-medium leading-[120%] text-[#F1AE43] mb-5">
                        {{ $aboutUsSettings->mission_title_line2 ?? "legal help doesn't have to feel intimidating." }}
                    </h2>

                    <!-- Three images row -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-10 md:mb-20">
                        <div style="border-radius:12px;overflow:hidden;height:320px;">
                            @if($aboutUsSettings && $aboutUsSettings->mission_image_1)
                                <img src="{{ Storage::url($aboutUsSettings->mission_image_1) }}" alt="Mission 1"
                                    style="width:100%;height:100%;object-fit:cover;" />
                            @else
                                <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=400&q=80"
                                    alt="Consultation" style="width:100%;height:100%;object-fit:cover;" />
                            @endif
                        </div>
                        <div style="border-radius:12px;overflow:hidden;height:320px;">
                            @if($aboutUsSettings && $aboutUsSettings->mission_image_2)
                                <img src="{{ Storage::url($aboutUsSettings->mission_image_2) }}" alt="Mission 2"
                                    style="width:100%;height:100%;object-fit:cover;" />
                            @else
                                <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=400&q=80" alt="Friends"
                                    style="width:100%;height:100%;object-fit:cover;" />
                            @endif
                        </div>
                        <div style="border-radius:12px;overflow:hidden;height:320px;">
                            @if($aboutUsSettings && $aboutUsSettings->mission_image_3)
                                <img src="{{ Storage::url($aboutUsSettings->mission_image_3) }}" alt="Mission 3"
                                    style="width:100%;height:100%;object-fit:cover;" />
                            @else
                                <img src="https://images.unsplash.com/photo-1605170439002-90845e8c0137?w=400&q=80" alt="Family"
                                    style="width:100%;height:100%;object-fit:cover;" />
                            @endif
                        </div>
                    </div>

                    <!-- Two column body text -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-base leading-[160%] text-white/65">
                        <p>
                            {{ $aboutUsSettings->mission_body_left ?? 'Born in Bali, we\'re a small but mighty team of legal professionals who believe in clear answers, practical solutions, and treating clients like people — not case numbers. Whether you\'re here to build your dream business or just sort out your visa, we\'re here to make it easier, not scarier.' }}
                        </p>
                        <p>
                            {{ $aboutUsSettings->mission_body_right ?? 'We know that dealing with legal staff in a foreign country can feel overwhelming. The language, the rules, the paperwork. That\'s why we take the time to explain things clearly, walk you through each step, and make sure you\'re not left guessing. We\'re here to support your journey, whatever that looks like.' }}
                        </p>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <div class="bg-[#73302A]">

        <section class="w-full px-6 lg:px-20 py-16 lg:py-24">

            <div class="flex flex-wrap items-end mb-[60px]">
                <div class="basis-full lg:basis-1/2 mb-5">
                    <p class="title text-[#B8C1F8] text-base font-medium mb-2">{{ $aboutUsSettings->team_label ?? 'The people behind Bright Legal' }}</p>
                    <h2 class="text-[#D9D9D9] text-[36px] md:text-[52px] font-medium leading-[110%]">{{ $aboutUsSettings->team_title ?? 'A small team with big heart (and legal licenses)' }}</h2>
                </div>
                <div class="basis-full lg:basis-1/2 text-left md:text-right">
                    @if($aboutUsSettings && $aboutUsSettings->team_button_text)
                        <a href="{{ $aboutUsSettings->team_button_link ?? '#' }}"
                            class="bg-[rgba(245,245,245,0.3)] bg-opacity-30 hover:bg-opacity-40 text-[#F5F5F5] px-6 py-3 rounded-full items-center gap-2 transition inline-block">{{ $aboutUsSettings->team_button_text }}
                            <i class="fa-solid fa-arrow-right text-sm"></i></a>
                    @else
                        <a href="#"
                            class="bg-[rgba(245,245,245,0.3)] bg-opacity-30 hover:bg-opacity-40 text-[#F5F5F5] px-6 py-3 rounded-full items-center gap-2 transition inline-block">Follow
                            our Instagram <i class="fa-solid fa-arrow-right text-sm"></i></a>
                    @endif
                </div>
            </div>

            <!-- Team Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                @foreach($teamMembers as $member)
                    <a href="{{ $member->link ?? '#' }}" class="group">
                        <div class="rounded-[8px] overflow-hidden mb-[16px] md:mb-[24px] h-[320px] md:h-[480px]" style="background-color: {{ $member->background_color }};">
                            @if($member->image)
                                <img src="{{ Storage::url($member->image) }}"
                                    alt="{{ $member->name }}"
                                    class="w-full h-full object-cover group-hover:scale-[1.02] transform transition-transform duration-300 ">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-white text-6xl font-bold opacity-30">
                                    {{ substr($member->name, 0, 1) }}
                                </div>
                            @endif
                        </div>
                        <div>
                            <h3 class="text-[#D9D9D9] text-xl md:text-2xl font-bold mb-1">{{ $member->name }}</h3>
                            <p class="text-white/70 text-sm md:text-base">{{ $member->position }}</p>
                            <hr class="border-[rgba(255,255,255,0.1)] my-5">
                            <div class="text-white/60 text-base font-medium leading-relaxed">
                                <p>
                                    {!! $member->description !!}
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            
        </section>

        <hr class="border-[rgba(255,255,255,0.1)]">

        <!-- Testimonial & Logos Section -->
        <section class="w-full px-6 lg:px-20 pt-8 relative z-[2] pb-20 md:pb-36">
            <div class="mx-auto mb-10">
                <!-- Testimonial Text -->
                <h3 class="text-[rgba(217,217,217,0.6)] text-[26px] md:text-[40px] font-medium mb-12 md:mb-[60px] leading-normal md:leading-relaxed">
                    {!! $aboutUsSettings->clients_text !!}
                </h3>
            </div>
            <!-- Client Logos -->
            <div class="flex flex-wrap items-center justify-center gap-12 md:gap-16 lg:gap-20">
                @foreach($clientLogos as $logo)
                    @if($logo->link)
                        <a href="{{ $logo->link }}" target="_blank" rel="noopener noreferrer" class="relative group">
                            <img src="{{ Storage::url($logo->image) }}"
                                alt="{{ $logo->name ?? 'Client Logo' }}"
                                class="h-10 md:h-12 object-contain opacity-60 hover:opacity-100 transition-all duration-300"
                                style="filter: brightness(0) invert(0.85); max-width: 200px;"
                                onmouseover="this.style.filter='brightness(0) invert(1)'"
                                onmouseout="this.style.filter='brightness(0) invert(0.85)'">
                        </a>
                    @else
                        <div class="relative">
                            <img src="{{ Storage::url($logo->image) }}"
                                alt="{{ $logo->name ?? 'Client Logo' }}"
                                class="h-10 md:h-12 object-contain opacity-60"
                                style="filter: brightness(0) invert(0.85); max-width: 200px;">
                        </div>
                    @endif
                @endforeach
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
            <a href="{{ $readyToTalk->button_link ?? '#' }}" class="bg-[#3B0014] hover:bg-opacity-70 text-[#B8C1F8] px-6 py-3 rounded-full items-center gap-2 transition inline-block">{{ $readyToTalk->button_text ?? 'Book free consultation' }} <i class="fa-solid fa-arrow-right text-sm"></i></a>
        </div>
    </div>

@endsection