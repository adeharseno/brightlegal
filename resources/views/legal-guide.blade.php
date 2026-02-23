@extends('layouts.app')

@section('title', 'Legal Guide')

@section('content')

    <!-- Hero Section -->
    <div class="relative pt-[240px] pb-[160px]">
        <div class="absolute top-0 left-0 bottom-0 right-0 transform z-[1]"
            style="background: linear-gradient(180deg, #6C342C 0%, #3B0014 100%);"></div>
        <div class="absolute z-[2] top-0 pointer-events-none hidden md:block opacity-30">
            <img src="{{ asset('assets/images/Bright Legal_Icon-07 1.png') }}" class="object-contain" alt="">
        </div>

        <section class="w-full px-6 lg:px-20 pb-[60px] text-center relative z-[2]">
            <div class="mb-[60px]">
                <h1 class="text-[84px] font-medium leading-[110%] text-white animate-fade-up">
                    {{ $guideSettings->page_title ?? 'Legal Guide.' }}
                </h1>
                <h2 class="text-[84px] font-medium leading-[110%] text-[#B8C1F8] animate-fade-up animate-delay-1">
                    {{ $guideSettings->page_subtitle ?? 'Made simple.' }}
                </h2>
            </div>
        </section>
    </div>

    <!-- Video Guide Section -->
    <div class="bg-[#3B0014] pb-[140px]">
        <section class="px-6 lg:px-20 py-16 md:py-24">
            <div class="mx-auto max-w-[1240px]">

                <!-- Section Header -->
                <div class="flex flex-wrap items-end mb-[60px]">
                    <div class="basis-full lg:basis-1/2">
                        <p class="text-[#B8C1F8] text-base font-medium mb-2 animate-on-scroll">Video guides</p>
                        <h2 class="text-[#D9D9D9] text-[52px] font-medium leading-[110%] animate-on-scroll">
                            Quick answers,<br>clear explanations
                        </h2>
                    </div>
                    <div class="basis-full lg:basis-1/2 text-right">
                        <p class="text-white/60 text-base leading-relaxed animate-on-scroll">
                            Short videos that break down common legal topics<br>
                            so you can understand your options fast.
                        </p>
                    </div>
                </div>

                @php
                    $featured = $guideItems->where('is_featured', true)->first();
                    $regularItems = $guideItems->where('is_featured', false)->values();
                @endphp

                <!-- Featured Grid: 1 large + 2 small -->
                @if($featured || $regularItems->count() > 0)
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">

                        <!-- Featured Large Card -->
                        @if($featured)
                            <div class="lg:col-span-2 animate-on-scroll">
                                <div class="video-card group relative rounded-[16px] overflow-hidden cursor-pointer"
                                    style="height: 420px;"
                                    onclick="openVideoPopup('{{ $featured->video_url }}', '{{ addslashes($featured->title) }}')">
                                    @if($featured->thumbnail)
                                        <img src="{{ Storage::url($featured->thumbnail) }}" alt="{{ $featured->title }}"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    @else
                                        <div
                                            class="w-full h-full bg-gradient-to-br from-[#6C342C] to-[#3B0014] flex items-center justify-center">
                                            <i class="fas fa-play-circle text-white/20 text-[120px]"></i>
                                        </div>
                                    @endif
                                    <!-- Overlay -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                                    <!-- Play Button -->
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <div
                                            class="play-btn w-[72px] h-[72px] bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center group-hover:bg-white/30 transition-all duration-300 group-hover:scale-110">
                                            <i class="fas fa-play text-white text-2xl ml-1"></i>
                                        </div>
                                    </div>
                                    <!-- Title -->
                                    <div class="absolute bottom-0 left-0 right-0 p-8">
                                        <span
                                            class="inline-block bg-[#F1AE43] text-[#3B0014] text-xs font-semibold px-3 py-1 rounded-full mb-3">⭐
                                            Featured</span>
                                        <h3 class="text-white text-2xl font-semibold leading-tight mb-2">{{ $featured->title }}</h3>
                                        @if($featured->description)
                                            <p class="text-white/70 text-sm line-clamp-2">{{ $featured->description }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Two Small Cards on the Right -->
                        @if($regularItems->count() > 0)
                            <div class="flex flex-col gap-6">
                                @foreach($regularItems->take(2) as $index => $item)
                                    <div class="animate-on-scroll" style="animation-delay: {{ ($index + 1) * 0.15 }}s">
                                        <div class="video-card group relative rounded-[16px] overflow-hidden cursor-pointer"
                                            style="height: 198px;"
                                            onclick="openVideoPopup('{{ $item->video_url }}', '{{ addslashes($item->title) }}')">
                                            @if($item->thumbnail)
                                                <img src="{{ Storage::url($item->thumbnail) }}" alt="{{ $item->title }}"
                                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                            @else
                                                <div
                                                    class="w-full h-full bg-gradient-to-br from-[#73302A] to-[#4A1A2E] flex items-center justify-center">
                                                    <i class="fas fa-play-circle text-white/20 text-[60px]"></i>
                                                </div>
                                            @endif
                                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/10 to-transparent">
                                            </div>
                                            <div class="absolute inset-0 flex items-center justify-center">
                                                <div
                                                    class="play-btn w-[48px] h-[48px] bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center group-hover:bg-white/30 transition-all duration-300 group-hover:scale-110">
                                                    <i class="fas fa-play text-white text-sm ml-0.5"></i>
                                                </div>
                                            </div>
                                            <div class="absolute bottom-0 left-0 right-0 p-5">
                                                <h3 class="text-white text-base font-semibold leading-tight">{{ $item->title }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                    </div>
                @endif

                <!-- Remaining Cards Grid (4 per row) -->
                @if($regularItems->count() > 2)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach($regularItems->slice(2) as $index => $item)
                            <div class="animate-on-scroll" style="animation-delay: {{ ($index % 4) * 0.1 }}s">
                                <div class="video-card group relative rounded-[16px] overflow-hidden cursor-pointer"
                                    style="height: 240px;"
                                    onclick="openVideoPopup('{{ $item->video_url }}', '{{ addslashes($item->title) }}')">
                                    @if($item->thumbnail)
                                        <img src="{{ Storage::url($item->thumbnail) }}" alt="{{ $item->title }}"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    @else
                                        <div
                                            class="w-full h-full bg-gradient-to-br from-[#73302A] to-[#4A1A2E] flex items-center justify-center">
                                            <i class="fas fa-play-circle text-white/20 text-[60px]"></i>
                                        </div>
                                    @endif
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/10 to-transparent"></div>
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <div
                                            class="play-btn w-[48px] h-[48px] bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center group-hover:bg-white/30 transition-all duration-300 group-hover:scale-110">
                                            <i class="fas fa-play text-white text-sm ml-0.5"></i>
                                        </div>
                                    </div>
                                    <div class="absolute bottom-0 left-0 right-0 p-5">
                                        <h3 class="text-white text-sm font-semibold leading-tight">{{ $item->title }}</h3>
                                        @if($item->description)
                                            <p class="text-white/60 text-xs mt-1 line-clamp-2">{{ $item->description }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                <!-- Fallback: No Items -->
                @if($guideItems->count() === 0)
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                        <!-- Static Featured Card -->
                        <div class="lg:col-span-2 animate-on-scroll">
                            <div class="video-card group relative rounded-[16px] overflow-hidden cursor-pointer"
                                style="height: 420px;" onclick="openVideoPopup('', 'Tourist visa vs business visa')">
                                <div
                                    class="w-full h-full bg-gradient-to-br from-[#6C342C] to-[#3B0014] flex items-center justify-center">
                                    <i class="fas fa-play-circle text-white/20 text-[120px]"></i>
                                </div>
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div
                                        class="play-btn w-[72px] h-[72px] bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center group-hover:bg-white/30 transition-all duration-300 group-hover:scale-110">
                                        <i class="fas fa-play text-white text-2xl ml-1"></i>
                                    </div>
                                </div>
                                <div class="absolute bottom-0 left-0 right-0 p-8">
                                    <span
                                        class="inline-block bg-[#F1AE43] text-[#3B0014] text-xs font-semibold px-3 py-1 rounded-full mb-3">⭐
                                        Featured</span>
                                    <h3 class="text-white text-2xl font-semibold leading-tight mb-2">Tourist visa vs business
                                        visa: what's the difference?</h3>
                                    <p class="text-white/70 text-sm">Clear explanations to help you choose the right path.</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-6">
                            <div class="animate-on-scroll" style="animation-delay: 0.15s">
                                <div class="video-card group relative rounded-[16px] overflow-hidden cursor-pointer"
                                    style="height: 198px;" onclick="openVideoPopup('', 'Setting up a PT PMA')">
                                    <div
                                        class="w-full h-full bg-gradient-to-br from-[#73302A] to-[#4A1A2E] flex items-center justify-center">
                                        <i class="fas fa-play-circle text-white/20 text-[60px]"></i>
                                    </div>
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/10 to-transparent">
                                    </div>
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <div
                                            class="play-btn w-[48px] h-[48px] bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center group-hover:bg-white/30 transition-all duration-300 group-hover:scale-110">
                                            <i class="fas fa-play text-white text-sm ml-0.5"></i>
                                        </div>
                                    </div>
                                    <div class="absolute bottom-0 left-0 right-0 p-5">
                                        <h3 class="text-white text-base font-semibold leading-tight">Setting up a PT PMA in Bali
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="animate-on-scroll" style="animation-delay: 0.3s">
                                <div class="video-card group relative rounded-[16px] overflow-hidden cursor-pointer"
                                    style="height: 198px;" onclick="openVideoPopup('', 'Property ownership')">
                                    <div
                                        class="w-full h-full bg-gradient-to-br from-[#73302A] to-[#4A1A2E] flex items-center justify-center">
                                        <i class="fas fa-play-circle text-white/20 text-[60px]"></i>
                                    </div>
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/10 to-transparent">
                                    </div>
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <div
                                            class="play-btn w-[48px] h-[48px] bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center group-hover:bg-white/30 transition-all duration-300 group-hover:scale-110">
                                            <i class="fas fa-play text-white text-sm ml-0.5"></i>
                                        </div>
                                    </div>
                                    <div class="absolute bottom-0 left-0 right-0 p-5">
                                        <h3 class="text-white text-base font-semibold leading-tight">Property ownership for
                                            foreigners</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Fallback 4-col row -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        @php
                            $fallbackCards = [
                                'Work permit essentials',
                                'Prenuptial agreements in Indonesia',
                                'How to extend your KITAS',
                                'Starting a CV in Bali'
                            ];
                        @endphp
                        @foreach($fallbackCards as $idx => $card)
                            <div class="animate-on-scroll" style="animation-delay: {{ $idx * 0.1 }}s">
                                <div class="video-card group relative rounded-[16px] overflow-hidden cursor-pointer"
                                    style="height: 240px;" onclick="openVideoPopup('', '{{ $card }}')">
                                    <div
                                        class="w-full h-full bg-gradient-to-br from-[#73302A] to-[#4A1A2E] flex items-center justify-center">
                                        <i class="fas fa-play-circle text-white/20 text-[60px]"></i>
                                    </div>
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/10 to-transparent"></div>
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <div
                                            class="play-btn w-[48px] h-[48px] bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center group-hover:bg-white/30 transition-all duration-300 group-hover:scale-110">
                                            <i class="fas fa-play text-white text-sm ml-0.5"></i>
                                        </div>
                                    </div>
                                    <div class="absolute bottom-0 left-0 right-0 p-5">
                                        <h3 class="text-white text-sm font-semibold leading-tight">{{ $card }}</h3>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

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
            <h4 class="text-[84px] font-medium leading-[110%] text-[#3B0014] mb-[32px] animate-on-scroll">
                @if($guideSettings && $guideSettings->cta_text)
                    {{ $guideSettings->cta_text }}
                @else
                    {{ $readyToTalk->title ?? 'Ready to talk?' }}
                @endif
            </h4>
            @php
                $ctaLink = ($guideSettings && $guideSettings->cta_button_link) ? $guideSettings->cta_button_link : ($readyToTalk->button_link ?? '#');
                $ctaText = ($guideSettings && $guideSettings->cta_button_text) ? $guideSettings->cta_button_text : ($readyToTalk->button_text ?? 'Book free consultation');
            @endphp
            <a href="{{ $ctaLink }}"
                class="bg-[#3B0014] bg-opacity-30 hover:bg-opacity-40 text-[#B8C1F8] px-6 py-3 rounded-full transition inline-block animate-on-scroll">{{ $ctaText }}
                <i class="fa-solid fa-arrow-right text-sm"></i></a>
        </div>
    </div>

    <!-- Video Popup Modal -->
    <div id="videoPopup" class="fixed inset-0 z-[9999] hidden items-center justify-center"
        style="background: rgba(0,0,0,0.85); backdrop-filter: blur(8px);">
        <div class="relative w-full max-w-[900px] mx-4">
            <!-- Close Button -->
            <button onclick="closeVideoPopup()"
                class="absolute -top-12 right-0 text-white/70 hover:text-white transition text-lg">
                <i class="fas fa-times mr-2"></i> Close
            </button>
            <!-- Video Title -->
            <p id="videoPopupTitle" class="text-white text-xl font-semibold mb-4"></p>
            <!-- Video Container -->
            <div class="relative rounded-[16px] overflow-hidden bg-black" style="aspect-ratio: 16/9;">
                <iframe id="videoIframe" class="w-full h-full" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
                <!-- Fallback when no video URL -->
                <div id="videoFallback"
                    class="absolute inset-0 flex flex-col items-center justify-center bg-gradient-to-br from-[#6C342C] to-[#3B0014] hidden">
                    <i class="fas fa-video text-white/20 text-[80px] mb-6"></i>
                    <p class="text-white/60 text-lg">Video coming soon</p>
                    <p class="text-white/40 text-sm mt-2">This video hasn't been uploaded yet.</p>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Animations */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-up {
            animation: fadeUp 0.8s ease-out forwards;
        }

        .animate-delay-1 {
            animation-delay: 0.2s;
            opacity: 0;
        }

        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }

        .animate-on-scroll.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Video Card Hover Effects */
        .video-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .video-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .play-btn {
            transition: all 0.3s ease;
        }

        .video-card:hover .play-btn {
            box-shadow: 0 0 0 8px rgba(255, 255, 255, 0.1);
        }

        /* Popup Transition */
        #videoPopup {
            transition: opacity 0.3s ease;
        }

        #videoPopup.show {
            display: flex !important;
            opacity: 1;
        }

        /* Line Clamp */
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>

    <script>
        // Scroll Animation Observer
        document.addEventListener('DOMContentLoaded', function () {
            const observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

            document.querySelectorAll('.animate-on-scroll').forEach(function (el) {
                observer.observe(el);
            });
        });

        // Video Popup Functions
        function openVideoPopup(videoUrl, title) {
            var popup = document.getElementById('videoPopup');
            var iframe = document.getElementById('videoIframe');
            var fallback = document.getElementById('videoFallback');
            var titleEl = document.getElementById('videoPopupTitle');

            titleEl.textContent = title;

            if (videoUrl && videoUrl.trim() !== '') {
                // Convert YouTube watch URL to embed if needed
                var embedUrl = videoUrl;
                if (videoUrl.includes('youtube.com/watch')) {
                    var videoId = videoUrl.split('v=')[1];
                    if (videoId) {
                        var ampPos = videoId.indexOf('&');
                        if (ampPos !== -1) videoId = videoId.substring(0, ampPos);
                        embedUrl = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1&rel=0';
                    }
                } else if (videoUrl.includes('youtu.be/')) {
                    var videoId = videoUrl.split('youtu.be/')[1];
                    if (videoId) {
                        var ampPos = videoId.indexOf('?');
                        if (ampPos !== -1) videoId = videoId.substring(0, ampPos);
                        embedUrl = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1&rel=0';
                    }
                } else if (videoUrl.includes('youtube.com/embed/') && !videoUrl.includes('autoplay')) {
                    embedUrl = videoUrl + (videoUrl.includes('?') ? '&' : '?') + 'autoplay=1&rel=0';
                }

                iframe.src = embedUrl;
                iframe.style.display = 'block';
                fallback.classList.add('hidden');
            } else {
                iframe.src = '';
                iframe.style.display = 'none';
                fallback.classList.remove('hidden');
            }

            popup.classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        function closeVideoPopup() {
            var popup = document.getElementById('videoPopup');
            var iframe = document.getElementById('videoIframe');

            popup.classList.remove('show');
            iframe.src = '';
            document.body.style.overflow = '';
        }

        // Close popup on backdrop click
        document.getElementById('videoPopup').addEventListener('click', function (e) {
            if (e.target === this) {
                closeVideoPopup();
            }
        });

        // Close popup on Escape key
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') closeVideoPopup();
        });
    </script>

@endsection