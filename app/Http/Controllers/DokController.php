<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dokumen;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class DokController extends Controller
{
    public function index()
    {
        $data['dokumen'] = \App\Dokumen::get();
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
            'nama_proses' => 'required',
            'sub_domain' => 'required',
            'no_bukti' => 'required',
            'urutan_bukti' => 'required',
            'file' => 'required|mimes:doc,docx,pdf,xls,xlsx,doc,docx,png,jpg|max:10000',
            'target_skor' => 'required'
        ]);
        
        //upload to db
        $dokumen = new Dokumen;
        $dokumen->nama_proses = $request->nama_proses;
        $dokumen->sub_domain = $request->sub_domain;
        $dokumen->no_bukti = $request->no_bukti;
        $dokumen->urutan_bukti = $request->urutan_bukti;
        $dokumen->nama_service = $request->nama_service;
        $dokumen->target_skor = $request->target_skor;
        
        //upload file sesuai nama dan menyimpan file di public folder
        $filename = $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->storeAs('dokumen', $filename);
        $dokumen->file = $filename;
        
        $dokumen->save();
        
        return redirect('dokumen');
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
            'nama_proses' => 'required',
            'sub_domain' => 'required',
            'no_bukti' => 'required',
            'urutan_bukti' => 'required',
            // 'file' => 'required|mimes:doc,docx,pdf,xls,xlsx,doc,docx,png,jpg|max:10000',
            'target_skor' => 'required'
        ]);

        $dokumen = Dokumen::findOrFail($id);

        $dokumen->nama_proses = $request->nama_proses;
        $dokumen->sub_domain = $request->sub_domain;
        $dokumen->no_bukti = $request->no_bukti;
        $dokumen->urutan_bukti = $request->urutan_bukti;
        $dokumen->nama_service = $request->nama_service;
        $dokumen->target_skor = $request->target_skor;

        if(input::hasFile('file')){
            //path dokumen
            $dok = public_path("storage/dokumen/{$dokumen->file}");
            //jika sama maka akan dihapus
            if(File::exists($dok)){
                unlink($dok);
            }
            $filename = $request->file('file')->getClientOriginalName();
            $path = $request->file('file')->storeAs('dokumen', $filename);
            $dokumen->file = $filename;
        }

        $dokumen->save();

        return redirect('dokumen');

    }

    public function delete($id)
    {

        // hapus file
        $dokumen = Dokumen::findOrFail($id);
        $dok = public_path("storage/dokumen/{$dokumen->file}");
        unlink($dok);

		// hapus data
		Dokumen::where('id',$id)->delete();
 
		return redirect()->back();
    }

    public function download($id)
    {
        $download = Dokumen::find($id);
        // return Storage::download($download->path, $download->file);
        return response()->download(public_path("storage/dokumen/{$download->file}"));
    }
}
