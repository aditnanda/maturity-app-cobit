<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Dokumen;

class HasilController extends Controller
{
    public function index()
    {
        $dokumen = Dokumen::all()->groupBy('nama_proses');
        dd($dokumen);
        return view('pages.dashboard', compact('dokumen'));
    }
}
