@extends('layouts.admin')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">role</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">role</a></li>
                    <li class="breadcrumb-item active">Edit role</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card border border-primary">
            <div class="card-header bg-transparent border-primary d-flex justify-content-between">
                <h5 class="my-0 text-primary align-middle"><i class="mdi mdi-bullseye-arrow me-3"></i>Edit role </h5>
                <a href="{{ route('role.index') }}" class="btn btn-sm btn-primary waves-effect waves-light">
                    <i class="bx bx-list-plus font-size-20 align-middle me-2"></i> All role
                </a>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <form action="{{ route('role.update',$data->role_slug) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row form-group">
                            <div class="col-md-12 my-2">
                                <label for="role_name">Role Name</label>
                                <input type="hidden" name="role_id" value="{{ $data->role_id }}">
                                <input class="form-control" type="text" name="role_name" value="{{ $data->role_name }}">
                                @error('role_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        <div class="col-md-2 mt-4">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                <i class="bx bxs-save font-size-16 align-middle me-2"></i> Role Updata
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
