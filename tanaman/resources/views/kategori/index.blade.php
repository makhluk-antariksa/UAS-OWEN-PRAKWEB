@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Daftar Kategori</h1>
    <a href="{{ route('kategori.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Tambah Kategori</a>
</div>
@if(session('success'))
    <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">{{ session('success') }}</div>
@endif
<form method="GET" action="{{ route('kategori.index') }}" class="mb-4 flex gap-2">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari kategori..." class="border rounded px-2 py-1 w-64">
    <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">Cari</button>
</form>
<table class="min-w-full bg-white border rounded shadow">
    <thead>
        <tr>
            <th class="border px-2 py-1">#</th>
            <th class="border px-2 py-1">Nama Kategori</th>
            <th class="border px-2 py-1">Deskripsi</th>
            <th class="border px-2 py-1">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($kategoris as $kategori)
        <tr>
            <td class="border px-2 py-1">{{ $loop->iteration + ($kategoris->currentPage()-1)*$kategoris->perPage() }}</td>
            <td class="border px-2 py-1">{{ $kategori->nama_kategori }}</td>
            <td class="border px-2 py-1">{{ $kategori->deskripsi }}</td>
            <td class="border px-2 py-1 flex gap-1">
                <a href="{{ route('kategori.show', $kategori) }}" class="bg-blue-500 text-white px-2 py-1 rounded text-xs">Detail</a>
                <a href="{{ route('kategori.edit', $kategori) }}" class="bg-yellow-500 text-white px-2 py-1 rounded text-xs">Edit</a>
                <form action="{{ route('kategori.destroy', $kategori) }}" method="POST" onsubmit="return confirm('Yakin hapus?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-2 py-1 rounded text-xs">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center py-2">Tidak ada data.</td>
        </tr>
        @endforelse
    </tbody>
</table>
<div class="mt-4">{{ $kategoris->links() }}</div>
@endsection 