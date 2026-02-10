@extends('layouts.cms')

@section('title', 'Ready to Talk')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Ready to Talk</h1>
    <p class="text-gray-600">Kelola section "Ready to Talk" di halaman home</p>
</div>

<div class="bg-white rounded-lg shadow-md p-6">
    <form action="{{ route('cms.ready-to-talk.update') }}" novalidate method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title <span class="text-red-500">*</span></label>
            <input type="text" name="title" id="title" value="{{ old('title', $readyToTalk->title ?? '') }}" required
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label for="button_text" class="block text-sm font-medium text-gray-700 mb-2">Button Text</label>
                <input type="text" name="button_text" id="button_text" value="{{ old('button_text', $readyToTalk->button_text ?? '') }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3B0014] focus:border-transparent">
            </div>
            <div>
                <label for="button_link" class="block text-sm font-medium text-gray-700 mb-2">Button Link</label>
                <input type="text" name="button_link" id="button_link" value="{{ old('button_link', $readyToTalk->button_link ?? '') }}"
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
