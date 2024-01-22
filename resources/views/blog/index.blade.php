@extends('blog.main_master')
@section('main')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-7 px-0">
            <div class="owl-carousel main-carousel position-relative">
                @foreach ($titleBlogs as $titleBlog)
                <div class="position-relative overflow-hidden" style="height: 500px;">
                    <img class="img-fluid h-100" src="{{$titleBlog->blog_image}}" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                href="">{{$titleBlog->blog_tags}}</a>
                            <a class="text-white" href="">{{date('d M, Y', strtotime($titleBlog->created_at))}}</a>
                        </div>
                        <a class="h2 m-0 text-white text-uppercase font-weight-bold" href="">{!!Str::limit($titleBlog->blog_description, 50, '...')!!}</a>
                    </div>
                </div>
                @endforeach
                
        
        
            </div>
        </div>

        <!--sidebar title post-->
        <div class="col-lg-5 px-0">
            <div class="row mx-0">
                @foreach ($titleBlogs as $titleBlog)
                <div class="col-md-6 px-0">
                    <div class="position-relative overflow-hidden" style="height: 250px;">
                        <img class="img-fluid w-100 h-100" src="{{$titleBlog->blog_image}}" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                    href="">{{$titleBlog->blog_tags}}</a>
                                <a class="text-white" href=""><small>{{date('d M, Y', strtotime($titleBlog->created_at))}}</small></a>
                            </div>
                            <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="">{!!Str::limit($titleBlog->blog_description, 30, '...')!!}</a>
                        </div>
                    </div>
                </div>

             
                @endforeach

                
      

            </div>
        </div>
    </div>
</div>
@endsection