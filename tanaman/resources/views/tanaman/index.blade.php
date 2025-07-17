@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Daftar Tanaman</h1>
    <a href="{{ route('tanaman.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Tambah Tanaman</a>
</div>
@if(session('success'))
    <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">{{ session('success') }}</div>
@endif
<form method="GET" action="{{ route('tanaman.index') }}" class="mb-4 flex gap-2">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari tanaman..." class="border rounded px-2 py-1 w-64">
    <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">Cari</button>
</form>
<table class="min-w-full bg-white border rounded shadow">
    <thead>
        <tr>
            <th class="border px-2 py-1">#</th>
            <th class="border px-2 py-1">Nama Tanaman</th>
            <th class="border px-2 py-1">Kategori</th>
            <th class="border px-2 py-1">Tanggal Tanam</th>
            <th class="border px-2 py-1">Lokasi</th>
            <th class="border px-2 py-1">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($tanamans as $tanaman)
        <tr>
            <td class="border px-2 py-1">{{ $loop->iteration + ($tanamans->currentPage()-1)*$tanamans->perPage() }}</td>
            <td class="border px-2 py-1">{{ $tanaman->nama_tanaman }}</td>
            <td class="border px-2 py-1">{{ $tanaman->kategori->nama_kategori ?? '-' }}</td>
            <td class="border px-2 py-1">{{ $tanaman->tanggal_tanam }}</td>
            <td class="border px-2 py-1">{{ $tanaman->lokasi }}</td>
            <td class="border px-2 py-1 flex gap-1">
                <a href="{{ route('tanaman.show', $tanaman) }}" class="bg-blue-500 text-white px-2 py-1 rounded text-xs">Detail</a>
                <a href="{{ route('tanaman.edit', $tanaman) }}" class="bg-yellow-500 text-white px-2 py-1 rounded text-xs">Edit</a>
                <form action="{{ route('tanaman.destroy', $tanaman) }}" method="POST" onsubmit="return confirm('Yakin hapus?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-2 py-1 rounded text-xs">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center py-2">Tidak ada data.</td>
        </tr>
        @endforelse
    </tbody>
</table>
<div class="mt-4">{{ $tanamans->links() }}</div>
@endsection 