@extends('layouts.app')

@section('title')
   Expense | Filter 
@endsection

@section('cssLinks')



@endsection

@section('admin')


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Expense Filter</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Expense Filter</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title --> 
        
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <form id="dayFilterForm" action="{{ route('expensefilter.filter') }}">
                            @csrf
                            <div class="row text-center mb-3">
                                <div class="col-2">
                                    <div type="button" class="btn btn-dark disabled">Day</div>
                                </div>
                                <div class="col-8">
                                    <select class="form-control select2" name="dayfilterdate" aria-label="Default select example" required>
                                        <option disabled selected value="">Please select</option>
                                        @foreach($expenseDate as $item)
                                        <option value="{{ $item->expense_date }}">{{ \Carbon\Carbon::parse($item->expense_date)->format('F j, Y') }}</option>
                                        @endforeach
                                        {{-- <option value="2">Two</option>
                                        <option value="3">Three</option> --}}
                                    </select>
                                    {{-- <input class="form-control" autocomplete="off"  name="filterData" type="datetime-local" id="example-datetime-local-input" required> --}}
                                </div>
                                <div class="col-2">
                                    <input type="submit" class="btn btn-info" value="Filter"></input>
                                </div>
                            </div>
                        </form>

                        {{-- <canvas id="pie" height="300"></canvas> --}}
                        {{-- id="expensesChart" --}}
                        <div class="card-body py-0 px-2">
                            <div id="bar_chart" class="apex-charts" dir="ltr"></div>
                        </div>

                    </div>
                </div>
            </div> <!-- end col -->

            {{-- Monthly filter  --}}
             <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <form id="monthFilterForm" action="{{route('expensefilter.filter')}}">
                            {{-- <form action="{{route('expensefilter.filter')}}" method="POST"> --}}
                            @csrf
                            <div class="row text-center mb-3">
                                <div class="col-2">
                                    <div type="button" class="btn btn-dark disabled">Month</div>
                                </div>
                                <div class="col-8">
                                    <select class="form-control select2" name="monthfilterdata" aria-label="Default select example" required>
                                        <option disabled selected value="">Please select</option>
                                        @foreach($expenseMonth as $item)
                                        <option value="{{ $item->month }}">
                                            {{-- {{ \Carbon\Carbon::parse($item->expense_date)->format('F, Y') }} --}}
                                            {{ \Carbon\Carbon::createFromFormat('Y-m', $item->month)->format('F, Y') }}
                                        </option>
                                        @endforeach
                                        {{-- <option value="2">Two</option>
                                        <option value="3">Three</option> --}}
                                    </select>
                                    {{-- <input class="form-control" autocomplete="off"  name="filterData" type="datetime-local" id="example-datetime-local-input" required> --}}
                                </div>
                                <div class="col-2">
                                    <input type="submit" class="btn btn-info" value="Filter"></input>
                                </div>
                            </div>
                        </form>

                        {{-- <canvas id="pie" height="300"></canvas> --}}
                        {{-- id="expensesChart" --}}
                        <div class="card-body py-0 px-2">
                            <div id="month_bar_chart" class="apex-charts" dir="ltr"></div>
                        </div>

                    </div>
                </div>
            </div> <!-- end col -->

            {{-- Yearly filter  --}}
             <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form id="yearFilterForm" action="{{route('expensefilter.filter')}}">
                            {{-- <form action="{{route('expensefilter.filter')}}" method="POST"> --}}
                            @csrf
                            <div class="row text-center mb-3">
                                <div class="col-2">
                                    <div type="button" class="btn btn-dark disabled">Year</div>
                                </div>
                                <div class="col-8">
                                    <select class="form-control select2" name="yearfilterdata" aria-label="Default select example" required>
                                        <option disabled selected value="">Please select</option>
                                        @foreach($expenseYear as $item)
                                        <option value="{{ $item->year }}">
                                            {{-- {{ \Carbon\Carbon::parse($item->expense_date)->format('F, Y') }} --}}
                                            {{ \Carbon\Carbon::createFromFormat('Y', $item->year)->format('Y') }}
                                        </option>
                                        @endforeach
                                        {{-- <option value="2">Two</option>
                                        <option value="3">Three</option> --}}
                                    </select>
                                    {{-- <input class="form-control" autocomplete="off"  name="filterData" type="datetime-local" id="example-datetime-local-input" required> --}}
                                </div>
                                <div class="col-2">
                                    <input type="submit" class="btn btn-info" value="Filter"></input>
                                </div>
                            </div>
                        </form>

                        {{-- <canvas id="pie" height="300"></canvas> --}}
                        {{-- id="expensesChart" --}}
                        <div class="card-body py-0 px-2">
                            <div id="year_bar_chart" class="apex-charts" dir="ltr"></div>
                        </div>

                    </div>
                </div>
            </div> <!-- end col -->

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
                

@endsection

@section('scripts')

<!-- Chart JS -->
<script src="{{ asset('assets/libs/chart.js/Chart.bundle.min.js') }}"></script>
{{-- <script src="{{ asset('assets/js/pages/chartjs.init.js') }}"></script>  --}}


<script>

$(document).ready(function () {
    // Start with empty chart
    var options = {
        series: [{
            name: "Cost",
            data: []
        }],
        chart: {
            height: 350,
            type: 'bar',
            toolbar: { show: false }
        },
        colors: ["#0f9cf3", "#6fd088", "#fcb92c", "#f32f53"],
        plotOptions: {
            bar: {
                columnWidth: '45%',
                distributed: true,
            }
        },
        dataLabels: { enabled: false },
        legend: { show: false },
        xaxis: {
            categories: [],
            labels: {
                style: {
                    colors: ["#0f9cf3", "#6fd088", "#fcb92c", "#f32f53"],
                    fontSize: '12px'
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#bar_chart"), options);
    var monthlyChart = new ApexCharts(document.querySelector("#month_bar_chart"), options);
    var yearlyChart = new ApexCharts(document.querySelector("#year_bar_chart"), options);

    chart.render();
    monthlyChart.render();
    yearlyChart.render();

    // Fetch data via Ajax (form submit or normal request)
    $('#dayFilterForm').on('submit', function (e) {
        e.preventDefault();

        let form = $(this);
        let actionUrl = form.attr('action');
        let formData = form.serialize();

        $.ajax({
            type: 'POST',
            url: actionUrl,
            data: formData,
            dataType: 'json',
            success: function (response) {
                // Example response: { labels: ["Food", "Rent", "Travel"], values: [200, 500, 150] }

                chart.updateOptions({
                    xaxis: {
                        categories: response.labels
                    }
                });

                chart.updateSeries([{
                    name: "Cost",
                    data: response.data
                }]);
            },
            error: function (xhr) {
                console.error("Error fetching chart data:", xhr.responseText);
            }
        });
    });

    // Fetch data via Ajax (form submit or normal request)
    //FOR MONTH FILTER
    $('#monthFilterForm').on('submit', function (e) {
        e.preventDefault();

        let form = $(this);
        let actionUrl = form.attr('action');
        let formData = form.serialize();

        $.ajax({
            type: 'POST',
            url: actionUrl,
            data: formData,
            dataType: 'json',
            success: function (response) {
            console.log(response);
            
                // Example response: { labels: ["Food", "Rent", "Travel"], values: [200, 500, 150] }

                monthlyChart.updateOptions({
                    xaxis: {
                        categories: response.labels
                    }
                });

                monthlyChart.updateSeries([{
                    name: "Cost",
                    data: response.data
                }]);
            },
            error: function (xhr) {
                console.error("Error fetching chart data:", xhr.responseText);
            }
        });
    });


    // Fetch data via Ajax (form submit or normal request)
    //FOR YEAR FILTER
    $('#yearFilterForm').on('submit', function (e) {
        e.preventDefault();

        let form = $(this);
        let actionUrl = form.attr('action');
        let formData = form.serialize();

        $.ajax({
            type: 'POST',
            url: actionUrl,
            data: formData,
            dataType: 'json',
            success: function (response) {
            console.log(response);
            
                // Example response: { labels: ["Food", "Rent", "Travel"], values: [200, 500, 150] }

                yearlyChart.updateOptions({
                    xaxis: {
                        categories: response.labels
                    }
                });

                yearlyChart.updateSeries([{
                    name: "Cost",
                    data: response.data
                }]);
            },
            error: function (xhr) {
                console.error("Error fetching chart data:", xhr.responseText);
            }
        });
    });


});
</script>


@endsection
