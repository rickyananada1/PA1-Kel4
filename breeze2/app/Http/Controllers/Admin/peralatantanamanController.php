<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\peralatantanaman;
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
        return view('client.alattanaman.show', compact('peralatantanaman'));
    }
}
