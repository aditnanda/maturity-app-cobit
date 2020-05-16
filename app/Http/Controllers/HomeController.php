<?php

namespace App\Http\Controllers;
use App\Dokumen;
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
        $dokumen = Dokumen::all()->groupBy('nama_proses');
        // dd($dokumen);
        return view('dashboard');
    }
}
