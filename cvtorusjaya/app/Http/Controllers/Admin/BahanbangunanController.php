<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\bahanbangunan;
use App\Models\Komentar;


class BahanbangunanController extends Controller
{
    public function index()
    {
        $bahanbangunan = bahanbangunan::all();
        return view('admin.bahanbangunan.bahanbangunan', compact('bahanbangunan'));
    }
    public function home()
    {
        return view('admin.home');
    }

    public function create()
    {
        return view('admin.bahanbangunan.create');
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

        $bahanbangunan = new bahanbangunan;
        $bahanbangunan->name = $request->name;
        $bahanbangunan->description = $request->description;
        $bahanbangunan->harga = $request->harga;
        $bahanbangunan->stok = $request->stok;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destination_path = public_path('/images/bahanbangunan');
            $image->move($destination_path, $image_name);
            $bahanbangunan->image = $image_name;
        }

        $bahanbangunan->save();
        return redirect()->route('admin.bahanbangunan.bahanbangunan')->with('success', 'Bahan bangunan has been created successfully');
    }

    public function edit(bahanbangunan $bahanbangunan)
    {
        return view('admin.bahanbangunan.edit', compact('bahanbangunan'));
    }

    public function update(Request $request, bahanbangunan $bahanbangunan)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $bahanbangunan->name = $request->name;
        $bahanbangunan->harga = $request->harga;
        $bahanbangunan->stok = $request->stok;
        $bahanbangunan->description = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destination_path = public_path('/images/bahanbangunan');
            $image->move($destination_path, $image_name);
            $bahanbangunan->image = $image_name;
        }

        $bahanbangunan->save();
        return redirect()->route('admin.bahanbangunan.bahanbangunan')->with('success', 'bahanbangunan has been updated successfully');
    }

    public function destroy(bahanbangunan $bahanbangunan)
    {
        $bahanbangunan->delete();
        return redirect()->route('admin.bahanbangunan.bahanbangunan')->with('success', 'bahanbangunan has been deleted successfully');
    }

    public function show($id)
    {
        $bahanbangunan = BahanBangunan::find($id);
        $bahan_bangunan = Komentar::select('komentar', 'bahan_bangunan')
            ->get();
            $bahan_bangunan = Komentar::get();
        $komentar = null;
       

        return view('client.bahanbangunan.show', compact('bahanbangunan', 'komentar', 'bahan_bangunan'));

    }
    public function storeKomentar(Request $request, $id)
    {
        $idbahan_bangunan = Komentar::find($id);
    
        // Validasi input pengguna
        $validateData = $request->validate([
            'komentar' => 'required',
            'bahan_bangunan' => 'boolean', // Validasi tipe data boolean
            // tambahkan validasi untuk kolom lainnya jika diperlukan
        ]);
    
        $validateData['bahan_bangunan'] = true; // Memberikan nilai boolean langsung
        $validateData['alat_listrik'] = false;
        $validateData['alat_konstruksi'] = false;
        $validateData['alat_tanaman'] = false;
        $validateData['alat_keamanan'] = false;
        $validateData['alat_rumahtangga'] = false;
        $validateData['user_id'] = auth()->user()->id;
    
        $komentar_bangunan = Komentar::create($validateData);
    
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