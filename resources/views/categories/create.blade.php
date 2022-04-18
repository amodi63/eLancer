@extends('layouts.dashboard')
@section('page_title', 'Create Page')
@section('page_name', 'Create Category')
@section('page_site1') <a href="{{route('categories.index')}}">Categories</a>@endsection
@section('page_site2', 'Create Category')
@section('main-content')
<div class="row">
    <div class="col-12">
        <x-flash-message/>

        <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" class="form-control " id="name" name="name" placeholder="Enter Name" value = "{{old('name', $category->name)}}">
            @error('name')<div class="alert alert-danger ">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
            <label for="slug">Category slug</label>
            <input type="text" class="form-control " id="slug" name="slug" placeholder="Enter Name" value = "{{old('slug', $category->slug)}}">
            {{-- @error('')<div class="alert alert-danger ">{{ $message }}</div>@enderror --}}
            </div>
            {{-- <div class="form-group">
                <x-form.input/>
            </div> --}}
            <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control " rows="3" placeholder="Description" >{{old('description', $category->description)}}</textarea>
            @error('description')<div class="alert alert-danger ">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="parent_id">Parent Category</label>
                <select class="form-control " id="parent_id" name="parent_id" >
                    <option value="" ></option>
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
                @error('file')<div class="alert alert-danger ">{{ $message }}</div>@enderror
            </div>
            <br>
            <button type="submit" class="btn btn-primary" style="margin-bottom: 20px">Submit</button>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{asset('assets1/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script>
    $(function () {
      bsCustomFileInput.init();
    });
    </script>
@endsection
