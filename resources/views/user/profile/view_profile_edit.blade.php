@extends('user.user_master')
@section('user')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="row" style="padding: 20px">
    <div class="col-md-6">
<form method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">User Name:</label>
      <input type="text" name="name" class="form-control"  aria-describedby="emailHelp" 
      placeholder="user Name" value="{{ $editdata->name }}">
     
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">User Email:</label>
      <input type="email" name="email" class="form-control"  
      placeholder="Email" value="{{ $editdata->email }}">
    </div>
    <div class="form-group">
        <label >Profile Image</label>
        <input type="file" name="profile_photo_path" class="form-control"  id="image">
        
      </div>
      <div class="form-group">
        <img id="showimage" src="{{ (!empty($editdata->profile_photo_path))? url('upload/user_images/'.$editdata->profile_photo_path):url('upload/no_image.jpg') }}" 
        style="width: 100px; height:100px;">
        
      </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>
</div>



<script type="text/javascript">    
$(document).ready(function(){
$('#image').change(function(e){
var reader= new FileReader();
reader.onload=function(e){
    $('#showimage').attr('src',e.target.result);
}
reader.readAsDataURL(e.target.files[0]);
});


});

</script>
@endsection
