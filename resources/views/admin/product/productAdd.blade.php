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
            <li class="fw-medium">PRODUCT FORM</li>
        </ul>
    </div>
    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">PRODUCT FORM</h5>
                </div>
                <div class="card-body">
                    <form
                        action="{{ isset($product->id) ? route('productUpdate', ['id' => $product->id]) : route('productaddSave') }}"
                        method="POST" enctype="multipart/form-data" class="row gy-3 needs-validation" novalidate>
                        @csrf
                        @if(isset($product->id))
                        @method('PUT')
                        @else
                        @method('POST')
                        @endif
                        <div class="col-md-4">
                            <label class="form-label">PRODUCT NAME</label>
                            <input type="text" name="name" class="form-control"
                                value="{{isset($product->name) ? $product->name:''}}" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-20">
                                <label for="depart" class="form-label">CATEGORY NAME</label>
                                <select class="form-select" id="category" name="category_id">
                                    <option selected>select </option>
                                    @if( count($Category)>0)
                                    @foreach($Category as $cat)
                                    <option value="{{isset($cat->id)?$cat->id:''}}"
                                        {{isset($product) && $cat->id == $product->category_id  ? 'selected' : ''}}>
                                        {{isset($cat->name) ? $cat->name:''}}
                                    </option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-20">
                                <label for="depart" class="form-label">SUBCATEGORY NAME</label>
                                <select class="form-select" id="category" name="subcategory_id">
                                    <option selected>select </option>
                                    @if(isset($product->id)&& count($SubCategory)>0)
                                    @foreach($SubCategory as $cat1)
                                    <option value="{{isset($cat1->id)?$cat1->id:''}}"
                                        {{isset($product) && $cat1->id == $product->subcategory_id  ? 'selected' : ''}}>
                                        {{isset($cat1->name) ? $cat1->name:''}}
                                    </option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">IMAGE</label>
                            <input class="form-control" type="file" name="image" required>
                            @if(isset($product->id))
                            <div>
                                <img src="{{ asset($product->image) }}" style="width: 135px;">
                            </div>
                            @endif
                            <div class="invalid-feedback">
                                Please choose a file.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">FEATURE IMAGE</label>
                            <input class="form-control" type="file" name="feature_image[]" multiple>
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
                            <label class="form-label">PRODUCT DESCRIPTION</label>
                            <textarea name="description" class="form-control" rows="4" cols="50"
                                value="{{isset($product->description) ? $product->description : ''}}"
                                placeholder="Enter a description...">{{isset($product->description) ? $product->description : ''}}</textarea>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">META TITLE</label>
                            <input type="text" name="meta_title" class="form-control"
                                value="{{ isset($product->meta_title) ? $product->meta_title : '' }}" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">META KEYWORD</label>
                            <input type="text" name="meta_keyword" class="form-control"
                                value="{{ isset($product->meta_keyword) ? $product->meta_keyword : '' }}" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">META DESCRIPTION</label>
                            <input type="text" name="meta_description" class="form-control"
                                value="{{ isset($product->meta_description) ? $product->meta_description : '' }}"
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
    <script>
    var rtlDirection = $('html').attr('dir') === 'rtl';
    // ================================ Default Slider Start ================================ 
    </script>
    @endsection