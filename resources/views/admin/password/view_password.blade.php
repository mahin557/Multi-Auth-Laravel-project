@extends('admin.admin_master')
@section('admin')

<div class="row" style="padding: 20px">
    <div class="col-md-6">
        <h3>Change Password</h3>
<form method="POST" action="{{ route('admin.password.update') }}" >
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Current Password:</label>
      <input id="current_password"  type="password" name="oldpassword" class="form-control"  aria-describedby="emailHelp" 
       >
     
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">New Password:</label>
      <input id="password"  type="password" name="password" class="form-control">
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Confirm Password:</label>
        <input id="password_confirmation"  type="password" name="password_confirmation" class="form-control"  >
      </div>
    
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>
</div>

@endsection
