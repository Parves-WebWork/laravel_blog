@extends('admin.admin_dashboard')

@section('admin')
    <div class="card">
        <div class="card-header">User Status</div>
        <div class="card-body">
            <h5 class="card-title">Active Users</h5>
            <ul>
                @foreach ($activeUsers as $user)
                    <li>{{ $user->name }}</li>
                @endforeach
            </ul>

            <h5 class="card-title">Inactive Users</h5>
            <ul>
                @foreach ($inactiveUsers as $user)
                    <li>{{ $user->name }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
