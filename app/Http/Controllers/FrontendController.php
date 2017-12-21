<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{

    public function home ()
    {
        if(Auth::check()) {
            $user = Auth::user();
            
            if($user->hasRole('admin')) {
                return redirect('/admin/user');
            } else {
                if($user->can('view-digital-report')) {
                    return redirect('/digital');
                } else if($user->can('view-smm-report')) {
                    return redirect('/smm');
                } else {
                    Auth::logout();
                    abort(404);
                }
            }
        } else {
            return redirect('/login');
        }
    }

    public function digital ()
    {
        $user = Auth::user();

        $project = $user->project;

        $report = $project->digital_reports()->orderBy('id','DESC')->first();
        $reportPeriods = $project->digital_reports()->where('id','!=',$report->id)->select('id','start', 'end')->get();

        $actionsOverview = collect($report->actions_overview);
        $peopleOverview = collect($report->people_overview);
        $countryReport = $report->country_report;

        return view('dashboard.digital', compact('project', 'actionsOverview', 'peopleOverview', 'countryReport','report', 'reportPeriods'));
    }

    public function getDigitalPeriod ($id)
    {
        $user = Auth::user();

        $project = $user->project;

        $report = $project->digital_reports()->find($id);
        $reportPeriods = $project->digital_reports()->where('id', '!=', $id)->select('id', 'start', 'end')->get();

        $actionsOverview = collect($report->actions_overview);
        $peopleOverview = collect($report->people_overview);
        $countryReport = $report->country_report;

        return view('dashboard.digital', compact('project', 'actionsOverview', 'peopleOverview', 'countryReport','report', 'reportPeriods'));
    }

    public function smm ()
    {
        $user = Auth::user();

        $project = $user->project;

        $report = $project->smm_reports()->orderBy('id','DESC')->firstOrFail();
        $reportPeriods = $project->smm_reports()->where('id','!=',$report->id)->select('id','start', 'end')->get();

        $smmOverview = collect($report->smm_overview);
        $peopleOverview = collect($report->people_overview);
        $countryReport = $report->country_report;

        return view('dashboard.smm', compact('project', 'smmOverview', 'peopleOverview', 'countryReport','report', 'reportPeriods'));
    }

    public function getSmmPeriod ($id)
    {
        $user = Auth::user();

        $project = $user->project;

        $report = $project->smm_reports()->find($id);
        $reportPeriods = $project->smm_reports()->where('id', '!=', $id)->select('id', 'start', 'end')->get();

        $smmOverview = collect($report->smm_overview);
        $peopleOverview = collect($report->people_overview);
        $countryReport = $report->country_report;

        return view('dashboard.smm', compact('project', 'smmOverview', 'peopleOverview', 'countryReport','report', 'reportPeriods'));
    }


}
