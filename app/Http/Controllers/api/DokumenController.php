<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dokumen;

class DokumenController extends Controller
{
    public function index()
    {
        return response()->json(Dokumen::get(), 200);
    }
    
}
