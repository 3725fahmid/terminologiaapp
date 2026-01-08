@extends('layouts.app')

@section('title')
    Category
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
                                        <h4 class="card-title">Create New Category</h4>
                                        <p class="card-title-desc">Provide valuable, relevant, and usable categories with careful consideration</p>
                                        <form class="needs-validation" action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">Category name</label>
                                                        <input type="text" class="form-control" name="name"
                                                            placeholder="Category name" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                    <label for="validationCustom02" class="form-label">Category description</label>
                                                        <div class="texteditor">
                                                            <textarea class="form-control" name="description"></textarea>
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
        
                            <div class="col-xl-12">
                                <div class="card">
                                <div class="card-body">
        
                                    <h4 class="card-title">Category List</h4>
                                    <p class="card-title-desc">Category list to view list of category</p>
                                    <form id="bulk-action-form" action="#" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-danger sm rh-btn">
                                                Delete All 
                                            </button>
                                        </div>
                                    </form>

                                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>Serial Number</th>
                                            <th>Category Name</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                            <th><input type="checkbox" id="select-all-category-id" /></th>
                                        </tr>
                                            </thead>
                                                @foreach($expenseCategory as $category)
                                                    <tr id="category_ids_{{$category->id}}">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{$category->name}}</td>
                                                        <td>{{$category->description}}</td>
                                                        <td>
                                                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-info sm rh-btn" title="Edit Data"><i class="fas fa-edit"></i></a>
                                                            <form action="{{ route('category.destroy',  $category->id) }}" method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" id="delete" class="btn btn-danger sm rh-btn"><i class="fas fa-trash-alt"></i></button>
                                                            </form>
                                                        </td>
                                                        <td scope="row"><input type="checkbox" class="category-checkbox" id="category-{{$category->id}}" name="category_ids[]" value="{{$category->id}}"/></td>
                                                    </tr>
                                                @endforeach    
                                            <tbody>                              
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                                <!-- end card -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div>
</div>

@endsection

@section('scripts')

<script>
    $(document).ready(function () {
        $('#select-all-category-id').click(function () {
            $('.category-checkbox').prop('checked', this.checked);
        });

        $('.category-checkbox').change(function () {
            var ids = [];
            $('.category-checkbox:checked').each(function () {
                ids.push($(this).val());
            });
            console.log(ids);
            // You can send 'ids' to your server using AJAX here if needed
        });

        // Form submission
        $('#bulk-action-form').submit(function (e) {
            e.preventDefault(); // Prevent normal form submission
            var categoryIds = [];

            $('.category-checkbox:checked').each(function () {
                categoryIds.push($(this).val());
            });

            if (categoryIds.length === 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please select at least one category.'
                });
                return;
            }

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: {
                    _token: '{{ csrf_token() }}',
                    category_ids: categoryIds
                },
                success: function (response) {
                    console.log(response);
                    // Handle success, e.g., show a success message, reload page, etc.
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Selected category deleted successfully.'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                            // Uncheck all checkboxes after deletion
                            $('.category-checkbox').prop('checked', false);
                            $('#select-all-category-id').prop('checked', false);
                        }
                    });
                },
                error: function (error) {
                    console.error(error);
                    // Handle error, e.g., show an error message, etc.
                }
            });
        });
    });
</script>

@endsection


