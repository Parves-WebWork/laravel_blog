@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edite Blog Category Page</h4><br>
                        <form method="POST" action="{{ route('update.blog.category',$blogcategory->id) }}">
                            @csrf

                         

                            <div class="row mb-3">
                                <label  class="col-sm-2 col-form-label">Blog Category Name</label>
                                <div class="col-sm-10">
                                    <input name="blog_category" class="form-control" type="text"
                                    value="{{$blogcategory->blog_category}}"   id="example-text-input">
                                    @error('blog_category')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                        
                                    
                                </div>
                            </div>
                           
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update  Blog Category ">
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#home_slide').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        })
    })
</script>
@endsection
