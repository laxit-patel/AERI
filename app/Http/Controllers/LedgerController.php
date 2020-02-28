<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class LedgerController extends Controller
{

    public function index()
    {
        $ledger = DB::table('transactions')
            ->join('clients','transaction_client','=','clients.client_id')
            ->join('invoices','transaction_invoice','=','invoices.invoice_id')
            ->where('transaction_client','=','S220_CLNT_0001')
            ->get();


        return view('accounts.ledger',['invoices' => $ledger]);
    }

}
