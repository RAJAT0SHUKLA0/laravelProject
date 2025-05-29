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
<li class="fw-medium"></li>
</ul>
</div>

<div class="card basic-data-table">
  <div class="card-header">
    <h5 class="card-title mb-0">SUBCATEGORY LIST</h5>
  </div>
  <div class="card-body">
    <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
      <thead>
        <tr>
          <th scope="col" style="text-align: justify;">
            SNO.
          </th>
          <th scope="col">IMAGE</th>
          <th scope="col">CATEGORY NAME</th>
          <th scope="col">SUBCATEGORY NAME</th>
         
          <th scope="col">CREATED AT</th>
         <th scope="col">ACTION</th>
        </tr>
      </thead>
      <tbody>
        @foreach($subcategory as $category)
        <tr>
          <td style="text-align: justify;">
          {{$category->id}}
          </td>
          <td>
            <div class="d-flex align-items-center">
            <img src="{{ asset($category->image) }}" alt="Category Image" width="100px" class="">
            <h6 class="text-md mb-0 fw-medium flex-grow-1"></h6>
            </div>
          </td>
          <td><a href="javascript:void(0)" class="text-primary-600">{{$category->categoryName}}</a></td>
          <td><a href="javascript:void(0)" class="text-primary-600">{{$category->name}}</a></td>
         
        
          <td>{{ \Carbon\Carbon::parse($category->created_at)->format('d-m-Y') }}</td>
          <td>
            <a href="javascript:void(0)" class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
              <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
            </a>
            <a href="{{route('subcategoryEdit',[$category->id]); }}" class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
              <iconify-icon icon="lucide:edit"></iconify-icon>
            </a>
            <a href="{{route('subcategorydelete',[$category->id]); }}" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
              <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
            </a>
          </td>
        </tr>
        @endforeach
    </tbody>
    </table>
  </div>
</div>
</div>
@endsection