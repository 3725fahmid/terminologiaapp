@extends('layouts.app')

@section('title')
    Expense | create
@endsection

@section('cssLinks')


    <!-- Plugin css -->
    <link href="{{ asset('backend/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">


@endsection

@section('admin')


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Expeses</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ Route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Expense</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <!-- start row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card bg-light">
                    <div class="card-body">
                        <h4 class="card-title">Add Expenses</h4>
                        <p class="card-title-desc">Enter your expenses accurately to ensure proper tracking.</p>
                        <form class="needs-validation" action="{{ route('expense.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-4 expense-box">
                                        <label class="form-label">Select Date</label>
                                        <div class="input-group" id="datepicker2">
                                        <input type="text" 
                                                class="form-control" 
                                                name="date" 
                                                id="ShowDate"
                                                data-date-container='#datepicker2' 
                                                placeholder="Enter Date"
                                                autocomplete="off"
                                                required />
                                        </div>

                                        {{-- <span class="input-group-text"><i class="mdi mdi-calendar"></i></span> --}}
                                        </div><!-- input-group -->

                                        {{-- <div class="input-group">
                                            <input class="form-control" autocomplete="off"  name="date" value="2011-08-19T13:45:00" type="datetime-local" id="example-datetime-local-input" required>
                                        </div><!-- input-group --> --}}
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="expense-item" id="expense_box_item">
                                        <div class="btn-add_new d-flex justify-content-end">
                                            <a class="btn btn-dark rounded-0 mb-4" id="add_new_item">add new</a>
                                        </div>
    
                                        <div class="row">

                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label">Title</label>
                                                    <input 
                                                        name="title[]"
                                                        type="text" 
                                                        class="form-control" 
                                                        id="validationCustom01" 
                                                        autocomplete="off"                              
                                                        placeholder="Write a title" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label">Amount</label>
                                                    <input 
                                                        name="amount[]"
                                                        type="number" 
                                                        class="form-control" 
                                                        id="validationCustom01"                              
                                                        placeholder="Enter amount" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label">Category</label>
                                                    <select class="form-control select2" name="category[]" required>
                                                        @foreach($expenseCategory as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>            
                                            </div>
                                            
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label">Note</label>
                                                    <input 
                                                        name="note[]"
                                                        type="text" 
                                                        class="form-control" 
                                                        id="validationCustom01"                              
                                                        placeholder="Write your Note">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                

                            </div>

                            <div class="d-grid gap-2">
                                <button class="btn btn-lg btn-primary rounded-0" type="submit"> Save </button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- container-fluid -->
</div>


@endsection


@section('scripts')

    <script src="{{ asset('backend/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pages/form-advanced.init.js') }}"></script>

<script>

    $(document).ready(function () {
        $('#ShowDate').datepicker({
        endDate: new Date(),        // Disable future dates
        autoclose: true,
        format: 'yyyy-mm-dd',       // Example: yyyy-mm-dd 2025-04-07
        container: '#datepicker2',
        todayHighlight: true
        });
    });


</script>

<script>
    

$(document).ready(function() {
        $("#add_new_item").click(function(e) {
            e.preventDefault();
            $("#expense_box_item").append(`
                <div class="row append_item">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input 
                                        name="title[]"
                                        type="text" 
                                        class="form-control" 
                                        id="validationCustom01"                              
                                        autocomplete="off" 
                                        placeholder="Write a title" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label">Amount</label>
                                    <input 
                                        name="amount[]"
                                        type="number" 
                                        class="form-control" 
                                        id="validationCustom01"                              
                                        placeholder="Write a title" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label">Category</label>
                                    <select class="form-control select2" name="category[]">
                                        @foreach($expenseCategory as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>            
                            </div>

                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label class="form-label">Note</label>
                                    <input 
                                        name="note[]"
                                        type="text" 
                                        class="form-control" 
                                        id="validationCustom01"                              
                                        placeholder="Write your Note" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="input-field">
                                    <label class="form-label">Remove</label><br>
                                    <a class="btn btn-danger  rounded-0 remove_btn"><i class="ri-delete-bin-5-line"></i></a>
                                </div>
                            </div>
                        </div>
            `);

            $(document).on('click','.remove_btn',function(e) {
            e.preventDefault();
            let row_item = $(this).parent().parent().parent();
            $(row_item).remove();
        });


        });

        })

    </script>

@endsection


