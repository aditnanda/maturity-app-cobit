@extends('layouts.app', ['activePage' => 'editDok', 'titlePage' => __('Edit Dokumen Bukti')])

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
              <h4 class="card-title ">Tambah Dokumen Bukti</h4>
              <p class="card-category"> Here is a subtitle for this table</p>
            </div>
          </div>
        
        <div class= "col-lg-12">
        <div class="card-body">
            <div class="table-responsive">
                @if(count($errors) > 0)
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    @foreach ($errors->all() as $error)
                      {{ $error }} <br/>
                    @endforeach
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif

                <form action="{{url('/dok')}}/{{$dokumen->id}}/update" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    @method('post')
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Proses</label>
                        <input name="nama_proses" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan nama proses (domain).." value="{{$dokumen->nama_proses}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Sub Domain Proses</label>
                        <input name="sub_domain" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan nomor sub Domain Proses" value="{{$dokumen->sub_domain}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nomor Bukti</label>
                        <input name="no_bukti" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan nomor bukti dokumen.." value="{{$dokumen->no_bukti}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nomor Urutan Bukti</label>
                        <input name="urutan_bukti" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan urutan dari nomor bukti dokumen.." value="{{$dokumen->urutan_bukti}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Target Skor</label>
                        <input name="target_skor" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Target Skor Asessmen.." value="{{$dokumen->target_skor}}">
                    </div>
                    <div class="form-group form-file-upload form-file-multiple">
                        <input type="file" name="file" multiple="" class="inputFileHidden" value="{{$dokumen->file}}">
                        <div class="input-group">
                            <input type="text" class="form-control inputFileVisible" placeholder="Masukkan Bukti Dokumen" value="{{$dokumen->file}}">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-fab btn-round btn-primary">
                                    <i class="material-icons">attach_file</i>
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Layanan</label>
                        <input name="nama_service" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Layanan terkait.." value="{{$dokumen->nama_service}}">
                    </div>
                    <div class="modal-footer">
                        <a href="/dokumen" type="button" class="btn btn-secondary">Cancel</a>
                        <button type="Add" class="btn btn-primary">Update Data</button>
                    </div>
                </form>  
            </div>
          </div>
        </div>
        </div>
        
      </div>
    </div>
  </div>
</div>
@endsection