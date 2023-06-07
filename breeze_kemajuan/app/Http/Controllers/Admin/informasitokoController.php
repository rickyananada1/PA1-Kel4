<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\informasitoko;

class informasitokoController extends Controller
{
    public function index()
    {
        $informasitoko = informasitoko::latest()->get();
        return view('admin.informasi.informasitoko', compact('informasitoko'));
    }

    public function create()
    {
        return view('admin.informasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $informasitoko = new informasitoko;
        $informasitoko->name = $request->name;
        $informasitoko->description = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $destination_path = public_path('/images/informasi');
            $image->move($destination_path, $image_name);
            $informasitoko->image = $image_name;
        }

        $informasitoko->save();
        return redirect()->route('admin.informasi.informasitoko')->with('success', 'Alat Keamanan has been created successfully');
    }

    public function edit(informasitoko $informasitoko)
    {
        return view('admin.informasi.edit', compact('informasitoko'));
    }

    public function update(Request $request, informasitoko $informasitoko)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $informasitoko->name = $request->name;
        $informasitoko->description = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $destination_path = public_path('/images/informasi');
            $image->move($destination_path, $image_name);
            $informasitoko->image = $image_name;
        }

        $informasitoko->save();
        return redirect()->route('admin.informasi.informasitoko')->with('success', 'Peralatan Keamanan has been updated successfully');
    }

    public function destroy(informasitoko $informasitoko)
    {
        $informasitoko->delete();
        return redirect()->route('admin.informasi.informasitoko')->with('success', 'Peralatan Keamanan has been deleted successfully');
    }
}
