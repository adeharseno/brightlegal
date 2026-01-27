<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\WhyWorkWithUsSetting;
use App\Models\WhyWorkWithUsCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WhyWorkWithUsController extends Controller
{
    public function index()
    {
        $setting = WhyWorkWithUsSetting::first();
        $cards = WhyWorkWithUsCard::ordered()->paginate(10);
        return view('cms.why-work-with-us.index', compact('setting', 'cards'));
    }

    public function settingsEdit()
    {
        $setting = WhyWorkWithUsSetting::first();
        return view('cms.why-work-with-us.settings', compact('setting'));
    }

    public function settingsUpdate(Request $request)
    {
        $validated = $request->validate([
            'title_section' => 'required|string|max:255',
            'subtitle_section' => 'nullable|string|max:255',
            'description_section' => 'required|string',
        ]);

        $setting = WhyWorkWithUsSetting::first();
        if ($setting) {
            $setting->update($validated);
        } else {
            WhyWorkWithUsSetting::create($validated);
        }

        return redirect()->route('cms.why-work-with-us.index')
            ->with('success', 'Pengaturan section berhasil diperbarui!');
    }

    public function create()
    {
        return view('cms.why-work-with-us.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('why-work-with-us', 'public');
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? 0;

        WhyWorkWithUsCard::create($validated);

        return redirect()->route('cms.why-work-with-us.index')
            ->with('success', 'Card berhasil ditambahkan!');
    }

    public function edit(WhyWorkWithUsCard $card)
    {
        return view('cms.why-work-with-us.edit', compact('card'));
    }

    public function update(Request $request, WhyWorkWithUsCard $card)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            if ($card->image) {
                Storage::disk('public')->delete($card->image);
            }
            $validated['image'] = $request->file('image')->store('why-work-with-us', 'public');
        }

        $validated['is_active'] = $request->has('is_active');

        $card->update($validated);

        return redirect()->route('cms.why-work-with-us.index')
            ->with('success', 'Card berhasil diperbarui!');
    }

    public function destroy(WhyWorkWithUsCard $card)
    {
        if ($card->image) {
            Storage::disk('public')->delete($card->image);
        }
        
        $card->delete();

        return redirect()->route('cms.why-work-with-us.index')
            ->with('success', 'Card berhasil dihapus!');
    }
}
