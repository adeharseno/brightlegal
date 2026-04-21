<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\LegalGuideSetting;
use App\Models\LegalGuideItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LegalGuideController extends Controller
{
    public function index()
    {
        $setting = LegalGuideSetting::first();
        $items = LegalGuideItem::ordered()->paginate(10);
        return view('cms.legal-guide.index', compact('setting', 'items'));
    }

    // ========== SETTINGS ==========

    public function settingsEdit()
    {
        $setting = LegalGuideSetting::first();
        return view('cms.legal-guide.settings', compact('setting'));
    }

    public function settingsUpdate(Request $request)
    {
        $validated = $request->validate([
            'page_title' => 'nullable|string|max:255',
            'page_subtitle' => 'nullable|string|max:255',
            'cta_text' => 'nullable|string|max:500',
            'cta_button_text' => 'nullable|string|max:255',
            'cta_button_link' => 'nullable|string|max:255',
        ]);

        $setting = LegalGuideSetting::first();

        if ($setting) {
            $setting->update($validated);
        } else {
            LegalGuideSetting::create($validated);
        }

        return redirect()->route('cms.legal-guide.index')
            ->with('success', 'Pengaturan Legal Guide berhasil diperbarui!');
    }

    // ========== ITEMS ==========

    public function create()
    {
        return view('cms.legal-guide.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'video_url' => 'nullable|string|max:500',
            'instagram_url' => 'nullable|string|max:500',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('legal-guide', 'public');
        }

        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? 0;

        LegalGuideItem::create($validated);

        return redirect()->route('cms.legal-guide.index')
            ->with('success', 'Legal guide item berhasil ditambahkan!');
    }

    public function edit(LegalGuideItem $item)
    {
        return view('cms.legal-guide.edit', compact('item'));
    }

    public function update(Request $request, LegalGuideItem $item)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'video_url' => 'nullable|string|max:500',
            'instagram_url' => 'nullable|string|max:500',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($item->thumbnail) {
                Storage::disk('public')->delete($item->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('legal-guide', 'public');
        }

        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');

        $item->update($validated);

        return redirect()->route('cms.legal-guide.index')
            ->with('success', 'Legal guide item berhasil diperbarui!');
    }

    public function destroy(LegalGuideItem $item)
    {
        if ($item->thumbnail) {
            Storage::disk('public')->delete($item->thumbnail);
        }

        $item->delete();

        return redirect()->route('cms.legal-guide.index')
            ->with('success', 'Legal guide item berhasil dihapus!');
    }
}
