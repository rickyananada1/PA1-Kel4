<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\peralatantanaman;
use App\Models\Komentar;
class peralatantanamanController extends Controller
{
    public function index()
    {
        $peralatantanaman = peralatantanaman::all();
        return view('admin.alattanaman.peralatantanaman', compact('peralatantanaman'));
    }

    public function create()
    {
        return view('admin.alattanaman.create');
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

        $peralatantanaman = new peralatantanaman;
        $peralatantanaman->name = $request->name;
        $peralatantanaman->description = $request->description;
        $peralatantanaman->harga = $request->harga;
        $peralatantanaman->stok = $request->stok;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $destination_path = public_path('/images/alattanaman');
            $image->move($destination_path, $image_name);
            $peralatantanaman->image = $image_name;
        }

        $peralatantanaman->save();
        return redirect()->route('admin.alattanaman.peralatantanaman')->with('success', 'Peralatan Tanaman has been created successfully');
    }

    public function edit(peralatantanaman $peralatantanaman)
    {
        return view('admin.alattanaman.edit', compact('peralatantanaman'));
    }

    public function update(Request $request, peralatantanaman $peralatantanaman)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $peralatantanaman->name = $request->name;
        $peralatantanaman->harga = $request->harga;
        $peralatantanaman->stok = $request->stok;
        $peralatantanaman->description = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $destination_path = public_path('/images/alattanaman');
            $image->move($destination_path, $image_name);
            $peralatantanaman->image = $image_name;
        }

        $peralatantanaman->save();
        return redirect()->route('admin.alattanaman.peralatantanaman')->with('success', 'Peralatan tanaman has been updated successfully');
    }

    public function destroy(peralatantanaman $peralatantanaman)
    {
        $peralatantanaman->delete();
        return redirect()->route('admin.alattanaman.peralatantanaman')->with('success', 'Peralatan tanaman has been deleted successfully');
    }
    public function show($id)
    {
        $peralatantanaman = peralatantanaman::find($id);
        $alat_tanaman = Komentar::select('komentar', 'alat_tanaman')
            ->get();
            $alat_tanaman = Komentar::get();
        $komentar = null;
        return view('client.alattanaman.show', compact('peralatantanaman', 'alat_tanaman'));
    }
    public function storeKomentar(Request $request, $id)
    {
        $idalat_tanaman = Komentar::find($id);
    
        // Validasi input pengguna
        $validateData = $request->validate([
            'komentar' => 'required',
            'alat_tanaman$idalat_tanaman' => 'boolean', // Validasi tipe data boolean
            // tambahkan validasi untuk kolom lainnya jika diperlukan
        ]);
    
        $validateData['bahan_bangunan'] = true; // Memberikan nilai boolean langsung
        $validateData['alat_listrik'] = false;
        $validateData['alat_konstruksi'] = false;
        $validateData['alat_tanaman'] = false;
        $validateData['alat_keamanan'] = false;
        $validateData['alat_rumahtangga'] = false;
        $validateData['user_id'] = auth()->user()->id;
    
        $komentar_tanaman = Komentar::create($validateData);
    
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
