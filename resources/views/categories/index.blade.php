@extends('layouts.dashboard')
@section('page_title', 'Index Page')
@section('page_name', 'Categories')
@section('page_site1') <a href="{{route('categories.index')}}">Categories</a>@endsection
@section('main-content')
<x-flash-message/>
<table class="table table-striped">

    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Category Name</th>
        <th scope="col">Category Slug</th>
        <th scope="col">Description</th>
        <th scope="col">Parent Category</th>
        <th scope="col">Created At</th>
        <th scope="col">Files</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>

            <th scope="col">{{$category->id}}</th>
            <td >{{$category->name}}</td>
            <td >{{$category->slug}}</td>
            <td >{{$category->description}}</td>
            <td >{{$category->parent_id}}</td>
            <td >{{$category->created_at}}</td>
            <td >{{$category->art_path}}</td>
            <td><a href="{{route('categories.edit', [$category->id])}}"class="btn btn-dark btn-sm">Edit</a></td>
            <td>
                <form action="{{route('categories.destroy', [$category->id])}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    {{-- <div>
        <br> <a href="{{route('categories.create')}}" style="float:right ">Show Create Page</a>
     </div> --}}
     {{$categories->withQueryString()->links()}}
@endsection

{{-- client/projects/9/edit --}}
{{-- client/projects/{project}/edit --}}
