@extends('layouts.app')

@section('title')
    Home
@endsection

@section('admin')


<div class="page-content">
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Home</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                            <li class="breadcrumb-item active">Home</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-truncate font-size-14 mb-2">Available Blance</p>
                                                <h4 class="mb-2">${{ $availabaleBalance }}</h4>
                                                {{-- <p class="text-muted mb-0"><span class="text-danger fw-bold font-size-12 me-2"><i class="ri-arrow-right-down-line me-1 align-middle"></i>{{$weekpercentageChange}}%</span>from previous</p> --}}
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-success rounded-3">
                                                    <i class="mdi mdi-account-cash font-size-24"></i>  
                                                </span>
                                            </div>
                                        </div>                                              
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-truncate font-size-14 mb-2">Today Expense</p>
                                                <h4 class="mb-2">${{ $todayTotal }}</h4>
                                                {{-- <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>{{ $todayPercentChange }}%</span>from previous</p> --}}
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-primary rounded-3">
                                                    <i class="mdi mdi-account-cash font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>                                            
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-truncate font-size-14 mb-2">This Month Expense</p>
                                                <h4 class="mb-2">${{ $thisMonthTotal }} /=</h4>
                                                {{-- <p class="text-muted mb-0"><span class="text-danger fw-bold font-size-12 me-2"><i class="ri-arrow-right-down-line me-1 align-middle"></i>{{ $monthPercentChange }}%</span>from previous</p> --}}
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-primary rounded-3">
                                                    <i class="mdi mdi-account-cash font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>                                              
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-truncate font-size-14 mb-2">This Year Expense</p>
                                                <h4 class="mb-2">${{ $thisYearTotal }} /=</h4>
                                                {{-- <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>{{ $yearPercentChange }}%</span>from previous</p> --}}
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-success rounded-3">
                                                    <i class="mdi mdi-account-cash font-size-24"></i>  
                                                </span>
                                            </div>
                                        </div>                                              
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div><!-- end row -->

                        <div class="row">
                            <div class="col-xl-12">
    
                                <div class="card">
                                    <div class="card-body pb-0">
                                        <div class="float-end d-none d-md-inline-block">
                                            <div class="dropdown card-header-dropdown">
                                                <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="text-muted">Report<i class="mdi mdi-chevron-down ms-1"></i></span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">Export</a>
                                                    <a class="dropdown-item" href="#">Import</a>
                                                    <a class="dropdown-item" href="#">Download Report</a>
                                                </div>
                                            </div>
                                        </div>
                                        <h4 class="card-title mb-4">Summary of {{ $year }}</h4>

                                        <div class="text-center pt-3">
                                            <div class="row">
                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                    <div class="d-inline-flex">
                                                        <h5 class="me-2">${{ $yesterdayTotal }}</h5>
                                                        <div class="text-success font-size-12">
                                                            <i class="mdi mdi-menu-up font-size-14"> </i>2.2 %
                                                        </div>
                                                    </div>
                                                    <p class="text-muted text-truncate mb-0">Yesterday</p>
                                                </div><!-- end col -->
                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                    <div class="d-inline-flex">
                                                        <h5 class="me-2">${{ $previousWeekTotal }}</h5>
                                                        <div class="text-success font-size-12">
                                                            <i class="mdi mdi-menu-up font-size-14"> </i>1.2 %
                                                        </div>
                                                    </div>
                                                    <p class="text-muted text-truncate mb-0">Last Week</p>
                                                </div><!-- end col -->
                                                <div class="col-sm-4">
                                                    <div class="d-inline-flex">
                                                        <h5 class="me-2">${{ $prevMonthTotal }}</h5>
                                                        <div class="text-success font-size-12">
                                                            <i class="mdi mdi-menu-up font-size-14"> </i>1.7 %
                                                        </div>
                                                    </div>
                                                    <p class="text-muted text-truncate mb-0">Last Month</p>
                                                </div><!-- end col -->
                                            </div><!-- end row -->
                                        </div>
                                    </div>
                                    <div class="card-body py-0 px-2">
                                        <div id="area_chart" class="apex-charts" dir="ltr"></div>
                                    </div>
                                </div><!-- end card -->
                            </div>
                            <!-- end col -->

                        </div>
                        <!-- end row -->
    
                        <div class="row">
                            <div class="col-xl-12">
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
    
                                        <h4 class="card-title mb-4">Latest Expenses</h4>
    
                                        <div class="table-responsive">
                                            <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Serial</th>
                                                        <th>Title</th>
                                                        <th>Category</th>
                                                        <th style="width: 120px;">Amount</th>
                                                        <th>Note</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead><!-- end thead -->
                                                <tbody>
                                                @foreach ($lastfewExpenses as $index => $expense)
                                                    <tr>
                                                        <td>
                                                            {{ $index + 1 }}
                                                        </td>
                                                        <td><h6 class="mb-0">{{ $expense->expense_title ?? 'No Title' }}</h6></td>
                                                        <td>{{ $expense->category->name ?? 'Uncategorized' }}</td>
                                                        <td>{{ number_format($expense->amount, 2) }}</td>
                                                        <td>
                                                            {{ $expense->note ?? 'No note' }}
                                                        </td>
                                                        <td>
                                                            {{ \Carbon\Carbon::parse($expense->expense_date)->format('d M, Y') }}
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
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-xl-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">{{ \Carbon\Carbon::now()->format('F') }} Month Expenses</h4>

                                        <div class="mt-4">
                                            <div id="CMdonut_chart" class="apex-charts"></div>
                                        </div>
                                    </div>
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="col-xl-7">
                                <div class="card">
                                    <div class="card-body pb-0">
                                    </div>
                                    <div class="card-body py-0 px-2">
                                        <h4 class="card-title mb-4">Total Expenses Area</h4>
                                        <div id="expense_line_chart" class="apex-charts" dir="ltr"></div>
                                    </div>
                                </div><!-- end card -->
                            </div>
                            <!-- end col -->
                            
                        </div>
                    </div>
                    
                </div>
                <!-- End Page-content -->


@endsection


@section('scripts')

<script>


var options = {
        series: [
            { name: "Cost", data: @json($data) ,},
            // { name: "series2", data: [0, 15, 250, 21, 365, 120, 30] },
        ],
        chart: { toolbar: { show: !1 }, height: 350, type: "area" },
        dataLabels: { enabled: !1 },
        yaxis: {
            labels: {
                formatter: function (e) {
                    return e;
                },
            },
            tickAmount: 10,
            min: 0,
            max: 1000,
        },
        stroke: { curve: "smooth", width: 2 },
        grid: {
            show: !0,
            borderColor: "#90A4AE",
            strokeDashArray: 0,
            position: "back",
            xaxis: { lines: { show: !0 } },
            yaxis: { lines: { show: !0 } },
            row: { colors: void 0, opacity: 0.8 },
            column: { colors: void 0, opacity: 0.8 },
            padding: { top: 10, right: 0, bottom: 10, left: 10 },
        },
        legend: { show: !1 },
        colors: ["#0f9cf3", "#6fd088"],
        labels: @json($labels),
    },
    chart = new ApexCharts(document.querySelector("#area_chart"), options);
chart.render();

var options = {
          series: @json($CMdata),
          chart: {
          width: 380,
          height: 350,
          type: 'pie',
        },
        labels: @json($CMlabels),
        colors: ["#1cbb8c", "#0f9cf3", "#fcb92c", "#4aa3ff", "#f32f53"],
        legend: {
            show: !0,
            // position: "bottom",
            horizontalAlign: "center",
            verticalAlign: "middle",
            floating: !1,
            fontSize: "14px",
            offsetX: 0,
            offsetY: 5,
        },
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };

(chart = new ApexCharts(
    document.querySelector("#CMdonut_chart"),
    options
)).render();




// Total Expenses Chart 

var colors = [
      '#008FFB',
      '#00E396',
      '#FEB019',
      '#FF4560',
      '#775DD0',
      '#546E7A',
      '#26a69a',
      '#D10CE8'
    ];


options = {
    series: [{
            name: "Cost",
            data: @json($expenseCategorySums)
          }],
          chart: {
            height: 350,
            type: 'bar',
            toolbar: {
            show: false // 👈 This hides the toolbar
            }
          },
          colors: colors,
          plotOptions: {
            bar: {
              columnWidth: '45%',
              distributed: true,
            }
          },
          dataLabels: {
            enabled: false
          },
          legend: {
            show: false
          },
          xaxis: {
            categories: @json($expenseCategoryLabels),
            labels: {
              style: {
                colors: colors,
                fontSize: '12px'
              }
            }
          }
        };
(chart = new ApexCharts(
    document.querySelector("#expense_line_chart"),
    options
)).render();

// end total expenses chart 

</script>


@endsection
