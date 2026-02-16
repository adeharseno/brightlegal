@extends('layouts.app')

@section('title', 'About Us')

@section('content')

    <div class="bg-[#73302A]">

        <section class="px-6 md:px-12 lg:px-20 py-16 md:py-24">
            <div class="max-w-7xl mx-auto">

                <div class="flex flex-wrap items-end mb-[60px]">
                    <div class="basis-full lg:basis-1/2">
                        <p class="title text-[#B8C1F8] text-base font-medium mb-2">The people behind Bright Legal</p>
                        <h2 class="text-[#D9D9D9] text-[52px] font-medium leading-[110%]">A small team with big heart (and
                            legal
                            licenses)</h2>
                    </div>
                    <div class="basis-full lg:basis-1/2 text-right">
                        <a href="#"
                            class="bg-[rgba(245,245,245,0.3)] bg-opacity-30 hover:bg-opacity-40 text-[#F5F5F5] px-6 py-3 rounded-full items-center gap-2 transition inline-block">Follow
                            our Instagram <i class="fa-solid fa-arrow-right text-sm"></i></a>
                    </div>
                </div>

                <!-- Team Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">

                    <!-- Team Member 1 -->
                    <a href="#" class="group">
                        <div class="bg-[#D4A78A] rounded-[8px] overflow-hidden mb-[24px] height-[480px] overflow-hidden">
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
                                tristique
                                tempor auctor aliquet lorem.
                            </p>
                        </div>
                    </a>

                    <!-- Team Member 2 -->
                    <a href="#" class="group">
                        <div class="bg-[#E5D5CC] rounded-[8px] overflow-hidden mb-[24px] height-[480px] overflow-hidden">
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
                                tristique
                                tempor auctor aliquet lorem.
                            </p>
                        </div>
                    </a>

                    <!-- Team Member 3 -->
                    <a href="#" class="group">
                        <div class="bg-[#7A8963] rounded-[8px] overflow-hidden mb-[24px] height-[480px] overflow-hidden">
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
                                tristique
                                tempor auctor aliquet lorem.
                            </p>
                        </div>
                    </a>

                </div>
            </div>
        </section>

        <hr class="border-[rgba(255,255,255,0.1)]">

        <!-- Testimonial & Logos Section -->
        <section class="\px-6 md:px-12 lg:px-20 py-12 md:py-16">
            <div class="max-w-7xl mx-auto">

                <!-- Testimonial Text -->
                <h3 class="text-[rgba(217,217,217,0.6)] text-[40px] font-medium mb-12 md:mb-[60px] leading-relaxed">
                    Trusted by expats, entrepreneurs, and<br>
                    small business owners across Bali.
                </h3>

                <!-- Client Logos -->
                <div class="flex flex-wrap items-center justify-center gap-12 md:gap-16 lg:gap-20">

                    <!-- BAKED Logo -->
                    <div class="text-white/40 text-3xl md:text-4xl font-bold tracking-wider">
                        BAKED.
                    </div>

                    <!-- KURA KURA Logo -->
                    <div class="text-white/40 text-2xl md:text-3xl font-bold tracking-wide">
                        <div>KURA</div>
                        <div>KURA</div>
                    </div>

                    <!-- La Brisa Logo -->
                    <div class="text-white/40 text-3xl md:text-4xl font-['Brush_Script_MT',cursive] italic">
                        La Brisa
                    </div>

                    <!-- The Lawn Logo -->
                    <div class="text-white/40 text-2xl md:text-3xl font-bold tracking-widest">
                        The Lawn
                    </div>

                    <!-- BAKED Logo (repeated) -->
                    <div class="text-white/40 text-3xl md:text-4xl font-bold tracking-wider">
                        BAKED.
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