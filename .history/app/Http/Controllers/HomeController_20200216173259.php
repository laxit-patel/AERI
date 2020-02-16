<?php

namespace App\Http\Controllers;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $inward_row = DB::table('records')->where('record_status','Enlisted')->count();
        $inwards = "404";
        return view('dashboard',compact('inwards'));
    }
}
