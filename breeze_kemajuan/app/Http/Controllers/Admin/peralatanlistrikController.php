<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\peralatanlistrik;

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
        return view('client.alatlistrik.show', compact('peralatanlistrik'));
    }
}
