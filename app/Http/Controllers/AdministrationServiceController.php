<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubCatReport;
use App\CatReport;

class AdministrationServiceController extends Controller
{

    public function __construct()
    {
        
        // only administrators are allowed to view this
        $this->middleware('admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat_service = CatReport::where('name', 'LIKE', 'Servicio')->get();
        $categories_service = SubCatReport::where('cat_report_id', $cat_service[0]->id)->get();

        return view('administration.service.index', compact('categories_service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administration.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255|unique:sub_cat_report,name',
            'file' => 'max:2048'
        ]);

        $filename = NULL;
        if ($request->has('file') ? true: false)
        {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename =time().'.'.$extension;
            $file->move('plugins/images/icons/', $filename);
        }

        $cat_report = CatReport::where('name', 'Servicio')->first();

        SubCatReport::create([
            'cat_report_id' => $cat_report->id,
            'name' => $request['name'],
            'active' => ($request['active'] ? true : false),
            'multimedia_path' => $filename
        ]);

        session()->flash('message', 'Tipo de reporte de servicio creado');

        return redirect('/administracion/servicio');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  SubCatReport $subCatReport
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCatReport $subCatReport)
    {
        return view('administration.service.edit', compact('subCatReport'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCatReport $subCatReport)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255|unique:sub_cat_report,name,'.$subCatReport->id,
            'file' => 'max:2048'
        ]);

        if ($request->has('file') ? true: false)
        {
            if ($subCatReport->multimedia_path != '')
            {
                // File::delete('public/image/users/'.$user->avatar_path);
                $path = public_path() . '/plugins/images/icons/' . $subCatReport->multimedia_path;
                if(file_exists($path)) {
                    unlink($path);
                }
            }

            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename =time().'.'.$extension;
            $file->move('plugins/images/icons/', $filename);

            $subCatReport->multimedia_path = $filename;
        }

        $subCatReport->name = $request['name'];
        $subCatReport->active = ($request['active'] ? true : false);

        $subCatReport->save();

        session()->flash('message', 'Tipo de reporte de servicio actualizado');
        return redirect('/administracion/servicio');
        
    }

    public function toggle(SubCatReport $subCatReport)
    {
        request()->has('active') ? $subCatReport->activate() : $subCatReport->deactivate();
        
        return back();
    }
}
