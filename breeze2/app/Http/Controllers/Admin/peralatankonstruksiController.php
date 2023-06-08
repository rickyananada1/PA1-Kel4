<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\peralatankonstruksi;
class peralatankonstruksiController extends Controller
{
    public function index()
    {
        $peralatankonstruksi = peralatankonstruksi::all();
        return view('admin.alatkonstruksi.peralatankonstruksi', compact('peralatankonstruksi'));
    }

    public function create()
    {
        return view('admin.alatkonstruksi.create');
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

        $peralatankonstruksi = new peralatankonstruksi;
        $peralatankonstruksi->name = $request->name;
        $peralatankonstruksi->description = $request->description;
        $peralatankonstruksi->harga = $request->harga;
        $peralatankonstruksi->stok = $request->stok;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $destination_path = public_path('/images/alatkonstruksi');
            $image->move($destination_path, $image_name);
            $peralatankonstruksi->image = $image_name;
        }

        $peralatankonstruksi->save();
        return redirect()->route('admin.alatkonstruksi.peralatankonstruksi')->with('success', 'Peralatan Konstruksi has been created successfully');
    }

    public function edit(peralatankonstruksi $peralatankonstruksi)
    {
        return view('admin.alatkonstruksi.edit', compact('peralatankonstruksi'));
    }

    public function update(Request $request, peralatankonstruksi $peralatankonstruksi)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $peralatankonstruksi->name = $request->name;
        $peralatankonstruksi->harga = $request->harga;
        $peralatankonstruksi->stok = $request->stok;
        $peralatankonstruksi->description = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $destination_path = public_path('/images/alatkonstruksi');
            $image->move($destination_path, $image_name);
            $peralatankonstruksi->image = $image_name;
        }

        $peralatankonstruksi->save();
        return redirect()->route('admin.alatkonstruksi.peralatankonstruksi')->with('success', 'Peralatan konstruksi has been updated successfully');
    }

    public function destroy(peralatankonstruksi $peralatankonstruksi)
    {
        $peralatankonstruksi->delete();
        return redirect()->route('admin.alatkonstruksi.peralatankonstruksi')->with('success', 'Peralatan Konstruksi has been deleted successfully');
    }
    public function show($id)
    {
        $peralatankonstruksi = peralatankonstruksi::find($id);
        return view('client.alatkonstruksi.show', compact('peralatankonstruksi'));
    }
}
