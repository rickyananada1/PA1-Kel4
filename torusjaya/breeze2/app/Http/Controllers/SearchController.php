<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BahanBangunan;
use App\Models\PeralatanListrik;
use App\Models\RumahTangga;
use App\Models\PeralatanTanaman;
use App\Models\PeralatanKonstruksi;
use App\Models\PeralatanKeamanan;

class SearchController extends Controller
{
    public function search(Request $request)
{
    $keyword = $request->input('keyword');
    
    $results = [];
    
    // Pencarian pada tabel BahanBangunan
    $bahanBangunanResults = BahanBangunan::where('name', 'LIKE', "%$keyword%")
        ->orWhere('description', 'LIKE', "%$keyword%")
        ->get();
    
    // Pencarian pada tabel PeralatanListrik
    $peralatanListrikResults = PeralatanListrik::where('name', 'LIKE', "%$keyword%")
        ->orWhere('description', 'LIKE', "%$keyword%")
        ->get();
    
    // Pencarian pada tabel RumahTangga
    $rumahTanggaResults = RumahTangga::where('name', 'LIKE', "%$keyword%")
        ->orWhere('description', 'LIKE', "%$keyword%")
        ->get();
    
    // Pencarian pada tabel PeralatanTanaman
    $peralatanTanamanResults = PeralatanTanaman::where('name', 'LIKE', "%$keyword%")
        ->orWhere('description', 'LIKE', "%$keyword%")
        ->get();
    
    // Pencarian pada tabel PeralatanKonstruksi
    $peralatanKonstruksiResults = PeralatanKonstruksi::where('name', 'LIKE', "%$keyword%")
        ->orWhere('description', 'LIKE', "%$keyword%")
        ->get();
    
    // Pencarian pada tabel PeralatanKemanan
    $peralatanKemananResults = PeralatanKeamanan::where('name', 'LIKE', "%$keyword%")
        ->orWhere('description', 'LIKE', "%$keyword%")
        ->get();
    
    // Gabungkan hasil pencarian dari semua tabel ke dalam satu array
    $results = $bahanBangunanResults
        ->concat($peralatanListrikResults)
        ->concat($rumahTanggaResults)
        ->concat($peralatanTanamanResults)
        ->concat($peralatanKonstruksiResults)
        ->concat($peralatanKemananResults);
    
    return view('search_results', ['results' => $results]);
}

}
