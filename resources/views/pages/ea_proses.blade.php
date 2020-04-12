@extends('layouts.app', ['activePage' => 'proses', 'titlePage' => __('EA Process')])

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
              <h4 class="card-title ">EA Process</h4>
              <p class="card-category"> Upload Proses dan Dokumen Harus Berurutan!</p>
            </div>
          </div>
          <!-- <div class="col-6"></div> -->
          <div class="col-9"></div>
          <div>
              <!-- Button trigger modal -->
              <div class="col-sm-12 text-right">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                  Add Proses
                </button>
              </div>
              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form>
                        {{csrf_field()}}
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nama Proses</label>
                          <select name="" class="form-control" id="exampleFormControlSelect1" title="">
                            @foreach ($domainname_array as $data)                                       
                                <option value="{{ $data->id }}"  >{{$data->nama_domain}} - {{$data->keterangan}}</option>                                                      
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nomor Bukti</label>
                          <input  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Layanan IT Terkait</label>
                          <!-- <input  type="text" class="form-control" id="exampleInputPassword1" placeholder=""> -->
                          <select name="" class="form-control" id="exampleFormControlSelect1">
                            @foreach ($servicename_array as $data)                                       
                                <option value="{{ $data->id }}"  >{{$data->nama_service}}</option>                                                      
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Target Skor</label>
                          <input  type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Dokumen Bukti</label>
                          <!-- <input  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=""> -->
                          <input type="file" name="nama" value="">
                        </div> 
                    </div>
                    <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="Add" class="btn btn-primary">Add Data</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    Proses 
                  </th>
                  <th>
                    Nomor Bukti
                  </th>
                  <th>
                    Dokumen
                  </th>
                  <th>
                    Layanan
                  </th>
                  <th>
                    Target 
                  </th>
                  <th>
                    Score Asessment 
                  </th>
                  <th>
                    Aksi 
                  </th>
                </thead>
              
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection