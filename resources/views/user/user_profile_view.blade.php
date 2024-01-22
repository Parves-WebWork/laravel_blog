@extends('user.user_master')
@section('user')
                        <div class="page-content">
                        <div class="container-fluid">


                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card"><br><br>
                                <center>

                                <img class="rounded-circle avatar-xl" src="{{ (!empty($userData->profile_image))? url('upload/user_images/'.$userData->profile_image):url('upload/no_image.jpg')}}" alt="Card image cap">


                                </center>

                                    <div class="card-body">
                                        <h4 class="card-title">Name:{{$userData->name}}</h4>
                                        <hr>
                                        <h4 class="card-title">Email:{{$userData->email}}</h4>
                                        <hr>
                                        <h4 class="card-title">User Name:{{$userData->username}}</h4>
                                        <hr>
                                        <a href="{{route('edit.profile')}}" class="btn btn-info btn-rounded waves-effect waves-light">Edite Profile</a>
                                    </div>
                                </div>
                            </div>
        
        
 
        
                        </div>





                    </div>
                    </div>

@endsection