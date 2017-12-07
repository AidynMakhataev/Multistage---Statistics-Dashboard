<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\SmmReport;
use Illuminate\Http\Request;

class SmmReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $smmreports = SmmReport::where('start', 'LIKE', "%$keyword%")
                ->orWhere('end', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $smmreports = SmmReport::paginate($perPage);
        }

        return view('admin.smm-reports.index', compact('smmreports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.smm-reports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $country_report = json_decode($request->country_report, true);
        $smm_overview = json_decode($request->smm_overview, true);
        $people_overview = json_decode($request->people_overview, true);

        SmmReport::create([
            'project_id' => $request->project_id,
            'start' => $request->start,
            'end' => $request->end,
            'smm_overview' => $smm_overview,
            'people_overview' => $people_overview,
            'country_report' => $country_report
        ]);


        return redirect('admin/smm-reports')->with('flash_message', 'SmmReport added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $smmreport = SmmReport::findOrFail($id);

        return view('admin.smm-reports.show', compact('smmreport'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $smmreport = SmmReport::findOrFail($id);

        return view('admin.smm-reports.edit', compact('smmreport'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $smmreport = SmmReport::findOrFail($id);

        $country_report = json_decode($request->country_report, true);
        $smm_overview = json_decode($request->smm_overview, true);
        $people_overview = json_decode($request->people_overview, true);

        $smmreport->update([
            'project_id' => $request->project_id,
            'start' => $request->start,
            'end' => $request->end,
            'actions_overview' => $smm_overview,
            'people_overview' => $people_overview,
            'country_report' => $country_report
        ]);

        return redirect('admin/smm-reports')->with('flash_message', 'SmmReport updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        SmmReport::destroy($id);

        return redirect('admin/smm-reports')->with('flash_message', 'SmmReport deleted!');
    }
}
