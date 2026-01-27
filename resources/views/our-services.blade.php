@extends('layouts.app')

@section('title', 'Our Services')

@section('content')

    <div class="pt-[240px] pb-[100px] relative">
        <div class="absolute top-0 left-0 bottom-0 right-0 transform" style="background: linear-gradient(180deg, #6C342C 0%, #3B0014 100%);"></div>
        <div class="relative z-10 container max-w-[1240px] mx-auto px-4 lg:px-8">
            <h4 class="text-[84px] font-medium leading-[110%] gradient-text">{!! $servicesSettings->title ?? 'We help you handle <br /> the legal side of Bali life' !!}</h4>
        </div>
    </div>

    <div class="bg-[#3B0014]" x-data="servicesTabs()">
        <div class="relative z-10 container max-w-[1240px] mx-auto px-4 lg:px-8">
            <div class="flex flex-wrap">
                <!-- Sidebar Navigation -->
                <div class="basis-full lg:basis-1/4">
                    <ul>
                        @forelse($categories as $category)
                        <li class="block mb-[50px]">
                            <button @click="activeTab = 'category-{{ $category->id }}'" :class="activeTab === 'category-{{ $category->id }}' ? 'text-[#d9d9d9] opacity-100' : 'text-[#d9d9d9] opacity-50'" class="text-[20px] font-semibold leading-[130%] transition-opacity duration-300 cursor-pointer">{{ $category->name }}</button>
                        </li>
                        @empty
                        <li class="block mb-[50px]">
                            <button @click="activeTab = 'visa'" :class="activeTab === 'visa' ? 'text-[#d9d9d9] opacity-100' : 'text-[#d9d9d9] opacity-50'" class="text-[20px] font-semibold leading-[130%] transition-opacity duration-300 cursor-pointer">Visa</button>
                        </li>
                        <li class="block mb-[50px]">
                            <button @click="activeTab = 'company-setup'" :class="activeTab === 'company-setup' ? 'text-[#d9d9d9] opacity-100' : 'text-[#d9d9d9] opacity-50'" class="text-[20px] font-semibold leading-[130%] transition-opacity duration-300 cursor-pointer">Company set up</button>
                        </li>
                        <li class="block mb-[50px]">
                            <button @click="activeTab = 'agreements-contracts'" :class="activeTab === 'agreements-contracts' ? 'text-[#d9d9d9] opacity-100' : 'text-[#d9d9d9] opacity-50'" class="text-[20px] font-semibold leading-[130%] transition-opacity duration-300 cursor-pointer">Agreements & contracts</button>
                        </li>
                        @endforelse
                    </ul>
                </div>

                <!-- Content Area -->
                <div class="basis-full lg:basis-3/4">
                    @forelse($categories as $category)
                    <!-- {{ $category->name }} Tab -->
                    <div x-show="activeTab === 'category-{{ $category->id }}'" x-transition>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
                            @forelse($category->services as $service)
                            <button @click="openModal('{{ $service->id }}', '{{ addslashes($service->title) }}', '{{ $service->image ? Storage::url($service->image) : 'https://fastly.picsum.photos/id/3/5000/3333.jpg?hmac=GDjZ2uNWE3V59PkdDaOzTOuV3tPWWxJSf4fNcxu4S2g' }}')" class="group mb-[72px] text-left w-full hover:opacity-80 transition-opacity">
                                <div class="h-[440px] overflow-hidden rounded-xl mb-6 relative">
                                    <div class="absolute right-5 top-5 w-11 h-11 group-hover:rotate-90 z-[2] transition-all duration-500 ease-in-out flex items-center justify-center rounded-full bg-[rgba(251,244,225,0.2)]">
                                        <img src="{{ asset('assets/images/plus.png') }}" class="" alt="">
                                    </div>
                                    @if($service->image)
                                    <img src="{{ Storage::url($service->image) }}" class="h-full object-cover object-center transition-all duration-500 ease-in-out w-full group-hover:scale-105" alt="{{ $service->title }}">
                                    @else
                                    <img src="https://fastly.picsum.photos/id/3/5000/3333.jpg?hmac=GDjZ2uNWE3V59PkdDaOzTOuV3tPWWxJSf4fNcxu4S2g" class="h-full object-cover object-center transition-all duration-500 ease-in-out w-full group-hover:scale-105" alt="{{ $service->title }}">
                                    @endif
                                </div>
                                <h3 class="mb-5 font-semibold text-[28px] opacity-80 text-[#f5f5f5]">{{ $service->title }}</h3>
                                <hr class="border-[#6C342C] my-5">
                                <div class="text-[#F1ECEC] text-lg opacity-60 font-medium">{!! Str::limit(strip_tags($service->description), 100) !!}</div>
                            </button>
                            @empty
                            <p class="text-[#F1ECEC] opacity-60">No services available in this category.</p>
                            @endforelse
                        </div>
                    </div>
                    @empty
                    <!-- Default tabs when no CMS data -->
                    <div x-show="activeTab === 'visa'" x-transition>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
                            <p class="text-[#F1ECEC] opacity-60">No services available yet. Add services via CMS.</p>
                        </div>
                    </div>

                    <div x-show="activeTab === 'company-setup'" x-transition>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
                            <p class="text-[#F1ECEC] opacity-60">No services available yet. Add services via CMS.</p>
                        </div>
                    </div>

                    <div x-show="activeTab === 'agreements-contracts'" x-transition>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
                            <p class="text-[#F1ECEC] opacity-60">No services available yet. Add services via CMS.</p>
                        </div>
                    </div>
                    @endforelse
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
                 class="bg-[#3B0014] rounded-2xl max-w-2xl w-full overflow-hidden max-h-[90vh] overflow-y-auto"
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
                    <div x-show="modalLoading" 
                         x-transition:enter="transition ease-out duration-300" 
                         x-transition:enter-start="opacity-0" 
                         x-transition:enter-end="opacity-100"
                         x-transition:leave="transition ease-in duration-200" 
                         x-transition:leave-start="opacity-100" 
                         x-transition:leave-end="opacity-0"
                         class="text-center py-6">
                        <div class="inline-block animate-spin text-[#FBF4E1] text-2xl mb-2">⟳</div>
                        <p class="text-[#FBF4E1]">Loading details...</p>
                    </div>

                    <!-- Benefits Tab -->
                    <div x-show="!modalLoading && modalTab === 'benefits'" 
                         x-transition:enter="transition ease-out duration-300" 
                         x-transition:enter-start="opacity-0" 
                         x-transition:enter-end="opacity-100"
                         x-transition:leave="transition ease-in duration-200" 
                         x-transition:leave-start="opacity-100" 
                         x-transition:leave-end="opacity-0"
                         class="space-y-4">
                        <div x-html="modalContent.benefits" class="text-[#F1ECEC] prose prose-invert max-w-none"></div>
                    </div>

                    <!-- Documents Tab -->
                    <div x-show="!modalLoading && modalTab === 'documents'" 
                         x-transition:enter="transition ease-out duration-300" 
                         x-transition:enter-start="opacity-0" 
                         x-transition:enter-end="opacity-100"
                         x-transition:leave="transition ease-in duration-200" 
                         x-transition:leave-start="opacity-100" 
                         x-transition:leave-end="opacity-0"
                         class="space-y-4">
                        <div x-html="modalContent.documents" class="text-[#F1ECEC] prose prose-invert max-w-none"></div>
                    </div>

                    <!-- Notes Tab -->
                    <div x-show="!modalLoading && modalTab === 'notes'" 
                         x-transition:enter="transition ease-out duration-300" 
                         x-transition:enter-start="opacity-0" 
                         x-transition:enter-end="opacity-100"
                         x-transition:leave="transition ease-in duration-200" 
                         x-transition:leave-start="opacity-100" 
                         x-transition:leave-end="opacity-0"
                         class="space-y-4">
                        <div x-html="modalContent.notes" class="text-[#F1ECEC] prose prose-invert max-w-none"></div>
                    </div>

                    <!-- CTA Button -->
                    <div class="flex justify-end mt-6">
                        <button @click="requestService(modalData.id)" 
                                class="bg-[#B8C1F8] text-[#3B0014] cursor-pointer px-6 py-2 rounded-full font-medium transition-colors duration-300">
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
                activeTab: '{{ $categories->first() ? "category-" . $categories->first()->id : "visa" }}',
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

                // Service data from CMS
                servicesData: @json($categories->flatMap(function($cat) { 
                    return $cat->services->map(function($s) { 
                        return [
                            'id' => $s->id,
                            'key_benefit' => $s->key_benefit,
                            'required_document' => $s->required_document,
                            'important_note' => $s->important_note
                        ];
                    }); 
                })->keyBy('id')),

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
                        // Short delay for UX
                        await new Promise(resolve => setTimeout(resolve, 300));
                        
                        // Get data from CMS
                        const serviceData = this.servicesData[serviceId];
                        
                        if (serviceData) {
                            this.modalContent = {
                                benefits: serviceData.key_benefit || '<p class="opacity-60">No key benefits specified.</p>',
                                documents: serviceData.required_document || '<p class="opacity-60">No required documents specified.</p>',
                                notes: serviceData.important_note || '<p class="opacity-60">No important notes specified.</p>'
                            };
                        } else {
                            this.modalContent = {
                                benefits: '<p class="opacity-60">No key benefits specified.</p>',
                                documents: '<p class="opacity-60">No required documents specified.</p>',
                                notes: '<p class="opacity-60">No important notes specified.</p>'
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
                    alert(`Consultation request for "${this.modalData.title}" submitted!\n\nPlease contact us for more information.`);
                    this.closeModal();
                }
            };
        }
    </script>
                        Important notes
                    </button>
                </div>

                <!-- Modal Content -->
                <div class="p-8">
                    <!-- Loading State -->
                    <div x-show="modalLoading" 
                         x-transition:enter="transition ease-out duration-300" 
                         x-transition:enter-start="opacity-0" 
                         x-transition:enter-end="opacity-100"
                         x-transition:leave="transition ease-in duration-200" 
                         x-transition:leave-start="opacity-100" 
                         x-transition:leave-end="opacity-0"
                         class="text-center py-6">
                        <div class="inline-block animate-spin text-[#FBF4E1] text-2xl mb-2">⟳</div>
                        <p class="text-[#FBF4E1]">Loading details...</p>
                    </div>

                    <!-- Benefits Tab -->
                    <div x-show="!modalLoading && modalTab === 'benefits'" 
                         x-transition:enter="transition ease-out duration-300" 
                         x-transition:enter-start="opacity-0" 
                         x-transition:enter-end="opacity-100"
                         x-transition:leave="transition ease-in duration-200" 
                         x-transition:leave-start="opacity-100" 
                         x-transition:leave-end="opacity-0"
                         class="space-y-4">
                        <div x-html="modalContent.benefits" class="text-[#F1ECEC]"></div>
                    </div>

                    <!-- Documents Tab -->
                    <div x-show="!modalLoading && modalTab === 'documents'" 
                         x-transition:enter="transition ease-out duration-300" 
                         x-transition:enter-start="opacity-0" 
                         x-transition:enter-end="opacity-100"
                         x-transition:leave="transition ease-in duration-200" 
                         x-transition:leave-start="opacity-100" 
                         x-transition:leave-end="opacity-0"
                         class="space-y-4">
                        <div x-html="modalContent.documents" class="text-[#F1ECEC]"></div>
                    </div>

                    <!-- Notes Tab -->
                    <div x-show="!modalLoading && modalTab === 'notes'" 
                         x-transition:enter="transition ease-out duration-300" 
                         x-transition:enter-start="opacity-0" 
                         x-transition:enter-end="opacity-100"
                         x-transition:leave="transition ease-in duration-200" 
                         x-transition:leave-start="opacity-100" 
                         x-transition:leave-end="opacity-0"
                         class="space-y-4">
                        <div x-html="modalContent.notes" class="text-[#F1ECEC]"></div>
                    </div>

                    <!-- Service ID (for debugging) -->
                    <div class="text-xs text-[#888] mt-6 mb-6">
                        Service ID: <span x-text="modalData.id"></span>
                    </div>

                    <!-- CTA Button -->
                    <div class="flex justify-end">
                        <button @click="requestService(modalData.id)" 
                                class="bg-[#B8C1F8] text-[#3B0014] cursor-pointer px-6 py-2 rounded-full font-medium transition-colors duration-300">
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
                            <p class="text-[#FBF4E1] text-base font-medium mb-9">{{ $faqsSettings->title ?? 'Visa questions' }}</p>
                            @if($faqsSettings && $faqsSettings->description)
                                <div class="text-[#FBF4E1] text-[52px] leading-[120%] font-medium">{!! $faqsSettings->description !!}</div>
                            @else
                            <h3 class="text-[#FBF4E1] text-[52px] leading-[120%] font-medium">Frequently asked questions</h3>
                            @endif
                        </div>
                        @forelse($faqs as $index => $faq)
                        <!-- Question {{ $index + 1 }} -->
                        <div class="bg-white/10 backdrop-blur-sm rounded-lg overflow-hidden transition-all duration-300">
                            <button 
                                @click="active = active === {{ $index + 1 }} ? null : {{ $index + 1 }}"
                                class="w-full px-6 py-5 flex items-center justify-between text-left text-white hover:bg-white/5 transition-colors"
                            >
                                <span class="text-base lg:text-lg font-light">{{ $faq->title }}</span>
                                <span class="text-2xl font-light transition-transform duration-300" :class="active === {{ $index + 1 }} ? 'rotate-45' : ''">+</span>
                            </button>
                            <div 
                                x-show="active === {{ $index + 1 }}"
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
                                    {!! $faq->description !!}
                                </div>
                            </div>
                        </div>
                        @empty
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
                        @endforelse
                    </div>
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
            <h4 class="text-[84px] font-medium leading-[110%] text-[#3B0014] mb-[32px]">{{ $readyToTalk->title ?? 'Ready to talk?' }}</h4>
            <a href="{{ $readyToTalk->button_link ?? '#' }}" class="bg-[#3B0014] bg-opacity-30 hover:bg-opacity-40 text-[#B8C1F8] px-6 py-3 rounded-full flex items-center gap-2 transition inline-block">{{ $readyToTalk->button_text ?? 'Book free consultation' }} <i class="fa-solid fa-arrow-right text-sm"></i></a>
        </div>
    </div>

@endsection
