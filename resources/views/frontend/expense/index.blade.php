@extends('layouts.app')

@section('title')
    Expense
@endsection

@section('admin')


<div class="page-content "> <!-- start:: Main Content -->
    <div class="container-fluid"><!-- start:Container -->

    <!-- start page title -->
    <div class="row">
        <div class="col-xl-4">
            <div class="page-title-box">
                <h4 class="title-default display-inline mr-15">All Expense</h4>
                <a href="{{ route('expense.create') }}" class="btn btn-primary btn-sm">Add New</a>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Title</th>
                                    <th>Amount</th>
                                    <th>Category</th>
                                    <th>Note</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        
                        
                            <tbody>
                                @foreach($expenses as $expenseitem)
                                <tr>
                                    {{-- <td>{{ $expenseitem->expense_date ?? 'N/A'}}</td> --}}
                                    <td>
                                        @if($expenseitem->expense_date)
                                            {{ \Carbon\Carbon::parse($expenseitem->expense_date)->format('d M, Y') }}
                                            ({{ \Carbon\Carbon::parse($expenseitem->expense_date)->format('l') }})
                                        @else
                                            N/A
                                        @endif
                                    </td>

                                    <td>{{ $expenseitem->expense_title ?? 'N/A'}}</td>
                                    <td>{{ $expenseitem->amount ?? 'N/A'}}</td>
                                    <td>{{ $expenseitem->category->name ?? 'N/A' }}</td>
                                    <td>{{ $expenseitem->note ?? 'N/A'}}</td>
                                    <td>
                                        <a href="{{ route('expense.edit', $expenseitem->id) }}" class="btn btn-info sm rh-btn" title="Edit Data"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('expense.destroy',  $expenseitem->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" id="delete" class="btn btn-danger sm rh-btn"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Pagination -->
                <!-- Add your pagination links here if needed -->
            </div>
        </div>
        <div class="text-center">
            {{ $expenses->appends(request()->input())->links() }}
        </div>
    </div> <!-- end:Container -->
</div> <!-- end:: Main Content -->
@endsection


