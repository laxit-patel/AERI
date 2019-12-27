<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inwards;
use DB;


class InwardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Inwards $model)
    {
        return view('inward', ['inwards' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Inwards $models)
    {
        $inward = new Inwards;
        $reference = reference($inward);
        $key = keyGen($inward);
        $clients = DB::table('clients')->pluck('client_name', 'client_id');
        $materials = DB::table('materials')->pluck('material_name', 'material_id');
        $tests = DB::table('tests')->pluck('test_name', 'test_material');
        dd($tests->all());
        return view('inward.create', compact('clients','materials', 'tests', 'reference','key'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'inward_id' => "required|unique:inwards,inward_reference"
        ]);

        $inward = new Inwards;

        $inward->inward_id = Keygen($inward);
        $inward->inward_reference = $request->inward_id;
        $inward->inward_client = $request->inward_client;
        $inward->inward_material = $request->inward_material;
        $inward->inward_test = $request->inward_test;
        $inward->inward_date = $request->inward_date;
        $inward->inward_due_date = $request->inward_due_date;

        $inward->save();

        return redirect()->route('inward.index')->withStatus(__('Inward Registered.'));

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
