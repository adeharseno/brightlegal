@extends('layouts.cms')

@section('title', 'About Us - Settings')

@section('content')
    <div class="mb-6">
        <a href="{{ route('cms.about-us.index') }}" class="text-gray-600 hover:text-gray-900">
            <i class="fas fa-arrow-left mr-2"></i> Kembali
        </a>
    </div>

    <form action="{{ route('cms.about-us.settings.update') }}" novalidate method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Hero Section -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4"><i class="fas fa-star mr-2 text-yellow-500"></i>Hero Section
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="hero_title" class="block text-sm font-medium text-gray-700 mb-2">Hero Title</label>
                    <input type="text" name="hero_title" id="hero_title"
                        value="{{ old('hero_title', $setting->hero_title ?? '') }}" placeholder="e.g. Born in Bali."
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
                </div>
                <div>
                    <label for="hero_subtitle" class="block text-sm font-medium text-gray-700 mb-2">Hero Subtitle</label>
                    <input type="text" name="hero_subtitle" id="hero_subtitle"
                        value="{{ old('hero_subtitle', $setting->hero_subtitle ?? '') }}"
                        placeholder="e.g. Built for real people."
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <div>
                    <label for="hero_image_left" class="block text-sm font-medium text-gray-700 mb-2">Hero Image
                        Left</label>
                    @if($setting && $setting->hero_image_left)
                        <div class="mb-2">
                            <img src="{{ Storage::url($setting->hero_image_left) }}" alt="Hero Left"
                                class="h-20 rounded-lg object-cover">
                        </div>
                    @endif
                    <input type="file" name="hero_image_left" id="hero_image_left" accept="image/*"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
                </div>
                <div>
                    <label for="hero_image_center" class="block text-sm font-medium text-gray-700 mb-2">Hero Image
                        Center</label>
                    @if($setting && $setting->hero_image_center)
                        <div class="mb-2">
                            <img src="{{ Storage::url($setting->hero_image_center) }}" alt="Hero Center"
                                class="h-20 rounded-lg object-cover">
                        </div>
                    @endif
                    <input type="file" name="hero_image_center" id="hero_image_center" accept="image/*"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
                </div>
                <div>
                    <label for="hero_image_right" class="block text-sm font-medium text-gray-700 mb-2">Hero Image
                        Right</label>
                    @if($setting && $setting->hero_image_right)
                        <div class="mb-2">
                            <img src="{{ Storage::url($setting->hero_image_right) }}" alt="Hero Right"
                                class="h-20 rounded-lg object-cover">
                        </div>
                    @endif
                    <input type="file" name="hero_image_right" id="hero_image_right" accept="image/*"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
                </div>
            </div>
            <p class="text-sm text-gray-500">Max 2MB per gambar. Format: JPEG, PNG, JPG, GIF, WebP. Biarkan kosong jika
                tidak ingin mengubah.</p>
        </div>

        <!-- Mission Section -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4"><i class="fas fa-bullseye mr-2 text-red-500"></i>Mission
                Section</h2>

            <div class="mb-4">
                <label for="mission_label" class="block text-sm font-medium text-gray-700 mb-2">Section Label</label>
                <input type="text" name="mission_label" id="mission_label"
                    value="{{ old('mission_label', $setting->mission_label ?? '') }}" placeholder="e.g. Our mission"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="mission_title_line1" class="block text-sm font-medium text-gray-700 mb-2">Title Line 1
                        (White)</label>
                    <input type="text" name="mission_title_line1" id="mission_title_line1"
                        value="{{ old('mission_title_line1', $setting->mission_title_line1 ?? '') }}"
                        placeholder="e.g. Bright Legal started with one simple belief;"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
                </div>
                <div>
                    <label for="mission_title_line2" class="block text-sm font-medium text-gray-700 mb-2">Title Line 2
                        (Gold)</label>
                    <input type="text" name="mission_title_line2" id="mission_title_line2"
                        value="{{ old('mission_title_line2', $setting->mission_title_line2 ?? '') }}"
                        placeholder="e.g. legal help doesn't have to feel intimidating."
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="mission_body_left" class="block text-sm font-medium text-gray-700 mb-2">Body Text Left
                        Column</label>
                    <textarea name="mission_body_left" id="mission_body_left" rows="4"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">{{ old('mission_body_left', $setting->mission_body_left ?? '') }}</textarea>
                </div>
                <div>
                    <label for="mission_body_right" class="block text-sm font-medium text-gray-700 mb-2">Body Text Right
                        Column</label>
                    <textarea name="mission_body_right" id="mission_body_right" rows="4"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">{{ old('mission_body_right', $setting->mission_body_right ?? '') }}</textarea>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <div>
                    <label for="mission_image_1" class="block text-sm font-medium text-gray-700 mb-2">Mission Image
                        1</label>
                    @if($setting && $setting->mission_image_1)
                        <div class="mb-2">
                            <img src="{{ Storage::url($setting->mission_image_1) }}" alt="Mission 1"
                                class="h-20 rounded-lg object-cover">
                        </div>
                    @endif
                    <input type="file" name="mission_image_1" id="mission_image_1" accept="image/*"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
                </div>
                <div>
                    <label for="mission_image_2" class="block text-sm font-medium text-gray-700 mb-2">Mission Image
                        2</label>
                    @if($setting && $setting->mission_image_2)
                        <div class="mb-2">
                            <img src="{{ Storage::url($setting->mission_image_2) }}" alt="Mission 2"
                                class="h-20 rounded-lg object-cover">
                        </div>
                    @endif
                    <input type="file" name="mission_image_2" id="mission_image_2" accept="image/*"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
                </div>
                <div>
                    <label for="mission_image_3" class="block text-sm font-medium text-gray-700 mb-2">Mission Image
                        3</label>
                    @if($setting && $setting->mission_image_3)
                        <div class="mb-2">
                            <img src="{{ Storage::url($setting->mission_image_3) }}" alt="Mission 3"
                                class="h-20 rounded-lg object-cover">
                        </div>
                    @endif
                    <input type="file" name="mission_image_3" id="mission_image_3" accept="image/*"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
                </div>
            </div>
            <p class="text-sm text-gray-500">Max 2MB per gambar. Format: JPEG, PNG, JPG, GIF, WebP.</p>
        </div>

        <!-- Team Section -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4"><i class="fas fa-users mr-2 text-blue-500"></i>Team Section
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="team_label" class="block text-sm font-medium text-gray-700 mb-2">Section Label</label>
                    <input type="text" name="team_label" id="team_label"
                        value="{{ old('team_label', $setting->team_label ?? '') }}"
                        placeholder="e.g. The people behind Bright Legal"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
                </div>
                <div>
                    <label for="team_title" class="block text-sm font-medium text-gray-700 mb-2">Section Title</label>
                    <input type="text" name="team_title" id="team_title"
                        value="{{ old('team_title', $setting->team_title ?? '') }}"
                        placeholder="e.g. A small team with big heart"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="team_button_text" class="block text-sm font-medium text-gray-700 mb-2">Button Text</label>
                    <input type="text" name="team_button_text" id="team_button_text"
                        value="{{ old('team_button_text', $setting->team_button_text ?? '') }}"
                        placeholder="e.g. Follow our Instagram"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
                </div>
                <div>
                    <label for="team_button_link" class="block text-sm font-medium text-gray-700 mb-2">Button Link</label>
                    <input type="text" name="team_button_link" id="team_button_link"
                        value="{{ old('team_button_link', $setting->team_button_link ?? '') }}"
                        placeholder="e.g. https://instagram.com/brightlegal"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
                </div>
            </div>
        </div>

        <!-- Clients Section -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4"><i class="fas fa-building mr-2 text-green-500"></i>Clients
                Section</h2>

            <div class="mb-4">
                <label for="clients_text" class="block text-sm font-medium text-gray-700 mb-2">Clients Text</label>
                <textarea name="clients_text" id="clients_text" rows="3"
                    class="wysiwyg w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">{{ old('clients_text', $setting->clients_text ?? '') }}</textarea>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-[#3B0014] text-white px-6 py-2 rounded-lg hover:bg-[#6C342C] transition">
                <i class="fas fa-save mr-2"></i> Simpan Settings
            </button>
        </div>
    </form>
@endsection