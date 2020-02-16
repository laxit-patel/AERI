<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tests;
use DB;

class LabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Tests $model)
    {
        $inward = DB::select("select inward_id,name, id, inward_status, test_iscode, inward_report_date, test_duration,  inward_test, test_id, test_name, test_material, material_id, material_name from inwards i inner join tests t on i.inward_test = t.test_id inner join materials m on t.test_material = m.material_id inner join users u on u.id = i.inward_assign_to where i.inward_status = 'Enlisted'");
        $record = DB::table('records')
                        ->join('tests','record_test','=','tests.test_id')
                        ->join('materials','material_id','=','tests.test_material')
                        ->leftJoin('users','record_assign_to','=','users.id')
                        ->get(); 
        return view('lab', compact('record'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    
    public function perform($record_id)
    {
        //$tests = DB::select("select * from tests where test_id = '{$test_id}' ");
        //$tests = DB::table('tests')->where('test_id',$test_id)->get();
       
        //$data = DB::select("select inward_id, inward_status, inward_phase_one, inward_phase_two, inward_phase_three, inward_phase_four, test_iscode, inward_report_date, test_duration, test_worksheet, inward_test, test_id, test_name, test_material, material_id, material_name from inwards i inner join tests t on i.inward_test = t.test_id inner join materials m on t.test_material = m.material_id where inward_id = '{$inward_id}'");
        //$tests = $data[0];
        $record = DB::table('records')
                        ->join('tests','record_test','=','tests.test_id')
                        ->join('materials','material_id','=','tests.test_material')
                        ->leftJoin('users','record_assign_to','=','users.id')
                        ->where('record_id',$record_id)->get();
                        
        return view('lab.perform', ['records'=>$record]);
    }
}