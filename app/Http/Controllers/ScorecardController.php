<?php
// app/Http/Controllers/ScorecardController.php
namespace App\Http\Controllers;

use App\Models\Scorecard;
use App\Models\Workplan;
use Illuminate\Http\Request;

class ScorecardController extends Controller
{
    /**
     * Display a listing of the scorecards.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $scorecards = Scorecard::with('workplan')->get();
        return view('scorecards.index', compact('scorecards'));
    }

    /**
     * Show the form for creating a new scorecard.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $workplans = Workplan::all();
        return view('scorecards.create', compact('workplans'));
    }

    /**
     * Store a newly created scorecard in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'workplan_id' => 'required|exists:workplans,id',
            'activity_name' => 'required|string|max:255',
            'progress_q1' => 'required|integer|min:0|max:100',
            'progress_q2' => 'required|integer|min:0|max:100',
            'progress_q3' => 'required|integer|min:0|max:100',
            'progress_q4' => 'required|integer|min:0|max:100',
            'budgeted_amount' => 'required|numeric|min:0',
            'actual_spent' => 'nullable|numeric|min:0',
            'source_of_funds' => 'required|string|max:255',
            'comments' => 'nullable|string',
        ]);

        Scorecard::create($request->all());
        return redirect()->route('scorecards.index')->with('success', 'Scorecard created successfully.');
    }

    /**
     * Show the form for editing the specified scorecard.
     *
     * @param  \App\Models\Scorecard  $scorecard
     * @return \Illuminate\View\View
     */
    public function edit(Scorecard $scorecard)
    {
        $workplans = Workplan::all();
        return view('scorecards.edit', compact('scorecard', 'workplans'));
    }

    /**
     * Update the specified scorecard in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Scorecard  $scorecard
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Scorecard $scorecard)
    {
        $request->validate([
            'workplan_id' => 'required|exists:workplans,id',
            'activity_name' => 'required|string|max:255',
            'progress_q1' => 'required|integer|min:0|max:100',
            'progress_q2' => 'required|integer|min:0|max:100',
            'progress_q3' => 'required|integer|min:0|max:100',
            'progress_q4' => 'required|integer|min:0|max:100',
            'budgeted_amount' => 'required|numeric|min:0',
            'actual_spent' => 'nullable|numeric|min:0',
            'source_of_funds' => 'required|string|max:255',
            'comments' => 'nullable|string',
        ]);

        $scorecard->update($request->all());
        return redirect()->route('scorecards.index')->with('success', 'Scorecard updated successfully.');
    }

    /**
     * Remove the specified scorecard from storage.
     *
     * @param  \App\Models\Scorecard  $scorecard
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Scorecard $scorecard)
    {
        $scorecard->delete();
        return redirect()->route('scorecards.index')->with('success', 'Scorecard deleted successfully.');
    }
}
