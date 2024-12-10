<?php
// app/Http/Controllers/StrategicAreaController.php
namespace App\Http\Controllers;

use App\Models\StrategicArea;
use Illuminate\Http\Request;

class StrategicAreaController extends Controller
{
    public function index()
    {
        $strategicAreas = StrategicArea::all();
        return view('strategic-areas.index', compact('strategicAreas'));
    }

    public function create()
    {
        return view('strategic-areas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        StrategicArea::create($request->all());
        return redirect()->route('strategic-areas.index')->with('success', 'Strategic Area created successfully.');
    }

    public function show(StrategicArea $strategicArea)
    {
        return view('strategic-areas.show', compact('strategicArea'));
    }

    public function edit(StrategicArea $strategicArea)
    {
        return view('strategic-areas.edit', compact('strategicArea'));
    }

    public function update(Request $request, StrategicArea $strategicArea)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $strategicArea->update($request->all());
        return redirect()->route('strategic-areas.index')->with('success', 'Strategic Area updated successfully.');
    }

    public function destroy(StrategicArea $strategicArea)
    {
        $strategicArea->delete();
        return redirect()->route('strategic-areas.index')->with('success', 'Strategic Area deleted successfully.');
    }
}
