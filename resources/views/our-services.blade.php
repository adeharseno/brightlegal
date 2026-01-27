@extends('layouts.app')

@section('title', 'Our Services')

@section('content')

    <div class="pt-[240px] pb-[100px] relative">
        <div class="absolute top-0 left-0 bottom-0 right-0 transform" style="background: linear-gradient(180deg, #6C342C 0%, #3B0014 100%);"></div>
        <div class="relative z-10 container max-w-[1240px] mx-auto px-4 lg:px-8">
            <h4 class="text-[84px] font-medium leading-[110%] gradient-text">We help you handle <br /> the legal side of Bali life</h4>
        </div>
    </div>

    <div class="bg-[#3B0014]" x-data="servicesTabs()">
        <div class="relative z-10 container max-w-[1240px] mx-auto px-4 lg:px-8">
            <div class="flex flex-wrap">
                <!-- Sidebar Navigation -->
                <div class="basis-full lg:basis-1/4">
                    <ul>
                        <li class="block mb-[50px]">
                            <button @click="activeTab = 'visa'" :class="activeTab === 'visa' ? 'text-[#d9d9d9] opacity-100' : 'text-[#d9d9d9] opacity-50'" class="text-[20px] font-semibold leading-[130%] transition-opacity duration-300 cursor-pointer">Visa</button>
                        </li>
                        <li class="block mb-[50px]">
                            <button @click="activeTab = 'company-setup'" :class="activeTab === 'company-setup' ? 'text-[#d9d9d9] opacity-100' : 'text-[#d9d9d9] opacity-50'" class="text-[20px] font-semibold leading-[130%] transition-opacity duration-300 cursor-pointer">Company set up</button>
                        </li>
                        <li class="block mb-[50px]">
                            <button @click="activeTab = 'agreements-contracts'" :class="activeTab === 'agreements-contracts' ? 'text-[#d9d9d9] opacity-100' : 'text-[#d9d9d9] opacity-50'" class="text-[20px] font-semibold leading-[130%] transition-opacity duration-300 cursor-pointer">Agreements & contracts</button>
                        </li>
                        <li class="block mb-[50px]">
                            <button @click="activeTab = 'property-due-diligence'" :class="activeTab === 'property-due-diligence' ? 'text-[#d9d9d9] opacity-100' : 'text-[#d9d9d9] opacity-50'" class="text-[20px] font-semibold leading-[130%] transition-opacity duration-300 cursor-pointer">Property due diligence</button>
                        </li>
                        <li class="block mb-[50px]">
                            <button @click="activeTab = 'accounting-taxes'" :class="activeTab === 'accounting-taxes' ? 'text-[#d9d9d9] opacity-100' : 'text-[#d9d9d9] opacity-50'" class="text-[20px] font-semibold leading-[130%] transition-opacity duration-300 cursor-pointer">Accounting & taxes</button>
                        </li>
                        <li class="block mb-[50px]">
                            <button @click="activeTab = 'legal-disputes'" :class="activeTab === 'legal-disputes' ? 'text-[#d9d9d9] opacity-100' : 'text-[#d9d9d9] opacity-50'" class="text-[20px] font-semibold leading-[130%] transition-opacity duration-300 cursor-pointer">Legal disputes</button>
                        </li>
                    </ul>
                </div>

                <!-- Content Area -->
                <div class="basis-full lg:basis-3/4">
                    @php
                        $services = [
                            ['id' => 'visa-1', 'category' => 'visa', 'image' => 'https://fastly.picsum.photos/id/3/5000/3333.jpg?hmac=GDjZ2uNWE3V59PkdDaOzTOuV3tPWWxJSf4fNcxu4S2g', 'title' => '1.184.099 kWh', 'description' => 'clean energy generated from solar'],
                            ['id' => 'visa-2', 'category' => 'visa', 'image' => 'https://fastly.picsum.photos/id/3/5000/3333.jpg?hmac=GDjZ2uNWE3V59PkdDaOzTOuV3tPWWxJSf4fNcxu4S2g', 'title' => '1,053.848 tons CO₂e', 'description' => 'emissions reduced'],
                            ['id' => 'company-1', 'category' => 'company-setup', 'image' => 'https://fastly.picsum.photos/id/3/5000/3333.jpg?hmac=GDjZ2uNWE3V59PkdDaOzTOuV3tPWWxJSf4fNcxu4S2g', 'title' => '11% lower operational', 'description' => 'energy use'],
                            ['id' => 'company-2', 'category' => 'company-setup', 'image' => 'https://fastly.picsum.photos/id/3/5000/3333.jpg?hmac=GDjZ2uNWE3V59PkdDaOzTOuV3tPWWxJSf4fNcxu4S2g', 'title' => '300,000+ clean water', 'description' => 'refills through Pure Hub'],
                            ['id' => 'agreement-1', 'category' => 'agreements-contracts', 'image' => 'https://fastly.picsum.photos/id/3/5000/3333.jpg?hmac=GDjZ2uNWE3V59PkdDaOzTOuV3tPWWxJSf4fNcxu4S2g', 'title' => '255.08 kg', 'description' => 'waste removed from Benoa Beach'],
                            ['id' => 'agreement-2', 'category' => 'agreements-contracts', 'image' => 'https://fastly.picsum.photos/id/3/5000/3333.jpg?hmac=GDjZ2uNWE3V59PkdDaOzTOuV3tPWWxJSf4fNcxu4S2g', 'title' => '990 kg CO₂', 'description' => 'absorbed through mangrove planting (20 year projection)'],
                            ['id' => 'property-1', 'category' => 'property-due-diligence', 'image' => 'https://fastly.picsum.photos/id/3/5000/3333.jpg?hmac=GDjZ2uNWE3V59PkdDaOzTOuV3tPWWxJSf4fNcxu4S2g', 'title' => '100% of employees', 'description' => 'received performance reviews'],
                            ['id' => 'property-2', 'category' => 'property-due-diligence', 'image' => 'https://fastly.picsum.photos/id/3/5000/3333.jpg?hmac=GDjZ2uNWE3V59PkdDaOzTOuV3tPWWxJSf4fNcxu4S2g', 'title' => 'Rp115,200,000', 'description' => 'raised to support disability communities'],
                        ];
                    @endphp

                    <!-- Visa Tab -->
                    <div x-show="activeTab === 'visa'" x-transition>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
                            @foreach($services as $item)
                                @if($item['category'] === 'visa')
                                    <button @click="openModal('{{ $item['id'] }}', '{{ addslashes($item['title']) }}', '{{ $item['image'] }}')" class="group mb-[72px] text-left w-full hover:opacity-80 transition-opacity">
                                        <div class="h-[440px] overflow-hidden rounded-xl mb-6 relative">
                                            <div class="absolute right-5 top-5 w-11 h-11 group-hover:rotate-90 z-[2] transition-all duration-500 ease-in-out flex items-center justify-center rounded-full bg-[rgba(251,244,225,0.2)]">
                                                <img src="{{ asset('assets/images/plus.png') }}" class="" alt="">
                                            </div>
                                            <img src="{{ $item['image'] }}" class="h-full object-cover object-center transition-all duration-500 ease-in-out w-full group-hover:scale-105" alt="">
                                        </div>
                                        <h3 class="mb-5 font-semibold text-[28px] opacity-80 text-[#f5f5f5]">{{ $item['title'] }}</h3>
                                        <hr class="border-[#6C342C] my-5">
                                        <p class="text-[#F1ECEC] text-lg opacity-60 font-medium">{{ $item['description'] }}</p>
                                    </button>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <!-- Company Setup Tab -->
                    <div x-show="activeTab === 'company-setup'" x-transition>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
                            @foreach($services as $item)
                                @if($item['category'] === 'company-setup')
                                    <button @click="openModal('{{ $item['id'] }}', '{{ addslashes($item['title']) }}', '{{ $item['image'] }}')" class="group mb-[72px] text-left w-full hover:opacity-80 transition-opacity">
                                        <div class="h-[440px] overflow-hidden rounded-xl mb-6 relative">
                                            <div class="absolute right-5 top-5 w-11 h-11 group-hover:rotate-90 z-[2] transition-all duration-500 ease-in-out flex items-center justify-center rounded-full bg-[rgba(251,244,225,0.2)]">
                                                <img src="{{ asset('assets/images/plus.png') }}" class="" alt="">
                                            </div>
                                            <img src="{{ $item['image'] }}" class="h-full object-cover object-center transition-all duration-500 ease-in-out w-full group-hover:scale-105" alt="">
                                        </div>
                                        <h3 class="mb-5 font-semibold text-[28px] opacity-80 text-[#f5f5f5]">{{ $item['title'] }}</h3>
                                        <hr class="border-[#6C342C] my-5">
                                        <p class="text-[#F1ECEC] text-lg opacity-60 font-medium">{{ $item['description'] }}</p>
                                    </button>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <!-- Agreements & Contracts Tab -->
                    <div x-show="activeTab === 'agreements-contracts'" x-transition>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
                            @foreach($services as $item)
                                @if($item['category'] === 'agreements-contracts')
                                    <button @click="openModal('{{ $item['id'] }}', '{{ addslashes($item['title']) }}', '{{ $item['image'] }}')" class="group mb-[72px] text-left w-full hover:opacity-80 transition-opacity">
                                        <div class="h-[440px] overflow-hidden rounded-xl mb-6 relative">
                                            <div class="absolute right-5 top-5 w-11 h-11 group-hover:rotate-90 z-[2] transition-all duration-500 ease-in-out flex items-center justify-center rounded-full bg-[rgba(251,244,225,0.2)]">
                                                <img src="{{ asset('assets/images/plus.png') }}" class="" alt="">
                                            </div>
                                            <img src="{{ $item['image'] }}" class="h-full object-cover object-center transition-all duration-500 ease-in-out w-full group-hover:scale-105" alt="">
                                        </div>
                                        <h3 class="mb-5 font-semibold text-[28px] opacity-80 text-[#f5f5f5]">{{ $item['title'] }}</h3>
                                        <hr class="border-[#6C342C] my-5">
                                        <p class="text-[#F1ECEC] text-lg opacity-60 font-medium">{{ $item['description'] }}</p>
                                    </button>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <!-- Property Due Diligence Tab -->
                    <div x-show="activeTab === 'property-due-diligence'" x-transition>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
                            @foreach($services as $item)
                                @if($item['category'] === 'property-due-diligence')
                                    <button @click="openModal('{{ $item['id'] }}', '{{ addslashes($item['title']) }}', '{{ $item['image'] }}')" class="group mb-[72px] text-left w-full hover:opacity-80 transition-opacity">
                                        <div class="h-[440px] overflow-hidden rounded-xl mb-6 relative">
                                            <div class="absolute right-5 top-5 w-11 h-11 group-hover:rotate-90 z-[2] transition-all duration-500 ease-in-out flex items-center justify-center rounded-full bg-[rgba(251,244,225,0.2)]">
                                                <img src="{{ asset('assets/images/plus.png') }}" class="" alt="">
                                            </div>
                                            <img src="{{ $item['image'] }}" class="h-full object-cover object-center transition-all duration-500 ease-in-out w-full group-hover:scale-105" alt="">
                                        </div>
                                        <h3 class="mb-5 font-semibold text-[28px] opacity-80 text-[#f5f5f5]">{{ $item['title'] }}</h3>
                                        <hr class="border-[#6C342C] my-5">
                                        <p class="text-[#F1ECEC] text-lg opacity-60 font-medium">{{ $item['description'] }}</p>
                                    </button>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <!-- Accounting & Taxes Tab -->
                    <div x-show="activeTab === 'accounting-taxes'" x-transition>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
                            <p class="text-[#F1ECEC] opacity-60">Coming soon...</p>
                        </div>
                    </div>

                    <!-- Legal Disputes Tab -->
                    <div x-show="activeTab === 'legal-disputes'" x-transition>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
                            <p class="text-[#F1ECEC] opacity-60">Coming soon...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Popup -->
        <div x-show="modalOpen" @click.self="closeModal()" 
             x-transition:enter="transition ease-out duration-300" 
             x-transition:enter-start="opacity-0" 
             x-transition:enter-end="opacity-100" 
             x-transition:leave="transition ease-in duration-300" 
             x-transition:leave-start="opacity-100" 
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-black/80 backdrop-blur-sm z-50 flex items-center justify-center p-4" 
             style="display: none;">
            
            <div @click.stop
                 x-transition:enter="transition ease-out duration-300" 
                 x-transition:enter-start="opacity-0 scale-95" 
                 x-transition:enter-end="opacity-100 scale-100" 
                 x-transition:leave="transition ease-in duration-300" 
                 x-transition:leave-start="opacity-100 scale-100" 
                 x-transition:leave-end="opacity-0 scale-95"
                 class="bg-[#3B0014] rounded-2xl max-w-2xl w-full overflow-hidden"
                 x-data="{ modalTab: 'benefits' }">
                
                <!-- Modal Header with Title and Close Button -->
                <div class="flex items-start justify-between p-8 pb-6 border-b border-white/10">
                    <h2 class="text-[#F5F5F5] text-[28px] font-semibold" x-text="modalData.title"></h2>
                    <button @click="closeModal()" class="text-white hover:text-[#FBF4E1] text-2xl transition-colors">
                        ✕
                    </button>
                </div>

                <!-- Tab Navigation -->
                <div class="flex border-b border-white/10 px-8">
                    <button @click="modalTab = 'benefits'" 
                            :class="modalTab === 'benefits' ? 'border-b-2 border-[#E97D8C] text-[#FBF4E1]' : 'text-[#A0A0A0] hover:text-[#D0D0D0]'"
                            class="py-4 px-4 font-medium text-sm transition-colors">
                        Key benefits
                    </button>
                    <button @click="modalTab = 'documents'" 
                            :class="modalTab === 'documents' ? 'border-b-2 border-[#E97D8C] text-[#FBF4E1]' : 'text-[#A0A0A0] hover:text-[#D0D0D0]'"
                            class="py-4 px-4 font-medium text-sm transition-colors">
                        Required documents
                    </button>
                    <button @click="modalTab = 'notes'" 
                            :class="modalTab === 'notes' ? 'border-b-2 border-[#E97D8C] text-[#FBF4E1]' : 'text-[#A0A0A0] hover:text-[#D0D0D0]'"
                            class="py-4 px-4 font-medium text-sm transition-colors">
                        Important notes
                    </button>
                </div>

                <!-- Modal Content -->
                <div class="p-8">
                    <!-- Loading State -->
                    <div x-show="modalLoading" class="text-center py-6">
                        <div class="inline-block animate-spin text-[#FBF4E1] text-2xl mb-2">⟳</div>
                        <p class="text-[#FBF4E1]">Loading details...</p>
                    </div>

                    <!-- Benefits Tab -->
                    <div x-show="!modalLoading && modalTab === 'benefits'" x-transition class="space-y-4">
                        <div x-html="modalContent.benefits" class="text-[#F1ECEC]"></div>
                    </div>

                    <!-- Documents Tab -->
                    <div x-show="!modalLoading && modalTab === 'documents'" x-transition class="space-y-4">
                        <div x-html="modalContent.documents" class="text-[#F1ECEC]"></div>
                    </div>

                    <!-- Notes Tab -->
                    <div x-show="!modalLoading && modalTab === 'notes'" x-transition class="space-y-4">
                        <div x-html="modalContent.notes" class="text-[#F1ECEC]"></div>
                    </div>

                    <!-- Service ID (for debugging) -->
                    <div class="text-xs text-[#888] mt-6 mb-6">
                        Service ID: <span x-text="modalData.id"></span>
                    </div>

                    <!-- CTA Button -->
                    <div class="flex justify-end">
                        <button @click="requestService(modalData.id)" 
                                class="bg-[#E97D8C] hover:bg-[#f09aa3] text-white px-6 py-2 rounded-full font-medium transition-colors duration-300">
                            Consult about this
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Alpine.js Component Script -->
    <script>
        function servicesTabs() {
            return {
                activeTab: 'visa',
                modalOpen: false,
                modalLoading: false,
                modalContent: {
                    benefits: '',
                    documents: '',
                    notes: ''
                },
                modalData: {
                    id: '',
                    title: '',
                    image: ''
                },

                openModal(id, title, image) {
                    this.modalData = { id, title, image };
                    this.modalOpen = true;
                    this.modalContent = { benefits: '', documents: '', notes: '' };
                    this.loadServiceDetails(id);
                },

                closeModal() {
                    this.modalOpen = false;
                    this.modalData = { id: '', title: '', image: '' };
                    this.modalContent = { benefits: '', documents: '', notes: '' };
                },

                async loadServiceDetails(serviceId) {
                    this.modalLoading = true;
                    try {
                        // BACKEND INTEGRATION POINT 1
                        // Replace this with your actual API endpoint
                        // Example: 
                        // const response = await fetch(`/api/services/${serviceId}`);
                        // const data = await response.json();
                        // this.modalContent = {
                        //     benefits: data.benefits_html,
                        //     documents: data.documents_html,
                        //     notes: data.notes_html
                        // };

                        // Mock data for demonstration
                        await new Promise(resolve => setTimeout(resolve, 800));
                        
                        const mockData = {
                            'visa-1': {
                                benefits: `
                                    <ul class="list-disc list-inside space-y-2">
                                        <li>2-years validity</li>
                                        <li>Multiple entry (travel freely in and out of Indonesia without re-applying)</li>
                                        <li>Eligible to act as director/commissioners of your company</li>
                                    </ul>
                                    <div class="mt-6 pt-6 border-t border-white/10">
                                        <p class="font-semibold mb-2">Fees:</p>
                                        <p>IDR 17,000.000 (one-time payment)</p>
                                        <p class="text-sm opacity-80">Valid for 2 years validity</p>
                                    </div>
                                `,
                                documents: `
                                    <ul class="list-disc list-inside space-y-2">
                                        <li>Valid passport (minimum 18 months validity)</li>
                                        <li>Completed visa application form</li>
                                        <li>Proof of financial capability</li>
                                        <li>Company registration documents</li>
                                        <li>Reference letter from employer/sponsor</li>
                                    </ul>
                                `,
                                notes: `
                                    <ul class="list-disc list-inside space-y-2">
                                        <li>Processing time: 5-7 working days</li>
                                        <li>Visa can be extended before expiration</li>
                                        <li>Multiple entries are allowed within validity period</li>
                                        <li>Visa holder must maintain a valid passport throughout validity</li>
                                    </ul>
                                `
                            },
                            'visa-2': {
                                benefits: `
                                    <ul class="list-disc list-inside space-y-2">
                                        <li>Reduced emissions and environmental impact</li>
                                        <li>Sustainable business practices</li>
                                        <li>Cost savings through energy efficiency</li>
                                    </ul>
                                    <div class="mt-6 pt-6 border-t border-white/10">
                                        <p class="font-semibold mb-2">Fees:</p>
                                        <p>IDR 12,000.000 (one-time payment)</p>
                                        <p class="text-sm opacity-80">Valid for 1 year</p>
                                    </div>
                                `,
                                documents: `
                                    <ul class="list-disc list-inside space-y-2">
                                        <li>Environmental impact assessment</li>
                                        <li>Sustainability certification</li>
                                        <li>Carbon footprint report</li>
                                    </ul>
                                `,
                                notes: `
                                    <ul class="list-disc list-inside space-y-2">
                                        <li>Requires annual review</li>
                                        <li>Compliance with environmental standards mandatory</li>
                                    </ul>
                                `
                            }
                        };

                        // Use mock data if available, otherwise show generic content
                        if (mockData[serviceId]) {
                            this.modalContent = mockData[serviceId];
                        } else {
                            this.modalContent = {
                                benefits: `
                                    <ul class="list-disc list-inside space-y-2">
                                        <li>Professional consultation</li>
                                        <li>Expert guidance</li>
                                        <li>24/7 Support</li>
                                    </ul>
                                `,
                                documents: `
                                    <ul class="list-disc list-inside space-y-2">
                                        <li>Valid identification</li>
                                        <li>Required documents as per service</li>
                                        <li>Support materials</li>
                                    </ul>
                                `,
                                notes: `
                                    <ul class="list-disc list-inside space-y-2">
                                        <li>All information kept confidential</li>
                                        <li>Regular updates provided</li>
                                        <li>Guaranteed satisfaction</li>
                                    </ul>
                                `
                            };
                        }
                    } catch (error) {
                        console.error('Error loading service details:', error);
                        this.modalContent = {
                            benefits: '<p class="text-red-400">Error loading details. Please try again.</p>',
                            documents: '<p class="text-red-400">Error loading details. Please try again.</p>',
                            notes: '<p class="text-red-400">Error loading details. Please try again.</p>'
                        };
                    } finally {
                        this.modalLoading = false;
                    }
                },

                async requestService(serviceId) {
                    try {
                        // BACKEND INTEGRATION POINT 2
                        // Replace this with your actual request endpoint
                        // Example:
                        // const response = await fetch('/api/service-requests', {
                        //     method: 'POST',
                        //     headers: { 
                        //         'Content-Type': 'application/json',
                        //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        //     },
                        //     body: JSON.stringify({ 
                        //         service_id: serviceId,
                        //         user_id: {{ Auth::user()?->id ?? 'null' }},
                        //         requested_at: new Date().toISOString()
                        //     })
                        // });
                        // if (response.ok) {
                        //     const data = await response.json();
                        //     alert('Service consultation requested successfully!');
                        //     this.closeModal();
                        // } else {
                        //     throw new Error('Request failed');
                        // }

                        alert(`Consultation request for "${this.modalData.title}" (ID: ${serviceId}) submitted!\n\nUpdate the requestService() function to connect with your backend.`);
                        this.closeModal();
                    } catch (error) {
                        console.error('Error requesting service:', error);
                        alert('Failed to request consultation. Please try again.');
                    }
                }
            };
        }
    </script>

    <div class="relative pt-[180px] pb-[130px]  bg-[#6C342C]">
        <div class="absolute top-0 left-0 bottom-0 right-0 transform rotate-180" style="background: linear-gradient(180deg, #944229 13.02%, rgba(108, 52, 44, 0) 100%), #3B0014;"></div>
        <div class="relative z-10 container max-w-[1240px] mx-auto px-4 lg:px-8">
            <div class="flex flex-wrap">
                <div class="basis-full lg:basis-1/4"></div>
                <div class="basis-full lg:basis-3/4">
                    <div class="space-y-2" x-data="{ active: null }">
                        <div class="mb-[40px]">
                            <p class="text-[#FBF4E1] text-base font-medium mb-9">Visa questions</p>
                            <h3 class="text-[#FBF4E1] text-[52px] leading-[120%] font-medium">Frequently asked questions</h3>
                        </div>
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
    </div>

    <div class="mx-auto bg-[#73302A] mt-[-12px] rounded-[12px] pt-[140px] pb-[200px] relative z-[3]" x-data="{ activeCard: 6 }">
        <!-- Header -->
        <div class="max-w-[1240px] mx-auto px-4 lg:px-8">
            <div class="flex justify-between items-center mb-[60px]">
                <div>
                    <p class="title text-[#F1ECEC] text-base font-medium mb-2">What they say</p>
                    <h2 class="text-[#D9D9D9] text-[52px] font-medium">Our clients say it best...</h2>
                </div>
                <a href="#" class="bg-[rgba(245,245,245,0.3)] bg-opacity-30 hover:bg-opacity-40 text-[#F5F5F5] px-6 py-3 rounded-full flex items-center gap-2 transition">View more testimonials <i class="fa-solid fa-arrow-right text-sm"></i></a>
            </div>
        </div>

        <!-- Testimonial Cards -->
        <div class="flex gap-0 h-[482px] max-w-[1240px] mx-auto px-4 lg:px-8">

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

    <div class="relative z-[2] mt-[-12px]">
        <img src="{{ asset('assets/images/brightlegal-artwork.png') }}" class="w-full" alt="Bright Legal Artwork">
    </div>

    <div class="relative mt-[-60px] pt-[254px] pb-[166px] bg-[#CBD4FF] rounded-b-[60px]">
        <div class="absolute left-0 top-0 right-0 bottom-0 bg-left bg-no-repeat bg-contain" style="background-image: url('{{ asset('assets/images/Bright Legal_Icon-06 1.png') }}');"></div>
        <div class="relative z-10 container max-w-[1240px] mx-auto text-center">
            <h4 class="text-[84px] font-medium leading-[110%] text-[#3B0014] mb-[32px]">Ready to talk?</h4>
            <a href="#" class="bg-[#3B0014] bg-opacity-30 hover:bg-opacity-40 text-[#B8C1F8] px-6 py-3 rounded-full flex items-center gap-2 transition inline-block">Book free consultation <i class="fa-solid fa-arrow-right text-sm"></i></a>
        </div>
    </div>

@endsection
