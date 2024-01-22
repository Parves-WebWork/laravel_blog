@extends('admin.admin_dashboard')

@section('admin')
    <div class="card">
        <div class="card-header">User Details</div>
        <div class="card-body">
            <h5 class="card-title">User ID: {{ $user->id }}</h5>
            <p class="card-text">Name: {{ $user->name }}</p>
            <p class="card-text">Email: {{ $user->email }}</p>
            
            <td>
                @if(Cache::has('user-is-online-'.$user->id))
                <span class="text-center"><font color="green">Online</font></span>
                @else
                <span class="text-center"><font color="red">Offline</font></span>
                @endif
            </td>
        </div>
    </div>

    

    <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2">
        <div class="col">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">User ID: {{ $user->id }}</h5>
                    <h5 class="card-text">Name: {{ $user->name }}</h5>
                    <h5 class="card-text">Address: 
                    </h5>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Email: {{ $user->email }}</h5>
                    <h5 class="card-text">Status: {{ $user->status ? 'Active' : 'Inactive' }}</h5>
                    <p class="card-text"><small class="text-muted">{{ $user->created_at }}</small>
                    </p>
                </div>
               
            </div>
        </div>
    </div>

    <div class="card bg-dark text-white" style="width: 350px; height: 250px;">
        <td><img src="{{ asset($user->profile_image) }}" alt=""></td>
        <td>
   
    </div>







@endsection
