<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\peralatanlistrik;
use App\Models\Komentar;

class peralatanlistrikController extends Controller
{
    public function index()
    {
        $peralatanlistrik = peralatanlistrik::all();
        return view('admin.alatlistrik.peralatanlistrik', compact('peralatanlistrik'));
    }

    public function create()
    {
        return view('admin.alatlistrik.create');
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

        $peralatanlistrik = new peralatanlistrik;
        $peralatanlistrik->name = $request->name;
        $peralatanlistrik->description = $request->description;
        $peralatanlistrik->harga = $request->harga;
        $peralatanlistrik->stok = $request->stok;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $destination_path = public_path('/images/alatlistrik');
            $image->move($destination_path, $image_name);
            $peralatanlistrik->image = $image_name;
        }

        $peralatanlistrik->save();
        return redirect()->route('admin.alatlistrik.peralatanlistrik')->with('success', 'Peralatan listrik has been created successfully');
    }

    public function edit(peralatanlistrik $peralatanlistrik)
    {
        return view('admin.alatlistrik.edit', compact('peralatanlistrik'));
    }

    public function update(Request $request, peralatanlistrik $peralatanlistrik)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $peralatanlistrik->name = $request->name;
        $peralatanlistrik->harga = $request->harga;
        $peralatanlistrik->stok = $request->stok;
        $peralatanlistrik->description = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $destination_path = public_path('/images/alatlistrik');
            $image->move($destination_path, $image_name);
            $peralatanlistrik->image = $image_name;
        }

        $peralatanlistrik->save();
        return redirect()->route('admin.alatlistrik.peralatanlistrik')->with('success', 'Peralatan listrik has been updated successfully');
    }

    public function destroy(peralatanlistrik $peralatanlistrik)
    {
        $peralatanlistrik->delete();
        return redirect()->route('admin.alatlistrik.peralatanlistrik')->with('success', 'Peralatan listrik has been deleted successfully');
    }
    public function show($id)
    {
        $peralatanlistrik = peralatanlistrik::find($id);
        $alat_listriks = Komentar::select('komentar', 'alat_listrik')
            ->get();
        $alat_listriks = Komentar::get();
        return view('client.alatlistrik.show', compact('peralatanlistrik', 'alat_listriks'));
    }

    public function storeKomentar(Request $request, $id)
    {
        $idbalat_listrik = Komentar::find($id);
    
        // Validasi input pengguna
        $validateData = $request->validate([
            'komentar' => 'required',
            'alat_listrik' => 'boolean', // Validasi tipe data boolean
            // tambahkan validasi untuk kolom lainnya jika diperlukan
        ]);
    
        $validateData['bahan_bangunan'] = false; // Memberikan nilai boolean langsung
        $validateData['alat_listrik'] = true;
        $validateData['alat_konstruksi'] = false;
        $validateData['alat_tanaman'] = false;
        $validateData['alat_keamanan'] = false;
        $validateData['alat_rumahtangga'] = false;
        $validateData['user_id'] = auth()->user()->id;
    
        $komentar_listrik = Komentar::create($validateData);
    
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