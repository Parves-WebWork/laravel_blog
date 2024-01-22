@extends('admin.admin_dashboard')

@section('admin')
<div class="card-body">
    <div class="table-responsive">
        <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5">
            <table id="example" class="table table-striped table-bordered dataTable" style="width: 100%;" role="grid" aria-describedby="example_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 146px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">id</th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 228px;" aria-label="Position: activate to sort column ascending">name</th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 103px;" aria-label="Office: activate to sort column ascending">email</th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 46px;" aria-label="Age: activate to sort column ascending">date</th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 76px;" aria-label="Status: activate to sort column ascending">Last Seen</th>
                        <th>status</th>
                        <th>profile_image</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i = 1)
                    @if($usersCategory->isNotEmpty())
                    @foreach ($usersCategory as $item)
                    <tr role="row" class="odd">
                        <td>{{ $i++ }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->last_seen)->diffForHumans()}}</td>
                        <td>
                            @if(Cache::has('user-is-online-'.$item->id))
                            <span class="text-center"><font color="green">Online</font></span>
                            @else
                            <span class="text-center"><font color="red">Offline</font></span>
                            @endif
                        </td>
                        <td>
                            @if(!empty($item->profile_image))
                                <img src="{{ asset($item->profile_image) }}" alt="" style="width: 60px; height: 50px;">
                            @else
                                <img src="{{ url('upload/no_image.jpg') }}" alt="" style="width: 60px; height: 50px;">
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('edit.users', $item->id) }}" class="btn btn-info sm" title="Edit Data">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit text-primary">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                            </a>
                            <a href="{{ route('delete.users', $item->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-primary">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg>
                            </a>
                            <a href="{{ route('users.details', $item->id) }}" class="btn btn-success sm" title="User Details">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye text-primary">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <th rowspan="1" colspan="1">id</th>
                        <th rowspan="1" colspan="1">name</th>
                        <th rowspan="1" colspan="1">email</th>
                        <th rowspan="1" colspan="1">date</th>
                        <th rowspan="1" colspan="1">status</th>
                        <th>Profile Image</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<script>
    // AJAX request to fetch user status
    $.ajax({
        url: "{{ route('user.status') }}",
        type: "GET",
        success: function(response) {
            // Update the user status element with the response
            $('#user-status').html(response);
        }
    });
</script>

@endsection
