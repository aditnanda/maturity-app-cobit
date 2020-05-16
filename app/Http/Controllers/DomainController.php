<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Domain;

class DomainController extends Controller
{
    public function index()
    {
        $data['domain'] = \App\Domain::orderBy('id', 'desc')->paginate(5); 
        return view('pages.subDomain',$data);
    }

    public function create(Request $request)
    {
        \App\Domain::create($request->all());
        return redirect('/domain');
    }

    public function edit($id)
    {
        $domain = \App\Domain::find($id);
        //dd($domain);
        return view('pages.edit_domain',compact('domain'));
    }

    public function update(Request $request, $id)
    {
        $domain = \App\Domain::find($id);
        $domain->update($request->all());
        // return redirect('/service-list');
        $data['domain']= \App\Domain::get();
		return view('pages.subDomain', $data);
    }

    public function delete($id)
    {
        $domain= \App\Domain::find($id);
        $domain->delete();
        return redirect('/domain');
    }
}
