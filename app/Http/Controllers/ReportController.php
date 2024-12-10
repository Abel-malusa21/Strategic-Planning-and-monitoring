<?php

// app/Http/Controllers/ReportController.php
namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::all();
        return view('reports.index', compact('reports'));
    }

    public function create()
    {
        return view('reports.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'department' => 'required|string|max:255',
            'summary' => 'required|string',
            'type' => 'required|in:weekly,monthly,quarterly,annually',
            'report_date' => 'required|date',
        ]);

        Report::create($request->all());
        return redirect()->route('reports.index')->with('success', 'Report created successfully.');
    }

    public function edit(Report $report)
    {
        return view('reports.edit', compact('report'));
    }

    public function update(Request $request, Report $report)
    {
        $request->validate([
            'department' => 'required|string|max:255',
            'summary' => 'required|string',
            'type' => 'required|in:weekly,monthly,quarterly,annually',
            'report_date' => 'required|date',
        ]);

        $report->update($request->all());
        return redirect()->route('reports.index')->with('success', 'Report updated successfully.');
    }

    public function destroy(Report $report)
    {
        $report->delete();
        return redirect()->route('reports.index')->with('success', 'Report deleted successfully.');
    }

    public function download(Report $report)
    {
        $pdf = Pdf::loadView('reports.pdf', compact('report'));
        return $pdf->download('report-' . $report->id . '.pdf');
    }
}


