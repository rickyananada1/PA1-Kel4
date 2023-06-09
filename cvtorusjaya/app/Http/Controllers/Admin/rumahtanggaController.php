<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\rumahtangga;
use App\Models\Komentar;
class rumahtanggaController extends Controller
{
    public function index()
    {
        $rumahtangga = rumahtangga::all();
        return view('admin.alatrt.rumahtangga', compact('rumahtangga'));
    }

    public function create()
    {
        return view('admin.alatrt.create');
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

        $rumahtangga = new rumahtangga;
        $rumahtangga->name = $request->name;
        $rumahtangga->description = $request->description;
        $rumahtangga->harga = $request->harga;
        $rumahtangga->stok = $request->stok;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $destination_path = public_path('/images/alatrt');
            $image->move($destination_path, $image_name);
            $rumahtangga->image = $image_name;
        }

        $rumahtangga->save();
        return redirect()->route('admin.alatrt.rumahtangga')->with('success', 'Peralatan Rumah Tangga has been created successfully');
    }

    public function edit(rumahtangga $rumahtangga)
    {
        return view('admin.alatrt.edit', compact('rumahtangga'));
    }

    public function update(Request $request, rumahtangga $rumahtangga)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $rumahtangga->name = $request->name;
        $rumahtangga->harga = $request->harga;
        $rumahtangga->stok = $request->stok;
        $rumahtangga->description = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $destination_path = public_path('/images/alatrt');
            $image->move($destination_path, $image_name);
            $rumahtangga->image = $image_name;
        }

        $rumahtangga->save();
        return redirect()->route('admin.alatrt.rumahtangga')->with('success', 'Peralatan Rumah Tangga has been updated successfully');
    }

    public function destroy(rumahtangga $rumahtangga)
    {
        $rumahtangga->delete();
        return redirect()->route('admin.alatrt.rumahtangga')->with('success', 'Peralatan Rumah Tangga has been deleted successfully');
    }
    public function show($id)
    {
        $rumahtangga = rumahtangga::find($id);
        $alat_rumahtangga = Komentar::select('komentar', 'alat_rumahtangga')
            ->get();
            $alat_rumahtangga = Komentar::get();
        $komentar = null;
        return view('client.alatrt.show', compact('rumahtangga', 'alat_rumahtangga'));
    }

    public function storeKomentar(Request $request, $id)
    {
        $idalat_rumahtangga = Komentar::find($id);
    
        // Validasi input pengguna
        $validateData = $request->validate([
            'komentar' => 'required',
            'alat_rumahtangga' => 'boolean', // Validasi tipe data boolean
            // tambahkan validasi untuk kolom lainnya jika diperlukan
        ]);
    
        $validateData['bahan_bangunan'] = true; // Memberikan nilai boolean langsung
        $validateData['alat_listrik'] = false;
        $validateData['alat_konstruksi'] = false;
        $validateData['alat_tanaman'] = false;
        $validateData['alat_keamanan'] = false;
        $validateData['alat_rumahtangga'] = false;
        $validateData['user_id'] = auth()->user()->id;
    
        $komentar_rumahtangga = Komentar::create($validateData);
    
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
