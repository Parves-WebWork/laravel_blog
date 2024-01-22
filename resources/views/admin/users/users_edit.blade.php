@extends('admin.admin_dashboard')
@section('admin')

<div class="card border-top border-0 border-4 border-info">
    <div class="card-body">
        <div class="border p-4 rounded">
            
            <form method="POST" action="{{ route('update.users', $users->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="hidden" name="id" value="{{ $users->id }}">


            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Enter Your Name</label>
                <div class="col-sm-9">
                    <input type="text" name="name" value="{{$users->name}}"  class="form-control" id="inputEnterYourName" placeholder="Enter Your Name">
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Email Address</label>
                <div class="col-sm-9">
                    <input type="email" name="email" class="form-control" id="inputEmailAddress2" value="{{$users->email}}" >
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="inputAddress4" class="col-sm-3 col-form-label">image</label>
                <div class="col-sm-9">
                    <input type="file"  name="profile_image" value="{{$users->profile_image}}" class="form-control" id="inputGroupFile02">
                </div>
            </div>
            
            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update  Users ">
        </form>

        </div>
    </div>
</div>
@endsection