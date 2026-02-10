@extends('layouts.cms')

@section('title', 'Testimonials - Settings')

@section('content')
<div class="mb-6">
    <a href="{{ route('cms.testimonials.index') }}" class="text-gray-600 hover:text-gray-900">
        <i class="fas fa-arrow-left mr-2"></i> Kembali
    </a>
</div>

<div class="bg-white rounded-lg shadow-md p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Section Settings - Testimonials</h1>

    <form action="{{ route('cms.testimonials.settings.update') }}" novalidate method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label for="title_section" class="block text-sm font-medium text-gray-700 mb-2">Title Section <span class="text-red-500">*</span></label>
            <input type="text" name="title_section" id="title_section" value="{{ old('title_section', $setting->title_section ?? '') }}" required
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
        </div>

        <div class="mb-4">
            <label for="description_section" class="block text-sm font-medium text-gray-700 mb-2">Description Section <span class="text-red-500">*</span></label>
            <textarea name="description_section" id="description_section" rows="4" required class="wysiwyg w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">{{ old('description_section', $setting->description_section ?? '') }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label for="button_text" class="block text-sm font-medium text-gray-700 mb-2">Button Text</label>
                <input type="text" name="button_text" id="button_text" value="{{ old('button_text', $setting->button_text ?? '') }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
            </div>
            <div>
                <label for="button_link" class="block text-sm font-medium text-gray-700 mb-2">Button Link</label>
                <input type="text" name="button_link" id="button_link" value="{{ old('button_link', $setting->button_link ?? '') }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
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
