@extends('layouts.dashboard')
@section('page_title', 'Add Page')
@section('style')
<link rel="stylesheet" href="{{asset('assets1/plugins/dropzone/min/dropzone.min.css')}}">
@endsection
@section('page_name', 'Project Add')
@section('page_site1') <a href="{{route('client.projects.index')}}">Projects</a>@endsection
@section('page_site2', 'Project Add')
@section('main-content')
<!-- Main content -->
<x-flash-message/>
<section class="content">
    <div class="row">
      <div class="col-md-11">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Form Project Data</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
              <form action="{{route('client.projects.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="inputName">Project Name</label>
                    <input type="text" id="inputName" name="name" value="{{old('name', $projects->name)}}" class="form-control @error('name') is-invalid @enderror" >
                    @error('name')<div class="alert alert-danger ">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="inputDescription">Project Description</label>
                    <textarea id="inputDescription" class="form-control @error('description') is-invalid @enderror" rows="2" name="description">{{old('description', $projects->description)}}</textarea>
                    @error('description')<div class="alert alert-danger ">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="inputStatus">Status</label>
                    <select id="inputStatus"  name="status" value="{{old('status', $projects->status)}}" class="form-control">
                        <option selected disabled>Select one</option>
                        @foreach ($status as $key => $status)
                        <option value="{{$status}}" @if ($status == $projects->status) selected @endif>{{$status}}</option>
                        @endforeach
                    </select>
                    @error('status')<div class="alert alert-danger ">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="inputClientCompany">Client Company</label>
                    <input type="text" id="inputClientCompany" name="client_company"  value="{{old('client_company', $projects->client_company)}}" class="form-control @error('client_company') is-invalid @enderror">
                    @error('client_company')<div class="alert alert-danger ">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="inputProjectLeader">Project Leader</label>
                    <input type="text" id="inputProjectLeader" name="leader" value="{{old('leader', $projects->leader)}}" class="form-control @error('leader') is-invalid @enderror">
                    @error('leader')<div class="alert alert-danger ">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Uplode File</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input @error('attachments') is-invalid @enderror" id="exampleInputFile" name="attachments" accept="*/*" value="{{old('attachments', $projects->attachments)}}" >
                        <label class="custom-file-label" for="exampleInputFile">Choose File</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                    @error('attachments')<div class="alert alert-danger ">{{ $message }}</div>@enderror
                  </div>
                <div class="form-group">
                    <label for="inputEstimatedBudget">Estimated budget</label>
                    <input type="number" min= '0' id="inputEstimatedBudget" name="budget" value="{{old('budget', $projects->budget)}}" class="form-control @error('budget') is-invalid @enderror">
                    @error('budget')<div class="alert alert-danger ">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="inputEstimatedDuration">Estimated project duration</label>
                    <input type="number" min= '0' id="inputEstimatedDuration" name="deadline" value="{{old('deadline', $projects->deadline)}}" class="form-control @error('deadline') is-invalid @enderror">
                    @error('deadline')<div class="alert alert-danger ">{{ $message }}</div>@enderror
                </div>
                <input type="reset" value= "Cancel" class="btn btn-secondary">
                <input type="submit" value="Create new Project" class="btn btn-success float-right">
            </form>
            </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
<!-- /.content-wrapper -->
@endsection
@section('scripts')
<script src="{{asset('assets1/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script>
    $(function () {
      bsCustomFileInput.init();
    });
    </script>
@endsection

