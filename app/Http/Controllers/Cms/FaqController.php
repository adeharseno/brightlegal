<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\FaqsSetting;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $setting = FaqsSetting::first();
        $faqs = Faq::active()::ordered()->paginate(10);
        
        return view('cms.faqs.index', compact('setting', 'faqs'));
    }

    public function settingsEdit()
    {
        $setting = FaqsSetting::first();
        return view('cms.faqs.settings', compact('setting'));
    }

    public function settingsUpdate(Request $request)
    {
        $validated = $request->validate([
            'title_section' => 'required|string|max:255',
            'description_section' => 'required|string',
        ]);

        $setting = FaqsSetting::first();
        if ($setting) {
            $setting->update($validated);
        } else {
            FaqsSetting::create($validated);
        }

        return redirect()->route('cms.faqs.index')
            ->with('success', 'Pengaturan section berhasil diperbarui!');
    }

    public function create()
    {
        return view('cms.faqs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'page' => 'required|string|in:home,our-services',
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? 0;

        Faq::create($validated);

        return redirect()->route('cms.faqs.index')
            ->with('success', 'FAQ berhasil ditambahkan!');
    }

    public function edit(Faq $faq)
    {
        return view('cms.faqs.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'page' => 'required|string|in:home,our-services',
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $faq->update($validated);

        return redirect()->route('cms.faqs.index')
            ->with('success', 'FAQ berhasil diperbarui!');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('cms.faqs.index')
            ->with('success', 'FAQ berhasil dihapus!');
    }
}
