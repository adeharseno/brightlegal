@extends('layouts.cms')

@section('title', 'Testimonials')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Testimonials</h1>
        <p class="text-gray-600">Kelola testimonials</p>
    </div>
    <div class="space-x-2">
        <a href="{{ route('cms.testimonials.settings') }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition">
            <i class="fas fa-cog mr-2"></i> Section Settings
        </a>
        <a href="{{ route('cms.testimonials.create') }}" class="bg-[#3B0014] text-white px-4 py-2 rounded-lg hover:bg-[#6C342C] transition">
            <i class="fas fa-plus mr-2"></i> Tambah Testimonial
        </a>
    </div>
</div>

<!-- Section Settings Preview -->
@if($setting)
<div class="bg-blue-50 rounded-lg p-4 mb-6">
    <h3 class="font-semibold text-blue-800 mb-2">Section Settings:</h3>
    <p class="text-sm text-blue-700"><strong>Title:</strong> {{ $setting->title_section }}</p>
    <p class="text-sm text-blue-700"><strong>Button:</strong> {{ $setting->button_text ?? '-' }}</p>
</div>
@endif

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Testimonial</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse($testimonials as $testimonial)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $testimonial->order }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            @if($testimonial->user_image)
                                <img src="{{ Storage::url($testimonial->user_image) }}" alt="{{ $testimonial->user_name }}" class="h-10 w-10 rounded-full object-cover">
                            @else
                                <div class="h-10 w-10 rounded-full bg-gray-300 flex items-center justify-center text-gray-600 font-semibold">
                                    {{ substr($testimonial->user_name, 0, 1) }}
                                </div>
                            @endif
                            <div class="ml-3">
                                <div class="text-sm font-medium text-gray-900">{{ $testimonial->user_name }}</div>
                                <div class="text-sm text-gray-500">{{ $testimonial->user_country }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 py-1 text-xs rounded" style="background-color: {{ $testimonial->background_color }}20; color: {{ $testimonial->background_color }}">
                            {{ $testimonial->title }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-500">{!! Str::limit(strip_tags($testimonial->testimonial), 50) !!}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $testimonial->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $testimonial->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('cms.testimonials.edit', $testimonial) }}" class="text-blue-600 hover:text-blue-900 mr-3">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('cms.testimonials.destroy', $testimonial) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus testimonial ini?')">
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
                        Belum ada testimonial. <a href="{{ route('cms.testimonials.create') }}" class="text-blue-600 hover:underline">Tambah sekarang</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $testimonials->links() }}
</div>
@endsection
