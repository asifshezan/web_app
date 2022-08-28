@extends('layouts.admin')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Resort</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Resort</a></li>
                    <li class="breadcrumb-item active">Edit Resort</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card border border-primary">
            <div class="card-header bg-transparent border-primary d-flex justify-content-between">
                <h5 class="my-0 text-primary align-middle"><i class="mdi mdi-bullseye-arrow me-3"></i>Edit Resort </h5>
                <a href="{{ route('resort.index') }}" class="btn btn-sm btn-primary waves-effect waves-light">
                    <i class="bx bx-list-plus font-size-20 align-middle me-2"></i> All Resort
                </a>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <form action="{{ route('resort.update',$data->resort_slug) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row form-group">
                            <div class="col-md-6 my-2">
                                <label for="resort_name">Resort Name</label>
                                <input type="hidden" name="resort_id" value="{{ $data->resort_id }}">
                                <input class="form-control" type="text" name="resort_name" value="{{ $data->resort_name }}">
                                @error('resort_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 my-2">
                                <label for="resort_detail">Resort Details</label>
                                <input class="form-control" type="text" name="resort_detail" value="{{ $data->resort_detail }}">
                                @error('resort_detail')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        <div class="col-md-6 my-2">
                            <label for="resort_image">resort Image</label>
                            <input class="form-control" type="file" name="resort_image" value="{{ $data->resort_image }}">
                            @error('resort_image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 my-2 d-flex">
                            @if ($data['resort_image'])
                            <img style="width: 150px" class="m-auto" src="{{ asset('uploads/resort/'.$data->resort_image) }}" alt="resort Image">
                            @else
                            <img style="width: 100px" class="m-auto" src="{{ asset('uploads/no_image.png') }}" alt="resort Image">
                            @endif
                        </div>
                        <div class="col-md-2 mt-4">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                <i class="bx bxs-save font-size-16 align-middle me-2"></i> Resort Updata
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
