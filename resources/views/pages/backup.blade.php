@extends('layouts.app', ['activePage' => 'backup', 'titlePage' => __('Backup')])

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
            <div class="row">
              <div class="col-xs-10 col-md-8">
                <h4 class="card-title ">Backup Data </h4>
              </div>
            </div>
           
          </div>
          <!-- <div class="col-6"></div> -->
          @if (session('status'))
                  <div class="row">
                    <div class="col-sm-10">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
            
                <div class="col-xs-0 col-md-2">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                  Buat Backup
                </button>
              </div>
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary text-center">
                  <th>
                    File
                  </th>
                  <th>
                    Ukuran
                  </th>
                  <th>
                    Tanggal
                  </th>
                  <th>
                    Aksi
                  </th>
                </thead>
                <tbody  class="text-center">
                  <th>
                    <!-- <a href="" rel="tooltip" data-placement="right" title="Download Dokumen"><i class="material-icons">save_alt</i></a> -->
                  </th>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection