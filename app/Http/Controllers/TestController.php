<?php

namespace App\Http\Controllers;

use App\Tests;
use App\Materials;
use Illuminate\Http\Request;
use DB;

class TestController extends Controller
{
    /**
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Tests $model)
    {
        return view('test', ['tests' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materials = Materials::all(['material_id','material_name']);
        $test = new Tests;
        $key = keyGen($test);
        return view('test.create', compact('materials','key'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $test = new Tests;
        $key = keyGen($test);
        
        $request->validate([
            'test_worksheet' => 'required | file | mimes:xls,xlsx,xltx,pdf',
            'test_report' => 'required | file | mimes:xls,xlsx,docx,xltx,pdf',
        ]);
        
        $worksheet_filename = "worksheet_".$key.".".$request->file("test_worksheet")->getClientOriginalExtension();
        $worksheet_directory = 'test_worksheets';
        $worksheet_file = $request->file('test_worksheet')->storeAs($worksheet_directory, $worksheet_filename );
        $worksheet_path = storage_path("app/".$worksheet_directory."/".$worksheet_filename);
            
        $report_filename = "report_".$key.".".$request->file("test_report")->getClientOriginalExtension();
        $report_directory = 'test_reports';
        $report_file = $request->file('test_report')->storeAs($report_directory, $report_filename );
        $report_path = storage_path("app/".$report_directory."/".$report_filename);
        
        $test->test_id = $key;
        $test->test_iscode = $request->test_iscode;
        $test->test_name = $request->test_name;
        $test->test_material = $request->test_material;
        $test_duration = $request->test_duration;
        $test->test_duration = $test_duration;
        $test->test_worksheet = $worksheet_path;
        $test->test_report = $report_path;
        $test->test_rate = $request->test_rate;
        $test->test_rate_mes = $request->test_rate_mes;
        $test->save();

        return redirect()->route('test.index')->withStatus(__('Test Added successfully.'));

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

    public function ajax($id)
    {
        $data = DB::select("select material_id, material_name, test_id, test_name, test_rate from materials m inner join tests t on m.material_id = t.test_material where test_id =  '" .$id. "' ");
        return $data;
    }

    public function phase(Request $request)
    {
        $count = Tests::where('test_id',$request->test_id)->update(
            array(
                $request->phase => 1
            )
        );     
        return $count;
    }
}
