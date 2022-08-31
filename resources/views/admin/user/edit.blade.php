@extends('layouts.admin')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">user</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">user</a></li>
                    <li class="breadcrumb-item active">Edit user</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card border border-primary">
            <div class="card-header bg-transparent border-primary d-flex justify-content-between">
                <h5 class="my-0 text-primary align-middle"><i class="mdi mdi-bullseye-arrow me-3"></i>Edit user </h5>
                <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary waves-effect waves-light">
                    <i class="bx bx-list-plus font-size-20 align-middle me-2"></i> All user
                </a>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <form action="{{ route('user.update',$data->slug) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row form-group">
                            <div class="col-md-6 my-2">
                                <label for="name">Name</label>
                                <input type="hidden" name="id" value="{{ $data->id }}"/>
                                <input class="form-control" type="text" name="name" value="{{ $data->name }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 my-2">
                                <label for="phone">Phone</label>
                                <input class="form-control" type="text" name="phone" value="{{ $data->phone }}">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 my-2">
                                <label for="role">User Role</label>

                                @php
                                $allRole = App\Models\Role::where('role_status',1)->orderBy('role_id','ASC')->get();
                                @endphp

                                <select class="form-control form_control" name="role">
                                    <option selected disabled>select user role</option>

                                    @foreach ( $allRole as $usrole )
                                    <option value="{{ $usrole->role_id }}" @if ( $data->roleInfo->role_id == $usrole->role_id )
                                        selected
                                    @endif>{{ $usrole->role_name }}</option>
                                @endforeach
                                </select>
                                @error('role')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        <div class="col-md-6 my-2">
                            <label for="photo">Photo</label>
                            <input class="form-control" type="file" name="photo" value="{{ old('photo') }}">
                            @error('photo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12 my-2 d-flex">
                            @if ($data->photo)
                            <img style="width: 100px" class="m-auto" src="{{ asset('uploads/user/' . $data->photo) }}" alt="Image">
                            @else
                            <img style="width: 100px" class="m-auto" src="{{ asset('uploads/no-entry.png') }}" alt="resort Image">
                            @endif
                        </div>
                        <div class="col-md-2 mt-4">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                <i class="bx bxs-save font-size-16 align-middle me-2"></i> Update User
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
