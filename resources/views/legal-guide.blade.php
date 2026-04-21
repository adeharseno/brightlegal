@extends('layouts.app')

@section('title', 'Legal Guide')

@section('content')

    <!-- Hero Section -->
    <div class="relative pt-[50px] md:pt-[240px]">
        <div class="absolute top-0 left-0 bottom-0 right-0 transform z-[1]"
            style="background: linear-gradient(180deg, #6C342C 0%, #3B0014 100%);"></div>
    </div>

    <!-- Video Guide Section -->
    <div class="bg-[#3B0014] pb-[50px] md:pb-[140px]">
        <section class="px-6 lg:px-20 py-16 md:py-24">
            <div class="mx-auto">

                <!-- Section Header -->
                <div class="flex flex-wrap items-end mb-[60px]">
                    <div class="basis-full lg:basis-2/3">
                        <h1 class="text-[44px] md:text-[84px] font-medium leading-[110%] text-white animate-fade-up">
                            {{ $guideSettings->page_title ?? 'Your Legal Guide.' }}
                        </h1>
                        <h2 class="text-[44px] md:text-[84px] font-medium leading-[110%] text-[#B8C1F8] animate-fade-up animate-delay-1">
                            {{ $guideSettings->page_subtitle ?? 'to life in Bali' }}
                        </h2>
                    </div>
                    {{-- <div class="basis-full lg:basis-1/3 text-left md:text-right mt-5 md:mt-0">
                        <a href="#" class="animate-fade-up animate-delay-1 bg-[rgba(245,245,245,0.3)] bg-opacity-30 hover:bg-opacity-40 text-[#F5F5F5] px-6 py-3 rounded-full items-center gap-2 transition inline-block">Follow us on Youtube <i class="fa-brands fa-youtube text-sm"></i></a>
                    </div> --}}
                </div>

                @php
                    $featured = $guideItems->where('is_featured', true)->first();
                    $regularItems = $guideItems->where('is_featured', false)->values();
                @endphp

                <!-- Featured Grid: 1 large + 2 small (side by side) -->
                @if($featured || $regularItems->count() > 0)
                    <div class="grid grid-cols-1 lg:grid-cols-4 gap-[20px] mb-[80px]">

                        <!-- Featured Large Card -->
                        @if($featured)
                            <div class="lg:col-span-2 animate-on-scroll">
                                <div class="featured-card-wrapper cursor-pointer mb-10"
                                    onclick="openVideoPopup('{{ $featured->video_url }}', '{{ addslashes($featured->title) }}', '{{ $featured->instagram_url }}')">
                                    <!-- Video Box with labels -->
                                    <div class="video-card bg-[#6C342C] group relative rounded-[16px] overflow-hidden h-[320px] md:h-[420px]">
                                        @if($featured->thumbnail)
                                            <img src="{{ Storage::url($featured->thumbnail) }}" alt="{{ $featured->title }}"
                                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                        @else
                                            <div
                                                class="w-full h-full bg-gradient-to-br from-[#6C342C] to-[#3B0014] flex items-center justify-center">
                                                <i class="fas fa-play-circle text-white/20 text-[120px]"></i>
                                            </div>
                                        @endif
                                        <!-- Top Labels: About (left) / Bright Legal (right) -->
                                        <div class="absolute top-0 left-0 right-0 flex justify-between items-start p-5 z-10">
                                            <span class="text-white/80 text-sm font-light italic">About</span>
                                            <span class="text-white/80 text-sm font-light italic">Bright Legal</span>
                                        </div>
                                        <!-- Overlay -->
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-black/30 top h-[320px] md:h-[375px]"></div>
                                        <!-- Play Button -->
                                        <div class="absolute inset-0 flex items-center justify-center h-[320px] md:h-[375px]">
                                            <div
                                                class="play-btn w-[44px] md:w-[72px] h-[44px] md:h-[72px] bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center group-hover:bg-white/30 transition-all duration-300 group-hover:scale-110">
                                                <i class="fas fa-play text-white text-2xl ml-1"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Description Outside Video Box -->
                                    <div class="rounded-b-[16px] p-6 mt-[-8px]">
                                        @if($featured->description)
                                            <p class="text-white/90 text-lg leading-relaxed">{{ $featured->description }}</p>
                                        @else
                                            <p class="text-white/90 text-lg leading-relaxed">Senectus ullamcorper lectus leo sit. Hendrerit sollicitudin quisque massa luctus sed egestas.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Two Small Cards on the Right (side by side in remaining 2 cols) -->
                        @if($regularItems->count() > 0)
                            @foreach($regularItems as $index => $item)
                                <div class="animate-on-scroll" style="animation-delay: {{ ($index + 1) * 0.15 }}s">
                                    <div class="guide-card-wrapper cursor-pointer mb-10"
                                        onclick="openVideoPopup('{{ $item->video_url }}', '{{ addslashes($item->title) }}', '{{ $item->instagram_url }}')">                                        <!-- Video Thumbnail Box -->
                                        <div class="video-card group relative rounded-[16px] overflow-hidden h-[320px] md:h-[420px]">
                                            @if($item->thumbnail)
                                                <img src="{{ Storage::url($item->thumbnail) }}" alt="{{ $item->title }}"
                                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                            @else
                                                <div
                                                    class="w-full h-full bg-gradient-to-br from-[#73302A] to-[#4A1A2E] flex items-center justify-center">
                                                    <i class="fas fa-play-circle text-white/20 text-[60px]"></i>
                                                </div>
                                            @endif
                                            <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
                                            <!-- Play Button -->
                                            <div class="absolute inset-0 flex items-center justify-center">
                                                <div
                                                    class="play-btn w-[48px] h-[48px] bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center group-hover:bg-white/30 transition-all duration-300 group-hover:scale-110">
                                                    <i class="fas fa-play text-white text-sm ml-0.5"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Title & Description Outside Video Box -->
                                        <div class="pt-4">
                                            <h3 class="text-white text-base font-semibold leading-tight mb-2">{{ $item->title }}</h3>
                                            @if($item->description)
                                                <p class="text-white/50 text-sm leading-relaxed line-clamp-2">{{ $item->description }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>
                @endif
                
                <div class="text-center">
                    <a href="{{ $guideSettings->cta_button_link ?? '#' }}" class="bg-[rgba(245,245,245,0.2)] inline-block bg-opacity-30 hover:bg-opacity-40 text-[#F5F5F5] px-6 py-3 rounded-full items-center gap-2 transition"><span class="gradient-text">{{ $guideSettings->cta_text ?? '' }} {{ $guideSettings->cta_button_text ?? '' }}</span> <i class="fa-solid fa-arrow-right text-sm"></i></a>
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
            <a href="{{ $readyToTalk->button_link ?? '#' }}" class="bg-[#3B0014] hover:bg-opacity-70 text-[#B8C1F8] px-6 py-3 rounded-full items-center gap-2 transition inline-block">{{ $readyToTalk->button_text ?? 'Book free consultation' }} <i class="fa-solid fa-arrow-right text-sm"></i></a>
        </div>
    </div>

    <!-- Video Popup Modal -->
    <div id="videoPopup" class="fixed inset-0 z-[9999] hidden items-center justify-center"
        style="background: rgba(0,0,0,0.85); backdrop-filter: blur(8px); overflow-y: auto;">
        <div class="relative w-full max-w-[900px] mx-4 my-16">
            <!-- Close Button -->
            <button onclick="closeVideoPopup()"
                class="absolute -top-12 right-0 text-white/70 hover:text-white transition text-lg">
                <i class="fas fa-times mr-2"></i> Close
            </button>
            <!-- Video Title -->
            <p id="videoPopupTitle" class="text-white text-xl font-semibold mb-4 hidden"></p>
            <!-- Platform Tabs (shown only when both YouTube & Instagram exist) -->
            <div id="videoTabs" class="hidden flex gap-2 mb-4">
                <button id="tabYoutube" onclick="switchVideoTab('youtube')"
                    class="px-4 py-2 rounded-full text-sm font-medium transition bg-white text-[#3B0014]">
                    <i class="fa-brands fa-youtube mr-1"></i> YouTube
                </button>
                <button id="tabInstagram" onclick="switchVideoTab('instagram')"
                    class="px-4 py-2 rounded-full text-sm font-medium transition bg-white/20 text-white hover:bg-white/30">
                    <i class="fa-brands fa-instagram mr-1"></i> Instagram
                </button>
            </div>
            <!-- YouTube Container -->
            <div id="youtubeContainer" class="relative rounded-[16px] overflow-hidden bg-black" style="aspect-ratio: 16/9;">
                <iframe id="videoIframe" class="w-full h-full" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
            </div>
            <!-- Instagram Container -->
            <div id="instagramContainer" class="hidden flex justify-center">
                <iframe id="instagramIframe" class="border-0 rounded-[16px]"
                    style="width: 540px; max-width: 100%; height: 700px;"
                    scrolling="no" allowtransparency="true"></iframe>
            </div>
            <!-- Fallback when no video URL -->
            <div id="videoFallback"
                class="hidden relative rounded-[16px] overflow-hidden bg-gradient-to-br from-[#6C342C] to-[#3B0014] flex flex-col items-center justify-center" style="aspect-ratio: 16/9;">
                <i class="fas fa-video text-white/20 text-[80px] mb-6"></i>
                <p class="text-white/60 text-lg">Video coming soon</p>
                <p class="text-white/40 text-sm mt-2">This video hasn't been uploaded yet.</p>
            </div>
        </div>
    </div>
    
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

        // Convert YouTube URL to embed URL
        function toYoutubeEmbed(url) {
            if (!url || url.trim() === '') return '';
            var embedUrl = url.trim();
            if (url.includes('youtube.com/watch')) {
                var videoId = url.split('v=')[1];
                if (videoId) {
                    var ampPos = videoId.indexOf('&');
                    if (ampPos !== -1) videoId = videoId.substring(0, ampPos);
                    embedUrl = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1&rel=0';
                }
            } else if (url.includes('youtu.be/')) {
                var videoId = url.split('youtu.be/')[1];
                if (videoId) {
                    var ampPos = videoId.indexOf('?');
                    if (ampPos !== -1) videoId = videoId.substring(0, ampPos);
                    embedUrl = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1&rel=0';
                }
            } else if (url.includes('youtube.com/embed/') && !url.includes('autoplay')) {
                embedUrl = url + (url.includes('?') ? '&' : '?') + 'autoplay=1&rel=0';
            }
            return embedUrl;
        }

        // Convert Instagram post/reel URL to embed URL
        function toInstagramEmbed(url) {
            if (!url || url.trim() === '') return '';
            var clean = url.trim().replace(/\/$/, '');
            // e.g. https://www.instagram.com/p/CODE or /reel/CODE
            return clean + '/embed/';
        }

        // Video Popup Functions
        function openVideoPopup(videoUrl, title, instagramUrl) {
            var popup = document.getElementById('videoPopup');
            var iframe = document.getElementById('videoIframe');
            var igIframe = document.getElementById('instagramIframe');
            var fallback = document.getElementById('videoFallback');
            var titleEl = document.getElementById('videoPopupTitle');
            var tabs = document.getElementById('videoTabs');
            var ytContainer = document.getElementById('youtubeContainer');
            var igContainer = document.getElementById('instagramContainer');

            titleEl.textContent = title;

            var hasYoutube = videoUrl && videoUrl.trim() !== '';
            var hasInstagram = instagramUrl && instagramUrl.trim() !== '';

            if (hasYoutube && hasInstagram) {
                // Show tabs, start on YouTube
                tabs.classList.remove('hidden');
                tabs.classList.add('flex');
                iframe.src = toYoutubeEmbed(videoUrl);
                igIframe.src = '';
                ytContainer.classList.remove('hidden');
                igContainer.classList.add('hidden');
                fallback.classList.add('hidden');
                setActiveTab('youtube');
            } else if (hasYoutube) {
                tabs.classList.add('hidden');
                tabs.classList.remove('flex');
                iframe.src = toYoutubeEmbed(videoUrl);
                ytContainer.classList.remove('hidden');
                igContainer.classList.add('hidden');
                fallback.classList.add('hidden');
            } else if (hasInstagram) {
                tabs.classList.add('hidden');
                tabs.classList.remove('flex');
                igIframe.src = toInstagramEmbed(instagramUrl);
                igContainer.classList.remove('hidden');
                ytContainer.classList.add('hidden');
                fallback.classList.add('hidden');
            } else {
                tabs.classList.add('hidden');
                tabs.classList.remove('flex');
                ytContainer.classList.add('hidden');
                igContainer.classList.add('hidden');
                fallback.classList.remove('hidden');
            }

            popup.classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        function switchVideoTab(platform) {
            var iframe = document.getElementById('videoIframe');
            var igIframe = document.getElementById('instagramIframe');
            var ytContainer = document.getElementById('youtubeContainer');
            var igContainer = document.getElementById('instagramContainer');

            if (platform === 'youtube') {
                ytContainer.classList.remove('hidden');
                igContainer.classList.add('hidden');
            } else {
                igContainer.classList.remove('hidden');
                ytContainer.classList.add('hidden');
            }
            setActiveTab(platform);
        }

        function setActiveTab(platform) {
            var tabYt = document.getElementById('tabYoutube');
            var tabIg = document.getElementById('tabInstagram');
            if (platform === 'youtube') {
                tabYt.className = 'px-4 py-2 rounded-full text-sm font-medium transition bg-white text-[#3B0014]';
                tabIg.className = 'px-4 py-2 rounded-full text-sm font-medium transition bg-white/20 text-white hover:bg-white/30';
            } else {
                tabIg.className = 'px-4 py-2 rounded-full text-sm font-medium transition bg-white text-[#3B0014]';
                tabYt.className = 'px-4 py-2 rounded-full text-sm font-medium transition bg-white/20 text-white hover:bg-white/30';
            }
        }

        function closeVideoPopup() {
            var popup = document.getElementById('videoPopup');
            var iframe = document.getElementById('videoIframe');
            var igIframe = document.getElementById('instagramIframe');

            popup.classList.remove('show');
            iframe.src = '';
            igIframe.src = '';
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