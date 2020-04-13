@extends('layouts.app', ['activePage' => 'dokumen', 'titlePage' => __('Data Dokumen')])

@section('content')

<!-- <div class="alert alert-info" role="alert">
  Sucess!
</div> -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <div class="col-6">
              <h4 class="card-title ">Data Dokumen</h4>
              <p class="card-category"> Upload data dokumen sesuai dengan urutan nomor bukti</p>
            </div>
          </div> 
          
          <div class="card-body">
            @if(Auth::user()->role == 'user' )
            <div class="row">
              <div class="col-12 text-right">
                <a href="dok/upload" class="btn btn-sm btn-primary">{{ __('Tambah Dokumen Bukti') }}</a>
              </div>
            </div>
            @endif
            @if(Auth::user()->role == 'admin' )
            <div class="row">
              <div class="col-12 text-right">
                <a href="skor/create" class="btn btn-sm btn-primary">{{ __('Input Skor') }}</a>
              </div>
            </div>
            @endif
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    Proses
                  </th>
                  <th>
                    Kode Bukti
                  </th>
                  <th>
                    Layanan
                  </th>
                  <th>
                    Target Skor
                  </th>
                  <th>
                    Skor Assessment
                  </th>
                  <th>
                    Aksi
                  </th>
                </thead>
                @foreach($dokumen as $dokumen)
                <tbody>
                  <th>{{$dokumen->nama_proses}}{{$dokumen->sub_domain}}</th>
                  <th>{{$dokumen->nama_proses}}{{$dokumen->sub_domain}}-{{$dokumen->no_bukti}}-{{$dokumen->urutan_bukti}}</th>
                  <th>{{$dokumen->nama_service}}</th>
                  <th>{{$dokumen->target_skor}}</th>
                  <th></th>

                  @if(Auth::user()->role == 'user' )
                  <th><a href="/dok/{{$dokumen->id}}/edit" class="btn btn-info btn-sm">Edit</a>
                  <a href="/dok/{{$dokumen->id}}/delete" class="btn btn-danger btn-sm">Delete</a>
                  </th>
                  @endif

                  @if(Auth::user()->role == 'admin' )
                  <th><a href="" class="btn btn-info btn-sm">Edit</a>
                  <a href="" class="btn btn-danger btn-sm">Delete</a>
                  </th>
                  @endif
                </tbody>
                @endforeach
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection