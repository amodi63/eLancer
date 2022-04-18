@extends('layouts.dashboard')
@section('page_title', 'Edit Page')
@section('page_name', 'Edit Category')
@section('page_site1') <a href="{{route('categories.index')}}">Categories</a>@endsection
@section('page_site2', 'Edit Category')
@section('main-content')

<div class="row">
    <div class="col-12">
        <x-flash-message/>
        <form action="{{route('categories.update', $category->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control " id="name" name="name" value="{{old('name',$category->name)}}" placeholder="Enter Name">
                @error('name')<div class="alert alert-danger ">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="slug">Category slug</label>
                <input type="text" class="form-control " id="slug" name="slug" placeholder="Slug Field" value = "{{old('slug', $category->slug)}}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control " rows="3"  placeholder="Description">{{old('description',$category->description)}}</textarea>
                @error('description')<div class="alert alert-danger ">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="parent_id">Parent Category</label>
                <select class="form-control " id="parent_id" name="parent_id">
                    <option value=""></option>
                    @foreach ($parents as $parent)
                    <option value="{{$parent}}"@if($parent == old('parent_id',$category->parent_id)) selected @endif>{{$parent}}</option>
                    @endforeach
                </select>
                @error('parent_id')<div class="alert alert-danger ">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Uplode File</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="exampleInputFile" name="art_path" accept="*/*" value="{{old('art_path', $category->art_path)}}">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
                {{-- <div><a href="{{asset('storage/' .$category->art_path)}}">{{$category->art_path}}</a></div> --}}
                @error('file')<div class="alert alert-danger ">{{ $message }}</div>@enderror
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
