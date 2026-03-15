<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\ClientJourneyCategory;
use App\Models\ClientJourneyItem;
use App\Models\ClientJourneySetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ClientJourneyController extends Controller
{
    public function index()
    {
        $categories = ClientJourneyCategory::ordered()->get();
        $items = ClientJourneyItem::with('category')->ordered()->paginate(10);
        $setting = ClientJourneySetting::first();
        return view('cms.client-journey.index', compact('categories', 'items', 'setting'));
    }

    // ========== SETTINGS ==========

    public function settingsEdit()
    {
        $setting = ClientJourneySetting::first();
        return view('cms.client-journey.settings', compact('setting'));
    }

    public function settingsUpdate(Request $request)
    {
        $validated = $request->validate([
            // CTA 1
            'cta1_title' => 'nullable|string|max:255',
            'cta1_description' => 'nullable|string',
            'cta1_button_text' => 'nullable|string|max:255',
            'cta1_button_link' => 'nullable|string|max:255',
            // CTA 2
            'cta2_title' => 'nullable|string|max:255',
            'cta2_description' => 'nullable|string',
            'cta2_button_text' => 'nullable|string|max:255',
            'cta2_button_link' => 'nullable|string|max:255',
        ]);

        $setting = ClientJourneySetting::first();

        if ($setting) {
            $setting->update($validated);
        } else {
            ClientJourneySetting::create($validated);
        }

        return redirect()->route('cms.client-journey.index')
            ->with('success', 'Pengaturan CTA Client Journey berhasil diperbarui!');
    }

    // ========== CATEGORIES ==========

    public function createCategory()
    {
        return view('cms.client-journey.create-category');
    }

    public function storeCategory(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:client_journey_categories,slug',
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        $validated['slug'] = $validated['slug'] ?: Str::slug($validated['name']);
        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? 0;

        ClientJourneyCategory::create($validated);

        return redirect()->route('cms.client-journey.index')
            ->with('success', 'Kategori client journey berhasil ditambahkan!');
    }

    public function editCategory(ClientJourneyCategory $category)
    {
        return view('cms.client-journey.edit-category', compact('category'));
    }

    public function updateCategory(Request $request, ClientJourneyCategory $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:client_journey_categories,slug,' . $category->id,
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        $validated['slug'] = $validated['slug'] ?: Str::slug($validated['name']);
        $validated['is_active'] = $request->has('is_active');

        $category->update($validated);

        return redirect()->route('cms.client-journey.index')
            ->with('success', 'Kategori client journey berhasil diperbarui!');
    }

    public function destroyCategory(ClientJourneyCategory $category)
    {
        // Delete all item images in this category
        foreach ($category->items as $item) {
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
            }
        }

        $category->delete();

        return redirect()->route('cms.client-journey.index')
            ->with('success', 'Kategori client journey berhasil dihapus!');
    }

    // ========== ITEMS ==========

    public function create()
    {
        $categories = ClientJourneyCategory::ordered()->get();
        return view('cms.client-journey.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_journey_category_id' => 'required|exists:client_journey_categories,id',
            'number' => 'nullable|integer',
            'client_type' => 'nullable|string|max:255',
            'topic' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'challenge' => 'nullable|string',
            'how_we_helped' => 'nullable|string',
            'outcome' => 'nullable|string',
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('client-journey', 'public');
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? 0;
        $validated['number'] = $validated['number'] ?? 1;

        ClientJourneyItem::create($validated);

        return redirect()->route('cms.client-journey.index')
            ->with('success', 'Client journey item berhasil ditambahkan!');
    }

    public function edit(ClientJourneyItem $item)
    {
        $categories = ClientJourneyCategory::ordered()->get();
        return view('cms.client-journey.edit', compact('item', 'categories'));
    }

    public function update(Request $request, ClientJourneyItem $item)
    {
        $validated = $request->validate([
            'client_journey_category_id' => 'required|exists:client_journey_categories,id',
            'number' => 'nullable|integer',
            'client_type' => 'nullable|string|max:255',
            'topic' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'challenge' => 'nullable|string',
            'how_we_helped' => 'nullable|string',
            'outcome' => 'nullable|string',
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
            }
            $validated['image'] = $request->file('image')->store('client-journey', 'public');
        }

        $validated['is_active'] = $request->has('is_active');

        $item->update($validated);

        return redirect()->route('cms.client-journey.index')
            ->with('success', 'Client journey item berhasil diperbarui!');
    }

    public function destroy(ClientJourneyItem $item)
    {
        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }

        $item->delete();

        return redirect()->route('cms.client-journey.index')
            ->with('success', 'Client journey item berhasil dihapus!');
    }
}

