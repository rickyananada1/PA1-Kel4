<?php

namespace App\Http\Controllers\client;
use App\Http\Controllers\Controller;
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
    

}
