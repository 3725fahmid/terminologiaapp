@extends('layouts.app')

@section('title')
    Category | {{$category->id}}
@endsection

@section('admin')

<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Catagory</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                            <li class="breadcrumb-item active">Catagory</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->                        
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Edit your Category</h4>
                                        <p class="card-title-desc">Provide valuable, relevant, and usable categories with careful consideration</p>
                                        <form class="needs-validation" action="{{ route('category.update', $category) }}" method="POST" enctype="multipart/form-data" novalidate>
                                            @csrf 
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">Category name</label>
                                                        <input type="text" class="form-control" name="name" value="{{ $category->name }}"
                                                            placeholder="Category name" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                        <div class="invalid-feedback">
                                                            Write a valid category name.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                    <label for="validationCustom02" class="form-label">Category description</label>
                                                        <div class="texteditor">
                                                            <textarea class="form-control" name="description">{{ $category->description }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <button class="btn btn-primary mt-3" type="submit">Submit form</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div> <!-- end col -->
    
                        </div>
                        <!-- end row -->
                    </div>
</div>

@endsection


