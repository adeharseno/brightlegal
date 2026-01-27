@extends('layouts.cms')

@section('title', 'Dashboard')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
    <p class="text-gray-600">Selamat datang di CMS BrightLegal, {{ Auth::user()->name }}!</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-medium">Banners</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ \App\Models\Banner::count() }}</p>
            </div>
            <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                <i class="fas fa-image text-blue-600"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-medium">Services</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ \App\Models\Service::count() }}</p>
            </div>
            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                <i class="fas fa-briefcase text-green-600"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-medium">Testimonials</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ \App\Models\Testimonial::count() }}</p>
            </div>
            <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center">
                <i class="fas fa-quote-right text-yellow-600"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-medium">FAQs</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ \App\Models\Faq::count() }}</p>
            </div>
            <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                <i class="fas fa-question-circle text-purple-600"></i>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Quick Actions</h2>
        <div class="grid grid-cols-2 gap-4">
            <a href="{{ route('cms.banners.create') }}" class="flex items-center justify-center p-4 border-2 border-gray-200 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition">
                <i class="fas fa-plus text-gray-600 mr-2"></i>
                <span class="font-medium text-gray-700">Add Banner</span>
            </a>
            <a href="{{ route('cms.services.create') }}" class="flex items-center justify-center p-4 border-2 border-gray-200 rounded-lg hover:border-green-500 hover:bg-green-50 transition">
                <i class="fas fa-plus text-gray-600 mr-2"></i>
                <span class="font-medium text-gray-700">Add Service</span>
            </a>
            <a href="{{ route('cms.testimonials.create') }}" class="flex items-center justify-center p-4 border-2 border-gray-200 rounded-lg hover:border-yellow-500 hover:bg-yellow-50 transition">
                <i class="fas fa-plus text-gray-600 mr-2"></i>
                <span class="font-medium text-gray-700">Add Testimonial</span>
            </a>
            <a href="{{ route('cms.faqs.create') }}" class="flex items-center justify-center p-4 border-2 border-gray-200 rounded-lg hover:border-purple-500 hover:bg-purple-50 transition">
                <i class="fas fa-plus text-gray-600 mr-2"></i>
                <span class="font-medium text-gray-700">Add FAQ</span>
            </a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Sections</h2>
        <div class="space-y-3">
            <a href="{{ route('cms.banners.index') }}" class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                <span class="font-medium text-gray-700">Banner</span>
                <i class="fas fa-arrow-right text-gray-400"></i>
            </a>
            <a href="{{ route('cms.statistics.index') }}" class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                <span class="font-medium text-gray-700">Statistik (Section 2)</span>
                <i class="fas fa-arrow-right text-gray-400"></i>
            </a>
            <a href="{{ route('cms.why-work-with-us.index') }}" class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                <span class="font-medium text-gray-700">Why Work With Us</span>
                <i class="fas fa-arrow-right text-gray-400"></i>
            </a>
            <a href="{{ route('cms.services.index') }}" class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                <span class="font-medium text-gray-700">Our Services</span>
                <i class="fas fa-arrow-right text-gray-400"></i>
            </a>
            <a href="{{ route('cms.testimonials.index') }}" class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                <span class="font-medium text-gray-700">Testimonials</span>
                <i class="fas fa-arrow-right text-gray-400"></i>
            </a>
            <a href="{{ route('cms.faqs.index') }}" class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                <span class="font-medium text-gray-700">FAQ</span>
                <i class="fas fa-arrow-right text-gray-400"></i>
            </a>
            <a href="{{ route('cms.ready-to-talk.index') }}" class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                <span class="font-medium text-gray-700">Ready to Talk</span>
                <i class="fas fa-arrow-right text-gray-400"></i>
            </a>
        </div>
    </div>
</div>
@endsection
