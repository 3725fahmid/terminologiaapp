@extends('layouts.app')
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
                            <li class="breadcrumb-item"><a href="{{ Route('home')}}">Dashboard</a></li>
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
                        <form class="needs-validation" action="{{ route('expense.update',$expense) }}" method="POST" enctype="multipart/form-data">
                            @csrf @method('PUT')
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-4 expense-box">
                                        <label class="form-label">Select Date</label>
                                        <div class="input-group">
                                                <input class="form-control" autocomplete="off"  name="date" value="{{ $expense->expense_date}}" type="datetime-local" id="example-datetime-local-input" required>
                                        </div><!-- input-group -->
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="expense-item" id="expense_box_item">
                                        <div class="btn-add_new disabled d-flex justify-content-end">
                                            <span class="btn btn-dark rounded-0 mb-4 disabled" id="add_new_item">add new</span>
                                        </div>
    
                                        <div class="row">

                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label">Title</label>
                                                    <input 
                                                        name="title"
                                                        value="{{ $expense->expense_title}}"
                                                        type="text" 
                                                        class="form-control" 
                                                        id="validationCustom01" 
                                                        autocomplete="off"                              
                                                        placeholder="Write a title">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label">Amount</label>
                                                    <input 
                                                        name="amount"
                                                        value="{{ $expense->amount}}"
                                                        type="number" 
                                                        class="form-control" 
                                                        id="validationCustom01"                              
                                                        placeholder="Write a title">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label">Category</label>
                                                    <select class="form-control select2"  name="category">
                                                        
                                                        @foreach($expenseCategory as $item)
                                                            <option value="{{ $item->id }}" {{ $expense->category_id == $item->id ? 'selected' : '' }}>
                                                                {{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>            
                                            </div>
                                            
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label">Note</label>
                                                    <input 
                                                        name="note"
                                                        value="{{ $expense->note}}"
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
                                <button class="btn btn-lg btn-info rounded-0" type="submit"> Update </button>
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

<script>

    $(document).ready(function () {
    $('#ShowDate').datepicker({
      endDate: new Date(), // Disables future dates
      autoclose: true,
      format: 'dd M, yyyy',
      container: '#datepicker2',
      todayHighlight: true
    });
  });
</script> 
 @endsection   





