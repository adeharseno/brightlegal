@extends('layouts.cms')

@section('title', 'Tambah Testimonial')

@section('content')
<div class="mb-6">
    <a href="{{ route('cms.testimonials.index') }}" class="text-gray-600 hover:text-gray-900">
        <i class="fas fa-arrow-left mr-2"></i> Kembali
    </a>
</div>

<div class="bg-white rounded-lg shadow-md p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Testimonial</h1>

    <form action="{{ route('cms.testimonials.store') }}" novalidate method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title/Category <span class="text-red-500">*</span></label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required placeholder="e.g. Visa Service, Property Agreements"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
            </div>
            <div>
                <label for="background_color" class="block text-sm font-medium text-gray-700 mb-2">Background Color</label>
                <input type="color" name="background_color" id="background_color" value="{{ old('background_color', '#B8C1F8') }}"
                       class="w-full h-10 px-1 py-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
            </div>
        </div>

        <div class="mb-4">
            <label for="testimonial" class="block text-sm font-medium text-gray-700 mb-2">Testimonial <span class="text-red-500">*</span></label>
            <textarea name="testimonial" id="testimonial" rows="4" required class="wysiwyg w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">{{ old('testimonial') }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
            <div>
                <label for="user_name" class="block text-sm font-medium text-gray-700 mb-2">User Name <span class="text-red-500">*</span></label>
                <input type="text" name="user_name" id="user_name" value="{{ old('user_name') }}" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
            </div>
            <div>
                <label for="user_title" class="block text-sm font-medium text-gray-700 mb-2">User Title <span class="text-red-500">*</span></label>
                <input type="text" name="user_title" id="user_title" value="{{ old('user_title') }}" required placeholder="e.g. CEO of Acme Inc."
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
            </div>
            <div>
                <label for="user_country" class="block text-sm font-medium text-gray-700 mb-2">User Country <span class="text-red-500">*</span></label>
                <input type="text" name="user_country" id="user_country" value="{{ old('user_country') }}" required placeholder="e.g. United Kingdom 🇬🇧"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
            </div>
        </div>

        <div class="mb-4">
            <label for="user_image" class="block text-sm font-medium text-gray-700 mb-2">User Image</label>
            <input type="file" name="user_image" id="user_image" accept="image/*"
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
            <p class="text-sm text-gray-500 mt-1">Max 2MB. Format: JPEG, PNG, JPG, GIF, WebP</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label for="order" class="block text-sm font-medium text-gray-700 mb-2">Order</label>
                <input type="number" name="order" id="order" value="{{ old('order', 0) }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
            </div>
            <div class="flex items-center pt-8">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                       class="h-4 w-4 text-[#3B0014] focus:ring-[#3B0014] border-gray-300 rounded">
                <label for="is_active" class="ml-2 block text-sm text-gray-700">Active</label>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-[#3B0014] text-white px-6 py-2 rounded-lg hover:bg-[#6C342C] transition">
                <i class="fas fa-save mr-2"></i> Simpan
            </button>
        </div>
    </form>
</div>
@endsection
