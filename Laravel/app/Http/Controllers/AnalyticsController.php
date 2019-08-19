<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;
use App\Package;
use Illuminate\Support\Facades\Auth;
use PDF;
use Lavacharts;

class AnalyticsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex() {

        $projects = Project::select('*')
        ->where('projects.user_id', '=', Auth::id())
        
        ->get();

        
        foreach($projects as $project){
            $total = 0;
            foreach($project->sponsors as $sponsor) {
                $total = $total + $sponsor->fundings->credit_amount;
            }
            $project->total = $total;
        }

        $lava = new Lavacharts;
        $pieChart = $lava->DataTable();

        $pieChart->addNumberColumn($total)
        ->addNumberColumn($project->credit_goal);
        
        $lava->PieChart('Resourced', $pieChart, [
            'title'  => 'Resourced',
            'is3D'   => true,
            'slices' => [
                ['offset' => 0.2],
                ['offset' => 0.25],
                ['offset' => 0.3]
            ]     
        ]);      
        
        
        $data = \Lava::DataTable();
        $data->addDateColumn('Day of Month')
                    ->addNumberColumn('Projected')
                    ->addNumberColumn('Official');
        
        return view('pages.analytics', ['projects' => $projects]);
    }

    public function DownloadPDF($id) {
        $project = Project::findOrFail($id);

        $pdf = PDF::loadView('pdf.pdf', compact('project'));
        return $pdf->download('project' . $project->id . '.pdf');
    }

    public function ShowPDF($id) {
        $project = Project::findOrFail($id);

        return view('pdf.pdf', ['project' => $project]);
    }
}
