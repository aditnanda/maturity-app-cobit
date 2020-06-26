@extends('layouts.app', ['activePage' => 'skor', 'titlePage' => __('Input Skor')])

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
              <h4 class="card-title ">Input Skor Assessment</h4>
              <p class="card-category"> Here is a subtitle for this table</p>
            </div>
          </div>

      
        <div class= "col-lg-12">
        @if(count($errors) > 0)
                  <div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                      </button>
                    @foreach ($errors->all() as $error)
                      {{ $error }} <br/>
                    @endforeach
                  </div>
                @endif
        
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{url('/dok')}}/{{$dokumen->id}}/skor" method="POST">
                    {{csrf_field()}}
                    <!-- <div class="form-group">
                        <label for="exampleInputEmail1">Proses</label>
                        <input name="nama_proses" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
                        value="{{$dokumen->nama_proses}}" readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">No.Proses</label>
                        <input name="sub_domain" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
                        value="{{$dokumen->sub_domain}}" readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Bukti</label>
                        <input name="kode_bukti" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
                        value="{{$dokumen->nama_proses}}{{$dokumen->sub_domain}}-{{$dokumen->no_bukti}}-{{$dokumen->urutan_bukti}}" readonly="readonly">
                    </div> -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Skor Assessment</label>
                        <input name="skor_maturity" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Skor Assessmen...">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Rekomendasi</label>
                        <textarea class="form-control" name="rekom" id="exampleFormControlTextarea1" rows="3"></textarea>
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