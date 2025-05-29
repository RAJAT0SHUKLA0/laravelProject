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
            <li class="fw-medium">SLIDER FORM</li>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">SLIDER FORM</h5>
                </div>
                <div class="card-body">
                    <form
                        action="{{ isset($slider->id) ? route('categoryUpdate', [$slider->id]) : route('slideraddsave') }}"
                        method="POST" enctype="multipart/form-data" class="row gy-3 needs-validation" novalidate>

                        @csrf
                        @if(isset($slider->id))
                        @method('PUT')
                        @else
                        @method('POST')
                        @endif


                        <div class="col-md-6">
                            <label class="form-label">OFFER TITLE</label>
                            <input type="text" name="OfferTitle" class="form-control"
                                value="{{ isset($slider->OfferTitle) ? $slider->OfferTitle : '' }}" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">TITLE</label>
                            <input type="text" name="title" class="form-control"
                                value="{{ isset($slider->title) ? $slider->title : '' }}" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>


                     <div class="col-md-6">
                            <label class="form-label">IMAGE</label>
                            <input class="form-control" type="file" name="image" required>
                            @if(isset($slider->id))
                            <div>
                                <img src="{{ asset($slider->image) }}" style="width: 135px;">
                            </div>
                            @endif
                            <div class="invalid-feedback">
                                Please choose a file.
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <label class="form-label">SLIDER DESCRIPTION</label>
                            <textarea name="description" class="form-control" rows="4" cols="50"
                                value="{{isset($Category->description) ? $Category->description : ''}}"
                                placeholder="Enter a description...">{{isset($Category->description) ? $Category->description : ''}}</textarea>
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