@extends('layout.admin')

@section('content')
<div class="card mb-4">
  <!-- Card header -->
  <div class="card-header">
    <h3 class="mb-0">Update Profile</h3>
  </div>
  <!-- Card body -->
  <div class="card-body">
    <!-- Form groups used in grid -->
    <form action="{{route('admin.profile.update',Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label class="form-control-label" for="example3cols1Input">Name</label>
            <input type="text" class="form-control" id="example3cols1Input" name="name" placeholder="Enter Name" value="{{Auth::user()->name}}">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label class="form-control-label" for="example3cols1Input">Email</label>
            <input type="text" class="form-control" id="example3cols1Input" name="email" placeholder="Enter Name" value="{{Auth::user()->email}}" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label class="form-control-label" for="example3cols1Input">Password</label>
            <input type="password" class="form-control" id="example3cols1Input" name="password" placeholder="Enter Password">
            <span>(Leave blank if you don't want to changed password)</span>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label class="form-control-label" for="example3cols1Input">Image</label>
            <input type="file" class="form-control" id="example3cols1Input" name="image">
          </div>
        </div>        
        

       
        <div class="col-md-12">
          <button class="btn btn-primary" type="submit">Update</button>
        </div>
      </div>
    </form>


  </div>
</div>
@endsection