@extends('layouts.vertical');

@section('title', 'Dashboard')

@section('content')

    <div class="row">
        <div class="col-md-3">
            <div class="card small-widget mb-sm-0">
                <div class="card-body primary">
                    <span class="f-light">Pesanan Berlangsung</span>
                    <div class="d-flex align-items-end gap-1">
                        <h4>{{ $orders }}</h4>
                    </div>
                    <div class="bg-gradient">
                        <i data-feather="truck"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card small-widget mb-sm-0">
                <div class="card-body primary">
                    <span class="f-light">Product Tersedia</span>
                    <div class="d-flex align-items-end gap-1">
                        <h4>{{ $availableProducts }}</h4>
                    </div>
                    <div class="bg-gradient">
                        <i data-feather="archive"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card small-widget mb-sm-0">
                <div class="card-body secondary">
                    <span class="f-light">Product Habis</span>
                    <div class="d-flex align-items-end gap-1">
                        <h4>{{ $emptyProducts }}</h4>
                    </div>
                    <div class="bg-gradient">
                        <i data-feather="archive"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card small-widget mb-sm-0">
                <div class="card-body success">
                    <span class="f-light">Customers</span>
                    <div class="d-flex align-items-end gap-1">
                        <h4>{{ $customers }}</h4>
                    </div>
                    <div class="bg-gradient">
                        <i data-feather="user"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h5>Penjualan Minggu Ini</h5>
        </div>
        <div class="card-body">
            <div id="minggu-ini"></div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/chart/apex-chart/apex-chart.js') }}"></script>

    <script>
        var weeklyOption = {
            chart: {
                height: 350,
                type: 'area',
                toolbar: {
                    show: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            series: [{
                name: 'Penjualan',
                data: @json($chart['data'])
            }],
            labels: @json($chart['labels']),
            colors: [CubaAdminConfig.primary]
        }

        var weekly = new ApexCharts(
            document.querySelector("#minggu-ini"),
            weeklyOption
        );

        weekly.render();
    </script>
@endpush
