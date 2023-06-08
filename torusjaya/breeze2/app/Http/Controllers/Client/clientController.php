<?php

namespace App\Http\Controllers\client;
use App\Http\Controllers\Controller;
use App\Models\Bahanbangunan;
use App\Models\informasitoko;
use App\Models\peralatankeamanan;
use App\Models\peralatankonstruksi;
use App\Models\peralatanlistrik;
use App\Models\peralatantanaman;
use App\Models\rumahtangga;
use Illuminate\Http\Request;

class clientController extends Controller
{
    public function index(){
        return view('client.welcome');
    }

    public function keamanan(){
        return view('client.alatkeamanan.peralatankeamanan');
    }
	
    public function bahanbangunan(){
        return view('client.bahanbangunan.bahanbangunan');
    }

    public function alatkonstruksi(){
        return view('client.alatkonstruksi.peralatankonstruksi');
    }

    public function peralatanlistrik(){
        return view('client.alatlistrik.peralatanlistrik');
    }

    public function rumahtangga(){
        return view('client.alatrt.rumahtangga');
    }
    
    public function tanaman(){
        return view('client.alattanaman.peralatantanaman');
    }
    public function about(){
        return view('client.about');
    }

    public function all()
    {
        $bahanbangunans = BahanBangunan::all();
        $informasitokos = InformasiToko::all();
        $peralatankeamanans = PeralatanKeamanan::all();
        $peralatankonstruksis = PeralatanKonstruksi::all();
        $peralatanlistriks = PeralatanListrik::all();
        $peralatantanamen = Peralatantanaman::all();
        $rumahtanggas = RumahTangga::all();

        return view('client.allproduct', compact(
            'bahanbangunans',
            'informasitokos',
            'peralatankeamanans',
            'peralatankonstruksis',
            'peralatanlistriks',
            'peralatantanamen',
            'rumahtanggas'
        ));
    }

    
}
