@extends('layouts.cms')

@section('title', 'About Us')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">About Us</h1>
            <p class="text-gray-600">Kelola konten halaman About Us</p>
        </div>
        <div class="space-x-2">
            <a href="{{ route('cms.about-us.settings') }}"
                class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition">
                <i class="fas fa-cog mr-2"></i> Page Settings
            </a>
            <a href="{{ route('cms.about-us.create') }}"
                class="bg-[#3B0014] text-white px-4 py-2 rounded-lg hover:bg-[#6C342C] transition">
                <i class="fas fa-plus mr-2"></i> Tambah Team Member
            </a>
        </div>
    </div>

    <!-- Settings Preview -->
    @if($setting)
        <div class="bg-blue-50 rounded-lg p-4 mb-6">
            <h3 class="font-semibold text-blue-800 mb-2">Page Settings:</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-blue-700">
                <div>
                    <p><strong>Hero Title:</strong> {{ $setting->hero_title ?? '-' }}</p>
                    <p><strong>Hero Subtitle:</strong> {{ $setting->hero_subtitle ?? '-' }}</p>
                </div>
                <div>
                    <p><strong>Team Label:</strong> {{ $setting->team_label ?? '-' }}</p>
                    <p><strong>Team Title:</strong> {{ Str::limit($setting->team_title ?? '-', 50) }}</p>
                </div>
            </div>
        </div>
    @endif

    <!-- Team Members Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="px-6 py-4 bg-gray-50 border-b">
            <h2 class="text-lg font-semibold text-gray-800">Team Members</h2>
        </div>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Photo</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Position</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($teamMembers as $member)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $member->order }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($member->image)
                                <img src="{{ Storage::url($member->image) }}" alt="{{ $member->name }}"
                                    class="h-12 w-12 rounded-lg object-cover"
                                    style="background-color: {{ $member->background_color }}">
                            @else
                                <div class="h-12 w-12 rounded-lg flex items-center justify-center text-white font-semibold"
                                    style="background-color: {{ $member->background_color }}">
                                    {{ substr($member->name, 0, 1) }}
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $member->name }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-500">{{ $member->position }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $member->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $member->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('cms.about-us.edit', $member) }}" class="text-blue-600 hover:text-blue-900 mr-3">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('cms.about-us.destroy', $member) }}" method="POST" class="inline"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus team member ini?')">
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
                            Belum ada team member. <a href="{{ route('cms.about-us.create') }}"
                                class="text-blue-600 hover:underline">Tambah sekarang</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $teamMembers->links() }}
    </div>
@endsection