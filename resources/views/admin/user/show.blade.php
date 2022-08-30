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
                    <li class="breadcrumb-item active">Create user</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row d-flex justify-content-center">
    <div class="col-md-8">
        <div class="card border border-primary">
            <div class="card-header bg-transparent border-primary d-flex justify-content-between">
                <h5 class="my-0 text-primary align-middle"><i class="mdi mdi-bullseye-arrow me-3"></i>user Information</h5>
                <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary waves-effect waves-light">
                    <i class="bx bx-list-plus font-size-20 align-middle me-2"></i> All user
                </a>
            </div>
            <div class="card-body">
                <div class="p-4 border rounded">
                    <div class="table-responsive">
                        <table class="table mb-0 text-center">
                            <thead>
                                <tr>
                                    <th>Iteam</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Name :</th>
                                    <td>{{ $data['name'] }}</td>
                                </tr>
                                <tr>
                                    <th>Email :</th>
                                    <td>{{ $data['email'] }}</td>
                                </tr>
                                <tr>
                                    <th>Phone :</th>
                                    <td>{{ $data['phone'] }}</td>
                                </tr>
                                <tr>
                                    <th>Role :</th>
                                    <td>{{ $data->roleInfo->role_name }}</td>
                                </tr>
                                <tr>
                                    <th>Photo :</th>
                                    <td>
                                        @if ( $data -> photo )
                                            <img src="{{ asset('uploads/user/' . $data->photo) }}" height="60">
                                            @else
                                            <img src="{{ asset('uploads/no_entry.png') }}" height="60">
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
