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
            <li class="fw-medium">SUBCATEGORY FORM</li>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">SUBCATEGORY FORM</h5>
                </div>
                <div class="card-body">
                    <form
                        action="{{ isset($subcategory->id) ? route('subcategoryUpdate', [$subcategory->id]) : route('subcategoryaddSave') }}"
                        method="POST" enctype="multipart/form-data" class="row gy-3 needs-validation" novalidate>
                        @csrf
                        @if(isset($subcategory->id))
                        @method('PUT')
                        @else
                        @method('POST')
                        @endif
                        <div class="col-md-4">
                            <label class="form-label">SUBCATEGORY NAME</label>
                            <input type="text" name="name" class="form-control" value="{{isset($subcategory->name) ? $subcategory->name:''}}" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-20">
                                <label for="depart" class="form-label">CATEGORY NAME</label>
                                <select class="form-select" id="depart" name="category_id">
                                    <option selected>select </option>
                                    @if(count($Category)>0)
                                    @foreach( $Category as $Categorys)
                                    <option value="{{isset($Categorys->id)?$Categorys->id:''}}" {{isset($subcategory) && $Categorys->id == $subcategory->category_id  ? 'selected' : ''}}>{{isset($Categorys->name) ? $Categorys->name:''}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <label class="form-label">IMAGE</label>
                            <input class="form-control" type="file" name="image" required>
                            @if(isset($subcategory->id))
                            <div>
                                <img src="{{ asset($subcategory->image) }}" style="width: 135px;">
                            </div>
                            @endif
                            <div class="invalid-feedback">
                                Please choose a file.
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">SUBCATEGORY DESCRIPTION</label>
                            <textarea name="description" class="form-control" rows="4" cols="50"
                                value="{{isset($subcategory->description) ? $subcategory->description : ''}}"
                                placeholder="Enter a description...">{{isset($subcategory->description) ? $subcategory->description : ''}}</textarea>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">META TITLE</label>
                            <input type="text" name="meta_title" class="form-control"
                                value="{{ isset($subcategory->meta_title) ? $subcategory->meta_title : '' }}" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>


                        <div class="col-md-4">
                            <label class="form-label">META KEYWORD</label>
                            <input type="text" name="meta_keyword" class="form-control"
                                value="{{ isset($subcategory->meta_keyword) ? $subcategory->meta_keyword : '' }}" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>


                        <div class="col-md-4">
                            <label class="form-label">META DESCRIPTION</label>
                            <input type="text" name="meta_description" class="form-control"
                                value="{{ isset($subcategory->meta_description) ? $subcategory->meta_description : '' }}"
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