@extends('layouts.app')

@section('title', 'About Us')

@section('content')

    <div class="relative pt-[240px] pb-[160px]">
        <div class="absolute top-0 left-0 bottom-0 right-0 transform z-[1]"
            style="background: linear-gradient(180deg, #6C342C 0%, #3B0014 100%);"></div>
        <div class="absolute z-[2] top-0 pointer-events-none hidden md:block opacity-30">
            <img src="{{ asset('assets/images/Bright Legal_Icon-07 1.png') }}" class="object-contain" alt="">
        </div>

        <section class="w-full px-6 lg:px-20 pb-[240px] text-center relative z-[2]">
            <div class="mb-[100px]">
                <h1 class="text-[84px] font-medium leading-[110%] text-white">{{ $aboutUsSettings->hero_title ?? 'Born in Bali.' }}</h1>
                <h2 class="text-[84px] font-medium leading-[110%] text-[#B8C1F8]">{{ $aboutUsSettings->hero_subtitle ?? 'Built for real people.' }}</h2>
            </div>

            <!-- Image layout -->
            <div class="relative flex justify-center items-start">
                <!-- Left small -->
                <div class="absolute left-0 top-6" style="width:230px;height:260px;border-radius:14px;overflow:hidden;">
                    @if($aboutUsSettings && $aboutUsSettings->hero_image_left)
                        <img src="{{ Storage::url($aboutUsSettings->hero_image_left) }}" alt="Hero Left"
                            style="width:100%;height:100%;object-fit:cover;" />
                    @else
                        <img src="https://images.unsplash.com/photo-1537953773345-d172ccf13cf1?w=300&q=80" alt="Bali temple"
                            style="width:100%;height:100%;object-fit:cover;" />
                    @endif
                </div>

                <!-- Center tall -->
                <div style="width:680px;height:630px;border-radius:18px;overflow:hidden;">
                    @if($aboutUsSettings && $aboutUsSettings->hero_image_center)
                        <img src="{{ Storage::url($aboutUsSettings->hero_image_center) }}" alt="Hero Center"
                            style="width:100%;height:100%;object-fit:cover;" />
                    @else
                        <img src="https://images.unsplash.com/photo-1518548419970-58e3b4079ab2?w=600&q=80" alt="Waterfall cave"
                            style="width:100%;height:100%;object-fit:cover;" />
                    @endif
                </div>

                <!-- Right small -->
                <div class="absolute right-0 top-[340px]"
                    style="width:230px;height:230px;border-radius:14px;overflow:hidden;">
                    @if($aboutUsSettings && $aboutUsSettings->hero_image_right)
                        <img src="{{ Storage::url($aboutUsSettings->hero_image_right) }}" alt="Hero Right"
                            style="width:100%;height:100%;object-fit:cover;" />
                    @else
                        <img src="https://images.unsplash.com/photo-1504609773096-104ff2c73ba4?w=300&q=80" alt="Bali water"
                            style="width:100%;height:100%;object-fit:cover;" />
                    @endif
                </div>
            </div>
        </section>

        <!-- ===== MISSION SECTION ===== -->
        <section class="w-full px-6 lg:px-20 pt-8 pb-16 relative z-[2]">
            <div style="display:flex; gap:24px; align-items:flex-start;">

                <!-- Left 20% — horizontal text, not vertical -->
                <div style="width:20%; flex-shrink:0; padding-top:6px;">
                    <p style="font-size:16px; letter-spacing:0.12em; font-weight: medium; color: #F1ECEC;">
                        {{ $aboutUsSettings->mission_label ?? 'Our mission' }}
                    </p>
                </div>

                <!-- Right 80% -->
                <div style="width:80%;">
                    <h2 style="font-size:52px; font-weight:medium; line-height:120%; color: #D9D9D9; margin-bottom:4px;">
                        {{ $aboutUsSettings->mission_title_line1 ?? 'Bright Legal started with one simple belief;' }}
                    </h2>
                    <h2 style="font-size:52px; font-weight:medium; line-height:120%; color: #F1AE43; margin-bottom:80px;">
                        {{ $aboutUsSettings->mission_title_line2 ?? "legal help doesn't have to feel intimidating." }}
                    </h2>

                    <!-- Three images row -->
                    <div style="display:grid; grid-template-columns:repeat(3,1fr); gap:20px; margin-bottom:80px;">
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
                    <div
                        style="display:grid;grid-template-columns:1fr 1fr;gap:24px;font-size:16px;line-height:160%;color:rgba(255, 255, 255, 0.65);">
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
                <div class="basis-full lg:basis-1/2">
                    <p class="title text-[#B8C1F8] text-base font-medium mb-2">{{ $aboutUsSettings->team_label ?? 'The people behind Bright Legal' }}</p>
                    <h2 class="text-[#D9D9D9] text-[52px] font-medium leading-[110%]">{{ $aboutUsSettings->team_title ?? 'A small team with big heart (and legal licenses)' }}</h2>
                </div>
                <div class="basis-full lg:basis-1/2 text-right">
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
                @forelse($teamMembers as $member)
                    <a href="{{ $member->link ?? '#' }}" class="group">
                        <div class="rounded-[8px] overflow-hidden mb-[24px]" style="background-color: {{ $member->background_color }}; height: 480px;">
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
                @empty
                    <!-- Fallback static team members when no CMS data -->
                    <a href="#" class="group">
                        <div class="bg-[#D4A78A] rounded-[8px] overflow-hidden mb-[24px] overflow-hidden" style="height:480px;">
                            <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?w=400&h=500&fit=crop"
                                alt="Josephine Apriliana"
                                class="w-full h-full object-cover group-hover:scale-[1.02] transform transition-transform duration-300 ">
                        </div>
                        <div>
                            <h3 class="text-[#D9D9D9] text-xl md:text-2xl font-bold mb-1">Josephine Apriliana</h3>
                            <p class="text-white/70 text-sm md:text-base">Founder & CEO</p>
                            <hr class="border-[rgba(255,255,255,0.1)] my-5">
                            <p class="text-white/60 text-sm leading-relaxed">
                                Diam interdum diam amet volutpat varius volutpat aliquet nulla integer. Faucibus dolor
                                tristique tempor auctor aliquet lorem.
                            </p>
                        </div>
                    </a>

                    <a href="#" class="group">
                        <div class="bg-[#E5D5CC] rounded-[8px] overflow-hidden mb-[24px] overflow-hidden" style="height:480px;">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=500&fit=crop"
                                alt="Jason M. Frank"
                                class="w-full h-full object-cover group-hover:scale-[1.02] transform transition-transform duration-300 ">
                        </div>
                        <div>
                            <h3 class="text-[#D9D9D9] text-xl md:text-2xl font-bold mb-1">Jason M. Frank</h3>
                            <p class="text-white/70 text-sm md:text-base">Senior Legal Advisor</p>
                            <hr class="border-[rgba(255,255,255,0.1)] my-5">
                            <p class="text-white/60 text-sm leading-relaxed">
                                Diam interdum diam amet volutpat varius volutpat aliquet nulla integer. Faucibus dolor
                                tristique tempor auctor aliquet lorem.
                            </p>
                        </div>
                    </a>

                    <a href="#" class="group">
                        <div class="bg-[#7A8963] rounded-[8px] overflow-hidden mb-[24px] overflow-hidden" style="height:480px;">
                            <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=400&h=500&fit=crop"
                                alt="Holyka Melodie"
                                class="w-full h-full object-cover group-hover:scale-[1.02] transform transition-transform duration-300 ">
                        </div>
                        <div>
                            <h3 class="text-[#D9D9D9] text-xl md:text-2xl font-bold mb-1">Holyka Melodie</h3>
                            <p class="text-white/70 text-sm md:text-base">Legal Consultant</p>
                            <hr class="border-[rgba(255,255,255,0.1)] my-5">
                            <p class="text-white/60 text-sm leading-relaxed">
                                Diam interdum diam amet volutpat varius volutpat aliquet nulla integer. Faucibus dolor
                                tristique tempor auctor aliquet lorem.
                            </p>
                        </div>
                    </a>
                @endforelse
            </div>
            
        </section>

        <hr class="border-[rgba(255,255,255,0.1)]">

        <!-- Testimonial & Logos Section -->
        <section class="w-full px-6 lg:px-20 pt-8 relative z-[2] pb-36">
            <div class="mx-auto mb-10">
                <!-- Testimonial Text -->
                <h3 class="text-[rgba(217,217,217,0.6)] text-[40px] font-medium mb-12 md:mb-[60px] leading-relaxed">
                    {!! $aboutUsSettings->clients_text !!}
                </h3>
            </div>
            <!-- Client Logos -->
            <div class="flex flex-wrap items-center justify-center gap-12 md:gap-16 lg:gap-20">
                @forelse($clientLogos as $logo)
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
                @empty
                    {{-- Fallback: show placeholder SVGs when no logos uploaded --}}
                    <div class="relative">
                        <svg width="209" height="40" viewBox="0 0 209 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M96.8549 4.00158C96.532 6.29416 98.0206 8.00317 100.34 8.00317C102.66 8.00317 104.63 6.29416 104.953 4.00158C105.276 1.70901 103.787 0 101.467 0C99.1476 0 97.1777 1.70901 96.8549 4.00158Z" fill="#d9d9d9"></path>
                            <path d="M96.9129 9.87892L94.9234 24.0073L101.284 23.764L103.239 9.87892H96.9129Z" fill="#d9d9d9"></path>
                            <path d="M0 3.20974L5.1678 4.03054L1.44456 30.4705H21.3095L22.19 24.218H9.15756L12.1159 3.20968L0 3.20974Z" fill="#d9d9d9"></path>
                        </svg>
                    </div>
                    <div class="relative">
                        <svg width="209" height="40" viewBox="0 0 209 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M96.8549 4.00158C96.532 6.29416 98.0206 8.00317 100.34 8.00317C102.66 8.00317 104.63 6.29416 104.953 4.00158C105.276 1.70901 103.787 0 101.467 0C99.1476 0 97.1777 1.70901 96.8549 4.00158Z" fill="#d9d9d9"></path>
                            <path d="M96.9129 9.87892L94.9234 24.0073L101.284 23.764L103.239 9.87892H96.9129Z" fill="#d9d9d9"></path>
                            <path d="M0 3.20974L5.1678 4.03054L1.44456 30.4705H21.3095L22.19 24.218H9.15756L12.1159 3.20968L0 3.20974Z" fill="#d9d9d9"></path>
                        </svg>
                    </div>
                    <div class="relative">
                        <svg width="209" height="40" viewBox="0 0 209 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M96.8549 4.00158C96.532 6.29416 98.0206 8.00317 100.34 8.00317C102.66 8.00317 104.63 6.29416 104.953 4.00158C105.276 1.70901 103.787 0 101.467 0C99.1476 0 97.1777 1.70901 96.8549 4.00158Z" fill="#d9d9d9"></path>
                            <path d="M96.9129 9.87892L94.9234 24.0073L101.284 23.764L103.239 9.87892H96.9129Z" fill="#d9d9d9"></path>
                            <path d="M0 3.20974L5.1678 4.03054L1.44456 30.4705H21.3095L22.19 24.218H9.15756L12.1159 3.20968L0 3.20974Z" fill="#d9d9d9"></path>
                        </svg>
                    </div>
                @endforelse
            </div>
        </section>

    </div>

    <!-- Artwork Section -->
    <div class="relative z-[2] mt-[-12px]">
        <img src="{{ asset('assets/images/brightlegal-artwork.png') }}" class="w-full" alt="Bright Legal Artwork">
    </div>

    <!-- CTA Section -->
    <div class="relative mt-[-60px] pt-[254px] pb-[166px] bg-[#CBD4FF] rounded-b-[60px]">
        <div class="absolute left-0 top-0 right-0 bottom-0 bg-left bg-no-repeat bg-contain"
            style="background-image: url('{{ asset('assets/images/Bright Legal_Icon-06 1.png') }}');"></div>
        <div class="relative z-10 container max-w-[1240px] mx-auto text-center">
            <h4 class="text-[84px] font-medium leading-[110%] text-[#3B0014] mb-[32px]">
                {{ $readyToTalk->title ?? 'Ready to talk?' }}
            </h4>
            <a href="{{ $readyToTalk->button_link ?? '#' }}"
                class="bg-[#3B0014] bg-opacity-30 hover:bg-opacity-40 text-[#B8C1F8] px-6 py-3 rounded-full transition inline-block">{{ $readyToTalk->button_text ?? 'Book free consultation' }}
                <i class="fa-solid fa-arrow-right text-sm"></i></a>
        </div>
    </div>

@endsection