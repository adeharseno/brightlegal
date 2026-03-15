@extends('layouts.cms')

@section('title', 'Client Journey')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Client Journey</h1>
            <p class="text-gray-600">Kelola kategori dan case study client journey</p>
        </div>
        <div class="space-x-2">
            <a href="{{ route('cms.client-journey.settings') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                <i class="fas fa-cog mr-2"></i> Pengaturan CTA
            </a>
            <a href="{{ route('cms.client-journey.categories.create') }}"
                class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition">
                <i class="fas fa-folder-plus mr-2"></i> Tambah Kategori
            </a>
            <a href="{{ route('cms.client-journey.create') }}"
                class="bg-[#3B0014] text-white px-4 py-2 rounded-lg hover:bg-[#6C342C] transition">
                <i class="fas fa-plus mr-2"></i> Tambah Case Study
            </a>
        </div>
    </div>

    <!-- Categories -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
        <div class="px-6 py-4 bg-gray-50 border-b">
            <h2 class="text-lg font-semibold text-gray-800">Kategori (Tabs)</h2>
        </div>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Slug</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Items</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($categories as $category)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $category->order }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $category->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $category->slug }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $category->items->count() }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $category->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $category->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('cms.client-journey.categories.edit', $category) }}" class="text-blue-600 hover:text-blue-900 mr-3">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('cms.client-journey.categories.destroy', $category) }}" method="POST" class="inline"
                                onsubmit="return confirm('Hapus kategori ini? Semua case study di dalamnya akan ikut terhapus.')">
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
                            Belum ada kategori. <a href="{{ route('cms.client-journey.categories.create') }}" class="text-blue-600 hover:underline">Tambah sekarang</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Items Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="px-6 py-4 bg-gray-50 border-b">
            <h2 class="text-lg font-semibold text-gray-800">Case Studies</h2>
        </div>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($items as $item)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->order }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($item->image)
                                <img src="{{ Storage::url($item->image) }}" alt="{{ $item->title }}" class="h-12 w-20 rounded object-cover">
                            @else
                                <div class="h-12 w-20 rounded bg-gray-200 flex items-center justify-center">
                                    <i class="fas fa-image text-gray-400"></i>
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ Str::limit($item->title, 40) }}</div>
                            <div class="text-xs text-gray-500">{{ $item->client_type }} · {{ $item->topic }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->category->name ?? '-' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $item->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $item->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('cms.client-journey.edit', $item) }}" class="text-blue-600 hover:text-blue-900 mr-3">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('cms.client-journey.destroy', $item) }}" method="POST" class="inline"
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
                            Belum ada case study. <a href="{{ route('cms.client-journey.create') }}" class="text-blue-600 hover:underline">Tambah sekarang</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $items->links() }}
    </div>

    <!-- CTA Preview -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden mt-6">
        <div class="px-6 py-4 bg-gray-50 border-b flex justify-between items-center">
            <div>
                <h2 class="text-lg font-semibold text-gray-800">Preview CTA Section</h2>
                <p class="text-sm text-gray-500">2 kartu CTA yang tampil di bawah halaman Client Journey</p>
            </div>
            <a href="{{ route('cms.client-journey.settings') }}"
                class="text-blue-600 hover:text-blue-900 text-sm font-medium">
                <i class="fas fa-edit mr-1"></i> Edit CTA
            </a>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- CTA 1 Preview -->
                <div class="rounded-lg p-5 border border-gray-200 bg-gray-50">
                    <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">CTA 1</span>
                    <h3 class="text-lg font-semibold text-gray-800 mt-2">{{ $setting->cta1_title ?? 'Not seeing your exact case?' }}</h3>
                    <p class="text-sm text-gray-600 mt-1">{{ $setting->cta1_description ?? 'Every situation is different. If you have questions or want guidance specific to your case, we\'re here to help you understand your options.' }}</p>
                    <div class="mt-3">
                        <span class="inline-block bg-gray-200 text-gray-700 text-xs px-3 py-1 rounded-full">
                            {{ $setting->cta1_button_text ?? 'Talk to a legal advisor' }} → {{ $setting->cta1_button_link ?? '#' }}
                        </span>
                    </div>
                </div>
                <!-- CTA 2 Preview -->
                <div class="rounded-lg p-5 border border-gray-200 bg-gray-50">
                    <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">CTA 2</span>
                    <h3 class="text-lg font-semibold text-gray-800 mt-2">{{ $setting->cta2_title ?? 'Just starting your research?' }}</h3>
                    <p class="text-sm text-gray-600 mt-1">{{ $setting->cta2_description ?? 'Download our free guide for expats on land ownership, visas and business structures in Indonesia.' }}</p>
                    <div class="mt-3">
                        <span class="inline-block bg-gray-200 text-gray-700 text-xs px-3 py-1 rounded-full">
                            {{ $setting->cta2_button_text ?? 'Get free legal guide' }} → {{ $setting->cta2_button_link ?? '#' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
