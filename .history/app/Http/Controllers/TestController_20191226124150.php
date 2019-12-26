<?php

namespace App\Http\Controllers;

use App\Tests;
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
        $materials = DB::table('materials')->pluck('material_name', 'material_id');
        $test = new Tests;
        $reference = reference($test);
        $key = keyGen($test);
        return view('test.create', compact('materials', 'reference','key'));
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

        $request->validate([
            'test_id' => "required|unique:tests,test_reference"
        ]);

        $test->test_id = keyGen($test);
        $test->test_reference = $request->test_id;
        $test->test_name = $request->test_name;
        $test->test_material = $request->test_material;
        $test->test_duration = $request->test_duration;
        $test->test_parameters = $request->test_parameter;
        
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
}
