<?php

namespace App\Http\Controllers;

use App\Models\Tanaman;
use App\Models\Kategori;
use Illuminate\Http\Request;

class TanamanController extends Controller
{
    public function index(Request $request)
    {
        $query = Tanaman::query();
        if ($request->has('search')) {
            $query->where('nama_tanaman', 'like', '%'.$request->search.'%');
        }
        $tanamans = $query->with('kategori')->paginate(10);
        return view('tanaman.index', compact('tanamans'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('tanaman.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $rules = [
            'nama_tanaman' => 'required|max:150',
            'deskripsi' => 'nullable',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'tanggal_tanam' => 'nullable|date',
            'lokasi' => 'nullable|max:150',
        ];
        // Validasi kategori_id hanya jika bukan tambah
        if ($request->kategori_id !== 'tambah') {
            $rules['kategori_id'] = 'nullable|exists:kategoris,id';
        }
        $validated = $request->validate($rules);

        // Jika tambah kategori baru
        if ($request->kategori_id === 'tambah' && $request->filled('kategori_baru')) {
            $kategoriBaru = Kategori::create([
                'nama_kategori' => $request->kategori_baru,
                'deskripsi' => null,
            ]);
            $validated['kategori_id'] = $kategoriBaru->id;
        }

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('uploads/tanaman', 'public');
        }
        Tanaman::create($validated);
        return redirect()->route('tanaman.index')->with('success', 'Tanaman berhasil ditambahkan!');
    }

    public function show(Tanaman $tanaman)
    {
        return view('tanaman.show', compact('tanaman'));
    }

    public function edit(Tanaman $tanaman)
    {
        $kategoris = Kategori::all();
        return view('tanaman.edit', compact('tanaman', 'kategoris'));
    }

    public function update(Request $request, Tanaman $tanaman)
    {
        $validated = $request->validate([
            'nama_tanaman' => 'required|max:150',
            'kategori_id' => 'nullable|exists:kategoris,id',
            'deskripsi' => 'nullable',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'tanggal_tanam' => 'nullable|date',
            'lokasi' => 'nullable|max:150',
        ]);
        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('uploads/tanaman', 'public');
        }
        $tanaman->update($validated);
        return redirect()->route('tanaman.index')->with('success', 'Tanaman berhasil diupdate!');
    }

    public function destroy(Tanaman $tanaman)
    {
        $tanaman->delete();
        return redirect()->route('tanaman.index')->with('success', 'Tanaman berhasil dihapus!');
    }
} 