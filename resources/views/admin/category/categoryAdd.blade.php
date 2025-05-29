@extends('admin.layout.layout')
@section("content")

<div class="dashboard-main-body">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0"></h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">CATEGORY FORM</li>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">CATEGORY FORM</h5>
                </div>
                <div class="card-body">
                    <form
                        action="{{ isset($Category->id) ? route('categoryUpdate', [$Category->id]) : route('categoryaddSave1') }}"
                        method="POST" enctype="multipart/form-data" class="row gy-3 needs-validation" novalidate>

                        @csrf
                        @if(isset($Category->id))
                        @method('PUT')
                        @else
                        @method('POST')
                        @endif


                        <div class="col-md-6">
                            <label class="form-label">CATEGORY NAME</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ isset($Category->name) ? $Category->name : '' }}" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>


                        <div class="col-md-6">
                            <label class="form-label">IMAGE</label>
                            <input class="form-control" type="file" name="images" required>
                            @if(isset($Category->id))
                            <div>
                                <img src="{{ asset($Category->image) }}" style="width: 135px;">
                            </div>
                            @endif
                            <div class="invalid-feedback">
                                Please choose a file.
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <label class="form-label">CATEGORY DESCRIPTION</label>
                            <textarea name="description" class="form-control" rows="4" cols="50"
                                value="{{isset($Category->description) ? $Category->description : ''}}"
                                placeholder="Enter a description...">{{isset($Category->description) ? $Category->description : ''}}</textarea>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">META TITLE</label>
                            <input type="text" name="metaTitle" class="form-control"
                                value="{{ isset($Category->metaTitle) ? $Category->metaTitle : '' }}" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>


                        <div class="col-md-4">
                            <label class="form-label">META KEYWORD</label>
                            <input type="text" name="metakeyword" class="form-control"
                                value="{{ isset($Category->metakeyword) ? $Category->metakeyword : '' }}" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>


                        <div class="col-md-4">
                            <label class="form-label">META DESCRIPTION</label>
                            <input type="text" name="metadescription" class="form-control"
                                value="{{ isset($Category->metadescription) ? $Category->metadescription : '' }}"
                                required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                       


                        <div class="col-12">
                            <button class="btn btn-primary-600" type="submit">SUBMIT</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>


    </div>
    @endsection