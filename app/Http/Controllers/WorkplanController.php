<?php
// app/Http/Controllers/WorkplanController.php
namespace App\Http\Controllers;

use App\Models\Workplan;
use App\Models\Objective;
use Illuminate\Http\Request;

class WorkplanController extends Controller
{
    public function index()
    {
        $workplans = Workplan::with('objective')->get();
        return view('workplans.index', compact('workplans'));
    }

    public function create()
    {
        $objectives = Objective::all();
        return view('workplans.create', compact('objectives'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'objective_id' => 'required|exists:objectives,id',
            'department' => 'required|string|max:255',
            'activity' => 'required|string|max:255',
            'quarter' => 'required|string|max:2',
            'due_date' => 'required|date',
            'budget' => 'nullable|numeric|min:0',
        ]);

        Workplan::create($request->all());
        return redirect()->route('workplans.index')->with('success', 'Workplan created successfully.');
    }

    public function edit(Workplan $workplan)
    {
        $objectives = Objective::all();
        return view('workplans.edit', compact('workplan', 'objectives'));
    }

    public function update(Request $request, Workplan $workplan)
    {
        $request->validate([
            'objective_id' => 'required|exists:objectives,id',
            'department' => 'required|string|max:255',
            'activity' => 'required|string|max:255',
            'quarter' => 'required|string|max:2',
            'due_date' => 'required|date',
            'budget' => 'nullable|numeric|min:0',
        ]);

        $workplan->update($request->all());
        return redirect()->route('workplans.index')->with('success', 'Workplan updated successfully.');
    }

    public function destroy(Workplan $workplan)
    {
        $workplan->delete();
        return redirect()->route('workplans.index')->with('success', 'Workplan deleted successfully.');
    }
}
