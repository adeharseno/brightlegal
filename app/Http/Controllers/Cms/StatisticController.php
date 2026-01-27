<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Statistic;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index()
    {
        $statistics = Statistic::ordered()->paginate(10);
        return view('cms.statistics.index', compact('statistics'));
    }

    public function create()
    {
        return view('cms.statistics.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'angka' => 'required|string|max:255',
            'description' => 'required|string',
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? 0;

        Statistic::create($validated);

        return redirect()->route('cms.statistics.index')
            ->with('success', 'Statistik berhasil ditambahkan!');
    }

    public function edit(Statistic $statistic)
    {
        return view('cms.statistics.edit', compact('statistic'));
    }

    public function update(Request $request, Statistic $statistic)
    {
        $validated = $request->validate([
            'angka' => 'required|string|max:255',
            'description' => 'required|string',
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $statistic->update($validated);

        return redirect()->route('cms.statistics.index')
            ->with('success', 'Statistik berhasil diperbarui!');
    }

    public function destroy(Statistic $statistic)
    {
        $statistic->delete();

        return redirect()->route('cms.statistics.index')
            ->with('success', 'Statistik berhasil dihapus!');
    }
}
