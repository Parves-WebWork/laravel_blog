<!-- In your Blade view -->
@extends('admin.admin_dashboard')
@section('admin')
<form action="upload" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image" id="image">
    <button type="submit">Upload</button>
</form>


 @endsection



