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
              <h4 class="card-title ">Edit Data</h4>
              <p class="card-category"> Here is a subtitle for this table</p>
            </div>
          </div>
        
        <div class= "col-lg-12">
        <div class="card-body">
            <div class="table-responsive">
                <form action="" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Skor Assessment</label>
                        <input name="" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Skor Assessmen...">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Rekomendasi</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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