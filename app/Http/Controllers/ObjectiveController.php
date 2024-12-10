<?php

// app/Http/Controllers/ObjectiveController.php
namespace App\Http\Controllers;

use App\Models\Objective;
use App\Models\StrategicArea;
use Illuminate\Http\Request;

class ObjectiveController extends Controller
{
    /**
     * Display a listing of the objectives.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $objectives = Objective::with('strategicArea')->get();
        return view('objectives.index', compact('objectives'));
    }

    /**
     * Show the form for creating a new objective.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $strategicAreas = StrategicArea::all();
        return view('objectives.create', compact('strategicAreas'));
    }

    /**
     * Store a newly created objective in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'strategic_area_id' => 'required|exists:strategic_areas,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        try {
            Objective::create($request->all());
            return redirect()->route('objectives.index')->with('success', 'Objective created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to create objective: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified objective.
     *
     * @param  \App\Models\Objective  $objective
     * @return \Illuminate\View\View
     */
    public function edit(Objective $objective)
    {
        $strategicAreas = StrategicArea::all();
        return view('objectives.edit', compact('objective', 'strategicAreas'));
    }

    /**
     * Update the specified objective in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Objective  $objective
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Objective $objective)
    {
        $request->validate([
            'strategic_area_id' => 'required|exists:strategic_areas,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        try {
            $objective->update($request->all());
            return redirect()->route('objectives.index')->with('success', 'Objective updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to update objective: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified objective from storage.
     *
     * @param  \App\Models\Objective  $objective
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Objective $objective)
    {
        try {
            $objective->delete();
            return redirect()->route('objectives.index')->with('success', 'Objective deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete objective: ' . $e->getMessage());
        }
    }
}
