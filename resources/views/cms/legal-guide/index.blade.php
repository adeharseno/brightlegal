@extends('layouts.cms')

@section('title', 'Legal Guide')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Legal Guide</h1>
            <p class="text-gray-600">Kelola konten video legal guide</p>
        </div>
        <div class="space-x-2">
            <a href="{{ route('cms.legal-guide.settings') }}"
                class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition">
                <i class="fas fa-cog mr-2"></i> Page Settings
            </a>
            <a href="{{ route('cms.legal-guide.create') }}"
                class="bg-[#3B0014] text-white px-4 py-2 rounded-lg hover:bg-[#6C342C] transition">
                <i class="fas fa-plus mr-2"></i> Tambah Video Guide
            </a>
        </div>
    </div>

    <!-- Settings Preview -->
    @if($setting)
        <div class="bg-blue-50 rounded-lg p-4 mb-6">
            <h3 class="font-semibold text-blue-800 mb-2">Page Settings:</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-blue-700">
                <div>
                    <p><strong>Page Title:</strong> {{ $setting->page_title ?? '-' }}</p>
                    <p><strong>Page Subtitle:</strong> {{ $setting->page_subtitle ?? '-' }}</p>
                </div>
                <div>
                    <p><strong>CTA Text:</strong> {{ $setting->cta_text ?? '-' }}</p>
                    <p><strong>CTA Button:</strong> {{ $setting->cta_button_text ?? '-' }}</p>
                </div>
            </div>
        </div>
    @endif

    <!-- Items Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="px-6 py-4 bg-gray-50 border-b">
            <h2 class="text-lg font-semibold text-gray-800">Video Guides</h2>
        </div>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Thumbnail
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Featured</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($items as $item)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->order }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($item->thumbnail)
                                <img src="{{ Storage::url($item->thumbnail) }}" alt="{{ $item->title }}"
                                    class="h-12 w-20 rounded object-cover">
                            @else
                                <div class="h-12 w-20 rounded bg-gray-200 flex items-center justify-center">
                                    <i class="fas fa-video text-gray-400"></i>
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ Str::limit($item->title, 40) }}</div>
                            @if($item->video_url)
                                <div class="text-xs text-gray-500">{{ Str::limit($item->video_url, 50) }}</div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($item->is_featured)
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    ⭐ Featured
                                </span>
                            @else
                                <span class="text-xs text-gray-400">—</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $item->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $item->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('cms.legal-guide.edit', $item) }}" class="text-blue-600 hover:text-blue-900 mr-3">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('cms.legal-guide.destroy', $item) }}" method="POST" class="inline"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus item ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                            Belum ada video guide. <a href="{{ route('cms.legal-guide.create') }}"
                                class="text-blue-600 hover:underline">Tambah sekarang</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $items->links() }}
    </div>
@endsection