<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inwards;
use App\Clients;
use App\Tests; 
use App\Records; 
use DB;


class InwardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$inwards_data = App\Inwards::with('tests')-get();
        $inward = DB::select("select inward_id, inward_status, inward_client, inward_report_date,inward_assign_to,name, id, inward_test, test_id, test_name, test_material, material_id, client_name, material_name from inwards i inner join clients c on i.inward_client = c.client_id inner join tests t on i.inward_test = t.test_id inner join materials m on t.test_material = m.material_id left join users u on u.id = i.inward_assign_to");
        
        $users = DB::select("select id,name from users where role ='engineer' ");
        return view('inward', ['inwards' => $inward , 'users' => $users]);
    }

    public function addTest()
    {
        $inward = new Inwards;
        $reference = reference($inward);
        $key = keyGen($inward);
        $clients = Clients::all(['client_id','client_name']);
        $tests = Tests::all(['test_name','test_material','test_id']);
        $inwards = DB::select("select inward_id, inward_status, inward_client, inward_report_date, client_name from inwards i inner join clients c on i.inward_client = c.client_id  ");
        //$inwards = Inwards::all(['inward_id','inward_client']);
        return view('inward.addTest',['inwards' => $inwards ], compact('clients','tests','reference','key'));
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
        $clients = Clients::all(['client_id','client_name']);
        $tests = Tests::all(['test_name','test_material','test_id']);
        
        return view('inward.create', compact('clients', 'tests','reference','key'));
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
            'test_qty' => 'required | numeric',
        ]);

        $inward = new Inwards;
        $record = new Records;

        $inward_key = Keygen($inward);
        $record_key = Keygen($record);

        //accumulate data for inward
        $inward->inward_id = $inward_key;
        $inward->inward_reference = $request->inward_reference; 
        $inward->inward_client = $request->inward_client;
        $inward->inward_test = $request->inward_test;
        $inward->inward_date = $request->inward_date;
        $inward->inward_report = "";
        $inward->inward_assign_to = NULL; 
        $inward->inward_description = $request->inward_description;
        $inward->inward_report_date = $request->inward_report_date;
        
        
            
        //accumulate data for records
        $record->record_id = $inward_key;
        $record->record_inward = $record_key;
        $record->record_test =  $request->inward_test;
        $record->record_price = $request->test_price;
        $record->record_qty = $request->test_qty; 
        
        

        DB::transaction(function () use ($inward, $record, $request, $inward_key, $record_key) {
            $inward->save();
            DB::table('inwards')->insert(
                [
                    'inward_id' => $inward_key,
                    'inward_reference' => $request->inward_reference,
                    'inward_client' => $request->inward_client,
                    'inward_test' => $request->inward_test,
                    'inward_date' => $request->inward_date,
                    'inward_report' => NULL,
                    'inward_assign_to' => NULL,
                    'inward_description' => $request->inward_description,
                    'inward_report_date' => $request->inward_report_date
                ]
            );
            DB::commit();
        
            $record->save();
        });

        die;
        return redirect()->route('inward.index')->withStatus(__('Inward Registered.'));

    }

    public function assign($inward,$user)
    {
        //Inwards::where('inward_id',$inward)->update('inward_assign_to',$user);
        $count = Inwards::where('inward_id',$inward)->update(
            array(
                'inward_assign_to' => $user
            )
        );
        return redirect()->route('inward.index')->withStatus(__('Task Assigned'));
    }

    public function status($inward_id)
    {
        $count = Inwards::where('inward_id',$inward_id)->update(
            array(
                'inward_status' => 'Tested'
            )
        );
        return redirect()->route('lab')->withStatus(__('Test Completed'));
    }

    public function phase(Request $request)
    {
        $count = Inwards::where('inward_id',$request->inward_id)->update(
            array(
                $request->phase => 1
            )
        );     
        return $count;
    }

    public function sendTest($inward_id)
    {
        $inward = DB::select("select inward_id, inward_test, test_id, test_name from inwards i inner join tests t on i.inward_test = t.test_id where inward_id = '$inward_id' ");
        return response()->json($inward);
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
    public function edit($inward_id)
    {
        $inward = DB::select("select inward_id, inward_test, test_id, test_name, inward_client,inward_date, inward_report_date, client_id, client_name, client_gstin, client_address, client_email, client_phone from inwards i inner join tests t on i.inward_test = t.test_id inner join clients c on c.client_id = i.inward_client where inward_id = '$inward_id' ");
        $clients = Clients::all(['client_id','client_name']);
        $tests = Tests::all(['test_name','test_material','test_id']);
        return view('inward.edit', ['inwards' => $inward], compact('clients', 'tests'));
    }

    public function addNewTest(Request $request)
    {
        $request->validate([
            
            ]);
            
        $inward = new Inwards;

        
        
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
