<?php

namespace App\Http\Controllers;

use App\Models\Perawatan;
use App\Models\Tanaman;
use Illuminate\Http\Request;

class PerawatanController extends Controller
{
    public function index(Request $request)
    {
        $query = Perawatan::query();
        if ($request->has('search')) {
            $query->where('jenis_perawatan', 'like', '%'.$request->search.'%');
        }
        $perawatans = $query->with('tanaman')->paginate(10);
        return view('perawatan.index', compact('perawatans'));
    }

    public function create()
    {
        $tanamans = Tanaman::all();
        return view('perawatan.create', compact('tanamans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanaman_id' => 'required|exists:tanamans,id',
            'tanggal_perawatan' => 'required|date',
            'jenis_perawatan' => 'nullable|max:150',
            'catatan' => 'nullable',
        ]);
        Perawatan::create($validated);
        return redirect()->route('perawatan.index')->with('success', 'Perawatan berhasil ditambahkan!');
    }

    public function show(Perawatan $perawatan)
    {
        return view('perawatan.show', compact('perawatan'));
    }

    public function edit(Perawatan $perawatan)
    {
        $tanamans = Tanaman::all();
        return view('perawatan.edit', compact('perawatan', 'tanamans'));
    }

    public function update(Request $request, Perawatan $perawatan)
    {
        $validated = $request->validate([
            'tanaman_id' => 'required|exists:tanamans,id',
            'tanggal_perawatan' => 'required|date',
            'jenis_perawatan' => 'nullable|max:150',
            'catatan' => 'nullable',
        ]);
        $perawatan->update($validated);
        return redirect()->route('perawatan.index')->with('success', 'Perawatan berhasil diupdate!');
    }

    public function destroy(Perawatan $perawatan)
    {
        $perawatan->delete();
        return redirect()->route('perawatan.index')->with('success', 'Perawatan berhasil dihapus!');
    }
} 