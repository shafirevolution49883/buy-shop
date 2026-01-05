@extends('backEnd.layouts.master')
@section('title','Dashboard')
@section('css')
<!-- Plugins css -->
<link href="{{asset('public/backEnd/')}}/assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
<link href="{{asset('public/backEnd/')}}/assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />
@endsection

  


@section('content')
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right"></div>
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 
    
    

   <div class="container-fluid">

    <!-- Dashboard Widgets Row -->
    <div class="row">
        <!-- Total Order -->
        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                <i class="fe-shopping-cart font-22 avatar-title text-primary"></i>
                            </div>
                        </div>
                        <div class="col-6 text-end">
                            <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$total_order}}</span></h3>
                            <p class="text-muted mb-1 text-truncate">Total Order</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Today's Order -->
        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                <i class="fe-shopping-bag font-22 avatar-title text-success"></i>
                            </div>
                        </div>
                        <div class="col-6 text-end">
                            <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$today_order}}</span></h3>
                            <p class="text-muted mb-1 text-truncate">Today's Order</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products -->
        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                <i class="fe-database font-22 avatar-title text-info"></i>
                            </div>
                        </div>
                        <div class="col-6 text-end">
                            <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$total_product}}</span></h3>
                            <p class="text-muted mb-1 text-truncate">Products</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Customers -->
        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                                <i class="fe-user font-22 avatar-title text-warning"></i>
                            </div>
                        </div>
                        <div class="col-6 text-end">
                            <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$total_customer}}</span></h3>
                            <p class="text-muted mb-1 text-truncate">Customer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Latest Orders & Customers -->
    <div class="row">
        <!-- Latest Orders -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Latest 5 Orders</h4>
                    <div class="table-responsive">
                        <table class="table table-borderless table-hover table-nowrap table-centered m-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Invoice</th>
                                    <th>Amount</th>
                                    <th>Customer</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($latest_order as $order)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td style="width: 36px;">
                                        <img src="{{asset($order->product?$order->product->image->image:'')}}" 
                                             class="rounded-circle avatar-sm" />
                                    </td>
                                    <td>{{$order->invoice_id}}</td>
                                    <td>{{$order->amount}}</td>
                                    <td>{{$order->customer?$order->customer->name:''}}</td>
                                    <td>{{$order->order_status}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Latest Customers -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Latest Customers</h4>
                    <div class="table-responsive">
                        <table class="table table-borderless table-hover table-centered m-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($latest_customer as $customer)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$customer->name}}</td>
                                    <td>{{$customer->phone}}</td>
                                    <td>{{$customer->created_at->format('d-m-Y')}}</td>
                                    <td>{{$customer->status}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row">
        <!-- Total Revenue Chart -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Total Revenue</h4>
                    <div id="total-revenue" data-colors="#f1556c"></div>
                </div>
            </div>
        </div>

        <!-- Sales Analytics Chart -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Sales Analytics</h4>
                    <div id="sales-analytics" data-colors="#1abc9c,#4a81d4"></div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Styles for Gradient + Glass cards -->
<style>
/* Body Gradient Background */
body {
    background: linear-gradient(135deg, #f9fcff 0%, #ebf7fb 50%, #f2faff 100%);
    color: #333;
    font-family: 'Poppins', sans-serif;
}

/* Card Gradient Background */
.card {
    background: linear-gradient(145deg, #ffffff 0%, #ebf7fb 100%);
    border-radius: 15px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.15);
    border: none;
    color: #333;
    transition: transform 0.3s, box-shadow 0.3s, background 0.3s;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 45px rgba(0,0,0,0.2);
    background: linear-gradient(145deg, #f5fbfd 0%, #e0f4f8 100%);
}

/* Header Titles */
.header-title {
    color: #333;
    font-weight: 600;
}

/* Widget rounded circle cards */
.widget-rounded-circle .avatar-lg {
    border-width: 2px !important;
}

/* Table Styling */
.table {
    color: #333;
}
.table th, .table td {
    border-top: none;
}
.table thead.table-light th {
    background: rgba(0,0,0,0.03);
    color: #333;
}
.table tbody tr:hover {
    background: rgba(0,0,0,0.02);
}

/* Text Colors */
.text-dark { color: #333 !important; }
.text-muted { color: #666 !important; }

/* Avatar icon backgrounds */
.bg-soft-primary { background-color: rgba(37, 117, 252,0.15) !important; }
.bg-soft-success { background-color: rgba(72, 180, 97,0.15) !important; }
.bg-soft-info { background-color: rgba(0, 179, 218,0.15) !important; }
.bg-soft-warning { background-color: rgba(255, 193, 7,0.15) !important; }

.text-primary { color: #2575fc !important; }
.text-success { color: #48b461 !important; }
.text-info { color: #00b3da !important; }
.text-warning { color: #ffc107 !important; }

/* Charts Cards */
#total-revenue, #sales-analytics {
    background: transparent;
}

/* Responsive tweaks */
@media (max-width: 575px) {
    .card-body { padding: 15px !important; }
}
</style>






<!--Endxx container -->
@endsection

@section('script')
<!-- Plugins js-->
<script src="{{asset('public/backEnd/')}}/assets/libs/flatpickr/flatpickr.min.js"></script>
<script src="{{asset('public/backEnd/')}}/assets/libs/apexcharts/apexcharts.min.js"></script>
<script src="{{asset('public/backEnd/')}}/assets/libs/selectize/js/standalone/selectize.min.js"></script>

<script>
    // Total Revenue Chart
    var colors = ["#f1556c"];
    var dataColors = $("#total-revenue").data("colors");
    if (dataColors) colors = dataColors.split(",");

    var options = {
        chart: { height: 242, type: "radialBar" },
        plotOptions: { radialBar: { hollow: { size: "65%" } } },
        colors: colors,
        labels: ["Delivery"]
    };

    if (document.querySelector("#total-revenue")) {
        var chart = new ApexCharts(document.querySelector("#total-revenue"), options);
        chart.render();
    }

    // Sales Analytics Chart
    colors = ["#1abc9c", "#4a81d4"];
    dataColors = $("#sales-analytics").data("colors");
    if (dataColors) colors = dataColors.split(",");

    var options2 = {
        series: [
            {
                name: "Revenue",
                type: "column",
                data: [@foreach($monthly_sale as $sale) {{$sale->amount}}, @endforeach]
            },
            {
                name: "Sales",
                type: "line",
                data: [@foreach($monthly_sale as $sale) {{$sale->amount}}, @endforeach]
            }
        ],
        chart: { height: 378, type: "line" },
        stroke: { width: [2, 3] },
        plotOptions: { bar: { columnWidth: "50%" } },
        colors: colors,
        dataLabels: { enabled: true, enabledOnSeries: [1] },
        labels: [
            @foreach($monthly_sale as $sale) 
                "{{ date('d-m-Y', strtotime($sale->date)) }}", 
            @endforeach
        ],
        legend: { offsetY: 7 },
        grid: { padding: { bottom: 20 } },
        fill: {
            type: "gradient",
            gradient: { shade: "light", type: "horizontal", opacityFrom: .75, opacityTo: .75, stops: [0, 0, 0] }
        },
        yaxis: [{ title: { text: "Net Revenue" } }]
    };

    if (document.querySelector("#sales-analytics")) {
        var chart2 = new ApexCharts(document.querySelector("#sales-analytics"), options2);
        chart2.render();
    }

    // Date Range Picker
    $("#dash-daterange").flatpickr({ altInput: true, mode: "range" });
</script>
@endsection
