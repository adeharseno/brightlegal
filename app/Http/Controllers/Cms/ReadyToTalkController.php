<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\ReadyToTalk;
use Illuminate\Http\Request;

class ReadyToTalkController extends Controller
{
    public function index()
    {
        $readyToTalk = ReadyToTalk::first();
        return view('cms.ready-to-talk.index', compact('readyToTalk'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',
        ]);

        $readyToTalk = ReadyToTalk::first();
        if ($readyToTalk) {
            $readyToTalk->update($validated);
        } else {
            ReadyToTalk::create($validated);
        }

        return redirect()->route('cms.ready-to-talk.index')
            ->with('success', 'Ready to Talk berhasil diperbarui!');
    }
}
