<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\ServicesSetting;
use App\Models\ServiceCategory;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $setting = ServicesSetting::first();
        $categories = ServiceCategory::ordered()->with('services')->get();
        $services = Service::ordered()->with('category')->paginate(10);
        return view('cms.services.index', compact('setting', 'categories', 'services'));
    }

    public function settingsEdit()
    {
        $setting = ServicesSetting::first();
        return view('cms.services.settings', compact('setting'));
    }

    public function settingsUpdate(Request $request)
    {
        $validated = $request->validate([
            'title_section' => 'required|string|max:255',
            'description_section' => 'required|string',
        ]);

        $setting = ServicesSetting::first();
        if ($setting) {
            $setting->update($validated);
        } else {
            ServicesSetting::create($validated);
        }

        return redirect()->route('cms.services.index')
            ->with('success', 'Pengaturan section berhasil diperbarui!');
    }

    // Categories
    public function categoriesIndex()
    {
        $categories = ServiceCategory::ordered()->paginate(10);
        return view('cms.services.categories.index', compact('categories'));
    }

    public function categoriesCreate()
    {
        return view('cms.services.categories.create');
    }

    public function categoriesStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:service_categories,slug',
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['name']);
        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? 0;

        ServiceCategory::create($validated);

        return redirect()->route('cms.services.categories.index')
            ->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function categoriesEdit(ServiceCategory $category)
    {
        return view('cms.services.categories.edit', compact('category'));
    }

    public function categoriesUpdate(Request $request, ServiceCategory $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:service_categories,slug,' . $category->id,
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['name']);
        $validated['is_active'] = $request->has('is_active');

        $category->update($validated);

        return redirect()->route('cms.services.categories.index')
            ->with('success', 'Kategori berhasil diperbarui!');
    }

    public function categoriesDestroy(ServiceCategory $category)
    {
        $category->delete();

        return redirect()->route('cms.services.categories.index')
            ->with('success', 'Kategori berhasil dihapus!');
    }

    // Services
    public function create()
    {
        $categories = ServiceCategory::active()->ordered()->get();
        return view('cms.services.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'nullable|exists:service_categories,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'key_benefits' => 'nullable|string',
            'required_documents' => 'nullable|string',
            'important_notes' => 'nullable|string',
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('services', 'public');
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? 0;

        Service::create($validated);

        return redirect()->route('cms.services.index')
            ->with('success', 'Service berhasil ditambahkan!');
    }

    public function edit(Service $service)
    {
        $categories = ServiceCategory::active()->ordered()->get();
        return view('cms.services.edit', compact('service', 'categories'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'category_id' => 'nullable|exists:service_categories,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'key_benefits' => 'nullable|string',
            'required_documents' => 'nullable|string',
            'important_notes' => 'nullable|string',
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
            $validated['image'] = $request->file('image')->store('services', 'public');
        }

        $validated['is_active'] = $request->has('is_active');

        $service->update($validated);

        return redirect()->route('cms.services.index')
            ->with('success', 'Service berhasil diperbarui!');
    }

    public function destroy(Service $service)
    {
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }
        
        $service->delete();

        return redirect()->route('cms.services.index')
            ->with('success', 'Service berhasil dihapus!');
    }
}
