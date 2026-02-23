@extends('layouts.app')

@section('title', 'About Us')

@section('content')

<<<<<<< HEAD
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

    <div class="bg-[#73302A] pb-[140px]">

        <section class="md:px-12 py-16 md:py-24">
            <div class="mx-auto px-6 lg:px-20">
=======
    <div class="pt-[240px] pb-[100px] relative">
        <div class="absolute top-0 left-0 bottom-0 right-0 transform"
            style="background: linear-gradient(180deg, #6C342C 0%, #3B0014 100%);"></div>
        <div class="relative z-10 container max-w-[1240px] mx-auto px-4 lg:px-8 text-center">
            <h4 class="text-[84px] font-medium leading-[110%] text-white">Born in Bali.</h4>
            <h4 class="text-[84px] font-medium leading-[110%] text-[#B8C1F8]">Built for real people.</h4>
        </div>

        <div class="relative max-w-7xl mx-auto px-6">
            <!-- Image collage -->
            <div class="relative flex justify-center mb-20">
            <!-- Left small image -->
            <img
                src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee"
                class="absolute left-0 top-16 w-28 h-28 object-cover rounded-xl"
                alt=""
            />

            <!-- Main image -->
            <img
                src="https://images.unsplash.com/photo-1500534314209-a25ddb2bd429"
                class="w-[420px] h-[520px] object-cover rounded-2xl shadow-2xl"
                alt=""
            />

            <!-- Right small image -->
            <img
                src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e"
                class="absolute right-0 top-32 w-28 h-28 object-cover rounded-xl"
                alt=""
            />
            </div>

            <!-- Text content -->
            <div class="max-w-3xl mx-auto text-center mb-20">
            <p class="text-sm uppercase tracking-widest opacity-70 mb-4">
                Our mission
            </p>

            <h2 class="text-4xl md:text-5xl font-light leading-tight">
                Bright Legal started with one simple belief;
                <span class="text-[#f2b94b]">
                legal help doesn’t have to feel intimidating.
                </span>
            </h2>
            </div>

            <!-- Cards -->
            <div class="grid md:grid-cols-3 gap-10">
            <!-- Card 1 -->
            <div>
                <img
                src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d"
                class="rounded-xl mb-6"
                alt=""
                />
                <p class="text-sm opacity-70 leading-relaxed">
                Born in Bali, we’re a small but mighty team of legal professionals who
                believe in clear answers, practical solutions, and treating clients
                like people — not case numbers.
                </p>
            </div>

            <!-- Card 2 -->
            <div>
                <img
                src="https://images.unsplash.com/photo-1529333166437-7750a6dd5a70"
                class="rounded-xl mb-6"
                alt=""
                />
                <p class="text-sm opacity-70 leading-relaxed">
                Whether you're here to build your dream business or just sort out your
                visa, we’re here to make it easier, not scarier.
                </p>
            </div>

            <!-- Card 3 -->
            <div>
                <img
                src="https://images.unsplash.com/photo-1511632765486-a01980e01a18"
                class="rounded-xl mb-6"
                alt=""
                />
                <p class="text-sm opacity-70 leading-relaxed">
                We know that dealing with legal stuff in a foreign country can feel
                overwhelming. That’s why we guide you step by step, clearly and
                patiently.
                </p>
            </div>
            </div>
        </div>
    </div>

    <div class="bg-[#73302A] py-[140px]">

        <section class="px-6 md:px-12 lg:px-20 pb-16 md:pb-24">
            <div class="max-w-7xl mx-auto">
>>>>>>> b8babd5fee8555bec7d8978076fcc4918b2ea917

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
                            <div class="rounded-[8px] overflow-hidden mb-[24px] overflow-hidden" style="background-color: {{ $member->background_color }}; height: 480px;">
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
                                <p class="text-white/60 text-sm leading-relaxed">
                                    {!! $member->description !!}
                                </p>
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
            </div>
        </section>

        <hr class="border-[rgba(255,255,255,0.1)]">

        <!-- Testimonial & Logos Section -->
        <section class="\px-6 md:px-12 lg:px-20 py-12 md:py-16">
            <div class="max-w-7xl mx-auto">

                <!-- Testimonial Text -->
<<<<<<< HEAD
                <h3 class="text-[rgba(217,217,217,0.6)] text-[40px] font-medium mb-12 md:mb-[60px] leading-relaxed">
                    @if($aboutUsSettings && $aboutUsSettings->clients_text)
                        {!! $aboutUsSettings->clients_text !!}
                    @else
                        Trusted by expats, entrepreneurs, and<br>
                        small business owners across Bali.
                    @endif
=======
                <h3 class="text-[rgba(217,217,217,0.6)] text-[40px] font-medium mb-12 md:mb-[60px] leading-[120%]">
                    Trusted by expats, entrepreneurs, and<br>
                    small business owners across Bali.
>>>>>>> b8babd5fee8555bec7d8978076fcc4918b2ea917
                </h3>

                <!-- Client Logos -->
                <div class="flex flex-wrap items-center justify-center gap-12 md:gap-16 lg:gap-20">

                    <div class="relative">
                        <svg width="209" height="40" viewBox="0 0 209 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M96.8549 4.00158C96.532 6.29416 98.0206 8.00317 100.34 8.00317C102.66 8.00317 104.63 6.29416 104.953 4.00158C105.276 1.70901 103.787 0 101.467 0C99.1476 0 97.1777 1.70901 96.8549 4.00158Z" fill="#d9d9d9"></path>
                            <path d="M96.9129 9.87892L94.9234 24.0073L101.284 23.764L103.239 9.87892H96.9129Z" fill="#d9d9d9"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M80.2065 31.0125C85.2241 31.0125 89.4889 28.3459 91.6214 24.3067L94.8626 24.439L94.0133 30.4704H100.34L101.153 24.6957L104.507 24.8326L102.474 39.2658H108.801L110.356 28.2198C111.405 30.0538 113.379 31.0125 115.868 31.0125C119.232 31.0125 123.182 29.2789 125.543 25.6911L127.966 25.79C128.379 28.907 131.289 31.0125 135.906 31.0125C141.262 31.0125 145.204 28.1781 145.803 23.9264C146.49 19.0495 142.004 18.2575 139.068 17.8407L138.812 17.8016C137.037 17.5315 135.682 17.3254 135.85 16.1316C135.968 15.298 136.712 14.506 138.272 14.506C139.538 14.506 140.305 15.0479 140.339 16.0066H146.496C146.892 12.2968 144.104 9.33729 138.916 9.33729C133.728 9.33729 129.985 12.2551 129.398 16.4234C128.7 21.3837 133.324 22.0923 136.133 22.5092L136.288 22.5327L136.504 22.5652L136.506 22.5655C138.224 22.8231 139.52 23.0174 139.339 24.3016C139.216 25.1769 138.489 25.8438 136.549 25.8438C134.82 25.8438 134.095 25.302 134.205 24.2182L89.4309 24.2173L91.7129 24.1301C92.3273 22.9196 92.7522 21.59 92.9515 20.1749C93.8319 13.9224 89.8382 9.33729 83.2588 9.33729C83.1568 9.33729 83.0552 9.33839 82.9538 9.34058L82.974 9.3271L63.0294 9.32712C62.7436 9.3252 62.4723 9.32519 62.2181 9.32712L63.0294 9.32712C68.1511 9.36158 77.9117 10.0099 76.656 11.0661C73.3767 12.951 71.0691 16.2313 70.5138 20.1749C69.6333 26.4274 73.627 31.0125 80.2065 31.0125ZM81.0282 25.1769C83.8962 25.1769 86.1239 23.1344 86.5407 20.1749C86.9575 17.2154 85.305 15.1729 82.437 15.1729C79.569 15.1729 77.3413 17.2154 76.9245 20.1749C76.5078 23.1344 78.1603 25.1769 81.0282 25.1769Z" fill="#d9d9d9"></path>
                            <path d="M121.105 20.1749C120.95 21.2812 120.541 22.2593 119.94 23.0505L126.938 22.7828C127.179 22.0476 127.363 21.2619 127.481 20.425C128.414 13.7974 124.403 9.33729 117.781 9.33729C111.413 9.33729 106.108 13.4639 105.133 20.3833L104.676 23.6343L112.007 23.3539C111.507 22.5152 111.313 21.4272 111.489 20.1749C111.906 17.2154 114.134 15.1729 117.002 15.1729C119.87 15.1729 121.522 17.2154 121.105 20.1749Z" fill="#d9d9d9"></path>
                            <path d="M170.456 27.306L171.642 18.8827C172.576 12.2551 176.867 9.33729 181.928 9.33729C184.88 9.33729 187.21 10.4627 188.465 12.6303C190.331 10.4627 192.936 9.33729 195.93 9.33729C200.992 9.33729 204.461 12.2551 203.528 18.8827L201.896 30.4707H195.569L197.201 18.8827C197.589 16.1316 196.374 15.1729 194.476 15.1729C192.62 15.1729 191.136 16.1316 190.748 18.8827L189.116 30.4707H182.79L184.422 18.8827C184.809 16.1316 183.595 15.1729 181.739 15.1729C179.841 15.1729 178.356 16.1316 177.969 18.8827L176.337 30.4707H172.546L172.547 30.4731H163.683C167.361 30.1011 170.187 29.0964 170.45 27.2971L170.456 27.306Z" fill="#d9d9d9"></path>
                            <path d="M156.959 31.0123C150.801 31.0123 147.161 27.5109 148.141 20.5498L149.249 12.6856C149.426 10.6542 147.823 10.4004 144.287 9.89141H149.642L149.644 9.8789H155.971L154.468 20.5498C154.01 23.8011 155.419 25.1766 157.781 25.1766C160.143 25.1766 161.939 23.8011 162.397 20.5498L163.9 9.8789H170.226L168.723 20.5498C167.749 27.4692 163.117 31.0123 156.959 31.0123Z" fill="#d9d9d9"></path>
                            <path d="M49.2173 28.0335C48.7702 27.5452 48.3842 27.0051 48.0643 26.4191L43.5474 26.1736C41.2111 29.1472 37.5411 31.0125 33.3445 31.0125C26.765 31.0125 22.7713 26.4274 23.6518 20.1749C24.5323 13.9224 29.8173 9.33729 36.3968 9.33729C42.9763 9.33729 46.97 13.9224 46.0895 20.1749C45.8882 21.6041 45.4568 22.9462 44.8325 24.1663L36.6952 24.5808C38.2796 23.7686 39.396 22.1828 39.6787 20.1749C40.0955 17.2154 38.443 15.1729 35.575 15.1729C32.7071 15.1729 30.4793 17.2154 30.0626 20.1749C29.7506 22.3903 30.5982 24.0919 32.2471 24.8074L25.1072 25.1712H57.753V25.1749C60.5456 25.1023 62.7005 23.0806 63.1097 20.1749C63.5264 17.2154 61.8739 15.1729 59.0059 15.1729C56.138 15.1729 53.9103 17.2154 53.4935 20.1749C53.2928 21.6003 53.5721 22.813 54.236 23.6872L47.1888 24.0462C46.9317 22.8583 46.8881 21.5574 47.0827 20.1749C47.9632 13.9224 53.2482 9.33729 59.8277 9.33729C66.4072 9.33729 70.4009 13.9224 69.5204 20.1749C68.6699 26.2145 63.7097 30.6984 57.4429 30.9967C58.9188 31.8258 61.0625 32.4963 62.6382 32.989C63.1639 33.1535 63.6264 33.2981 63.9797 33.4222C65.4107 33.7752 66.3251 35.093 66.1038 36.6647C65.8444 38.5067 64.1232 40 62.2594 40H52.1351C48.8257 40 46.4041 37.6461 46.2654 34.5399L33.7781 33.3309H46.3248L46.325 33.3294H57.1213C54.6527 32.3859 52.0442 30.4983 50.3671 29.074C49.949 28.7608 49.5655 28.4135 49.2187 28.035L49.2173 28.0335Z" fill="#d9d9d9"></path>
                            <path d="M0 3.20974L5.1678 4.03054L1.44456 30.4705H21.3095L22.19 24.218H9.15756L12.1159 3.20968L0 3.20974Z" fill="#d9d9d9"></path>
                            <path d="M209 7.8769C209 9.20557 207.921 10.2827 206.589 10.2827C205.258 10.2827 204.179 9.20557 204.179 7.8769C204.179 6.54822 205.258 5.47112 206.589 5.47112C207.921 5.47112 209 6.54822 209 7.8769Z" fill="#d9d9d9"></path>
                        </svg>
                    </div>

                    <div class="relative">
                        <svg width="209" height="40" viewBox="0 0 209 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M96.8549 4.00158C96.532 6.29416 98.0206 8.00317 100.34 8.00317C102.66 8.00317 104.63 6.29416 104.953 4.00158C105.276 1.70901 103.787 0 101.467 0C99.1476 0 97.1777 1.70901 96.8549 4.00158Z" fill="#d9d9d9"></path>
                            <path d="M96.9129 9.87892L94.9234 24.0073L101.284 23.764L103.239 9.87892H96.9129Z" fill="#d9d9d9"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M80.2065 31.0125C85.2241 31.0125 89.4889 28.3459 91.6214 24.3067L94.8626 24.439L94.0133 30.4704H100.34L101.153 24.6957L104.507 24.8326L102.474 39.2658H108.801L110.356 28.2198C111.405 30.0538 113.379 31.0125 115.868 31.0125C119.232 31.0125 123.182 29.2789 125.543 25.6911L127.966 25.79C128.379 28.907 131.289 31.0125 135.906 31.0125C141.262 31.0125 145.204 28.1781 145.803 23.9264C146.49 19.0495 142.004 18.2575 139.068 17.8407L138.812 17.8016C137.037 17.5315 135.682 17.3254 135.85 16.1316C135.968 15.298 136.712 14.506 138.272 14.506C139.538 14.506 140.305 15.0479 140.339 16.0066H146.496C146.892 12.2968 144.104 9.33729 138.916 9.33729C133.728 9.33729 129.985 12.2551 129.398 16.4234C128.7 21.3837 133.324 22.0923 136.133 22.5092L136.288 22.5327L136.504 22.5652L136.506 22.5655C138.224 22.8231 139.52 23.0174 139.339 24.3016C139.216 25.1769 138.489 25.8438 136.549 25.8438C134.82 25.8438 134.095 25.302 134.205 24.2182L89.4309 24.2173L91.7129 24.1301C92.3273 22.9196 92.7522 21.59 92.9515 20.1749C93.8319 13.9224 89.8382 9.33729 83.2588 9.33729C83.1568 9.33729 83.0552 9.33839 82.9538 9.34058L82.974 9.3271L63.0294 9.32712C62.7436 9.3252 62.4723 9.32519 62.2181 9.32712L63.0294 9.32712C68.1511 9.36158 77.9117 10.0099 76.656 11.0661C73.3767 12.951 71.0691 16.2313 70.5138 20.1749C69.6333 26.4274 73.627 31.0125 80.2065 31.0125ZM81.0282 25.1769C83.8962 25.1769 86.1239 23.1344 86.5407 20.1749C86.9575 17.2154 85.305 15.1729 82.437 15.1729C79.569 15.1729 77.3413 17.2154 76.9245 20.1749C76.5078 23.1344 78.1603 25.1769 81.0282 25.1769Z" fill="#d9d9d9"></path>
                            <path d="M121.105 20.1749C120.95 21.2812 120.541 22.2593 119.94 23.0505L126.938 22.7828C127.179 22.0476 127.363 21.2619 127.481 20.425C128.414 13.7974 124.403 9.33729 117.781 9.33729C111.413 9.33729 106.108 13.4639 105.133 20.3833L104.676 23.6343L112.007 23.3539C111.507 22.5152 111.313 21.4272 111.489 20.1749C111.906 17.2154 114.134 15.1729 117.002 15.1729C119.87 15.1729 121.522 17.2154 121.105 20.1749Z" fill="#d9d9d9"></path>
                            <path d="M170.456 27.306L171.642 18.8827C172.576 12.2551 176.867 9.33729 181.928 9.33729C184.88 9.33729 187.21 10.4627 188.465 12.6303C190.331 10.4627 192.936 9.33729 195.93 9.33729C200.992 9.33729 204.461 12.2551 203.528 18.8827L201.896 30.4707H195.569L197.201 18.8827C197.589 16.1316 196.374 15.1729 194.476 15.1729C192.62 15.1729 191.136 16.1316 190.748 18.8827L189.116 30.4707H182.79L184.422 18.8827C184.809 16.1316 183.595 15.1729 181.739 15.1729C179.841 15.1729 178.356 16.1316 177.969 18.8827L176.337 30.4707H172.546L172.547 30.4731H163.683C167.361 30.1011 170.187 29.0964 170.45 27.2971L170.456 27.306Z" fill="#d9d9d9"></path>
                            <path d="M156.959 31.0123C150.801 31.0123 147.161 27.5109 148.141 20.5498L149.249 12.6856C149.426 10.6542 147.823 10.4004 144.287 9.89141H149.642L149.644 9.8789H155.971L154.468 20.5498C154.01 23.8011 155.419 25.1766 157.781 25.1766C160.143 25.1766 161.939 23.8011 162.397 20.5498L163.9 9.8789H170.226L168.723 20.5498C167.749 27.4692 163.117 31.0123 156.959 31.0123Z" fill="#d9d9d9"></path>
                            <path d="M49.2173 28.0335C48.7702 27.5452 48.3842 27.0051 48.0643 26.4191L43.5474 26.1736C41.2111 29.1472 37.5411 31.0125 33.3445 31.0125C26.765 31.0125 22.7713 26.4274 23.6518 20.1749C24.5323 13.9224 29.8173 9.33729 36.3968 9.33729C42.9763 9.33729 46.97 13.9224 46.0895 20.1749C45.8882 21.6041 45.4568 22.9462 44.8325 24.1663L36.6952 24.5808C38.2796 23.7686 39.396 22.1828 39.6787 20.1749C40.0955 17.2154 38.443 15.1729 35.575 15.1729C32.7071 15.1729 30.4793 17.2154 30.0626 20.1749C29.7506 22.3903 30.5982 24.0919 32.2471 24.8074L25.1072 25.1712H57.753V25.1749C60.5456 25.1023 62.7005 23.0806 63.1097 20.1749C63.5264 17.2154 61.8739 15.1729 59.0059 15.1729C56.138 15.1729 53.9103 17.2154 53.4935 20.1749C53.2928 21.6003 53.5721 22.813 54.236 23.6872L47.1888 24.0462C46.9317 22.8583 46.8881 21.5574 47.0827 20.1749C47.9632 13.9224 53.2482 9.33729 59.8277 9.33729C66.4072 9.33729 70.4009 13.9224 69.5204 20.1749C68.6699 26.2145 63.7097 30.6984 57.4429 30.9967C58.9188 31.8258 61.0625 32.4963 62.6382 32.989C63.1639 33.1535 63.6264 33.2981 63.9797 33.4222C65.4107 33.7752 66.3251 35.093 66.1038 36.6647C65.8444 38.5067 64.1232 40 62.2594 40H52.1351C48.8257 40 46.4041 37.6461 46.2654 34.5399L33.7781 33.3309H46.3248L46.325 33.3294H57.1213C54.6527 32.3859 52.0442 30.4983 50.3671 29.074C49.949 28.7608 49.5655 28.4135 49.2187 28.035L49.2173 28.0335Z" fill="#d9d9d9"></path>
                            <path d="M0 3.20974L5.1678 4.03054L1.44456 30.4705H21.3095L22.19 24.218H9.15756L12.1159 3.20968L0 3.20974Z" fill="#d9d9d9"></path>
                            <path d="M209 7.8769C209 9.20557 207.921 10.2827 206.589 10.2827C205.258 10.2827 204.179 9.20557 204.179 7.8769C204.179 6.54822 205.258 5.47112 206.589 5.47112C207.921 5.47112 209 6.54822 209 7.8769Z" fill="#d9d9d9"></path>
                        </svg>
                    </div>
                    
                    <div class="relative">
                        <svg width="209" height="40" viewBox="0 0 209 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M96.8549 4.00158C96.532 6.29416 98.0206 8.00317 100.34 8.00317C102.66 8.00317 104.63 6.29416 104.953 4.00158C105.276 1.70901 103.787 0 101.467 0C99.1476 0 97.1777 1.70901 96.8549 4.00158Z" fill="#d9d9d9"></path>
                            <path d="M96.9129 9.87892L94.9234 24.0073L101.284 23.764L103.239 9.87892H96.9129Z" fill="#d9d9d9"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M80.2065 31.0125C85.2241 31.0125 89.4889 28.3459 91.6214 24.3067L94.8626 24.439L94.0133 30.4704H100.34L101.153 24.6957L104.507 24.8326L102.474 39.2658H108.801L110.356 28.2198C111.405 30.0538 113.379 31.0125 115.868 31.0125C119.232 31.0125 123.182 29.2789 125.543 25.6911L127.966 25.79C128.379 28.907 131.289 31.0125 135.906 31.0125C141.262 31.0125 145.204 28.1781 145.803 23.9264C146.49 19.0495 142.004 18.2575 139.068 17.8407L138.812 17.8016C137.037 17.5315 135.682 17.3254 135.85 16.1316C135.968 15.298 136.712 14.506 138.272 14.506C139.538 14.506 140.305 15.0479 140.339 16.0066H146.496C146.892 12.2968 144.104 9.33729 138.916 9.33729C133.728 9.33729 129.985 12.2551 129.398 16.4234C128.7 21.3837 133.324 22.0923 136.133 22.5092L136.288 22.5327L136.504 22.5652L136.506 22.5655C138.224 22.8231 139.52 23.0174 139.339 24.3016C139.216 25.1769 138.489 25.8438 136.549 25.8438C134.82 25.8438 134.095 25.302 134.205 24.2182L89.4309 24.2173L91.7129 24.1301C92.3273 22.9196 92.7522 21.59 92.9515 20.1749C93.8319 13.9224 89.8382 9.33729 83.2588 9.33729C83.1568 9.33729 83.0552 9.33839 82.9538 9.34058L82.974 9.3271L63.0294 9.32712C62.7436 9.3252 62.4723 9.32519 62.2181 9.32712L63.0294 9.32712C68.1511 9.36158 77.9117 10.0099 76.656 11.0661C73.3767 12.951 71.0691 16.2313 70.5138 20.1749C69.6333 26.4274 73.627 31.0125 80.2065 31.0125ZM81.0282 25.1769C83.8962 25.1769 86.1239 23.1344 86.5407 20.1749C86.9575 17.2154 85.305 15.1729 82.437 15.1729C79.569 15.1729 77.3413 17.2154 76.9245 20.1749C76.5078 23.1344 78.1603 25.1769 81.0282 25.1769Z" fill="#d9d9d9"></path>
                            <path d="M121.105 20.1749C120.95 21.2812 120.541 22.2593 119.94 23.0505L126.938 22.7828C127.179 22.0476 127.363 21.2619 127.481 20.425C128.414 13.7974 124.403 9.33729 117.781 9.33729C111.413 9.33729 106.108 13.4639 105.133 20.3833L104.676 23.6343L112.007 23.3539C111.507 22.5152 111.313 21.4272 111.489 20.1749C111.906 17.2154 114.134 15.1729 117.002 15.1729C119.87 15.1729 121.522 17.2154 121.105 20.1749Z" fill="#d9d9d9"></path>
                            <path d="M170.456 27.306L171.642 18.8827C172.576 12.2551 176.867 9.33729 181.928 9.33729C184.88 9.33729 187.21 10.4627 188.465 12.6303C190.331 10.4627 192.936 9.33729 195.93 9.33729C200.992 9.33729 204.461 12.2551 203.528 18.8827L201.896 30.4707H195.569L197.201 18.8827C197.589 16.1316 196.374 15.1729 194.476 15.1729C192.62 15.1729 191.136 16.1316 190.748 18.8827L189.116 30.4707H182.79L184.422 18.8827C184.809 16.1316 183.595 15.1729 181.739 15.1729C179.841 15.1729 178.356 16.1316 177.969 18.8827L176.337 30.4707H172.546L172.547 30.4731H163.683C167.361 30.1011 170.187 29.0964 170.45 27.2971L170.456 27.306Z" fill="#d9d9d9"></path>
                            <path d="M156.959 31.0123C150.801 31.0123 147.161 27.5109 148.141 20.5498L149.249 12.6856C149.426 10.6542 147.823 10.4004 144.287 9.89141H149.642L149.644 9.8789H155.971L154.468 20.5498C154.01 23.8011 155.419 25.1766 157.781 25.1766C160.143 25.1766 161.939 23.8011 162.397 20.5498L163.9 9.8789H170.226L168.723 20.5498C167.749 27.4692 163.117 31.0123 156.959 31.0123Z" fill="#d9d9d9"></path>
                            <path d="M49.2173 28.0335C48.7702 27.5452 48.3842 27.0051 48.0643 26.4191L43.5474 26.1736C41.2111 29.1472 37.5411 31.0125 33.3445 31.0125C26.765 31.0125 22.7713 26.4274 23.6518 20.1749C24.5323 13.9224 29.8173 9.33729 36.3968 9.33729C42.9763 9.33729 46.97 13.9224 46.0895 20.1749C45.8882 21.6041 45.4568 22.9462 44.8325 24.1663L36.6952 24.5808C38.2796 23.7686 39.396 22.1828 39.6787 20.1749C40.0955 17.2154 38.443 15.1729 35.575 15.1729C32.7071 15.1729 30.4793 17.2154 30.0626 20.1749C29.7506 22.3903 30.5982 24.0919 32.2471 24.8074L25.1072 25.1712H57.753V25.1749C60.5456 25.1023 62.7005 23.0806 63.1097 20.1749C63.5264 17.2154 61.8739 15.1729 59.0059 15.1729C56.138 15.1729 53.9103 17.2154 53.4935 20.1749C53.2928 21.6003 53.5721 22.813 54.236 23.6872L47.1888 24.0462C46.9317 22.8583 46.8881 21.5574 47.0827 20.1749C47.9632 13.9224 53.2482 9.33729 59.8277 9.33729C66.4072 9.33729 70.4009 13.9224 69.5204 20.1749C68.6699 26.2145 63.7097 30.6984 57.4429 30.9967C58.9188 31.8258 61.0625 32.4963 62.6382 32.989C63.1639 33.1535 63.6264 33.2981 63.9797 33.4222C65.4107 33.7752 66.3251 35.093 66.1038 36.6647C65.8444 38.5067 64.1232 40 62.2594 40H52.1351C48.8257 40 46.4041 37.6461 46.2654 34.5399L33.7781 33.3309H46.3248L46.325 33.3294H57.1213C54.6527 32.3859 52.0442 30.4983 50.3671 29.074C49.949 28.7608 49.5655 28.4135 49.2187 28.035L49.2173 28.0335Z" fill="#d9d9d9"></path>
                            <path d="M0 3.20974L5.1678 4.03054L1.44456 30.4705H21.3095L22.19 24.218H9.15756L12.1159 3.20968L0 3.20974Z" fill="#d9d9d9"></path>
                            <path d="M209 7.8769C209 9.20557 207.921 10.2827 206.589 10.2827C205.258 10.2827 204.179 9.20557 204.179 7.8769C204.179 6.54822 205.258 5.47112 206.589 5.47112C207.921 5.47112 209 6.54822 209 7.8769Z" fill="#d9d9d9"></path>
                        </svg>
                    </div>

                    <div class="relative">
                        <svg width="209" height="40" viewBox="0 0 209 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M96.8549 4.00158C96.532 6.29416 98.0206 8.00317 100.34 8.00317C102.66 8.00317 104.63 6.29416 104.953 4.00158C105.276 1.70901 103.787 0 101.467 0C99.1476 0 97.1777 1.70901 96.8549 4.00158Z" fill="#d9d9d9"></path>
                            <path d="M96.9129 9.87892L94.9234 24.0073L101.284 23.764L103.239 9.87892H96.9129Z" fill="#d9d9d9"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M80.2065 31.0125C85.2241 31.0125 89.4889 28.3459 91.6214 24.3067L94.8626 24.439L94.0133 30.4704H100.34L101.153 24.6957L104.507 24.8326L102.474 39.2658H108.801L110.356 28.2198C111.405 30.0538 113.379 31.0125 115.868 31.0125C119.232 31.0125 123.182 29.2789 125.543 25.6911L127.966 25.79C128.379 28.907 131.289 31.0125 135.906 31.0125C141.262 31.0125 145.204 28.1781 145.803 23.9264C146.49 19.0495 142.004 18.2575 139.068 17.8407L138.812 17.8016C137.037 17.5315 135.682 17.3254 135.85 16.1316C135.968 15.298 136.712 14.506 138.272 14.506C139.538 14.506 140.305 15.0479 140.339 16.0066H146.496C146.892 12.2968 144.104 9.33729 138.916 9.33729C133.728 9.33729 129.985 12.2551 129.398 16.4234C128.7 21.3837 133.324 22.0923 136.133 22.5092L136.288 22.5327L136.504 22.5652L136.506 22.5655C138.224 22.8231 139.52 23.0174 139.339 24.3016C139.216 25.1769 138.489 25.8438 136.549 25.8438C134.82 25.8438 134.095 25.302 134.205 24.2182L89.4309 24.2173L91.7129 24.1301C92.3273 22.9196 92.7522 21.59 92.9515 20.1749C93.8319 13.9224 89.8382 9.33729 83.2588 9.33729C83.1568 9.33729 83.0552 9.33839 82.9538 9.34058L82.974 9.3271L63.0294 9.32712C62.7436 9.3252 62.4723 9.32519 62.2181 9.32712L63.0294 9.32712C68.1511 9.36158 77.9117 10.0099 76.656 11.0661C73.3767 12.951 71.0691 16.2313 70.5138 20.1749C69.6333 26.4274 73.627 31.0125 80.2065 31.0125ZM81.0282 25.1769C83.8962 25.1769 86.1239 23.1344 86.5407 20.1749C86.9575 17.2154 85.305 15.1729 82.437 15.1729C79.569 15.1729 77.3413 17.2154 76.9245 20.1749C76.5078 23.1344 78.1603 25.1769 81.0282 25.1769Z" fill="#d9d9d9"></path>
                            <path d="M121.105 20.1749C120.95 21.2812 120.541 22.2593 119.94 23.0505L126.938 22.7828C127.179 22.0476 127.363 21.2619 127.481 20.425C128.414 13.7974 124.403 9.33729 117.781 9.33729C111.413 9.33729 106.108 13.4639 105.133 20.3833L104.676 23.6343L112.007 23.3539C111.507 22.5152 111.313 21.4272 111.489 20.1749C111.906 17.2154 114.134 15.1729 117.002 15.1729C119.87 15.1729 121.522 17.2154 121.105 20.1749Z" fill="#d9d9d9"></path>
                            <path d="M170.456 27.306L171.642 18.8827C172.576 12.2551 176.867 9.33729 181.928 9.33729C184.88 9.33729 187.21 10.4627 188.465 12.6303C190.331 10.4627 192.936 9.33729 195.93 9.33729C200.992 9.33729 204.461 12.2551 203.528 18.8827L201.896 30.4707H195.569L197.201 18.8827C197.589 16.1316 196.374 15.1729 194.476 15.1729C192.62 15.1729 191.136 16.1316 190.748 18.8827L189.116 30.4707H182.79L184.422 18.8827C184.809 16.1316 183.595 15.1729 181.739 15.1729C179.841 15.1729 178.356 16.1316 177.969 18.8827L176.337 30.4707H172.546L172.547 30.4731H163.683C167.361 30.1011 170.187 29.0964 170.45 27.2971L170.456 27.306Z" fill="#d9d9d9"></path>
                            <path d="M156.959 31.0123C150.801 31.0123 147.161 27.5109 148.141 20.5498L149.249 12.6856C149.426 10.6542 147.823 10.4004 144.287 9.89141H149.642L149.644 9.8789H155.971L154.468 20.5498C154.01 23.8011 155.419 25.1766 157.781 25.1766C160.143 25.1766 161.939 23.8011 162.397 20.5498L163.9 9.8789H170.226L168.723 20.5498C167.749 27.4692 163.117 31.0123 156.959 31.0123Z" fill="#d9d9d9"></path>
                            <path d="M49.2173 28.0335C48.7702 27.5452 48.3842 27.0051 48.0643 26.4191L43.5474 26.1736C41.2111 29.1472 37.5411 31.0125 33.3445 31.0125C26.765 31.0125 22.7713 26.4274 23.6518 20.1749C24.5323 13.9224 29.8173 9.33729 36.3968 9.33729C42.9763 9.33729 46.97 13.9224 46.0895 20.1749C45.8882 21.6041 45.4568 22.9462 44.8325 24.1663L36.6952 24.5808C38.2796 23.7686 39.396 22.1828 39.6787 20.1749C40.0955 17.2154 38.443 15.1729 35.575 15.1729C32.7071 15.1729 30.4793 17.2154 30.0626 20.1749C29.7506 22.3903 30.5982 24.0919 32.2471 24.8074L25.1072 25.1712H57.753V25.1749C60.5456 25.1023 62.7005 23.0806 63.1097 20.1749C63.5264 17.2154 61.8739 15.1729 59.0059 15.1729C56.138 15.1729 53.9103 17.2154 53.4935 20.1749C53.2928 21.6003 53.5721 22.813 54.236 23.6872L47.1888 24.0462C46.9317 22.8583 46.8881 21.5574 47.0827 20.1749C47.9632 13.9224 53.2482 9.33729 59.8277 9.33729C66.4072 9.33729 70.4009 13.9224 69.5204 20.1749C68.6699 26.2145 63.7097 30.6984 57.4429 30.9967C58.9188 31.8258 61.0625 32.4963 62.6382 32.989C63.1639 33.1535 63.6264 33.2981 63.9797 33.4222C65.4107 33.7752 66.3251 35.093 66.1038 36.6647C65.8444 38.5067 64.1232 40 62.2594 40H52.1351C48.8257 40 46.4041 37.6461 46.2654 34.5399L33.7781 33.3309H46.3248L46.325 33.3294H57.1213C54.6527 32.3859 52.0442 30.4983 50.3671 29.074C49.949 28.7608 49.5655 28.4135 49.2187 28.035L49.2173 28.0335Z" fill="#d9d9d9"></path>
                            <path d="M0 3.20974L5.1678 4.03054L1.44456 30.4705H21.3095L22.19 24.218H9.15756L12.1159 3.20968L0 3.20974Z" fill="#d9d9d9"></path>
                            <path d="M209 7.8769C209 9.20557 207.921 10.2827 206.589 10.2827C205.258 10.2827 204.179 9.20557 204.179 7.8769C204.179 6.54822 205.258 5.47112 206.589 5.47112C207.921 5.47112 209 6.54822 209 7.8769Z" fill="#d9d9d9"></path>
                        </svg>
                    </div>

                </div>
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