<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Anggota;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $bukuData = Buku::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('year', 'month')
            ->get();

        $anggotaData = Anggota::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('year', 'month')
            ->get();

        $bukuChartData = $this->processChartData($bukuData);
        $anggotaChartData = $this->processChartData($anggotaData);

        return view('dashboard.index', compact('bukuChartData', 'anggotaChartData'));
    }

    private function processChartData($data)
    {
        $chartData = [];
        foreach ($data as $item) {
            $month = Carbon::create()->month($item->month)->format('F');
            $chartData[$month] = $item->count;
        }

        $months = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];

        $formattedData = [];
        foreach ($months as $month) {
            $formattedData[] = [
                'month' => $month,
                'count' => $chartData[$month] ?? 0
            ];
        }

        return $formattedData;
    }
}
