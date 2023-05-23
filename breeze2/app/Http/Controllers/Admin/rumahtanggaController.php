<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\rumahtangga;
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
        return view('client.alatrt.show', compact('rumahtangga'));
    }
}
