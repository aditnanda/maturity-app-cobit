<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dokumen;
use App\Skor;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class DokController extends Controller
{
    public function index()
    {
        $data['dokumen'] = \App\Dokumen::paginate(5);
        return view('pages.dokumen',$data);
    }

    public function upload()
    {
        return view('pages.add_dok');
    }
    
    public function add(Request $request)
    {
   
        //validasi di form view add_dok 
        $this->validate($request, [
            // 'nama_proses' => 'required',
            // 'sub_domain' => 'required|numeric',
            // 'no_bukti' => 'required|numeric',
            // 'urutan_bukti' => 'required|numeric',
            'file' => 'required|mimes:doc,docx,pdf,xls,xlsx,doc,docx,png,jpg,jpeg|max:10000',
            'target_skor' => 'required'
        ]);
        
        //upload to db
        // $dokumen = new Dokumen;

        $dokumen = Dokumen::findOrFail($id);
        // $dokumen->nama_proses = $request->nama_proses;
        // $dokumen->sub_domain = $request->sub_domain;
        // $dokumen->no_bukti = $request->no_bukti;
        // $dokumen->urutan_bukti = $request->urutan_bukti;
        // $dokumen->nama_service = $request->nama_service;
        $dokumen->target_skor = $request->target_skor;
        
        //upload file sesuai nama dan menyimpan file di public folder
        $filename = $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->storeAs('dokumen', $filename);
        $dokumen->file = $filename;
        
        $dokumen->save();
        
        return redirect('dokumen')->withStatus(__('Data Dokumen Bukti Berhasil ditambah.'));
    }

    public function edit($id)
    {
       $dokumen = Dokumen::find($id);
       return view('pages.edit_dok', compact('dokumen'));
    }

    public function update(Request $request, $id)
    {
        //validasi di form view add_dok 
        $this->validate($request, [
            // 'nama_proses' => 'required',
            // 'sub_domain' => 'required|numeric',
            // 'no_bukti' => 'required|numeric',
            // 'urutan_bukti' => 'required|numeric',
            'file' => 'required|mimes:doc,docx,pdf,xls,xlsx,doc,docx,png,jpg|max:10000',
            'target_skor' => 'required'
        ]);

        $dokumen = Dokumen::findOrFail($id);

        // $dokumen->nama_proses = $request->nama_proses;
        // $dokumen->sub_domain = $request->sub_domain;
        // $dokumen->no_bukti = $request->no_bukti;
        // $dokumen->urutan_bukti = $request->urutan_bukti;
        // $dokumen->nama_service = $request->nama_service;
        $dokumen->target_skor = $request->target_skor;

        if(input::hasFile('file')){
            //path dokumen
            $dok = storage_path("app/public/dokumen/{$dokumen->file}");
            //jika sama maka akan dihapus
            if(File::exists($dok)){
                unlink($dok);
            }
            $filename = $request->file('file')->getClientOriginalName();
            $path = $request->file('file')->storeAs('dokumen', $filename);
            $dokumen->file = $filename;
        }

        $dokumen->save();

        return redirect('dokumen')->withStatus(__('Data Dokumen Bukti Berhasil di update.'));

    }

    public function delete($id)
    {
        // hapus file
        $dokumen = Dokumen::findOrFail($id);
        $dok = storage_path("app/public/dokumen/{$dokumen->file}");
        unlink($dok);

		// hapus data db
		Dokumen::where('id',$id)->delete();
 
		return redirect()->back()->withStatus(__('Data Dokumen Bukti telah di hapus.'));
    }

    public function download(Request $request,$id)
    {
        $download = Dokumen::find($id);
        // dd($download);
        $name = "{$download->nama_proses}{$download->sub_domain}{$download->no_bukti}{$download->urutan_bukti}"."-"."{$download->file}";
        // dd($name);
        $pathToFile = storage_path("app/public/dokumen/{$download->file}");
        // dd($pathToFile);
        //kalau ingin original name
        // return response()->download( storage_path("app/public/dokumen/{$download->file}"));
        //nama sesuai rename $name
        return response()->download($pathToFile, $name.'.'.pathinfo($pathToFile, PATHINFO_EXTENSION));
    }

    public function addskor($id)
    {
        $dokumen = Dokumen::find($id);
        // dd($dokumen);
        return view('pages.skor', compact('dokumen'));
    }

    public function skor(Request $request, $id)
    {
        $this->validate($request, [
            'skor_maturity' => 'required|numeric',
            'rekom' => 'required',
        ]);

        $dokumen = Dokumen::findOrFail($id);
        $dokumen->skor_maturity = $request->skor_maturity;
        $dokumen->rekom = $request->rekom;

        $dokumen->save();

        return redirect('dokumen')->withStatus(__('Skor Assessment Berhasil di input.'));
    }

    public function edskor($id)
    {
        $dokumen = Dokumen::find($id);
        return view('pages.edit_skor',compact('dokumen'));
    }

    public function updskor(Request $request, $id)
    {
        $this->validate($request, [
            'skor_maturity' => 'required|numeric',
            'rekom' => 'required',
        ]);

        $dokumen = Dokumen::findOrFail($id);
        $dokumen->skor_maturity = $request->skor_maturity;
        $dokumen->rekom = $request->rekom;

        $dokumen->save();

        return redirect('dokumen')->withStatus(__('Skor Assessment Berhasil di update.'));

    }

    public function searchdok(Request $request)
    {
        $cari = $request->seadok;

        $dokumen = DB::table('dokumen')->where('nama_proses', 'LIKE',  "%".$cari."%") 
                                        ->orWhere('no_bukti',  'LIKE',  "%".$cari."%")
                                        ->orWhere('target_skor',  'LIKE',  "%".$cari."%")->paginate(8);
        
        return view('pages.dokumen', compact('dokumen'));
    }
}
