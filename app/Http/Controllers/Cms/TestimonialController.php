<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\TestimonialsSetting;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $setting = TestimonialsSetting::first();
        $testimonials = Testimonial::ordered()->paginate(10);
        return view('cms.testimonials.index', compact('setting', 'testimonials'));
    }

    public function settingsEdit()
    {
        $setting = TestimonialsSetting::first();
        return view('cms.testimonials.settings', compact('setting'));
    }

    public function settingsUpdate(Request $request)
    {
        $validated = $request->validate([
            'title_section' => 'required|string|max:255',
            'description_section' => 'required|string',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',
        ]);

        $setting = TestimonialsSetting::first();
        if ($setting) {
            $setting->update($validated);
        } else {
            TestimonialsSetting::create($validated);
        }

        return redirect()->route('cms.testimonials.index')
            ->with('success', 'Pengaturan section berhasil diperbarui!');
    }

    public function create()
    {
        return view('cms.testimonials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'testimonial' => 'required|string',
            'user_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'user_name' => 'required|string|max:255',
            'user_title' => 'required|string|max:255',
            'user_country' => 'required|string|max:255',
            'background_color' => 'nullable|string|max:20',
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('user_image')) {
            $validated['user_image'] = $request->file('user_image')->store('testimonials', 'public');
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? 0;
        $validated['background_color'] = $validated['background_color'] ?? '#B8C1F8';

        Testimonial::create($validated);

        return redirect()->route('cms.testimonials.index')
            ->with('success', 'Testimonial berhasil ditambahkan!');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('cms.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'testimonial' => 'required|string',
            'user_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'user_name' => 'required|string|max:255',
            'user_title' => 'required|string|max:255',
            'user_country' => 'required|string|max:255',
            'background_color' => 'nullable|string|max:20',
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('user_image')) {
            if ($testimonial->user_image) {
                Storage::disk('public')->delete($testimonial->user_image);
            }
            $validated['user_image'] = $request->file('user_image')->store('testimonials', 'public');
        }

        $validated['is_active'] = $request->has('is_active');

        $testimonial->update($validated);

        return redirect()->route('cms.testimonials.index')
            ->with('success', 'Testimonial berhasil diperbarui!');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->user_image) {
            Storage::disk('public')->delete($testimonial->user_image);
        }
        
        $testimonial->delete();

        return redirect()->route('cms.testimonials.index')
            ->with('success', 'Testimonial berhasil dihapus!');
    }
}
