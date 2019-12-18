<?php

namespace App\Http\Controllers;

use App\Materials;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Materials $model)
    {
        return view('materials', ['materials' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $material = new Materials;
        $reference = reference($material);
        return view('material.create', ['reference' => $reference]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $material = new Materials;

        $request->validate([
            'material_id' => "required|unique:materials,material_reference",
            'material_worksheet_format' => 'required | file | mimes:xls,xlsx,xltx',
            'material_report_format' => 'required | file | mimes:xls,xlsx,xlxt',
        ]);
        
        $material->material_id = keyGen($material);
        $material->material_name = $request->material_name;
        $material->material_reference = $request->material_id;
        $material->material_worksheet = $request->material_worksheet_format;
        $material->material_report = $request->material_report_format;

        $material_name = $request->material_name;
        $material_id = $request->material_id;
        
        $worksheet_filename = "worksheet_".$material_name."_".$material_id.".xltx";
        $report_filename = "report_".$material_name."_".$material_id.".xltx";
        
        $request->file('material_worksheet_format')->storeAs("Material_Worksheet_Formats", $worksheet_filename );
        $request->file('material_report_format')->storeAs("Material_Report_Formats", $report_filename );

        $material->save();
        return redirect()->route('material.index')->withStatus(__('Material Added successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
