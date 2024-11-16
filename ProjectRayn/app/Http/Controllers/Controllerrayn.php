<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Policies\ProdukPolicy;
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Controllerrayn extends Controller
{
    public function TampilHome()
    {
        //apakah user adalah admin
        $isAdmin = Auth::user()->role == 'admin';

        //ambil produk dari database dan kelompokkan berdasarkan tanggal
        $produkPerHariQuery = Produk::selectRaw('DATE(created_at) as date, COUNT(*) as total')
        ->groupBy('date')
        ->orderBy('date', 'asc');

        //filter by user_id jika user bukan admin
        if (!$isAdmin) {
            $produkPerHariQuery->where('user_id', Auth::id());
        }

        $productPerHari = $produkPerHariQuery->get();

        //memisahkan data untuk grafik
        $dates = [];
        $totals = [];

        foreach($productPerHari as $item) {
            $dates[] = Carbon::parse($item->date)->format('Y-m-d'); //format tanggal
            $totals[] = $item->total;
        }

        //membuat grafik menggunakan data yang diambil
        $chart = LarapexChart::barChart()
            ->setTitle('Produk Ditambahkan Per Hari')
            ->setSubtitle('Data Penambahan Produk Harian')
            ->addData('Jumlah Produk', $totals)
            ->setXAxis($dates);
        //data tambahan untuk view
        $totalProductsQuery = Produk::query();

        //filter by user_id if the user is not an admin
        if (!$isAdmin) {
            $totalProductsQuery->where('user_id', Auth::id());
        }

        // data tambahan untuk view
        $data = [
            'totalProducts' => $totalProductsQuery->count(), //total produk
            'salesToday' => 100, //contoh data lainnya
            'totalRevenue' => 'Rp 50,000,000',
            'registeredUsers' => 350,
            'chart' =>  $chart //Pass chart ke view
        ];

        return view('home', $data);
    }
}
