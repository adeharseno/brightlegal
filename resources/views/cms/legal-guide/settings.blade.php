@extends('layouts.cms')

@section('title', 'Legal Guide Settings')

@section('content')
    <div class="mb-6">
        <a href="{{ route('cms.legal-guide.index') }}" class="text-gray-600 hover:text-gray-900">
            <i class="fas fa-arrow-left mr-2"></i> Kembali
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Legal Guide Page Settings</h1>

        <form action="{{ route('cms.legal-guide.settings.update') }}" novalidate method="POST">
            @csrf
            @method('PUT')

            <!-- Page Section -->
            <div class="border-b pb-6 mb-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">Page Header</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="page_title" class="block text-sm font-medium text-gray-700 mb-2">Page Title</label>
                        <input type="text" name="page_title" id="page_title"
                            value="{{ old('page_title', $setting->page_title ?? '') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
                    </div>
                    <div>
                        <label for="page_subtitle" class="block text-sm font-medium text-gray-700 mb-2">Page
                            Subtitle</label>
                        <input type="text" name="page_subtitle" id="page_subtitle"
                            value="{{ old('page_subtitle', $setting->page_subtitle ?? '') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
                    </div>
                </div>
            </div>

            <!-- CTA Bar Section -->
            <div class="pb-6 mb-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">CTA Bar (Bottom)</h2>
                <div class="mb-4">
                    <label for="cta_text" class="block text-sm font-medium text-gray-700 mb-2">CTA Text</label>
                    <input type="text" name="cta_text" id="cta_text" value="{{ old('cta_text', $setting->cta_text ?? '') }}"
                        placeholder="e.g. Need more legal guides? We can help you."
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="cta_button_text" class="block text-sm font-medium text-gray-700 mb-2">CTA Button
                            Text</label>
                        <input type="text" name="cta_button_text" id="cta_button_text"
                            value="{{ old('cta_button_text', $setting->cta_button_text ?? '') }}"
                            placeholder="e.g. Contact us"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
                    </div>
                    <div>
                        <label for="cta_button_link" class="block text-sm font-medium text-gray-700 mb-2">CTA Button
                            Link</label>
                        <input type="text" name="cta_button_link" id="cta_button_link"
                            value="{{ old('cta_button_link', $setting->cta_button_link ?? '') }}"
                            placeholder="e.g. /contact"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-[#3B0014] text-white px-6 py-2 rounded-lg hover:bg-[#6C342C] transition">
                    <i class="fas fa-save mr-2"></i> Simpan Settings
                </button>
            </div>
        </form>
    </div>
@endsection