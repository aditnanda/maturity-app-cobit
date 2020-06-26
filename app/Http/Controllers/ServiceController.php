<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Service;
class ServiceController extends Controller
{
    

    //add data layanan
    public function create(Request $request)
    {
        $this->validate($request, [
            'nama_service' => 'required',
            'status' => 'required',
            'service_owner' => 'required'
        ]);

        $service = new Service;
        $service->nama_service = $request->nama_service;
        $service->status = $request->status;
        $service->service_owner = $request->service_owner;

        $service->save();
        return redirect('/service-list')->withStatus(__('Data Layanan berhasil ditambahkan.'));
        // ->with('sukses','sukses');
    }

    public function edit($id_list)
    {
        $service= \App\Service::find($id_list);
        return view('pages.edit_list', compact('service'));
       // dd($service);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_service' => 'required',
            'service_owner' => 'required'
        ]);

        $service = Service::findOrFail($id);
        $service->nama_service = $request->nama_service;
        $service->status = $request->status;
        $service->service_owner = $request->service_owner;

        $service->save();
        // $service= \App\Service::find($id);
        // $service->update($request->all());
        // return redirect('/service-list');
        $data['service']= Service::get();
        return redirect('/service-list')->withStatus(__('Data Layanan telah di update.'));
    }

    public function delete($id_list)
    {
        $service= \App\Service::find($id_list);
        $service->delete();
        return redirect('/service-list')->withStatus(__('Data Layanan telah dihapus.'));
    }

    public function searchserv(Request $request)
    {
        $cari = $request->seaserv;

        $service = DB::table('list_of_service')->where('nama_service', 'LIKE',  "%".$cari."%") 
                                        ->orWhere('status',  'LIKE',  "%".$cari."%")
                                        ->orWhere('service_owner',  'LIKE',  "%".$cari."%")->get();
        // dd($service);
        return view('pages.service_list',compact('service'));
    }
}
