@extends('layouts.cms')

@section('title', 'About Us - Edit Client Logo')

@section('content')
    <div class="mb-6">
        <a href="{{ route('cms.about-us.index') }}" class="text-gray-600 hover:text-gray-900">
            <i class="fas fa-arrow-left mr-2"></i> Kembali
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-6"><i class="fas fa-edit mr-2 text-blue-500"></i>Edit Client Logo</h2>

        <form action="{{ route('cms.about-us.logos.update', $logo) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Client Name <span class="text-gray-400">(optional)</span></label>
                    <input type="text" name="name" id="name" value="{{ old('name', $logo->name) }}" placeholder="e.g. Company Name"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="link" class="block text-sm font-medium text-gray-700 mb-2">Link <span class="text-gray-400">(optional)</span></label>
                    <input type="text" name="link" id="link" value="{{ old('link', $logo->link) }}" placeholder="e.g. https://example.com"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
                    @error('link')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Logo Image</label>
                @if($logo->image)
                    <div class="mb-2 p-3 bg-gray-50 rounded-lg inline-block">
                        <img src="{{ Storage::url($logo->image) }}" alt="{{ $logo->name ?? 'Client Logo' }}"
                            class="h-16 object-contain">
                    </div>
                @endif
                <input type="file" name="image" id="image" accept="image/*"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
                <p class="text-sm text-gray-500 mt-1">Max 2MB. Format: JPEG, PNG, JPG, GIF, WebP, SVG. Biarkan kosong jika tidak ingin mengubah.</p>
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="order" class="block text-sm font-medium text-gray-700 mb-2">Order</label>
                    <input type="number" name="order" id="order" value="{{ old('order', $logo->order) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
                </div>
                <div class="flex items-end">
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $logo->is_active) ? 'checked' : '' }}
                            class="h-4 w-4 text-[#3B0014] focus:ring-[#3B0014] border-gray-300 rounded">
                        <span class="ml-2 text-sm font-medium text-gray-700">Active</span>
                    </label>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-[#3B0014] text-white px-6 py-2 rounded-lg hover:bg-[#6C342C] transition">
                    <i class="fas fa-save mr-2"></i> Update
                </button>
            </div>
        </form>
    </div>
@endsection
