<?php

namespace App\Http\Controllers\Api;

use App\Models\Industri;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndustriApi extends Controller
{
    public function index()
    {
        return response()->json(Industri::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'bidang_usaha' => 'nullable|string',
            'alamat' => 'nullable|string',
            'kontak' => 'nullable|string',
            'email' => 'nullable|email|unique:industris,email',
        ]);

        $industri = Industri::create($validated);

        return response()->json($industri, 201);
    }

    public function show(Industri $industri)
    {
        return response()->json($industri);
    }

    public function update(Request $request, Industri $industri)
    {
        $validated = $request->validate([
            'nama' => 'sometimes|string',
            'bidang_usaha' => 'nullable|string',
            'alamat' => 'nullable|string',
            'kontak' => 'nullable|string',
            'email' => 'nullable|email|unique:industris,email,' . $industri->id,
        ]);

        $industri->update($validated);

        return response()->json($industri);
    }

    public function destroy(Industri $industri)
    {
        $industri->delete();

        return response()->json(null, 204);
    }
}
