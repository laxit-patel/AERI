<?php

namespace App\Http\Controllers;

use DB;
use App\Invoice;
use App\Transactions;
use App\Clients;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoice = DB::table('invoices')
            ->join('inwards','invoice_inward','=','inwards.inward_id')
            ->join('clients','invoice_client','=','clients.client_id')
            ->get();
        return view('invoice',['invoices' => $invoice]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $invoice = new Invoice();
        $key = keyGen($invoice);
        $clients = Clients::all(['client_id','client_name']);
        return view('accounts/create',['key' => $key,'clients' => $clients]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaction = new Transactions();
        $transaction_key = Keygen($transaction);

        $invoice = new Invoice();
        $invoice_key = Keygen($invoice);



        DB::transaction(function () use ($request, $invoice_key, $transaction_key) {

            DB::table('invoices')->insert(
                [
                    'invoice_id' => $invoice_key,
                    'invoice_inward' => $request->invoice_inward,
                    'invoice_client' => $request->invoice_clients,
                    'invoice_amount' => $request->invoice_amount,
                    'invoice_tax' => $request->invoice_tax,
                    'invoice_total' => $request->invoice_total,
                    'invoice_type' => "GST",
                    'invoice_status' => "Unpaid",
                ]
            );

            DB::table('transactions')->insert(
                [
                    'transaction_id' => $transaction_key,
                    'transaction_invoice' => $invoice_key,
                    'transaction_client' => $request->invoice_clients,
                    'transaction_type' => "Debit",
                    'transaction_amount' => $request->invoice_total,
                ]
            );

        });

        return redirect()->route('invoice.index')->withStatus(__('Invoice Generated'));
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

    public function getInwardsForClient(Request $request)
    {
        $inwards = DB::table('inwards')->join('clients', 'inward_client','=','clients.client_id')->get();
        return $inwards;
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
