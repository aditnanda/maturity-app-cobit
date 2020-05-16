@extends('layouts.app', ['activePage' => 'editskor', 'titlePage' => __('Edit Skor')])

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
              <h4 class="card-title ">Edit Skor Assessment</h4>
              <p class="card-category"> Here is a subtitle for this table</p>
            </div>
          </div>
        
        <div class= "col-lg-12">
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{url('/dok')}}/{{$dokumen->id}}/skor" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Bukti</label>
                        <input name="kode_bukti" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
                        value="{{$dokumen->nama_proses}}{{$dokumen->sub_domain}}-{{$dokumen->no_bukti}}-{{$dokumen->urutan_bukti}}" disabled="disabled">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Skor Assessment</label>
                        <input name="skor_maturity" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Skor Assessmen..."
                        value = "{{$dokumen->skor_maturity}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Rekomendasi</label>
                        <textarea class="form-control" name="rekom" id="exampleFormControlTextarea1" rows="3" > <?php echo $dokumen->rekom ?></textarea>
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