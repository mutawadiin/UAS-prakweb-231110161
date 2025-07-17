@extends('layouts.app')
@section('content')
<div class="max-w-6xl mx-auto">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-primary-dark flex items-center gap-2 mb-2">
            <i class="fa-solid fa-gauge-high"></i> Dashboard
        </h1>
        <p class="text-gray-500 text-sm">Selamat datang di dashboard ringkasan aplikasi Rencana Liburan Anda.</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow p-6 flex items-center gap-4">
            <div class="bg-accent text-white rounded-full w-12 h-12 flex items-center justify-center text-2xl"><i class="fa-solid fa-list-check"></i></div>
            <div>
                <div class="text-2xl font-bold">{{ $rencanaCount }}</div>
                <div class="text-gray-500 text-sm">Total Rencana</div>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow p-6 flex items-center gap-4">
            <div class="bg-primary text-white rounded-full w-12 h-12 flex items-center justify-center text-2xl"><i class="fa-solid fa-users"></i></div>
            <div>
                <div class="text-2xl font-bold">{{ $pesertaCount }}</div>
                <div class="text-gray-500 text-sm">Total Peserta</div>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow p-6 flex items-center gap-4">
            <div class="bg-primary-light text-white rounded-full w-12 h-12 flex items-center justify-center text-2xl"><i class="fa-solid fa-route"></i></div>
            <div>
                <div class="text-2xl font-bold">{{ $perjalananCount }}</div>
                <div class="text-gray-500 text-sm">Total Perjalanan</div>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-bold mb-4 text-primary-dark flex items-center gap-2"><i class="fa fa-chart-bar"></i> Statistik Rencana Liburan</h2>
        <canvas id="dashboardChart" height="100"></canvas>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('dashboardChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Rencana', 'Peserta', 'Perjalanan'],
            datasets: [{
                label: 'Jumlah',
                data: [{{ $rencanaCount }}, {{ $pesertaCount }}, {{ $perjalananCount }}],
                backgroundColor: [
                    'rgba(97, 165, 194, 0.7)',
                    'rgba(1, 79, 134, 0.7)',
                    'rgba(42, 111, 151, 0.7)'
                ],
                borderRadius: 8,
            }]
        },
        options: {
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: { beginAtZero: true, ticks: { stepSize: 1 } }
            }
        }
    });
</script>
@endsection 