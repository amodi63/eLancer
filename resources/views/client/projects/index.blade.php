@extends('layouts.dashboard')
@section('page_title', 'Projects Page')
@section('page_name', 'Projects')
@section('page_site1') <a href="{{route('client.projects.index')}}">Projects</a>@endsection
  @section('main-content')
  <!-- Main content -->
  <x-flash-message/>
  <section class="content">
    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Projects</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 1%">
                        #
                    </th>
                    <th style="width: 30%">
                        Project Name
                    </th>
                    <th style="width: 20%">
                        Team Leader
                    </th>
                    <th>
                        Project Progress
                    </th>
                    <th style="width: 8%" class="text-center">
                        Status
                    </th>
                    <th style="width: 20%">
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                <tr>
                    <td>
                        {{$project->id}}
                    </td>
                    <td>
                        <a>
                            {{$project->name}}

                        </a>
                        <br/>
                        <small>
                            Created {{$project->created_at}}
                        </small>
                    </td>
                    <td>
                        {{-- <ul class="list-inline">
                            <li class="list-inline-item">
                                <img alt="Avatar" class="table-avatar" src="{{asset('assets1/dist/img/avatar.png')}}">
                            </li>
                            <li class="list-inline-item">
                                <img alt="Avatar" class="table-avatar" src="{{asset('assets1/dist/img/avatar2.png')}}">
                            </li>
                            <li class="list-inline-item">
                                <img alt="Avatar" class="table-avatar" src="{{asset('assets1/dist/img/avatar3.png')}}">
                            </li>
                            <li class="list-inline-item">
                                <img alt="Avatar" class="table-avatar" src="{{asset('assets1/dist/img/avatar4.png')}}">
                            </li>
                        </ul> --}}
                        {{$project->leader}}
                    </td>
                    <td class="project_progress">
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width: 57%">
                            </div>
                        </div>
                        <small>
                            57% Complete
                        </small>
                    </td>
                    <td class="project-state">
                        <span class="badge badge-success">{{$project->status}}</span>
                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="{{route('client.projects.show', $project->id)}}">
                            <i class="fas fa-folder">
                            </i>
                            View
                        </a>
                        <a class="btn btn-info btn-sm" href="{{route('client.projects.edit', [$project->id])}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        {{-- <a class="btn btn-danger btn-sm" href="{{route('client.projects.destroy')}}">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </a> --}}
                        <form action="{{route('client.projects.destroy', $project->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" style="margin-top: 4px"class="btn btn-danger btn-sm"> <i class="fas fa-trash">
                            </i>
                            Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
