@extends('layouts.app', ['activePage' => 'edit', 'titlePage' => __('Edit')])

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
                <form action="{{url('/service')}}/{{$service->id}}/update" method="POST">
                    {{csrf_field()}}
                    @method('post')
                    <div class="form-group">
                        <label for="exampleInputEmail1">Service Name</label>
                        <input name="nama_service" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Servis Name" value="{{$service->nama_service}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Status</label>
                            <select name="status" class="form-control" id="exampleFormControlSelect1">
                                <option value="ACTIVE" @if($service->status == 'ACTIVE') selected='selected' @endif>ACTIVE</option>
                                <option value="MAINTENANCE" @if($service->status == 'MAINTENANCE') selected='selected' @endif>MAINTENANCE</option>
                                <option value="DEVELOPMENT" @if($service->status == 'DEVELOPMENT') selected='selected' @endif>UNDER DEVELOPMENT</option>
                                <option value="NA" @if($service->status == 'NA') selected='selected' @endif>NOT ACTIVE</option>
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Servis Owner</label>
                        <input name="service_owner" type="text" class="form-control" id="exampleInputPassword1" placeholder="Servis Owner" value="{{$service->service_owner}}">
                    </div>
                    <div class="modal-footer">
                        <a href="/service-list" type="button" class="btn btn-secondary">Cancel</a>
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