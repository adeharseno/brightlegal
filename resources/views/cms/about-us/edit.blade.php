@extends('layouts.cms')

@section('title', 'Edit Team Member')

@section('content')
<div class="mb-6">
    <a href="{{ route('cms.about-us.index') }}" class="text-gray-600 hover:text-gray-900">
        <i class="fas fa-arrow-left mr-2"></i> Kembali
    </a>
</div>

<div class="bg-white rounded-lg shadow-md p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Team Member</h1>

    <form action="{{ route('cms.about-us.update', $member) }}" novalidate method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name <span class="text-red-500">*</span></label>
                <input type="text" name="name" id="name" value="{{ old('name', $member->name) }}" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
            </div>
            <div>
                <label for="position" class="block text-sm font-medium text-gray-700 mb-2">Position <span class="text-red-500">*</span></label>
                <input type="text" name="position" id="position" value="{{ old('position', $member->position) }}" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
            </div>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
            <textarea name="description" id="description" rows="4" class="wysiwyg w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">{{ old('description', $member->description) }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Photo</label>
                @if($member->image)
                    <div class="mb-2">
                        <img src="{{ Storage::url($member->image) }}" alt="{{ $member->name }}" class="h-20 w-20 rounded-lg object-cover">
                    </div>
                @endif
                <input type="file" name="image" id="image" accept="image/*"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
                <p class="text-sm text-gray-500 mt-1">Max 2MB. Format: JPEG, PNG, JPG, GIF, WebP. Biarkan kosong jika tidak ingin mengubah.</p>
            </div>
            <div>
                <label for="background_color" class="block text-sm font-medium text-gray-700 mb-2">Card Background Color</label>
                <input type="color" name="background_color" id="background_color" value="{{ old('background_color', $member->background_color) }}"
                       class="w-full h-10 px-1 py-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
            </div>
        </div>

        <div class="mb-4">
            <label for="link" class="block text-sm font-medium text-gray-700 mb-2">Profile Link (optional)</label>
            <input type="text" name="link" id="link" value="{{ old('link', $member->link) }}" placeholder="e.g. https://linkedin.com/in/..."
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label for="order" class="block text-sm font-medium text-gray-700 mb-2">Order</label>
                <input type="number" name="order" id="order" value="{{ old('order', $member->order) }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
            </div>
            <div class="flex items-center pt-8">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $member->is_active) ? 'checked' : '' }}
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
