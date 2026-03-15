@extends('layouts.cms')

@section('title', 'Client Journey - Pengaturan CTA')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Pengaturan CTA Client Journey</h1>
            <p class="text-gray-600">Kelola konten 2 section CTA di halaman Client Journey</p>
        </div>
        <a href="{{ route('cms.client-journey.index') }}"
            class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
            <i class="fas fa-arrow-left mr-2"></i> Kembali
        </a>
    </div>

    <form action="{{ route('cms.client-journey.settings.update') }}" method="POST">
        @csrf
        @method('PUT')

        <!-- CTA 1: Not seeing your exact case? -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
            <div class="px-6 py-4 bg-gray-50 border-b">
                <h2 class="text-lg font-semibold text-gray-800">CTA 1: "Not seeing your exact case?"</h2>
                <p class="text-sm text-gray-500 mt-1">Kartu CTA di sebelah kiri bawah halaman Client Journey</p>
            </div>
            <div class="p-6 space-y-4">
                <div>
                    <label for="cta1_title" class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
                    <input type="text" name="cta1_title" id="cta1_title"
                        value="{{ old('cta1_title', $setting->cta1_title ?? '') }}"
                        placeholder="Not seeing your exact case?"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#3B0014] focus:border-[#3B0014]">
                    @error('cta1_title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="cta1_description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                    <textarea name="cta1_description" id="cta1_description" rows="3"
                        placeholder="Every situation is different. If you have questions or want guidance specific to your case, we're here to help you understand your options."
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#3B0014] focus:border-[#3B0014]">{{ old('cta1_description', $setting->cta1_description ?? '') }}</textarea>
                    @error('cta1_description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="cta1_button_text" class="block text-sm font-medium text-gray-700 mb-1">Teks Tombol</label>
                        <input type="text" name="cta1_button_text" id="cta1_button_text"
                            value="{{ old('cta1_button_text', $setting->cta1_button_text ?? '') }}"
                            placeholder="Talk to a legal advisor"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#3B0014] focus:border-[#3B0014]">
                        @error('cta1_button_text')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="cta1_button_link" class="block text-sm font-medium text-gray-700 mb-1">Link Tombol</label>
                        <input type="text" name="cta1_button_link" id="cta1_button_link"
                            value="{{ old('cta1_button_link', $setting->cta1_button_link ?? '') }}"
                            placeholder="https://example.com/consultation"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#3B0014] focus:border-[#3B0014]">
                        @error('cta1_button_link')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA 2: Just starting your research? -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
            <div class="px-6 py-4 bg-gray-50 border-b">
                <h2 class="text-lg font-semibold text-gray-800">CTA 2: "Just starting your research?"</h2>
                <p class="text-sm text-gray-500 mt-1">Kartu CTA di sebelah kanan bawah halaman Client Journey</p>
            </div>
            <div class="p-6 space-y-4">
                <div>
                    <label for="cta2_title" class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
                    <input type="text" name="cta2_title" id="cta2_title"
                        value="{{ old('cta2_title', $setting->cta2_title ?? '') }}"
                        placeholder="Just starting your research?"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#3B0014] focus:border-[#3B0014]">
                    @error('cta2_title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="cta2_description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                    <textarea name="cta2_description" id="cta2_description" rows="3"
                        placeholder="Download our free guide for expats on land ownership, visas and business structures in Indonesia."
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#3B0014] focus:border-[#3B0014]">{{ old('cta2_description', $setting->cta2_description ?? '') }}</textarea>
                    @error('cta2_description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="cta2_button_text" class="block text-sm font-medium text-gray-700 mb-1">Teks Tombol</label>
                        <input type="text" name="cta2_button_text" id="cta2_button_text"
                            value="{{ old('cta2_button_text', $setting->cta2_button_text ?? '') }}"
                            placeholder="Get free legal guide"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#3B0014] focus:border-[#3B0014]">
                        @error('cta2_button_text')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="cta2_button_link" class="block text-sm font-medium text-gray-700 mb-1">Link Tombol</label>
                        <input type="text" name="cta2_button_link" id="cta2_button_link"
                            value="{{ old('cta2_button_link', $setting->cta2_button_link ?? '') }}"
                            placeholder="https://example.com/legal-guide"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#3B0014] focus:border-[#3B0014]">
                        @error('cta2_button_link')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Submit -->
        <div class="flex justify-end">
            <button type="submit"
                class="bg-[#3B0014] text-white px-6 py-3 rounded-lg hover:bg-[#6C342C] transition text-sm font-medium">
                <i class="fas fa-save mr-2"></i> Simpan Pengaturan CTA
            </button>
        </div>
    </form>
@endsection
