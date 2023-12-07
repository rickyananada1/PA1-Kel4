<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\peralatankeamanan;
use App\Models\Komentar;

class peralatankeamananController extends Controller
{
    public function index()
    {
        $peralatankeamanan = peralatankeamanan::all();
        return view('admin.alatkeamanan.peralatankeamanan', compact('peralatankeamanan'));
    }

    public function create()
    {
        return view('admin.alatkeamanan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|max:255',
            'harga' => 'integer',
            'stok' => 'integer',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $peralatankeamanan = new peralatankeamanan;
        $peralatankeamanan->name = $request->name;
        $peralatankeamanan->description = $request->description;
        $peralatankeamanan->harga = $request->harga;
        $peralatankeamanan->stok = $request->stok;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $destination_path = public_path('/images/alatkeamanan');
            $image->move($destination_path, $image_name);
            $peralatankeamanan->image = $image_name;
        }

        $peralatankeamanan->save();
        return redirect()->route('admin.alatkeamanan.peralatankeamanan')->with('success', 'Alat Keamanan has been created successfully');
    }

    public function edit(peralatankeamanan $peralatankeamanan)
    {
        return view('admin.alatkeamanan.edit', compact('peralatankeamanan'));
    }

    public function update(Request $request, peralatankeamanan $peralatankeamanan)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $peralatankeamanan->name = $request->name;
        $peralatankeamanan->harga = $request->harga;
        $peralatankeamanan->stok = $request->stok;
        $peralatankeamanan->description = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $destination_path = public_path('/images/alatkeamanan');
            $image->move($destination_path, $image_name);
            $peralatankeamanan->image = $image_name;
        }

        $peralatankeamanan->save();
        return redirect()->route('admin.alatkeamanan.peralatankeamanan')->with('success', 'Peralatan Keamanan has been updated successfully');
    }

    public function destroy(peralatankeamanan $peralatankeamanan)
    {
        $peralatankeamanan->delete();
        $alat_kemanan = Komentar::select('komentar', 'alat_keamanan')
            ->get();
        $komentar = null;
        return redirect()->route('admin.alatkeamanan.peralatankeamanan')->with('success', 'Peralatan Keamanan has been deleted successfully');
    }

    public function show($id)
    {
        $peralatankeamanan = peralatankeamanan::find($id);
        $alat_keamanan = Komentar::select('komentar', 'alat_keamanan')
            ->get();
            $alat_keamanan = Komentar::get();
        $komentar = null;
        return view('client.alatkeamanan.show', compact('peralatankeamanan', 'alat_keamanan'));
    }

    public function storeKomentar(Request $request, $id)
    {
        $idalat_keamanan = Komentar::find($id);
    
        // Validasi input pengguna
        $validateData = $request->validate([
            'komentar' => 'required',
            'alat_keamanan' => 'boolean', // Validasi tipe data boolean
            // tambahkan validasi untuk kolom lainnya jika diperlukan
        ]);
    
        $validateData['bahan_bangunan'] = false; // Memberikan nilai boolean langsung
        $validateData['alat_listrik'] = false;
        $validateData['alat_konstruksi'] = false;
        $validateData['alat_tanaman'] = false;
        $validateData['alat_keamanan'] = true;
        $validateData['alat_rumahtangga'] = false;
        $validateData['user_id'] = auth()->user()->id;
    
        $komentar_keamanan = Komentar::create($validateData);
    
        return redirect()->back()->with('success', 'Komentar berhasil ditambah!');
    }
    
    

    public function updateKomentar(Request $request, $id)
    {
        // Cari komentar berdasarkan ID
        $komentar = Komentar::find($id);

        // Jika komentar tidak ditemukan, kembalikan pesan error
        if (!$komentar) {
            return redirect('/dashboard')->with('error', 'Komentar tidak ditemukan!');
        }

        // Validasi input pengguna
        $validateData = $request->validate([
            'komentar' => 'required',
        ]);

        // Memastikan hanya pengguna yang melakukan komentar yang dapat mengeditnya
        if ($komentar->user_id !== auth()->user()->id) {
            return redirect('/dashboard')->with('error', 'Anda tidak memiliki izin untuk mengedit komentar ini!');
        }

        // Melakukan update komentar
        $komentar->komentar = $validateData['komentar'];
        $komentar->save();

        return redirect('/dashboard')->with('success', 'Komentar berhasil diperbarui!');
    }

}