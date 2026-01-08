@extends('layouts.app')

@section('title')
    Account
@endsection

@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Add Balance
                    </button>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="text-center mt-4">
                                    <p class="mb-2 text-truncate">Entry Balance</p>
                                    <h5 class="card-title">${{$totalBalance}}</h5>
                                    <p class="mb-2 text-truncate">Available Balance</p>
                                    <h5 class="card-title">${{$availableBalance}}</h5>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="mt-4">
                            <p class="mb-2 text-truncate text-center">{{ \Carbon\Carbon::now()->format('F') }} Month Expense</p>
                            <div id="balance_donut_chart" class="apex-charts"></div>
                        </div>
                    </div>
                </div>
                <!-- end card  -->

                    <!-- start Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('account.store') }}" method="POST">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Balance</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="text-muted mb-3">Add you balance for your expenses</p>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">$</span>
                                                <input type="number" class="form-control mb-2" name="balance" aria-label="Amount (to the nearest dollar)">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                        <p class="text-muted mb-3">Add Comment</p>
                                        <div class="form-floating">
                                            <textarea class="form-control" name="account_comment" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                            <label for="floatingTextarea">Comments</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end Modal -->

            </div><!-- end col -->
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            </div>
                        </div>

                        <h4 class="card-title mb-4">Balance List</h4>

                        <div class="table-responsive">
                            <table id="datatable" class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                <thead class="table-light">
                                    <tr>
                                        <th>Serial</th>
                                        <th>Balance</th>
                                        <th>Comment</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead><!-- end thead -->
                                <tbody>
                                @foreach ($Balance as $index => $item)
                                    <tr>
                                        <td>
                                           {{ $index + 1 }}
                                        </td>
                                        <td>${{ $item->balance }}</td>
                                        <td>{{ $item->account_comment }}</td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($item->created_at)->format('d M, Y') }}
                                        </td>
                                        <td>
                                           <a href="{{ route('account.edit', $item->id) }}" class="btn btn-info sm rh-btn" title="Edit Data"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('account.destroy',  $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" id="delete" class="btn btn-danger sm rh-btn"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                        <!-- end -->
                                </tbody><!-- end tbody -->
                            </table> <!-- end table -->
                        </div>
                    </div><!-- end card -->
                </div><!-- end card -->
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script>
var options = {
    series: @json($data),
    chart: { height: 286, type: "donut" },
    labels: @json($labels),
    plotOptions: {
        pie: {
            donut: {
                size: "73%",
                labels: {
                    show: true,
                    name: { show: true, fontSize: "18px", offsetY: 5 },
                    value: {
                        show: true,
                        fontSize: "20px",
                        color: "#343a40",
                        offsetY: 8,
                        formatter: function (val) {
                            return "$" + val;
                        },
                    },
                    total: {
                        show: true,
                        fontSize: "17px",
                        label: "Total Expense",
                        color: "#6c757d",
                        fontWeight: 600,
                        formatter: function (w) {
                            let sum = w.globals.seriesTotals.reduce((a, b) => a + b, 0);
                            return "$" + sum.toFixed(2);
                        },
                    },
                },
            },
        },
    },
    dataLabels: { enabled: false },
    legend: { show: false },
    colors: ["#0f9cf3", "#6fd088", "#ffbb44"],
};

var chart = new ApexCharts(
    document.querySelector("#balance_donut_chart"),
    options
);
chart.render();

</script>

@endsection


