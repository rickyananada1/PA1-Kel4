<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\bahanbangunan;
class BahanbangunanController extends Controller
{
    public function index()
    {
        $bahanbangunan = bahanbangunan::all();
        return view('admin.bahanbangunan.bahanbangunan', compact('bahanbangunan'));
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
            $image_name = time().'.'.$image->getClientOriginalExtension();
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
            $image_name = time().'.'.$image->getClientOriginalExtension();
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
    return view('client.bahanbangunan.show', compact('bahanbangunan'));
}

}
