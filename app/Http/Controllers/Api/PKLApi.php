<?php

namespace App\Http\Controllers\Api;

use App\Models\PKL;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PKLApi extends Controller
{
    public function index()
    {
        return response()->json(PKL::with(['siswa', 'guru', 'industri'])->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'guru_id' => 'required|exists:gurus,id',
            'industri_id' => 'required|exists:industris,id',
            'mulai' => 'required|date',
            'selesai' => 'required|date|after_or_equal:mulai',
        ]);

        $pkl = PKL::create($validated);

        return response()->json($pkl->load(['siswa', 'guru', 'industri']), 201);
    }

    public function show(PKL $pkl)
    {
        return response()->json($pkl->load(['siswa', 'guru', 'industri']));
    }

    public function update(Request $request, PKL $pkl)
    {
        $validated = $request->validate([
            'siswa_id' => 'sometimes|exists:siswas,id',
            'guru_id' => 'sometimes|exists:gurus,id',
            'industri_id' => 'sometimes|exists:industris,id',
            'mulai' => 'sometimes|date',
            'selesai' => 'sometimes|date|after_or_equal:mulai',
        ]);

        $pkl->update($validated);

        return response()->json($pkl->load(['siswa', 'guru', 'industri']));
    }

    public function destroy(PKL $pkl)
    {
        $pkl->delete();

        return response()->json(null, 204);
    }
}
