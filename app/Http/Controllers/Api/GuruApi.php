<?php

namespace App\Http\Controllers\Api;

use App\Models\Guru;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GuruApi extends Controller
{
    public function index()
    {
        return response()->json(Guru::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'nip' => 'required|string|unique:gurus,nip',
            'gender' => 'required|in:L,P',
            'alamat' => 'nullable|string',
            'kontak' => 'nullable|string',
            'email' => 'nullable|email|unique:gurus,email',
        ]);

        $guru = Guru::create($validated);

        return response()->json($guru, 201);
    }

    public function show(Guru $guru)
    {
        return response()->json($guru);
    }

    public function update(Request $request, Guru $guru)
    {
        $validated = $request->validate([
            'nama' => 'sometimes|string',
            'nip' => 'sometimes|string|unique:gurus,nip,' . $guru->id,
            'gender' => 'sometimes|in:L,P',
            'alamat' => 'nullable|string',
            'kontak' => 'nullable|string',
            'email' => 'nullable|email|unique:gurus,email,' . $guru->id,
        ]);

        $guru->update($validated);

        return response()->json($guru);
    }

    public function destroy(Guru $guru)
    {
        $guru->delete();

        return response()->json(null, 204);
    }
}
