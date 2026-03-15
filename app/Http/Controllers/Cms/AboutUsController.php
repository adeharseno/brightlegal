<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\AboutUsSetting;
use App\Models\AboutUsTeamMember;
use App\Models\AboutUsClientLogo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    public function index()
    {
        $setting = AboutUsSetting::first();
        $teamMembers = AboutUsTeamMember::ordered()->paginate(10);
        $clientLogos = AboutUsClientLogo::ordered()->get();
        return view('cms.about-us.index', compact('setting', 'teamMembers', 'clientLogos'));
    }

    // ========== SETTINGS ==========

    public function settingsEdit()
    {
        $setting = AboutUsSetting::first();
        return view('cms.about-us.settings', compact('setting'));
    }

    public function settingsUpdate(Request $request)
    {
        $validated = $request->validate([
            // Hero
            'hero_title' => 'nullable|string|max:255',
            'hero_subtitle' => 'nullable|string|max:255',
            'hero_image_left' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'hero_image_center' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'hero_image_right' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            // Mission
            'mission_label' => 'nullable|string|max:255',
            'mission_title_line1' => 'nullable|string|max:500',
            'mission_title_line2' => 'nullable|string|max:500',
            'mission_body_left' => 'nullable|string',
            'mission_body_right' => 'nullable|string',
            'mission_image_1' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'mission_image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'mission_image_3' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            // Team
            'team_label' => 'nullable|string|max:255',
            'team_title' => 'nullable|string|max:500',
            'team_button_text' => 'nullable|string|max:255',
            'team_button_link' => 'nullable|string|max:255',
            // Clients
            'clients_text' => 'nullable|string',
        ]);

        $setting = AboutUsSetting::first();

        // Handle hero images
        $imageFields = [
            'hero_image_left',
            'hero_image_center',
            'hero_image_right',
            'mission_image_1',
            'mission_image_2',
            'mission_image_3',
        ];

        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                // Delete old image
                if ($setting && $setting->$field) {
                    Storage::disk('public')->delete($setting->$field);
                }
                $validated[$field] = $request->file($field)->store('about-us', 'public');
            } else {
                unset($validated[$field]);
            }
        }

        if ($setting) {
            $setting->update($validated);
        } else {
            AboutUsSetting::create($validated);
        }

        return redirect()->route('cms.about-us.index')
            ->with('success', 'Pengaturan About Us berhasil diperbarui!');
    }

    // ========== TEAM MEMBERS ==========

    public function create()
    {
        return view('cms.about-us.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'background_color' => 'nullable|string|max:20',
            'link' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('about-us/team', 'public');
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? 0;
        $validated['background_color'] = $validated['background_color'] ?? '#D4A78A';

        AboutUsTeamMember::create($validated);

        return redirect()->route('cms.about-us.index')
            ->with('success', 'Team member berhasil ditambahkan!');
    }

    public function edit(AboutUsTeamMember $member)
    {
        return view('cms.about-us.edit', compact('member'));
    }

    public function update(Request $request, AboutUsTeamMember $member)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'background_color' => 'nullable|string|max:20',
            'link' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            if ($member->image) {
                Storage::disk('public')->delete($member->image);
            }
            $validated['image'] = $request->file('image')->store('about-us/team', 'public');
        }

        $validated['is_active'] = $request->has('is_active');

        $member->update($validated);

        return redirect()->route('cms.about-us.index')
            ->with('success', 'Team member berhasil diperbarui!');
    }

    public function destroy(AboutUsTeamMember $member)
    {
        if ($member->image) {
            Storage::disk('public')->delete($member->image);
        }

        $member->delete();

        return redirect()->route('cms.about-us.index')
            ->with('success', 'Team member berhasil dihapus!');
    }

    // ========== CLIENT LOGOS ==========

    public function createLogo()
    {
        return view('cms.about-us.create-logo');
    }

    public function storeLogo(Request $request)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            'link' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('about-us/logos', 'public');
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? 0;

        AboutUsClientLogo::create($validated);

        return redirect()->route('cms.about-us.index')
            ->with('success', 'Client logo berhasil ditambahkan!');
    }

    public function editLogo(AboutUsClientLogo $logo)
    {
        return view('cms.about-us.edit-logo', compact('logo'));
    }

    public function updateLogo(Request $request, AboutUsClientLogo $logo)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            'link' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            if ($logo->image) {
                Storage::disk('public')->delete($logo->image);
            }
            $validated['image'] = $request->file('image')->store('about-us/logos', 'public');
        }

        $validated['is_active'] = $request->has('is_active');

        $logo->update($validated);

        return redirect()->route('cms.about-us.index')
            ->with('success', 'Client logo berhasil diperbarui!');
    }

    public function destroyLogo(AboutUsClientLogo $logo)
    {
        if ($logo->image) {
            Storage::disk('public')->delete($logo->image);
        }

        $logo->delete();

        return redirect()->route('cms.about-us.index')
            ->with('success', 'Client logo berhasil dihapus!');
    }
}
