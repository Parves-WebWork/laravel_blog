@extends('admin.admin_dashboard')

@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Breaking News Page</h4>
                            <form method="POST" action="{{ route('update.news') }}" enctype="multipart/form-data">
                                @csrf

                                <!-- Include a hidden field to send the BreakingNews ID -->
                                <input type="hidden" name="news_id" value="{{ $breckingNews->id ?? '' }}">

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">News Description</label>
                                    <div class="col-sm-10">
                                        <textarea id="elm1" name="description">{{ $breckingNews->description ?? '' }}</textarea>
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Insert/Update News Data">
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection
