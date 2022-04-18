@extends('layouts.dashboard')
@section('page_title', 'Edit Project')
@section('page_name', 'Edit Project')
@section('page_site1') <a href="{{route('client.projects.index')}}">Projects</a>@endsection
@section('page_site2', 'Edit Project')
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
              <form action="{{route('client.projects.update', $projects->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="inputName">Project Name</label>
                    <input type="text" id="inputName" name="name" value="{{$projects->name}}" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="inputDescription">Project Description</label>
                    <textarea id="inputDescription" class="form-control" rows="2" name="description">{{$projects->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="inputStatus">Status</label>
                    <select id="inputStatus" class="form-control custom-select" name="status" >
                        <option selected disabled>Select one</option>
                        @foreach ($status as $key => $status)
                        <option value="{{$status}}" @if ($status == $projects->status) selected @endif>{{$status}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputClientCompany">Client Company</label>
                    <input type="text" id="inputClientCompany" name="client_company"  value="{{$projects->client_company}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="inputProjectLeader">Project Leader</label>
                    <input type="text" id="inputProjectLeader" name="leader" value="{{ $projects->leader}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="inputEstimatedBudget">Estimated budget</label>
                    <input type="number" min= '0' id="inputEstimatedBudget" name="budget" value="{{$projects->budget}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="inputEstimatedDuration">Estimated project duration</label>
                    <input type="number" min= '0' id="inputEstimatedDuration" name="deadline" value="{{ $projects->deadline}}" class="form-control">
                </div>
                <input type="reset" value= "Cancel" class="btn btn-secondary">
                <input type="submit" value="Edit Project" class="btn btn-success float-right">

            </form>
            </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
<!-- /.content-wrapper -->
@endsection
