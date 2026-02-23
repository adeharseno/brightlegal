@extends('layouts.cms')

@section('title', 'Edit Video Guide')

@section('content')
<div class="mb-6">
    <a href="{{ route('cms.legal-guide.index') }}" class="text-gray-600 hover:text-gray-900">
        <i class="fas fa-arrow-left mr-2"></i> Kembali
    </a>
</div>

<div class="bg-white rounded-lg shadow-md p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Video Guide</h1>

    <form action="{{ route('cms.legal-guide.update', $item) }}" novalidate method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title <span class="text-red-500">*</span></label>
            <input type="text" name="title" id="title" value="{{ old('title', $item->title) }}" required
                   placeholder="e.g. Tourist visa vs business visa: what's the difference?"
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
            <textarea name="description" id="description" rows="3"
                      placeholder="e.g. Clear explanations to help you choose the right path."
                      class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">{{ old('description', $item->description) }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label for="thumbnail" class="block text-sm font-medium text-gray-700 mb-2">Thumbnail Image</label>
                @if($item->thumbnail)
                    <div class="mb-2">
                        <img src="{{ Storage::url($item->thumbnail) }}" alt="{{ $item->title }}"
                             class="h-24 w-40 rounded object-cover">
                    </div>
                @endif
                <input type="file" name="thumbnail" id="thumbnail" accept="image/*"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
                <p class="text-sm text-gray-500 mt-1">Max 2MB. Kosongkan jika tidak ingin mengubah thumbnail.</p>
            </div>
            <div>
                <label for="video_url" class="block text-sm font-medium text-gray-700 mb-2">Video URL</label>
                <input type="text" name="video_url" id="video_url" value="{{ old('video_url', $item->video_url) }}"
                       placeholder="e.g. https://www.youtube.com/embed/xxxxx"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
                <p class="text-sm text-gray-500 mt-1">Paste YouTube embed URL atau URL video lainnya</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
            <div>
                <label for="order" class="block text-sm font-medium text-gray-700 mb-2">Order</label>
                <input type="number" name="order" id="order" value="{{ old('order', $item->order) }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
            </div>
            <div class="flex items-center pt-8">
                <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured', $item->is_featured) ? 'checked' : '' }}
                       class="h-4 w-4 text-[#3B0014] focus:ring-[#3B0014] border-gray-300 rounded">
                <label for="is_featured" class="ml-2 block text-sm text-gray-700">⭐ Featured (tampil di hero besar)</label>
            </div>
            <div class="flex items-center pt-8">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $item->is_active) ? 'checked' : '' }}
                       class="h-4 w-4 text-[#3B0014] focus:ring-[#3B0014] border-gray-300 rounded">
                <label for="is_active" class="ml-2 block text-sm text-gray-700">Active</label>
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
