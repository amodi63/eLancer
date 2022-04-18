@extends('layouts.dashboard')
@section('page_title', 'Edit Profile')
@section('page_name', 'Edit Profile')
@section('page_site1') <a href="{{route('Freelancer.index')}}">Profile</a>@endsection
@section('page_site2', 'Edit Profile')
@section('main-content')
<div class="tab-pane" id="settings">
<!-- /.tab-pane -->
<form class="form-horizontal" method="POST" action="{{route('Freelancer.update')}}">
    @method('put')
    @csrf
<div class="form-group row">
  <label for="inputName" class="col-sm-2 col-form-label">Name</label>
  <div class="col-sm-10">
    <input type="name" class="form-control" id="inputName" name="name" value="{{ $profile->name}}" placeholder="Name">
  </div>
</div>
<div class="form-group row">
  <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
  <div class="col-sm-10">
    <input type="email" class="form-control" id="inputEmail" name="email" value="{{old('email',$user->email)}}" placeholder="Email">
  </div>
</div>
<div class="form-group row">
  <label for="inputOccupation" class="col-sm-2 col-form-label">Occupation</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="inputOccupation" name="occupation" value="{{old('occupation',$profile->occupation)}}" placeholder="occupation">
  </div>
</div>
<div class="form-group row">
  <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
  <div class="col-sm-10">
    <textarea class="form-control" id="inputExperience" placeholder="Experience" name="experience" >{{old('experience',$profile->experience)}}</textarea>
  </div>
</div>
<div class="form-group row">
    <label for="inputLocation" class="col-sm-2 col-form-label">Location</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputlocation" placeholder="Location" name="location" value="{{old('location',$profile->location)}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEducation" class="col-sm-2 col-form-label">Education</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEducation" placeholder="Education" name="education" value="{{old('education',$profile->education)}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputNotes" class="col-sm-2 col-form-label">Notes</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputNotes" placeholder="Notes" name="notes" value="{{old('notes',$profile->notes)}}">
    </div>
  </div>
<div class="form-group row">
  <div class="offset-sm-2 col-sm-10">
    <div class="checkbox">
      <label>
        <input type="checkbox" name="terms"> I agree to the <a href="#">terms and conditions</a>
      </label>
    </div>
  </div>
</div>
<div class="form-group row">
  <div class="offset-sm-2 col-sm-10">
    <button type="submit" class="btn btn-danger">Submit</button>
  </div>
</div>
</form>
</div>
<!-- /.tab-pane -->
</div>
@endsection
