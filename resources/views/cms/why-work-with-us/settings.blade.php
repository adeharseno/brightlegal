@extends('layouts.cms')

@section('title', 'Why Work With Us - Settings')

@section('content')
<div class="mb-6">
    <a href="{{ route('cms.why-work-with-us.index') }}" class="text-gray-600 hover:text-gray-900">
        <i class="fas fa-arrow-left mr-2"></i> Kembali
    </a>
</div>

<div class="bg-white rounded-lg shadow-md p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Section Settings - Why Work With Us</h1>

    <form action="{{ route('cms.why-work-with-us.settings.update') }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label for="title_section" class="block text-sm font-medium text-gray-700 mb-2">Title Section <span class="text-red-500">*</span></label>
            <input type="text" name="title_section" id="title_section" value="{{ old('title_section', $setting->title_section ?? '') }}" required
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
        </div>

        <div class="mb-4">
            <label for="subtitle_section" class="block text-sm font-medium text-gray-700 mb-2">Subtitle Section</label>
            <input type="text" name="subtitle_section" id="subtitle_section" value="{{ old('subtitle_section', $setting->subtitle_section ?? '') }}"
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
        </div>

        <div class="mb-4">
            <label for="description_section" class="block text-sm font-medium text-gray-700 mb-2">Description Section <span class="text-red-500">*</span></label>
            <textarea name="description_section" id="description_section" rows="4" required class="wysiwyg w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">{{ old('description_section', $setting->description_section ?? '') }}</textarea>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-[#3B0014] text-white px-6 py-2 rounded-lg hover:bg-[#6C342C] transition">
                <i class="fas fa-save mr-2"></i> Simpan
            </button>
        </div>
    </form>
</div>
@endsection
