<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PKL;
use App\Models\Guru;
use App\Models\Industri;
use Illuminate\Support\Facades\Auth;
class PKLController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = PKL::with(['siswa', 'guru', 'industri']);

        if ($request->has('search') && $request->search != '') {
            $query->whereHas('siswa', function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%');
            });
        }

        $pkls = $query->latest()->paginate(5);

        return view('pkl.index', compact('pkls'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get the logged-in user (assuming it's a siswa)
        $user = Auth::user();

        // Get available teachers and industries
        $gurus = Guru::all();
        $industris = Industri::all();

        return view('pkl.create', compact('gurus', 'industris', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'guru_id' => 'required|exists:gurus,id',
            'industri_id' => 'required|exists:industris,id',
            'mulai' => 'required|date',
            'selesai' => 'required|date|after:mulai',
        ]);

        $user = Auth::user();

        PKL::create([
            'siswa_id' => $user->id,
            'guru_id' => $request->guru_id,
            'industri_id' => $request->industri_id,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai,
        ]);

        return redirect()->route('pkl.index')
            ->with('success', 'Data PKL berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pkl = PKL::with(['siswa', 'guru', 'industri'])->findOrFail($id);
        return view('pkl.show', compact('pkl'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pkl = PKL::findOrFail($id);
        $gurus = Guru::all();
        $industris = Industri::all();

        return view('pkl.edit', compact('pkl', 'gurus', 'industris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'guru_id' => 'required|exists:gurus,id',
            'industri_id' => 'required|exists:industris,id',
            'mulai' => 'required|date',
            'selesai' => 'required|date|after:mulai',
        ]);

        $pkl = PKL::findOrFail($id);
        $pkl->update($request->only(['guru_id', 'industri_id', 'mulai', 'selesai']));

        return redirect()->route('pkl.index')
            ->with('success', 'Data PKL berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pkl = PKL::findOrFail($id);

        // Update siswa status back to 'Belum' when PKL is deleted
        if ($pkl->siswa) {
            $pkl->siswa->update(['status_pkl' => 'Belum']);
        }

        $pkl->delete();

        return redirect()->route('pkl.index')
            ->with('success', 'Data PKL berhasil dihapus.');
    }
}
