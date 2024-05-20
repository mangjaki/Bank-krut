@extends('layouts.app')
<!-- Styles -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@section('content')
    <div class="container">
        <h1>Dashboard</h1>
        <div class="row">
            <div class="col-md-6">
                <h3>Buku Ditambahkan Per Bulan</h3>
                <canvas id="bukuChart"></canvas>
            </div>
            <div class="col-md-6">
                <h3>Anggota Ditambahkan Per Bulan</h3>
                <canvas id="anggotaChart"></canvas>
            </div>
        </div>
    </div>

    <script>
        var bukuChartData = @json($bukuChartData);
        var anggotaChartData = @json($anggotaChartData);

        var bukuLabels = bukuChartData.map(function(item) { return item.month; });
        var bukuCounts = bukuChartData.map(function(item) { return item.count; });

        var anggotaLabels = anggotaChartData.map(function(item) { return item.month; });
        var anggotaCounts = anggotaChartData.map(function(item) { return item.count; });

        var ctxBuku = document.getElementById('bukuChart').getContext('2d');
        var ctxAnggota = document.getElementById('anggotaChart').getContext('2d');

        var bukuChart = new Chart(ctxBuku, {
            type: 'line',
            data: {
                labels: bukuLabels,
                datasets: [{
                    label: 'Buku Ditambahkan',
                    data: bukuCounts,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var anggotaChart = new Chart(ctxAnggota, {
            type: 'line',
            data: {
                labels: anggotaLabels,
                datasets: [{
                    label: 'Anggota Ditambahkan',
                    data: anggotaCounts,
                    borderColor: 'rgba(153, 102, 255, 1)',
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
