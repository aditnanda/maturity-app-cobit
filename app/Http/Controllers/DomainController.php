<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Domain;
use DB;
use Illuminate\Pagination\LengthAwarePaginator;

class DomainController extends Controller
{
    public function index()
    {
        $data['domain'] = Domain::orderBy('id', 'desc')->paginate(5); 
        return view('pages.subDomain',$data);
    }

    public function create(Request $request)
    {
        $this->validate($request,[
            'nama_domain' => 'required',
            'nomor_proses' =>'required',
            'keterangan' => 'required'
        ]);

        $domain = new Domain;
        $domain->nama_domain = $request->nama_domain;
        $domain->nomor_proses = $request->nomor_proses;
        $domain->keterangan = $request->keterangan;
        
        $domain->save();
        return redirect('/domain')->withStatus(__('Data Berhasil Dimasukkan.'));
    }

    public function edit($id)
    {
        $domain = Domain::find($id);
        //dd($domain);
        return view('pages.edit_domain',compact('domain'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama_domain' => 'required',
            'nomor_proses' =>'required',
            'keterangan' => 'required'
        ]);

        $domain = Domain::findOrFail($id);
        $domain->nama_domain = $request->nama_domain;
        $domain->nomor_proses = $request->nomor_proses;
        $domain->keterangan = $request->keterangan;
        
        $domain->save();
		return redirect('/domain')->withStatus(__('Data Berhasil Diupdate.'));
    }

    public function delete($id)
    {
        $domain= \App\Domain::find($id);
        $domain->delete();
        return redirect('/domain')->withStatus(__('Data Berhasil Dihapus.'));
    }

    public function searchdom(Request $request)
    {
        $cari = $request->seadom;

        $domain = DB::table('domain')->where('nama_domain', 'LIKE',  "%".$cari."%")
                                     ->orWhere('nomor_proses',  'LIKE',  "%".$cari."%")
                                     ->orWhere('keterangan',  'LIKE',  "%".$cari."%")->paginate(8);

        return view('pages.subDomain', compact('domain'));
    }
}
