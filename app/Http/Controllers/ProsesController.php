<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProsesController extends Controller
{
    public function index()
    {
        return view('pages.ea_proses');
    }
}
