<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Industri;
class IndustriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $industris = Industri::latest()->get();
        return view('industri.index', compact('industris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('industri.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $request->validate([
        'nama' => 'required|string|max:255',
        'bidang_usaha' => 'required|string|max:255',
        'alamat' => 'required|string',
        'kontak' => 'required|string|max:20',
        'email' => 'required|email|max:255',
    ]);

    Industri::create($request->only([
        'nama', 'bidang_usaha', 'alamat', 'kontak', 'email'
    ]));

    return redirect()->route('industri.index')->with('success', 'Data industri berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
