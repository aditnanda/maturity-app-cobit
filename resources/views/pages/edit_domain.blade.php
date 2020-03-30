@extends('layouts.app', ['activePage' => 'editdomain', 'titlePage' => __('Edit Domain')])

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
                <form action="{{url('/domain')}}/{{$domain->id}}/update" method="POST">
                    {{csrf_field()}}
                    @method('post')
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Domain</label>
                        <input name="nama_domain" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Servis Name" value="{{$domain->nama_domain}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Keterangan</label>
                        <input name="keterangan" type="text" class="form-control" id="exampleInputPassword1" placeholder="Servis Owner" value="{{$domain->keterangan}}">
                        <!-- <textarea name="keterangan" class="form-control" id="exampleFormControlTextarea1" rows="3" ></textarea> -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
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