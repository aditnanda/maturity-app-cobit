<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    

    //add data layanan
    public function create(Request $request)
    {
        \App\Service::create($request->all());
        // return $request->all();
        return redirect('/service-list');
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
        $service= \App\Service::find($id);
        $service->update($request->all());
        // return redirect('/service-list');
        $data['service']= \App\Service::get();
        return view('pages.service_list', $data)->withStatus(__('Data Layanan telah di update.'));
    }

    public function delete($id_list)
    {
        $service= \App\Service::find($id_list);
        $service->delete();
        return redirect('/service-list');
    }
}
