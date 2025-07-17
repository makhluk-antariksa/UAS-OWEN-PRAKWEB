@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Detail Tanaman</h1>
<div class="bg-white rounded shadow p-4 max-w-lg">
    @if($tanaman->gambar)
        <img src="{{ asset('storage/'.$tanaman->gambar) }}" alt="Gambar Tanaman" class="h-40 mb-4 rounded">
    @endif
    <div class="mb-2"><span class="font-semibold">Nama Tanaman:</span> {{ $tanaman->nama_tanaman }}</div>
    <div class="mb-2"><span class="font-semibold">Kategori:</span> {{ $tanaman->kategori->nama_kategori ?? '-' }}</div>
    <div class="mb-2"><span class="font-semibold">Deskripsi:</span> {{ $tanaman->deskripsi }}</div>
    <div class="mb-2"><span class="font-semibold">Tanggal Tanam:</span> {{ $tanaman->tanggal_tanam }}</div>
    <div class="mb-2"><span class="font-semibold">Lokasi:</span> {{ $tanaman->lokasi }}</div>
    <a href="{{ route('tanaman.index') }}" class="inline-block mt-4 bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">Kembali</a>
</div>
@endsection 