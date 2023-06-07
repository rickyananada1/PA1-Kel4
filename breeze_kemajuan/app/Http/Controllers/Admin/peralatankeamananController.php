<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\peralatankeamanan;
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
        return redirect()->route('admin.alatkeamanan.peralatankeamanan')->with('success', 'Peralatan Keamanan has been deleted successfully');
    }

    public function show($id)
    {
        $peralatankeamanan = peralatankeamanan::find($id);
        return view('client.alatkeamanan.show', compact('peralatankeamanan'));
    }
}