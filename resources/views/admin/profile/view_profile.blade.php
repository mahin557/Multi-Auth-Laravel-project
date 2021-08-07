@extends('admin.admin_master')


@section('admin')
<div class="card" style="width: 18rem; margin:30px;" >
    <img class="card-img-top" src="{{ (!empty($user->profile_photo_path))? 
    url('upload/admin_images/'.$user->profile_photo_path):url('upload/no_image.jpg') }}">
    <div class="card-body">
      <h5 class="card-title">Admin Name: {{ $user->name }}</h5>
      <p class="card-text">Admin Email : {{ $user->email }} </p>
      <a href="{{ route('admin.profile.edit') }}" class="btn btn-primary">Edit Profile</a>
    </div>
  </div>
@endsection