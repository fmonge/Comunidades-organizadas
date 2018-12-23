<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CatReport;
use App\SubCatReport;
use App\Report;
use App\CatEvidence;
use App\CatTransportation;
use App\CatWeapon;

class ReportController extends Controller
{
    public function __construct()
    {
        // only guests are allowed to view this
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $cat_service = CatReport::where('name', 'LIKE', 'Servicio')->get();
        $cat_security = CatReport::where('name', 'LIKE', 'Seguridad')->get();
        $categories_service = SubCatReport::where('cat_report_id', $cat_service[0]->id)->get();
        $categories_security = SubCatReport::where('cat_report_id', $cat_security[0]->id)->get();
        return view('report.create', compact('categories_service', 'categories_security'));
    }

    public function show($id)
    {
        $report = Report::find($id);
        if ($report->news == 1)
        {
            return view('report.news.show', compact('report'));
        }else if ($report->subCatReport->CatReport->name == 'Seguridad')
        {
            return view('report.security.show', compact('report'));
        }else if ($report->subCatReport->CatReport->name == 'Servicio')
        {
            return view('report.service.show', compact('report'));
        }else
        {
            // 
        }
    }

    public function edit($id)
    {
        $report = Report::find($id);
        $community_groups = CommunityGroup::all();

        $cat_evidence = CatEvidence::get();
        $states = State::get();

        $dt = new DateTime("now", new DateTimeZone('America/Costa_Rica'));
        $date = $dt->format('Y-m-d');
        $time = $dt->format('H:i:s');
  
        if ($report->news == true)
        {
            return view('report.news.show', compact('report'));


        }else if ($report->subCatReport->CatReport->name == 'Seguridad')
        {
            $cat_security = CatReport::where('name', 'LIKE', 'Seguridad')->first();
            $categories_security = SubCatReport::where('cat_report_id', $cat_security->id)->get();        
            
            $cat_transportation = CatTransportation::get();
            $cat_weapon = CatWeapon::get();

            return view('report.security.edit', compact('report', 'categories_security', 'cat_evidence', 'cat_transportation', 'cat_weapon', 'date', 'time', 'community_groups', 'states'));


        }else if ($report->subCatReport->CatReport->name == 'Servicio')
        {
            $cat_service = CatReport::where('name', 'LIKE', 'Servicio')->first();
            $categories_service = SubCatReport::where('cat_report_id', $cat_service->id)->get();

            return view('report.service.edit', compact('report', 'categories_service', 'cat_evidence', 'date', 'time', 'community_groups', 'states'));
        }else
        {
            // 
        }
    }
}
