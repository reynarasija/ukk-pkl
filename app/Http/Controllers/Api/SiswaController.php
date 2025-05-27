<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
        // Display a listing of the students
    public function index()
    {
        $siswa = Siswa::with('user')->get();
        return response()->json($siswa);
    }

    // Store a newly created student
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|max:50|unique:siswas',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'nullable|string',
            'kontak' => 'nullable|string|max:20',
            'email' => 'nullable|email|unique:siswas',
            'status_pkl' => 'nullable|string',
        ]);

        $siswa = Siswa::create($validated);
        return response()->json($siswa, 201);
    }

    // Display the specified student
    public function show($id)
    {
        $siswa = Siswa::with('user')->findOrFail($id);
        return response()->json($siswa);
    }

    // Update the specified student
    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'sometimes|required|string|max:255',
            'nis' => 'sometimes|required|string|max:50|unique:siswas,nis,' . $id,
            'gender' => 'sometimes|required|in:Laki-laki,Perempuan',
            'alamat' => 'nullable|string',
            'kontak' => 'nullable|string|max:20',
            'email' => 'nullable|email|unique:siswas,email,' . $id,
            'status_pkl' => 'nullable|string',
        ]);

        $siswa->update($validated);
        return response()->json($siswa);
    }

    // Remove the specified student
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
        return response()->json(['message' => 'Siswa deleted successfully.']);
    }
}
