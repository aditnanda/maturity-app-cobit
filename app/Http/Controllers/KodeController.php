<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dokumen;
use App\Skor;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class KodeController extends Controller
{
    public function kode(Request $request)
    {
         //validasi di form view add_dok 
         $this->validate($request, [
            'nama_proses' => 'required',
            'sub_domain' => 'required|numeric',
            'no_bukti' => 'required|numeric',
            'urutan_bukti' => 'required|numeric',
        ]);

        $dokumen = new Dokumen;
        $dokumen->nama_proses = $request->nama_proses;
        $dokumen->sub_domain = $request->sub_domain;
        $dokumen->no_bukti = $request->no_bukti;
        $dokumen->urutan_bukti = $request->urutan_bukti;

        $dokumen->save();

        return redirect('/dokumen')->withStatus(__('Kode Bukti Berhasil di input.'));
    }
}
