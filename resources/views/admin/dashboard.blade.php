@extends('layouts.admin')

@section('title', 'Dashboard')

@section('header')
    <h1>Dashboard</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-door-open"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Kelas</h4>
                    </div>
                    <div class="card-body">
                        {{ $data['kelas'] }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Siswa</h4>
                    </div>
                    <div class="card-body">
                        {{ $data['siswa'] }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Berita</h4>
                    </div>
                    <div class="card-body">
                        {{ $data['berita'] }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                    <i class="fas fa-images"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Galeri</h4>
                    </div>
                    <div class="card-body">
                        {{ $data['galeri'] }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="page-content page-container" id="page-content">
                        <div class="padding">
                            <div class="row">
                                <div class="container-fluid d-flex justify-content-center">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header">Jumlah Siswa Berdasarkan Kelas</div>
                                            <div class="card-body" style="height: 420px">
                                                <div class="chartjs-size-monitor"
                                                    style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                                    <div class="chartjs-size-monitor-expand"
                                                        style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                                        <div
                                                            style="position:absolute;width:1000000px;height:1000000px;left:0;top:0">
                                                        </div>
                                                    </div>
                                                    <div class="chartjs-size-monitor-shrink"
                                                        style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                                        <div style="position:absolute;width:200%;height:200%;left:0; top:0">
                                                        </div>
                                                    </div>
                                                </div> <canvas id="donut-chart" width="299" height="100"
                                                    class="chartjs-render-monitor"
                                                    style="display: block; width: 299px; height: 200px;"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="page-content page-container" id="page-content">
                        <div class="padding">
                            <div class="row">
                                <div class="container-fluid d-flex justify-content-center">
                                    <div class="col-sm-8 col-md-12">
                                        <div class="card">
                                            <div class="card-header">Jumlah Pendaftar Setiap Bulannya</div>
                                            <div class="card-body" style="height: 420px">
                                                <div class="chartjs-size-monitor"
                                                    style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                                    <div class="chartjs-size-monitor-expand"
                                                        style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                                        <div
                                                            style="position:absolute;width:1000000px;height:1000000px;left:0;top:0">
                                                        </div>
                                                    </div>
                                                    <div class="chartjs-size-monitor-shrink"
                                                        style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                                        <div style="position:absolute;width:200%;height:200%;left:0; top:0">
                                                        </div>
                                                    </div>
                                                </div> <canvas id="bar-chart" width="299" height="100"
                                                    class="chartjs-render-monitor"
                                                    style="display: block; width: 299px; height: 200px;"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>
<script>
    var label_donuts = '{!! json_encode($label_donuts) !!}';
    var data_donuts = '{!! json_encode($data_donuts) !!}';
    $(document).ready(function() {
        var ctx = $("#donut-chart");
        var donutChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: JSON.parse(label_donuts),
                datasets: [{
                    data: JSON.parse(data_donuts),
                    backgroundColor: ["rgba(255, 0, 0, 0.5)", "rgba(100, 255, 0, 0.5)", "rgba(200, 50, 255, 0.5)", "rgba(0, 100, 255, 0.5)"]
                }]
            }
        });
    });
</script>
<script>
    var label_bar = '{!! json_encode($label_bar) !!}';
    var data_bar = '{!! json_encode($data_bar) !!}';
    $(document).ready(function() {
        var ctx = $("#bar-chart");
        var barChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'July', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                datasets: JSON.parse(data_bar)
            },
        });
    });
</script>
@endpush
