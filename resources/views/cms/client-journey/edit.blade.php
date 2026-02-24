@extends('layouts.cms')

@section('title', 'Edit Case Study')

@section('content')
<div class="mb-6">
    <a href="{{ route('cms.client-journey.index') }}" class="text-gray-600 hover:text-gray-900">
        <i class="fas fa-arrow-left mr-2"></i> Kembali
    </a>
</div>

<div class="bg-white rounded-lg shadow-md p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Case Study: {{ $item->title }}</h1>

    <form action="{{ route('cms.client-journey.update', $item) }}" novalidate method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label for="client_journey_category_id" class="block text-sm font-medium text-gray-700 mb-2">Kategori <span class="text-red-500">*</span></label>
                <select name="client_journey_category_id" id="client_journey_category_id" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ old('client_journey_category_id', $item->client_journey_category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="number" class="block text-sm font-medium text-gray-700 mb-2">Number (Nomor urut tampilan)</label>
                <input type="number" name="number" id="number" value="{{ old('number', $item->number) }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
            </div>
        </div>

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title <span class="text-red-500">*</span></label>
            <input type="text" name="title" id="title" value="{{ old('title', $item->title) }}" required
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label for="client_type" class="block text-sm font-medium text-gray-700 mb-2">Client Type</label>
                <input type="text" name="client_type" id="client_type" value="{{ old('client_type', $item->client_type) }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
            </div>
            <div>
                <label for="topic" class="block text-sm font-medium text-gray-700 mb-2">Topic</label>
                <input type="text" name="topic" id="topic" value="{{ old('topic', $item->topic) }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
            </div>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Client Image</label>
            @if($item->image)
                <div class="mb-2">
                    <img src="{{ Storage::url($item->image) }}" alt="{{ $item->title }}" class="h-32 w-auto rounded object-cover">
                </div>
            @endif
            <input type="file" name="image" id="image" accept="image/*"
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
            <p class="text-sm text-gray-500 mt-1">Max 2MB. Kosongkan jika tidak ingin mengubah gambar.</p>
        </div>

        <div class="mb-4">
            <label for="challenge" class="block text-sm font-medium text-gray-700 mb-2">The Challenge</label>
            <textarea name="challenge" id="challenge" rows="4"
                      class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">{{ old('challenge', $item->challenge) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="how_we_helped" class="block text-sm font-medium text-gray-700 mb-2">How We Helped</label>
            <textarea name="how_we_helped" id="how_we_helped" rows="4"
                      class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">{{ old('how_we_helped', $item->how_we_helped) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="outcome" class="block text-sm font-medium text-gray-700 mb-2">Outcome</label>
            <textarea name="outcome" id="outcome" rows="3"
                      class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">{{ old('outcome', $item->outcome) }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label for="order" class="block text-sm font-medium text-gray-700 mb-2">Order</label>
                <input type="number" name="order" id="order" value="{{ old('order', $item->order) }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
            </div>
            <div class="flex items-center pt-8">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $item->is_active) ? 'checked' : '' }}
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
